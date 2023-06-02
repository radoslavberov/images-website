<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Models\Image;
use App\Models\User;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::orderBy('created_at', 'desc')->paginate(10);
        return view('images.index', compact('images'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(StoreImageRequest $request){
        $userId = $request->input('user_id');
        $user = User::findOrFail($userId);
        $user->increment('image_count');
        if ($user->images->count() >= 20) {
            return redirect()->back()->with(['message' => 'Maximum images limit reached']);
        }
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $imagePath = $file->storeAs('public/images', $fileName);
        }

        Image::create([
            'title' => $fileName,
            'description' => $request->input('description'),
            'user_id' => $userId,
            'file_path' => $imagePath,
        ]);
        return redirect()->route('images.index')->with(['message' => 'Image stored successfully']);
    }

    public function show($id)
    {
        $image = Image::with('comments')->findOrfail($id);
        return view('images.show', compact('image'));
    }

    public function destroy($id){
        $image = Image::findOrFail($id);
        $user = $image->user;
        $user->image_count--;
        $user->save();
        $image->delete();
        return redirect()->route('images.index')->with('message', 'Image deleted successfully');
    }
}
