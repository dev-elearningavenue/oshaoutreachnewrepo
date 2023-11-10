<?php

namespace App\Http\Controllers;

use App\Models\StatePromotions;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StatePromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $statePromotions = StatePromotions::query()->get();

        return view('admin.state_promotion.index', compact('statePromotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.state_promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:state_promotions,slug',
            'heading' => 'required',
            'banner_img' => 'required|image|mimes:jpg,png,webp|max:2048',
            'courses' => 'required',
            'excerpt' => 'required',
            'obligations' => 'required',
            'advantages' => 'required',
            'published' => 'required|boolean',
        ]);

        try {
            $bannerImgPath = $request->banner_img->storeOnCloudinaryAs(env('CLOUDINARY_UPLOAD_DIRECTORY'), $request->slug . '_h1banner')->getSecurePath();

            $validatedData['banner_img'] = $bannerImgPath;

            $state_promotion = StatePromotions::create($validatedData);

            return redirect()->route('state-promotion.index')->with('success', $state_promotion->name . ' record has been successfully created.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\StatePromotions $statePromotions
     * @return \Illuminate\Http\Response
     */
    public function show(StatePromotions $statePromotions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\StatePromotions $statePromotions
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(StatePromotions $state_promotion)
    {
        return view('admin.state_promotion.edit', compact('state_promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\StatePromotions $statePromotions
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, StatePromotions $state_promotion)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes',
            'slug' => [
                'sometimes',
                Rule::unique('state_promotions')->ignore($state_promotion->id),
            ],
            'heading' => 'sometimes',
            'banner_img' => 'sometimes|nullable|image|mimes:jpg,png,webp|max:2048',
            'courses' => 'sometimes',
            'excerpt' => 'sometimes',
            'obligations' => 'sometimes',
            'advantages' => 'sometimes',
            'published' => 'sometimes|boolean',
        ]);

        try {

            if($request->hasFile('banner_img')) {
                $bannerImgPath = $request->banner_img->storeOnCloudinaryAs(env('CLOUDINARY_UPLOAD_DIRECTORY'), $state_promotion->slug . '_h1banner')->getSecurePath();

                $validatedData['banner_img'] = $bannerImgPath;
            }

            $state_promotion->update($validatedData);

            return redirect()->back()->with('success', 'Record has been successfully updated.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\StatePromotions $statePromotions
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatePromotions $statePromotions)
    {
        //
    }
}
