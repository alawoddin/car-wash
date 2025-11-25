<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Office;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function AllOffice() {
        $AllData = Office::all();
        return view('admin.backend.office.all_office', compact('AllData'));
    }

    //end method

    public function AddOffice() {
        return view('admin.backend.office.add_office');
    }
    //end method

    public function StoreOffice(Request $request)
{
    if ($request->file('image')) {
        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img->resize(700, 460)->save(public_path('upload/office/'.$name_gen));
        $save_url = 'upload/office/'.$name_gen;

        // Create Brand
        $office = Office::create([
            'name'  => $request->name,
            'description'  => $request->description,
            'image' => $save_url
        ]);
    }

    $notification = [
        'message' => 'Office Inserted Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.office')->with($notification);
}
}
