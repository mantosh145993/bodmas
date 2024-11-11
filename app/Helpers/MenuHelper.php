<?php

namespace App\Helpers;

use App\Models\Menu;
use App\Models\SliderBanner;
use App\Models\Banner;

class MenuHelper
{
    public function getMenu()
    {
        $menus = Menu::whereNull('parent_id')
            ->with([
                'childrenForPublic' => function ($query) {
                    $query->orderBy('order')
                        ->with(['childrenForPublic' => function ($query) {
                            $query->orderBy('order');
                        }]);
                }
            ])
            ->orderBy('order')
            ->get();

        return $menus;
    }


    public function getSlider()
    {
        $banners = SliderBanner::where('is_active', 1)->get();
        return $banners;
    }

    public function getBanner($id)
    {
        $banners = Banner::where('is_active', 1)->where('page_id', $id)->first();
        return $banners;
    }

    public function getState()
    {
        $states = [
            "Andhra Pradesh",
            "Arunachal Pradesh",
            "Assam",
            "Bihar",
            "Chhattisgarh",
            "Goa",
            "Gujarat",
            "Haryana",
            "Himachal Pradesh",
            "Jharkhand",
            "Karnataka",
            "Kerala",
            "Madhya Pradesh",
            "Maharashtra",
            "Manipur",
            "Meghalaya",
            "Mizoram",
            "Nagaland",
            "Odisha",
            "Punjab",
            "Rajasthan",
            "Sikkim",
            "Tamil Nadu",
            "Telangana",
            "Tripura",
            "Uttar Pradesh",
            "Uttarakhand",
            "West Bengal",
            "Andaman and Nicobar Islands",
            "Chandigarh",
            "Dadra and Nagar Haveli and Daman and Diu",
            "Lakshadweep",
            "Delhi",
            "Puducherry",
            "Ladakh",
            "Jammu and Kashmir"
        ];
        return $states;
    }
}
