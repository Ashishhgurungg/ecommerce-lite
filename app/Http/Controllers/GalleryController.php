<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;


class GalleryController extends Controller
{
     public function galleryForm(){
        return view('galleries/gallery-form');
    }

    public function creategallery(Request $request){
        // 1️⃣ Validate form inputs
        $validated = $request->validate([
            'name' => 'required|string|max:200',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 2️⃣ Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generate a unique filename
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();

            // Store the image in storage/app/public/services
            $image->storeAs('galleries', $imageName, 'public');
        }

        // 3️⃣ Save service to database (only store image filename)
        gallery::create([
            'title' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'image_path' => $imageName ?? '', // only filename
        ]);

        // 4️⃣ Redirect with success message
        return redirect('/gallery-form')->with('success', 'gallery added successfully!');
    }

    public function allgalleries(){
        $galleries = gallery::paginate(6);
        return view('galleries/all-galleries', compact('galleries'));
    }

    public function deletegallery(Request $request){
        $id = $request->id;
        $gallery = gallery::find($id);
        $gallery->delete();
        return redirect('/all-galleries')->with("delete", "Deleted the gallery successfully !!!");
    }

    public function showUpdateForm(Request $request){
        $id = $request->id;
        $gallery = gallery::find($id);
        return view('galleries/update-galleries', compact('gallery'));
    }

    public function updategallery (Request $request){
        // Validate inputs
        $validated = $request->validate([
            'id'          => 'required|exists:galleries,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'remove_image'=> 'nullable|boolean',
        ]);

        // Find the service
        $gallery = gallery::findOrFail($validated['id']);

        // Handle image removal
        if ($request->remove_image == 1 && $gallery->image_path) {
            if (\Storage::disk('public')->exists('galleries/' . $gallery->image_path)) {
                \Storage::disk('public')->delete('galleries/' . $gallery->image_path);
            }
            $gallery->image_path = null;
        }

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($gallery->image_path && \Storage::disk('public')->exists('galleries/' . $gallery->image_path)) {
                \Storage::disk('public')->delete('galleries/' . $gallery->image_path);
            }

            // Store new image
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();
            $image->storeAs('galleries', $imageName, 'public');

            $gallery->image_path = $imageName ?? '';
        }

        // Update other details
        $gallery->title        = $validated['name'];
        $gallery->description = $validated['description'] ?? '';

        // Save changes
        $gallery->save();

        return redirect('/all-galleries')->with('success', 'gallery updated successfully!');
    }
}
