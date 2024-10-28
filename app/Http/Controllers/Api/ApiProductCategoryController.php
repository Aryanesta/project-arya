<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ProductCategory as ResourcesProductCategory;

class ApiProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
    
        $search = $request->input('search');
        $column = $request->input('column');
    
        $query = ProductCategory::query();
    
        if ($search) {
            if ($column) {
                $query->where($column, 'LIKE', '%' . $search . '%');
            } else {
                $query->where(function($query) use ($search) {
                    $query->where('category_name', 'LIKE', '%' . $search . '%')
                          ->orWhere('description', 'LIKE', '%' . $search . '%');
                });
            }
        }

        $categories = $query->paginate($perPage);
    
        $data = [
            "status" => true,
            "message" => "Data berhasil ditampilkan",
            "data" => $categories
        ];
    
        return response()->json($data, Response::HTTP_OK);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'category_name' => 'required|max:255',
                'description' => 'nullable',
            ]);
            
            $category = ProductCategory::create($validatedData);
    
            $data = [
                "message" => "Data berhasil disimpan",
                "data" => $category
            ];
    
            return response()->json($data, Response::HTTP_CREATED);
    
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Data gagal ditambahkan!",
                "error" => $th->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        return response()->json([
            'message' => 'Data berhasil ditampilkan',
            'data' => $productCategory
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        try {
            $validatedData = $request->validate([
                'category_name' => 'max:255',
                'description' => 'nullable',
            ]);

            $productCategory->update($validatedData);

            $productCategory->refresh();
            
            $data = [
                "message" => "Data berhasil diupdate",
                "data" => $productCategory
            ];

            return response()->json($data, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Data gagal diupdate!",
                "error" => $th->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        try {
            $category = ProductCategory::where('id', $productCategory->id);

            if (!$category){
                return response()->json([
                    "Message" => "Data tidak ditemukan"
                ], Response::HTTP_NOT_FOUND);
            }
            $category->delete();

            $data = [
                'message' => "Data berhasil dihapus!",
                'data' => $category 
            ];

            return response()->json($data, Response::HTTP_OK);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Data gagal dihapus!",
                "error" => $th->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function getCategoryProductCount()
    {
        try {
            $categories = ProductCategory::withCount('product')
                ->get(['id', 'category_name'])
                ->map(function ($category) {
                    return [
                        'id_kategori' => $category->id,
                        'nama_kategori' => $category->category_name,
                        'total_produk' => $category->product_count,
                    ];
                });
    
            return response()->json([
                'message' => 'Data kategori dan total produk berhasil ditampilkan',
                'data' => $categories
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Data gagal ditampilkan!',
                'error' => $th->getMessage()
            ], 500);
        }
    }
    
}
