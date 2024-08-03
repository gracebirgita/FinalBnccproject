<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toy;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ToyController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('toys.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('toys', 'public');
        }

        Toy::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description ?? '', // Provide a default value
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => $imagePath,

        ]);

        return redirect()->route('admin.home')->with('success', 'Toy added successfully!');
    }

    public function edit(Toy $toy)
    {
        $categories = Category::all();
        return view('toys.edit', compact('toy', 'categories'));
    }

    public function update(Request $request, Toy $toy)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
        ]);

        $imagePath = $toy->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('toys', 'public');
        }

        $toy->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description ?? '', // Provide a default value
            'stock' => $request->stock,
            'price' => $request->price,
            'image' => $imagePath,

        ]);

        return redirect()->route('admin.home')->with('success', 'Toy updated successfully!');
    }

    public function destroy(Toy $toy)
    {
        if ($toy->image) {
            Storage::disk('public')->delete($toy->image);
        }
        $toy->delete();
        return redirect()->route('admin.home')->with('success', 'Toy deleted successfully!');
    }

    public function delete($id)
    {
        // Find the toy by ID
        $toy = Toy::findOrFail($id);

        // Delete the toy
        $toy->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Toy deleted successfully.');
    }

    public function detail(Toy $toy)
    {
        return view('toys.detail', compact('toy'));
    }


    public function index()
    {
        $toys = Toy::paginate(10); // Adjust the number to how many toys you want per page
        return view('admin.index', compact('toys'));
    }

}
