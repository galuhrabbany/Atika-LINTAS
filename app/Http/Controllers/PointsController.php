<?php

namespace App\Http\Controllers;

use App\Models\PointsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointsController extends Controller
{
    public function __construct()
    {
        $this->points = new PointsModel();
    }

    public function index()
    {
        return view("map", [
            'title' => 'Pulau Jawa',
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:points,name',
            'description' => 'required',
            'jenis_sampah' => 'required',
            'alamat' => 'nullable|string|max:255',
            'geom_point' => 'required',
            'image' => 'nullable|mimes:jpeg,png,gif,svg|max:2048',
        ]);

        // Path folder aman menggunakan helper Laravel
        $imagePath = storage_path('app/public/images');

        // Buat folder jika belum ada menggunakan mkdir()
        if (!file_exists($imagePath)) {
            mkdir($imagePath, 0777, true);
        }

        // Proses upload gambar
        $name_image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_point." . strtolower($image->getClientOriginalExtension());
            $image->move($imagePath, $name_image);
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'alamat' => $request->alamat,
            'jenis_sampah' => $request->jenis_sampah,
            'geom' => $request->geom_point,
            'image' => $name_image,
            'user_id' => Auth::id(),
        ];

        try {
            $this->points->create($data);
            return redirect()->route('map')->with('success', 'Point has been added');
        } catch (\Exception $e) {
            return redirect()->route('map')->with('error', 'Gagal menambahkan point: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        return view('edit-point', [
            'title' => 'Edit Point',
            'id' => $id,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:points,name,' . $id,
            'description' => 'required',
            'jenis_sampah' => 'required',
            'alamat' => 'nullable|string|max:255',
            'geom_point' => 'required',
            'image' => 'nullable|mimes:jpeg,png,gif,svg|max:2048',
        ]);

        $imagePath = storage_path('app/public/images');

        // Buat folder jika belum ada menggunakan mkdir()
        if (!file_exists($imagePath)) {
            mkdir($imagePath, 0777, true);
        }

        $point = $this->points->find($id);
        $old_image = $point->image;
        $name_image = $old_image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_image = time() . "_point." . strtolower($image->getClientOriginalExtension());
            $image->move($imagePath, $name_image);

            // Hapus gambar lama jika ada
            $oldImagePath = $imagePath . '/' . $old_image;
            if ($old_image && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'alamat' => $request->alamat,
            'jenis_sampah' => $request->jenis_sampah,
            'geom' => $request->geom_point,
            'image' => $name_image,
        ];


        if (!$point->update($data)) {
            return redirect()->route('map')->with('error', 'Point failed to update');
        }

        return redirect()->route('map')->with('success', 'Point has been updated');
    }

    public function destroy(string $id)
    {
        $point = $this->points->find($id);
        $imagePath = storage_path('app/public/images');

        if ($point->image && file_exists($imagePath . '/' . $point->image)) {
            unlink($imagePath . '/' . $point->image);
        }

        if (!$point->delete()) {
            return redirect()->route('map')->with('error', 'Point failed to delete');
        }

        return redirect()->route('map')->with('success', 'Point has been deleted');
    }
}
