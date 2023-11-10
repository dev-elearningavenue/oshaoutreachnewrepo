<?php

namespace App\Http\Controllers;

use App\Models\Leed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeedsController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->input('user_id');

        $userRole = auth()->user()->type;

        if($userRole == USER_TYPE_ADMIN) {
            $leeds = $this->getLeedsData($request, $user_id);
        }

        if($userRole == USER_TYPE_BDM) {
            $leeds = $this->getLeedsData($request, auth()->user()->id);
        }

        return view('admin.leeds_list', compact('leeds'));
    }

    public function update(Request $request, Leed $leed) {

        $request->validate([
            'outcome' => 'max:200',
            'contacted' => 'boolean'
        ]);

        try {
            $userBDM = getBDMId(auth()->user()->id);

            if($leed->bdm !== $userBDM && auth()->user()->type !== USER_TYPE_ADMIN) {
                return response()->json(['message' => 'Unauthorized'], 500);
            }

            $leed->update([
                'outcome' => $request->get('outcome', ""),
                'contacted' => $request->get('contacted', 0),
            ]);

            return response()->json(['data' => $leed], 201);
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage() . ' Something went wrong'], 500);
        }
    }

    protected function getLeedsData(Request $request, $user_id = null)
    {
        $leeds = Leed::orderByDesc('updated_at');

        $bdm_id = getBDMId($user_id);
        $leeds = $leeds->where('bdm', $bdm_id);

        if (!empty($request->input('start_date'))) {
            $leeds = $leeds->where('created_at', '>=', $request->input('start_date'));
        }
        if (!empty($request->input('end_date'))) {
            $leeds = $leeds->where('created_at', '>=', $request->input('end_date'));
        }

        return $leeds->get();
    }
}
