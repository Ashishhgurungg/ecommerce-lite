<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;

class ServiceController extends Controller
{
    //Displays service form
    public function displayServiceForm()
    {
        return view('/services/add-services');
    }

    public function addService(Request $request)
    {
        // 1️⃣ Validate form inputs
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric|min:0|max:99999',
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
            'image_path' => $imageName ?? '', // only filename
            'price' => $validated['price'],
        ]);

        // 4️⃣ Redirect with success message
        return redirect('/add-services')->with('success', 'Service added successfully!');
    }



    public function listAllServices()
    {
        $services = Service::paginate(3);
        return view('services/all-services', compact('services'));
    }

    public function showUpdateForm($id)
    {
        $service = Service::findOrFail($id);
        return view('/services/update-services', compact('service'));
    }

    public function updateService(Request $request)
    {
        // Validate inputs
        $validated = $request->validate([
            'id'          => 'required|exists:services,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'price'       => 'required|numeric|min:0',
            'remove_image'=> 'nullable|boolean',
        ]);

        // Find the service
        $service = Service::findOrFail($validated['id']);

        // Handle image removal
        if ($request->remove_image == 1 && $service->image_path) {
            if (\Storage::disk('public')->exists('services/' . $service->image_path)) {
                \Storage::disk('public')->delete('services/' . $service->image_path);
            }
            $service->image_path = null;
        }

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image_path && \Storage::disk('public')->exists('services/' . $service->image_path)) {
                \Storage::disk('public')->delete('services/' . $service->image_path);
            }

            // Store new image
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();
            $image->storeAs('services', $imageName, 'public');

            $service->image_path = $imageName ?? '';
        }

        // Update other details
        $service->name        = $validated['name'];
        $service->description = $validated['description'] ?? '';
        $service->price       = $validated['price'];

        // Save changes
        $service->save();

        return redirect('/all-services')->with('success', 'Service updated successfully!');
    }

    
     public function deleteService(Request $request){
        $id = $request->id;
        $service = Service::find($id);
        $service->delete();
        return redirect('/all-services')->with('delete', 'Service Deleted Successfully');
        
     }


}
