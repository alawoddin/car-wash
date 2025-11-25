<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function AllSlider() {
        $allslider = Slider::latest()->get();
        return view('admin.backend.slider.all_slider', compact('allslider'));
    }

    //end method

    public function AddSlider() {

        return view('admin.backend.slider.add_slider');
    }
    //end method

    public function StoreSlider(Request $request) {
        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Slider insert Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification);
    }

    //end method

    public function EditSlider($id) {
        $slider = Slider::findOrFail($id);
        return view('admin.backend.slider.edit_slider', compact('slider'));
    }
    //end method

    public function UpdateSlider(Request $request) {
        $slider_id = $request->id;

        Slider::findOrFail($slider_id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Slider Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification);
    }

    //end method

    public function DeleteSlider($id) {
        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.slider')->with($notification);
    }
    //end method
}
