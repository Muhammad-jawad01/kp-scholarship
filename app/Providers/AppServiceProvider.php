<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use App\Helpers\Helper;
use Illuminate\Pagination\Paginator;
use PHPUnit\TextUI\Help;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Schema::defaultStringLength(191);
        Schema::defaultStringLength(125);
        Paginator::useBootstrap();
        $this->webStartup();
    }

    public function webStartup()
    {

        $themeSetting = Setting::where('status', 1)->first();

        if ($themeSetting) {
            $themeObject = $themeSetting;
            $themeSetting = $themeSetting->toArray();
            $themeSetting['sidebarCollapsed'] = Helper::DbtoBoolen($themeSetting['sidebarCollapsed']);
            $themeSetting['showMenu'] = Helper::DbtoBoolen($themeSetting['showMenu']);
            $themeSetting['pageHeader'] = Helper::DbtoBoolen($themeSetting['pageHeader']);
            $themeSetting['blankPage'] = Helper::DbtoBoolen($themeSetting['blankPage']);
            $themeSetting['header_logo'] = $themeObject->getFirstMediaUrl('header_logo', 'resize');
            $themeSetting['footer_logo'] = $themeObject->getFirstMediaUrl('footer_logo');
            $themeSetting['work_footer_logo'] = $themeObject->getFirstMediaUrl('work_footer_logo', 'resize');
            $themeSetting['inner_page_logo'] = $themeObject->getFirstMediaUrl('inner_page_logo', 'resize');
            $themeSetting['work_logo'] = $themeObject->getFirstMediaUrl('work_logo', 'resize');
            $themeSetting['logo'] =  $themeObject->getFirstMediaUrl('logo');
        } else {
            $themeSetting = Helper::getDefault_theme_Property();
        }
        Config::set('custom', ['custom' =>  $themeSetting]);
        View::share('themeSetting', (object)$themeSetting);
    }
}