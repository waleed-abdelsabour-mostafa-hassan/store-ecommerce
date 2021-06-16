<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function updateShippingMethods(ShippingsRequest $request , $id){
        //validation

        // update db
        try {
            $shipping_methods = Setting::find($id);

            DB::beginTransaction();
            $shipping_methods ->update(['plain_value' => $request -> plain_value]);

            //save translations
            $shipping_methods -> value = $request -> value;
            $shipping_methods ->save();

            DB::commit();
            return redirect() -> back() -> with(['success' => 'تم التحديث بنجاح']);
        }catch (\Exception $ex){
            DB::rollBack();
            return redirect() -> back() -> with(['errors' => '  هناك خطأ ما يرجى المحاوله فيما بعد']);
        }

    }
}
