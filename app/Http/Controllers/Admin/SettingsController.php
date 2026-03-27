<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings;
use App\Services\ImageService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->middleware('isadmin');
        $this->imageService = $imageService;
    }

    public function edit()
    {
        $allsettings = Settings::all();
        return view('admin.settings.settings', compact('allsettings'));
    }

    public function update(Request $request)
    {
        $settings = Settings::findOrFail(1);

        $imageConfigs = [
            'logo' => [190, 45], 
            'cover1' => [1100, 250], 
            'cover2' => [1100, 250], 
            'cover3' => [1100, 250]
        ];

        foreach ($imageConfigs as $field => $sizes) {
            if ($request->hasFile($field)) {
                $settings->$field = $this->imageService->upload(
                    $request->file($field), 
                    'img', 
                    $sizes[0], $sizes[1], 
                    $settings->$field
                );
            }
        }

        $settings->title = $request->input('title');
        $settings->email = $request->input('email');
        $settings->phonenumber = $request->input('phonenumber');
        $settings->address = $request->input('address');
        $settings->save();

        session()->flash('notif', 'Settings Updated Successfully');
        return redirect()->back();
    }
}
