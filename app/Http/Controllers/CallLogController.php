<?php

namespace App\Http\Controllers;

use App\Models\CallLog;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CallLogController extends Controller
{
    public function index(Request $request)
    {
        if (!in_array(Auth::user()->type, [USER_TYPE_ADMIN, USER_TYPE_BDM])) {
            return redirect()->route('admin.dashboard');
        }

        $user_id = $request->input('user_id');

        $callLogs = $this->getCallLogsData($request, $user_id);

        return view('admin.call_logs', compact('callLogs'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'platform' => 'required',
            'contact' => 'required',
            'company_details' => 'string',
            'message' => 'string'
        ]);

        try {
            $callLog = CallLog::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'contact' =>  $request->get('contact'),
                'company_details' =>  $request->get('company_details'),
                'message' =>  $request->get('message'),
                'ref_no' => $this->generateRefNo(),
                'client_of' => $this->getBDMId() ?? 0
            ]);

            return response()->json(['callLog' => $callLog], 201);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    private function generateRefNo(): string
    {
        return Carbon::now()->timezone('Canada/Eastern')->format('Ymdhis') . mt_rand(1, 9) . mt_rand(1, 9) . mt_rand(1, 9);
    }

    private function getBDMId($user_id = null)
    {
        if (empty($user_id)) {
            $user_id = Auth::user()->id;
        }

        $bdm_id = null;

        if ($user_id == 3) {
            $bdm_id = 1;
        } else if ($user_id == 4) {
            $bdm_id = 2;
        } else if ($user_id == 5) {
            $bdm_id = 3;
        }

        return $bdm_id;
    }

    protected function getCallLogsData(Request $request, $user_id = null)
    {
        $callLogs = CallLog::orderByDesc('updated_at');

        if (auth()->user()->type == USER_TYPE_BDM) {
            $bdm_id = $this->getBDMId();
            $callLogs = $callLogs->where('client_of', $bdm_id);
        } elseif (Auth::user()->type == USER_TYPE_ADMIN) {
            if (!empty($user_id)) {
                $bdm_id = $this->getBDMId($user_id);

                $callLogs = $callLogs->where('client_of', $bdm_id);
            } else {
                $callLogs = $callLogs->where('client_of', 0);
            }
        }

        if (!empty($request->input('start_date'))) {
            $callLogs = $callLogs->where('created_at', '>=', $request->input('start_date'));
        }
        if (!empty($request->input('end_date'))) {
            $callLogs = $callLogs->where('created_at', '<=', $request->input('end_date'));
        }

        return $callLogs->get();
    }
}
