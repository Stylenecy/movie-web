<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::orderBy('id', 'desc')->get();
        return view('photos.index', ['key' => 'photo', 'photos' => $photos]);
    }

    public function create()
    {
        return view('photos.create', ['key' => 'photo']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        $filename = time() . '_' . $request->file('photo')->getClientOriginalName();
        $request->file('photo')->move(public_path('photo'), $filename);
        $path = 'photo/' . $filename;

        Photo::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
        ]);

        return redirect()->route('photos.index')->with('alert', 'Photo uploaded successfully!');
    }

    public function edit(Photo $photo)
    {
        return view('photos.edit', ['key' => 'photo', 'photo' => $photo]);
    }

    public function update(Request $request, Photo $photo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);

        $photo->title = $request->title;
        $photo->description = $request->description;

        if ($request->hasFile('photo')) {
            // Hapus foto lama
            if ($photo->file_path && file_exists(public_path($photo->file_path))) {
                unlink(public_path($photo->file_path));
            }
            // Simpen foto baru
            $filename = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('photo'), $filename);
            $photo->file_path = 'photo/' . $filename;
        }

        $photo->save();

        return redirect()->route('photos.index')->with('alert', 'Photo updated successfully!');
    }

    public function destroy(Photo $photo)
    {
        if ($photo->file_path && file_exists(public_path($photo->file_path))) {
            unlink(public_path($photo->file_path));
        }
        $photo->delete();

        return redirect()->route('photos.index')->with('alert', 'Photo deleted successfully!');
    }

    /**
     * Display a public catalog of photos with optional search.
     */
    public function catalog(Request $request)
    {
        $query = $request->input('q');
        $photos = \App\Photo::query();
        if ($query) {
            $photos = $photos->where('title', 'like', "%{$query}%")
                             ->orWhere('description', 'like', "%{$query}%");
        }
        $photos = $photos->orderBy('id', 'desc')->get();
        return view('photos.catalog', ['photos' => $photos, 'query' => $query, 'key' => 'catalog']);
    }
}
