<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function AllPrice(){
        $allprice = Price::all();

        return view('admin.backend.price.all_price' , compact('allprice'));
    }

    //end method

    public function AddPrice(){
        return view('admin.backend.price.add_price');
    }

    //end method

    public function StorePrice(Request $request) {

        Price::insert([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'Price Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.price')->with($notification);
    }

    //end method

    public function EditPrice($id){
        $price = Price::findOrFail($id);
        return view('admin.backend.price.edit_price' , compact('price'));
    }

    //end method

    public function UpdatePrice(Request $request){
        $price_id = $request->id;

        Price::findOrFail($price_id)->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $notification = array(
            'message' => 'Price Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.price')->with($notification);
    }

    public function DeletePrice($id){
        Price::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Price Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.price')->with($notification);
    }
    //end method
}
