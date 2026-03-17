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
                'academics' => 'academics',
                'admissions' => 'admissions',
                'gallery' => 'gallery',
                'videos' => 'videos',
                'events' => 'events',
                'awards' => 'awards',
                'careers' => 'careers',
                'contact' => 'contact',
                'principal-desk' => 'about', // Fallback to about
                'correspondent-desk' => 'about',
            ];

            foreach ($map as $route => $key) {
                if (str_contains($routeName, $route)) {
                    $page = $key;
                    break;
                }
            }
        }

        // Get the specific header banner for this page
        $pageBanner = Banner::where('page', '=', $page)
            ->where('banner_type', '=', 'page_header')
            ->active()
            ->first();
            
        // If not found, try a default header banner
        if (!$pageBanner && $page !== 'home') {
             $pageBanner = Banner::where('page', '=', 'default')
                ->where('banner_type', '=', 'page_header')
                ->active()
                ->first();
        }

        $view->with('pageBanner', $pageBanner);
    }
}
