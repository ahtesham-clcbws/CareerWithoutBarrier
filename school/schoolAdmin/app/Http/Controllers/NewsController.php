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
        return view('Admin.News.blognews', ['blog' => $blog]);
    }

    public function notification()
    {
        $notification = NotificationModel::all();
        return view('Admin.News.notification', ['notification' => $notification]);
    }

    public function notificationSave(Request $request)
    {
        $title = $request->title;
        $details = $request->details;
        $notification = new NotificationModel();
        $notification->title = $title;
        $notification->details = $details;
        $notification->save();
        return redirect()->back()->with('success', 'Notification added successfully!');
    }

    public function notificationDelete($id)
    {
        $notification = NotificationModel::find($id);
        if (!$notification) {
            return redirect()->back()->with('error', 'Notification not found');
        } else {
            $notification->delete();
            return redirect()->back()->with('success', 'Notification Deleted');
        }
    }

    public function blogSave(Request $request)
    {
        // Validate the request data
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
        ]);

        // Save the image file
        $imagePath = $request->file('image')->store('slider', 'public');

        // Create a new Category instance
        $blog = new BlognewsModel();
        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->image = $imagePath; // Save the image path to the database
        $blog->save();
        // Redirect back or return a response
        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function blogDelete($id)
    {
        $blog = BlognewsModel::find($id);
        if (!$blog) {
            return redirect()->back()->with('error', 'Blog not found');
        } else {
            $blog->delete();
            return redirect()->back()->with('success', 'Blog found');
        }
    }
}
