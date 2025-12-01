<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use PHPUnit\Metadata\Test;

class TestimonialController extends Controller
{
    public function AllTestimonial(){
        $AllDate = Testimonial::all();
        return view('admin.backend.testimonial.all_testimonial' , compact('AllDate'));
    }

    public function AddTestimonial(){
        return view('admin.backend.testimonial.add_testimonial');
    }

    public function StoreTestimonial(Request $request){
       

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(993, 766)->save(public_path('upload/testimonial/' . $name_gen));
            $save_url = 'upload/testimonial/' . $name_gen;

        Testimonial::insert([
            'description' => $request->description,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $save_url,
        ]);
        }

        $notification = array(
            'message' => 'Testimonial Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.testimonial')->with($notification);
    }

    public function EditTestimonial($id){
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.backend.testimonial.edit_testimonial' , compact('testimonial'));
    }

    public function UpdateTestimonial(Request $request){
        $test_id = $request->id;
        $test = Testimonial::findOrFail($test_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(993, 766)->save(public_path('upload/testimonial/' . $name_gen));
            $save_url = 'upload/testimonial/' . $name_gen;

            // Delete old image
        if (file_exists(public_path($test_id->image))) {
            @unlink(public_path($test_id->image));
        }

            // Update Office
            $test->update([
            'description' => $request->description,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'image' => $save_url,
            ]);
        } else {
            // Update Office without image
            $test->update([
            'description' => $request->description,
            'title' => $request->title,
            ]);
        }

        $notification = array(
            'message' => 'Testimonial Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.testimonial')->with($notification);
    }

    public function DeleteTestimonial($id) {
        $test = Testimonial::find($id);
        $img = $test->image;
        unlink($img);

        Testimonial::find($id)->delete();

           

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
         ); 
         return redirect()->back()->with($notification);
    }
    

}
