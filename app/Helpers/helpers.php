<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Config;
use Illuminate\Support\Str;
use App\Models\Setting;
use Lang;
use App\Models\Category;
use App\Models\Districts;
use App\Models\DegreeCertificate;

class Helper
{


    public static function getModelSelect($model, $fieldArr = ['title', 'id'], $cond = [])
    {
        $model = 'App\Models\\' . $model;

        $data = $model::where($cond)->where('status', 1)->pluck($fieldArr[0], $fieldArr[1]);
        return $data;
    }

    public static function hearAboutEventVia()
    {
        return ['Youtube' => 'Youtube', 'Facebook' => 'Facebook', 'Instagram' => 'Instagram', 'WhatsApp' => 'WhatsApp', 'Newspaper' => 'Newspaper', 'Other' => 'Other'];
    }

    public static function getallDistricts()
    {
        return Districts::pluck('name', 'id');
    }

    public static function getallDegreeCertificates()
    {
        return DegreeCertificate::pluck('name', 'id');
    }

    // convert Teamperature
    public static function celsius_to_fahrenheit($temp)
    {
        $fahrenheit = $temp * 9 / 5 + 32;
        return $fahrenheit;
    }


    public static function TitleTextLimit($text, $limit = 200)
    {
        if (strlen($text) <= $limit) {
            echo $text;
        } else {
            $text = substr($text, 0, $limit) . '...';
            echo $text;
        }
    }

    public static function LinkTypes()
    {
        return ['quick' => 'Quick', 'important' => 'Important', 'other' => 'Other', 'footer' => 'Footer Link'];
    }

    public static function categoriesTypes()
    {
        return ['news' => 'News', 'download' => 'Download'];
    }

    public static function universityCategories()
    {
        return ['government' => 'Government', 'private' => 'Private'];
    }
    public static function facilityTypes()
    {
        return ['jawan marakiz' => 'Jawan Marakiz', 'youth hostels' => 'Youth Hostels'];
    }
    public static function getCategoryTypes($type)
    {
        $categories = Category::where('type', $type)->where('status', 1)->pluck('title', 'id');
        return $categories;
    }
    public static function renderImageUrl($imageUrl, $type = 'logo')
    {
        $ImageArray = ['profile' => url('/') . 'images/portrait/small/avatar-s-11.jpg', 'header_logo' => url('/') . 'images/logo/logo.png', 'logo' => url('/') . 'images/logo/logo.png'];
        if ($imageUrl == '') {
            $imageUrl = $ImageArray[$type];
        } else {
            $imageUrl;
        }
        return $imageUrl;
    }

    public static function languageConvert($object, $column)
    {
        $column = Lang::locale() . '_' . $column;

        return $object->$column;
    }

    public static function teamTypes()
    {
        return ['addministrator' => 'Addministrator', 'team' => 'Team', 'alumni' => 'Alumni'];
    }

    public static function father_earning()
    {

        return ['1' => 'Yes', '0' => 'No'];
    }
    public static function mother_profession()
    {
        return ['House wife' => 'House wife', 'Working Women' => 'Working Women'];
    }

    public static function father_status()
    {
        return ['Alive' => 'Alive', 'Deceased' => 'Deceased'];
    }
    public static function mother_status()
    {
        return ['Alive' => 'Alive', 'Deceased' => 'Deceased'];
    }
    public static function parent_marriage_relationship()
    {
        return ['Divorced' => 'Divorced', 'Married' => 'Married'];
    }
    public static function family_own_transport()
    {

        return ['Yes' => 'Yes', 'No' => 'No'];
    }
    public static function family_own_cattle()
    {

        return ['Yes' => 'Yes', 'No' => 'No'];
    }


    public static function house_structure()
    {
        return ['kutcha house' => 'kutcha House', 'Semi kutcha house' => ' Semi kutcha House'];
    }
    public static function house_status()
    {
        return ['commercial ' => 'Commercial ', 'residential' => 'Residential'];
    }
    public static function accommodation_type()
    {
        return ['Rented' => 'Rented', 'Self or Family owned' => 'Self or Family owned'];
    }
    public static function financially_supporting()
    {

        return ['1' => 'Yes', '0' => 'No'];
    }

    public static function showStatus($value)
    {
        // Define an associative array mapping status values to their corresponding badges
        $statusLabels = [
            1 => ['label' => __("Active"), 'class' => 'badge-light-primary'],
            0 => ['label' => __("In-Active"), 'class' => 'badge-light-warning'],
            2 => ['label' => __("Pending"), 'class' => 'badge-light-info'],
            3 => ['label' => __("Rejecte"), 'class' => 'badge-light-danger'],
            4 => ['label' => __("UniversityApproved"), 'class' => 'badge-light-primary'],
            5 => ['label' => __("Approved"), 'class' => 'badge-light-primary'],
            6 => ['label' => __("Rejecte"), 'class' => 'badge-light-danger'],
        ];

        // Check if the value exists in the array and return the corresponding badge
        if (array_key_exists($value, $statusLabels)) {
            return '<span class="badge badge-pill ' . $statusLabels[$value]['class'] . ' mr-1">' . $statusLabels[$value]['label'] . '</span>';
        }

        // Optionally handle undefined statuses
        return '<span class="badge badge-pill badge-light-secondary mr-1">' . __("locale.Unknown Status") . '</span>';
    }

    // public static function showStatus($value)
    // {
    //     if ($value == 1) {
    //         return '<span class="badge badge-pill badge-light-primary mr-1">' . __("locale.Active") . '</span>';
    //     }

    //     if ($value == 0) {
    //         return '<span class="badge badge-pill badge-light-warning mr-1">' . __("locale.In-Active") . '</span>';
    //     }

    //     if ($value == 2) {
    //         return '<span class="badge badge-pill badge-light-info mr-1">' . __("locale.Pending ") . '</span>';
    //     }

    //     if ($value == 3) {
    //         return '<span class="badge badge-pill badge-light-danger mr-1">' . __("locale.Rejecte") . '</span>';
    //     }
    //     if ($value == 4) {
    //         return '<span class="badge badge-pill badge-light-primary mr-1">' . __("locale.UniversityApproved") . '</span>';
    //     }
    //     if ($value == 5) {

    //         return '<span class="badge badge-pill badge-light-primary mr-1">' . __("locale.Approved") . '</span>';
    //     }
    //     if ($value == 6) {
    //         return '<span class="badge badge-pill badge-light-danger mr-1">' . __("locale.Rejecte") . '</span>';
    //     }
    // }

    public static function switchToDb($value)
    {
        if ($value == 'on') {
            return true;
        } else {
            return false;
        }
    }


    public static function DbtoBoolen($value)
    {
        if ($value == "1" || $value == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function getThemeData()
    {
        $allOptions = [
            'mainLayoutType' => array('vertical' => 'Vertical', 'horizontal' => 'Horizontal'),
            'theme' => array('light' => 'light', 'dark' => 'dark-layout', 'bordered' => 'bordered-layout', 'semi-dark' => 'semi-dark-layout'),
            'sidebarCollapsed' => array(true, false),
            'showMenu' => array(true, false),
            'layoutWidth' => array('full' => 'Full', 'boxed' => 'Boxed'),
            'navbarColor' => array('bg-primary' => 'bg-primary', 'bg-info' => 'bg-info', 'bg-warning' => 'bg-warning', 'bg-success' => 'bg-success', 'bg-danger' => 'bg-danger', 'bg-dark' => 'bg-dark'),
            'horizontalMenuType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky'),
            'horizontalMenuClass' => array('static' => 'Static', 'sticky' => 'fixed-top', 'floating' => 'floating-nav'),
            'verticalMenuNavbarType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky', 'hidden' => 'navbar-hidden'),
            'navbarClass' => array('floating' => 'floating-nav', 'static' => 'navbar-static-top', 'sticky' => 'fixed-top', 'hidden' => 'd-none'),
            'footerType' => array('static' => 'footer-static', 'sticky' => 'footer-fixed', 'hidden' => 'footer-hidden'),
            'pageHeader' => array(true, false),
            'contentLayout' => array('default', 'content-left-sidebar', 'content-right-sidebar', 'content-detached-left-sidebar', 'content-detached-right-sidebar'),
            'blankPage' => array(false, true),
            'sidebarPositionClass' => array('content-left-sidebar' => 'sidebar-left', 'content-right-sidebar' => 'sidebar-right', 'content-detached-left-sidebar' => 'sidebar-detached sidebar-left', 'content-detached-right-sidebar' => 'sidebar-detached sidebar-right', 'default' => 'default-sidebar-position'),
            'contentsidebarClass' => array('content-left-sidebar' => 'content-right', 'content-right-sidebar' => 'content-left', 'content-detached-left-sidebar' => 'content-detached content-right', 'content-detached-right-sidebar' => 'content-detached content-left', 'default' => 'default-sidebar'),
            'defaultLanguage' => array('en' => 'English', 'ur' => 'Urdu'),
            'direction' => array('ltr' => 'Left To Right', 'rtl' => 'Right to left'),
        ];
        return $allOptions;
    }


    // public static function applClasses()
    // {
    //     $themeSetting = Setting::where('status', 1)->first();
    //     if ($themeSetting) {

    //         $themeSetting = $themeSetting->toArray();
    //         $themeSetting['sidebarCollapsed'] = Helper::DbtoBoolen($themeSetting['sidebarCollapsed']);
    //         $themeSetting['showMenu'] = Helper::DbtoBoolen($themeSetting['showMenu']);
    //         $themeSetting['pageHeader'] = Helper::DbtoBoolen($themeSetting['pageHeader']);
    //         $themeSetting['blankPage'] = Helper::DbtoBoolen($themeSetting['blankPage']);
    //         $themeSetting['blankPageClass'] = '';
    //         $themeSetting['sidebarClass'] = '';
    //         return  $themeSetting;
    //     } else {
    //         Helper::_applClasses();
    //     }
    // }
    public static function applClasses()
    {
        // Demo
        $fullURL = request()->fullurl();
        if (App()->environment() === 'production') {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-' . $i);
                if ($contains === true) {
                    $data = config('custom.' . 'demo-' . $i);
                }
            }
        } else {
            $data = config('custom.custom');
        }

        // default data array
        $DefaultData = [
            'mainLayoutType' => 'vertical',
            'theme' => 'light',
            'sidebarCollapsed' => false,
            'navbarColor' => '',
            'horizontalMenuType' => 'floating',
            'verticalMenuNavbarType' => 'floating',
            'footerType' => 'static', //footer
            'layoutWidth' => 'boxed',
            'showMenu' => true,
            'bodyClass' => '',
            'bodyStyle' => '',
            'pageClass' => '',
            'pageHeader' => true,
            'contentLayout' => 'default',
            'blankPage' => false,
            'defaultLanguage' => 'en',
            'direction' => env('MIX_CONTENT_DIRECTION', 'ltr'),
        ];

        // if any key missing of array from custom.php file it will be merge and set a default value from dataDefault array and store in data variable
        $data = array_merge($DefaultData, $data);

        // All options available in the template
        $allOptions = [
            'mainLayoutType' => array('vertical', 'horizontal'),
            'theme' => array('light' => 'light', 'dark' => 'dark-layout', 'bordered' => 'bordered-layout', 'semi-dark' => 'semi-dark-layout'),
            'sidebarCollapsed' => array(true, false),
            'showMenu' => array(true, false),
            'layoutWidth' => array('full', 'boxed'),
            'navbarColor' => array('bg-primary', 'bg-info', 'bg-warning', 'bg-success', 'bg-danger', 'bg-dark'),
            'horizontalMenuType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky'),
            'horizontalMenuClass' => array('static' => '', 'sticky' => 'fixed-top', 'floating' => 'floating-nav'),
            'verticalMenuNavbarType' => array('floating' => 'navbar-floating', 'static' => 'navbar-static', 'sticky' => 'navbar-sticky', 'hidden' => 'navbar-hidden'),
            'navbarClass' => array('floating' => 'floating-nav', 'static' => 'navbar-static-top', 'sticky' => 'fixed-top', 'hidden' => 'd-none'),
            'footerType' => array('static' => 'footer-static', 'sticky' => 'footer-fixed', 'hidden' => 'footer-hidden'),
            'pageHeader' => array(true, false),
            'contentLayout' => array('default', 'content-left-sidebar', 'content-right-sidebar', 'content-detached-left-sidebar', 'content-detached-right-sidebar'),
            'blankPage' => array(false, true),
            'sidebarPositionClass' => array('content-left-sidebar' => 'sidebar-left', 'content-right-sidebar' => 'sidebar-right', 'content-detached-left-sidebar' => 'sidebar-detached sidebar-left', 'content-detached-right-sidebar' => 'sidebar-detached sidebar-right', 'default' => 'default-sidebar-position'),
            'contentsidebarClass' => array('content-left-sidebar' => 'content-right', 'content-right-sidebar' => 'content-left', 'content-detached-left-sidebar' => 'content-detached content-right', 'content-detached-right-sidebar' => 'content-detached content-left', 'default' => 'default-sidebar'),
            'defaultLanguage' => array('en' => 'en', 'fr' => 'fr', 'de' => 'de', 'pt' => 'pt', 'ur' => 'ur'),
            'direction' => array('ltr', 'rtl'),
        ];

        //if mainLayoutType value empty or not match with default options in custom.php config file then set a default value
        foreach ($allOptions as $key => $value) {
            if (array_key_exists($key, $DefaultData)) {
                if (gettype($DefaultData[$key]) === gettype($data[$key])) {
                    // data key should be string
                    if (is_string($data[$key])) {
                        // data key should not be empty
                        if (isset($data[$key]) && $data[$key] !== null) {
                            // data key should not be exist inside allOptions array's sub array
                            if (!array_key_exists($data[$key], $value)) {
                                // ensure that passed value should be match with any of allOptions array value
                                $result = array_search($data[$key], $value, 'strict');
                                if (empty($result) && $result !== 0) {
                                    $data[$key] = $DefaultData[$key];
                                }
                            }
                        } else {
                            // if data key not set or
                            $data[$key] = $DefaultData[$key];
                        }
                    }
                } else {
                    $data[$key] = $DefaultData[$key];
                }
            }
        }

        //layout classes
        $layoutClasses = [
            'theme' => $data['theme'],
            'layoutTheme' => $allOptions['theme'][$data['theme']],
            'sidebarCollapsed' => $data['sidebarCollapsed'],
            'showMenu' => $data['showMenu'],
            'layoutWidth' => $data['layoutWidth'],
            'verticalMenuNavbarType' => $allOptions['verticalMenuNavbarType'][$data['verticalMenuNavbarType']],
            'navbarClass' => $allOptions['navbarClass'][$data['verticalMenuNavbarType']],
            'navbarColor' => $data['navbarColor'],
            'horizontalMenuType' => $allOptions['horizontalMenuType'][$data['horizontalMenuType']],
            'horizontalMenuClass' => $allOptions['horizontalMenuClass'][$data['horizontalMenuType']],
            'footerType' => $allOptions['footerType'][$data['footerType']],
            'sidebarClass' => '',
            'bodyClass' => $data['bodyClass'],
            'bodyStyle' => $data['bodyStyle'],
            'pageClass' => $data['pageClass'],
            'pageHeader' => $data['pageHeader'],
            'blankPage' => $data['blankPage'],
            'blankPageClass' => '',
            'contentLayout' => $data['contentLayout'],
            'sidebarPositionClass' => $allOptions['sidebarPositionClass'][$data['contentLayout']],
            'contentsidebarClass' => $allOptions['contentsidebarClass'][$data['contentLayout']],
            'mainLayoutType' => $data['mainLayoutType'],
            'defaultLanguage' => $allOptions['defaultLanguage'][$data['defaultLanguage']],
            'direction' => $data['direction'],
        ];
        // set default language if session hasn't locale value the set default language
        if (!session()->has('locale')) {
            app()->setLocale($layoutClasses['defaultLanguage']);
        }

        // sidebar Collapsed
        if ($layoutClasses['sidebarCollapsed'] == 'true') {
            $layoutClasses['sidebarClass'] = "menu-collapsed";
        }

        // blank page class
        if ($layoutClasses['blankPage'] == 'true') {
            $layoutClasses['blankPageClass'] = "blank-page";
        }

        return $layoutClasses;
    }

    public static function updatePageConfig($pageConfigs)
    {
        $demo = 'custom';
        $fullURL = request()->fullurl();
        if (App()->environment() === 'production') {
            for ($i = 1; $i < 7; $i++) {
                $contains = Str::contains($fullURL, 'demo-' . $i);
                if ($contains === true) {
                    $demo = 'demo-' . $i;
                }
            }
        }
        if (isset($pageConfigs)) {
            if (count($pageConfigs) > 0) {
                foreach ($pageConfigs as $config => $val) {
                    Config::set('custom.' . $demo . '.' . $config, $val);
                }
            }
        }
    }



    public static function getDefault_theme_Property()
    {
        return [
            "id" => 1,
            'header_logo' => '',
            'footer_logo' => '',
            'inner_page_logo' => '',
            'logo' => '',
            "name" => "Main Theme",
            "footer" => "Copyright@2022",
            "mainLayoutType" => "vertical",
            "theme" => "light",
            "sidebarCollapsed" => 0,
            "navbarColor" => "bg-primary",
            "horizontalMenuType" => "floating",
            "verticalMenuNavbarType" => "floating",
            "footerType" => "static",
            "layoutWidth" => "boxed",
            "showMenu" => 1,
            "bodyClass" => "",
            "pageHeader" => 1,
            "contentLayout" => "default",
            "defaultLanguage" => "en",
            "blankPage" => 0,
            "direction" => "ltr",
            "created_at" => null,
            "updated_at" => "2022-08-03T06:55:16.000000Z",
            "status" => 1,
            "deleted_at" => null,
            "contentsidebarClass" => "default",
            "sidebarPositionClass" => "content-right-sidebar",
            "horizontalMenuClass" => "static",
            "websiteName" => "Abc",
            "email" => "imranemi143@gmail.com",
            "android_app_link" => "#",
            "ios_app_link" => "#",
            "footer_note" => null,
            "address" => "Abc adress",
            "phone" => "+92 313 3434571",
            "twitter" => "#",
            "facebook" => "#",
            "instagram" => "#",
            "youtube" => "#"
        ];
    }
}
