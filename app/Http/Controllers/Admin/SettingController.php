<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Traits\UploadsFiles;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use UploadsFiles;

    public function index()
    {
        $settings = SiteSetting::orderBy('group')->orderBy('label')->get()->groupBy('group');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = SiteSetting::all();

        foreach ($settings as $setting) {
            if ($setting->type === 'image') {
                if ($request->hasFile('settings.'.$setting->key)) {
                    $old = $setting->value;
                    $path = $this->storeImage($request->file('settings.'.$setting->key), 'settings', $old);
                    SiteSetting::set($setting->key, $path);
                }
            } elseif ($request->has('settings.'.$setting->key)) {
                SiteSetting::set($setting->key, $request->input('settings.'.$setting->key));
            }
        }

        return back()->with('success', 'Настройки сохранены.');
    }
}
