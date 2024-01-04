<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        return response()->json([
            'data' => $category,
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $category = Category::create([
                'name' => $request->name,
                'price' => $request->price,
            ]);

            return response()->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $category,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data gagal ditambahkan',
                'data' => [],
                "error" => $e->getMessage(),
            ], 401);
        }
    }

    public function update(Request $request, Category $category)
    {
        try {
            $category->update([
                'name' => $request->name,
                'price' => $request->price,
            ]);

            return response()->json([
                'message' => 'Data berhasil diupdate',
                'data' => $category,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data gagal diupdate',
                'data' => [],
                "error" => $e->getMessage(),
            ], 401);
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus',
                'data' => $category,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data gagal dihapus',
                'data' => [],
                "error" => $e->getMessage(),
            ], 401);
        }
    }
}
