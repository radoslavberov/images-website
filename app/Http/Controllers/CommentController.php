<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $imageId = $request->input('image_id');
        $image = Image::findOrFail($imageId);

        if ($image->comments->count() >= 20) {
            return redirect()->back()->with(['message' => 'Maximum comment limit reached']);
        }
        $comment = Comment::create($request->validated());
        return redirect()->route('images.show', $comment->image_id)
            ->with(['message' => 'Comment added successfully']);
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    public function update(StoreCommentRequest $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->validated());
        return redirect()->route('images.show', $comment->image_id)
            ->with(['message' => 'Comment updated successfully']);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('images.show', $comment->image_id)
            ->with(['message' => 'Comment deleted successfully']);
    }
}
