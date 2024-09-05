<?php

namespace App\Http\Controllers;

use App\Models\BlognewsModel;
use App\Models\NotificationModel;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function blognews()
    {
        $blog = BlognewsModel::all();
        return view('administrator.Home.blognews', ['blog' => $blog]);
    }

    public function notification()
    {
        $notification = NotificationModel::all();
        return view('administrator.Home.notification', ['notification' => $notification]);
    }

    public function notificationSave(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);
        try {
            $notification = new NotificationModel();
            $notification->forceFill($validatedData);
            $notification->save();
            return redirect()->back()->with('success', 'Notification added successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to save!');
        }
    }

    public function notificationDelete($id)
    {
        $notification = NotificationModel::find($id);
        if (!$notification) {
            return redirect()->back()->with('error', 'Notification not found');
        } else {
            $notification->delete();
            return redirect()->back()->with('error', 'Notification Deleted');
        }
    }

    public function blogSave(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath  = null;
        // Save the image file
        if ($request->has('image'))
            $imagePath = moveFile('news', $request->file('image'));

        // Create a new Category instance
        $blog = new BlognewsModel();
        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->image = $imagePath; // Save the image path to the database
        $blog->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function blogDelete($id)
    {
        $blog = BlognewsModel::find($id);
        if (!$blog) {
            return redirect()->back()->with('error', 'Blog not found');
        } else {
            $blog->delete();
            return redirect()->back()->with('error', 'Blog Deleted');
        }
    }
}
