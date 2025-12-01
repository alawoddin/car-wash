<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function AllServices()
    {
        $alldata = Services::all();
        return view('admin.backend.services.all_services' , compact('alldata'));
    }

    public function AddServices()
    {
        return view('admin.backend.services.add_services');
    }

    public function StoreServices(Request $request) {
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(62, 62)->save(public_path('upload/service/' . $name_gen));
            $save_url = 'upload/service/' . $name_gen;

            // Create Brand
            $office = Services::create([
                'title'  => $request->title,
                'description'  => $request->description,
                'heading'  => $request->heading,
                'info'  => $request->info,
                'image' => $save_url
            ]);
        }

        $notification = [
            'message' => 'Services Inserted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.services')->with($notification);
    }

    public function EditServices($id)
    {
        $services = Services::findOrFail($id);
        return view('admin.backend.services.edit_services', compact('services'));
    }

    public function UpdateServices(Request $request) {
        $services_id = $request->id;
        $service = Services::findOrFail($services_id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(62, 62)->save(public_path('upload/service/' . $name_gen));
            $save_url = 'upload/service/' . $name_gen;

             // Delete old image
        if (file_exists(public_path($service->image))) {
            @unlink(public_path($service->image));
        }

            $service->update([
                'title'  => $request->title,
                'description'  => $request->description,
                'image' => $save_url
            
            ]);
        } else {
            $service->update([
                'title'  => $request->title,
                'description'  => $request->description,
                'heading'  => $request->heading,
                'info'  => $request->info,
            ]);

        }

        $notification = [
            'message' => 'Services Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.services')->with($notification);
    }

    public function DeleteServices($id)
    {
        $services = Services::findOrFail($id);
        $img = $services->image;
        if (file_exists(public_path($img))) {
            @unlink(public_path($img));
        }

        Services::findOrFail($id)->delete();

        $notification = [
            'message' => 'Services Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
