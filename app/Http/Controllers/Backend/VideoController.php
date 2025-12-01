<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function AllVideo() {
        $alldata = Video::all();
        return view('admin.backend.video.all_video', compact('alldata'));
    }
    public function AddVideo() {
       return view('admin.backend.video.add_video');  
    }

    public function StoreVideo(Request $request) {
         if ($request->file('image')) {
        $image = $request->file('image');
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $img = $manager->read($image);
        $img->resize(1256, 730)->save(public_path('upload/video/'.$name_gen));
        $save_url = 'upload/video/'.$name_gen;

        // Create Brand
        $video = Video::create([
            'title'  => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $save_url
        ]);

        
    }

    $notification = [
        'message' => 'video Inserted Successfully',
        'alert-type' => 'success'
    ];

    return redirect()->route('all.video')->with($notification);
    }

    public function EditVideo($id) {
        $allvideo = Video::find($id);
        return view('admin.backend.video.edit_video' , compact('allvideo'));
    }

    public function UpdateVideo(Request $request) {
        $video_id = $request->id;
        $video = Video::findOrFail($video_id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(61256, 730)->save(public_path('upload/video/' . $name_gen));
            $save_url = 'upload/video/' . $name_gen;

             // Delete old image
        if (file_exists(public_path($video->image))) {
            @unlink(public_path($video->image));
        }

            $video->update([
            'title'  => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'image' => $save_url
            
            ]);
        } else {
            $video->update([
                'title'  => $request->title,
                'description'  => $request->description,
                'link' => $request->link,
                
            ]);

        }

        $notification = [
            'message' => 'Video Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.video')->with($notification);
    }

    public function DeleteVideo($id) {
        $services = Video::findOrFail($id);
        $img = $services->image;
        if (file_exists(public_path($img))) {
            @unlink(public_path($img));
        }

        Video::findOrFail($id)->delete();

        $notification = [
            'message' => 'Video Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
