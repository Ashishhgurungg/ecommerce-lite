<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    public function show(){
        $services = Service::all();
        return view('services', ["services"=> $services]);
    }

    public function add(){

        return view('add-services');
    }

    public function addService(Request $request)
    {
        // 1️⃣ Validate form inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric|min:0',
        ]);

        // 2️⃣ Handle image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Generate a unique filename
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();

            // Store the image in storage/app/public/services
            $image->storeAs('services', $imageName, 'public');
        }

        // 3️⃣ Save service to database (only store image filename)
        Service::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'image_path' => $imageName, // only filename
            'price' => $validated['price'],
        ]);

        // 4️⃣ Redirect with success message
        return redirect('/services')->with('success', 'Service added successfully!');
    }


}
