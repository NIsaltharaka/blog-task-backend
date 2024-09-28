<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{

    public function saveBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'contents' => 'required|string',
            'author' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->contents = $request->contents;
        $blog->author = $request->author;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $blog->image = $imagePath;
        }

        $blog->save();

        return response()->json(['message' => 'Blog saved successfully'], 200);
    }


    public function updateBlog(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'contents' => 'required|string',
            'author' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }

        $blog->title = $request->title;
        $blog->contents = $request->contents;
        $blog->author = $request->author;

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $imagePath = $request->file('image')->store('blogs', 'public');
            $blog->image = $imagePath;
        }

        $blog->save();

        return response()->json(['message' => 'Blog updated successfully'], 200);
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json(['message' => 'Blog not found'], 404);
        }

        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return response()->json(['message' => 'Blog deleted successfully'], 200);
    }



    public function getBlog()
    {
        $blog = Blog::all();

        return response()->json([
            'message' => 'Successfully retrieved blog',
            'blog' => $blog,
        ]);
    }


}
