<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function appearance()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        
        // Default values if not set
        $defaults = [
            'logo_green_900'   => '#004f24',
            'logo_green_700'   => '#026e33',
            'logo_green_500'   => '#2a8f54',
            'logo_orange'      => '#d94a13',
            'logo_gold'        => '#c69c3a',
            'logo_gold_light'  => '#e0b85a',
            'primary_color'    => '#004800',
            'secondary_color'  => '#e14c1e',
            'bg_dark'          => '#002800',
        ];

        $settings = array_merge($defaults, $settings);

        return view('admin.settings.appearance', compact('settings'));
    }

    public function updateAppearance(Request $request)
    {
        $data = $request->validate([
            'logo_green_900'   => 'required|string|max:7',
            'logo_green_700'   => 'required|string|max:7',
            'logo_green_500'   => 'required|string|max:7',
            'logo_orange'      => 'required|string|max:7',
            'logo_gold'        => 'required|string|max:7',
            'logo_gold_light'  => 'required|string|max:7',
            'primary_color'    => 'required|string|max:7',
            'secondary_color'  => 'required|string|max:7',
            'bg_dark'          => 'required|string|max:7',
        ]);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Appearance settings updated!');
    }

    public function general()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        
        $defaults = [
            'school_address' => 'No.210, Palla Egai Village, Puliur Post, Thirukazhukundram T.K., Kancheepuram Dist. Pin-603 109',
            'school_phone_1' => '+91-7373418852',
            'school_phone_2' => '+91-8939222122',
            'school_email'   => 'jeevamemorialschool@gmail.com',
            'facebook_url'   => '#',
            'instagram_url'  => '#',
            'linkedin_url'   => '#',
            'youtube_url'    => '#',
        ];

        $settings = array_merge($defaults, $settings);

        return view('admin.settings.general', compact('settings'));
    }

    public function updateGeneral(Request $request)
    {
        $data = $request->validate([
            'school_address' => 'required|string',
            'school_phone_1' => 'required|string',
            'school_phone_2' => 'nullable|string',
            'school_email'   => 'required|email',
            'facebook_url'   => 'nullable|string',
            'instagram_url'  => 'nullable|string',
            'linkedin_url'   => 'nullable|string',
            'youtube_url'    => 'nullable|string',
        ]);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value ?? '']);
        }

        return redirect()->back()->with('success', 'General settings updated!');
    }
}
