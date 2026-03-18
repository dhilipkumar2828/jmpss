<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Banner;
use Illuminate\Support\Facades\Route;

class BannerComposer
{
    public function compose(View $view)
    {
        $routeName = Route::currentRouteName();
        $page = 'home';

        if ($routeName) {
            // Map route names to banner page keys
            $map = [
                'home' => 'home',
                'about' => 'about',
                'principal-desk' => 'about',
                'correspondent-desk' => 'about',
                'mandatory-disclosure' => 'about',
                'academics' => 'academics',
                'admissions' => 'academics',
                'awards' => 'academics',
                'gallery' => 'gallery',
                'videos' => 'gallery',
                'events' => 'campus-life',
                'infrastructure' => 'campus-life',
                'facilities' => 'campus-life',
                'careers' => 'careers',
                'contact' => 'contact',
            ];

            foreach ($map as $route => $key) {
                if (str_contains($routeName, $route)) {
                    $page = $key;
                    break;
                }
            }
        }

        // Get the specific banner for this page
        // We prefer 'page_header' type, but will take any active banner for this page
        $pageBanner = Banner::where('page', '=', $page)
            ->active()
            ->orderByRaw("CASE WHEN banner_type = 'page_header' THEN 0 ELSE 1 END")
            ->orderBy('sort_order', 'asc')
            ->first();
            
        // If not found, try a default header banner
        if (!$pageBanner && $page !== 'home') {
             $pageBanner = Banner::where('page', '=', 'default')
                ->where('banner_type', '=', 'page_header')
                ->active()
                ->first();
        }

        $view->with('pageBanner', $pageBanner);
        $view->with('recentEvents', \App\Models\Event::active()->latest('event_date')->take(3)->get());
    }
}
