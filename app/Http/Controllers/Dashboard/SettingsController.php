<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function editShippingMethods($type)
    {
        // free , inner , outer  for shipping methods
        if($type === 'free')
            $shippingMethod = Setting::where('key','free_shipping_lable')->first();

        elseif($type === 'inner')
            $shippingMethod = Setting::where('key','local_lable')->first();

        elseif($type === 'outer')
            $shippingMethod = Setting::where('key','outer_lable')->first();

        else
            $shippingMethod = Setting::where('key','free_shipping_lable')->first();

        return view('dashboard.settings.shippings.edit',compact('shippingMethod'));

    }
    public function updateShippingMethods(Request $request , $id){

    }
}
