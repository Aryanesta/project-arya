<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pagination = $request->input('pagination', 10);
        $search = $request->input('search');
        $column = $request->input('column');

        $query = Product::query();
    
        if ($search) {
            if ($column) {
                $query->where($column, 'LIKE', '%' . $search . '%');
            } else {
                $query->where(function($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')
                      ->orWhere('description', 'LIKE', '%' . $search . '%')
                      ->orWhere('price', 'LIKE', '%' . $search . '%');
                });
            }
        }
    
        $products = $query->paginate($pagination);
    
        return response()->json([
            'status' => true,
            'message' => 'Products retrieved successfully',
            'data' => $products
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'name' => 'required|max:255',
                'price' => 'required|numeric|min:0|max:999999.99',
                'image' => 'required|image|file|max:1024',
                'description' => 'nullable',
                'product_category_id' => 'required|exists:product_categories,id',
            ]);
    
            if ($request->hasFile('image')) {
                $validateData['image'] = $request->file('image')->store('images');
            }
    
            $product = Product::create($validateData);
    
            $data = [
                'status' => true,
                'message' => "Data berhasil ditambahkan!",
                'data' => $product
            ];
    
            return response()->json($data, Response::HTTP_CREATED);
    
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                "message" => "Data gagal ditambahkan!",
                "error" => $th->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json([
            'message' => 'Data berhasil ditampilkan',
            'data' => $product
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            $validateData = $request->validate([
                'name' => 'max:255',
                'price' => 'numeric|min:0|max:999999.99',
                'image' => 'max:1024',
                'description' => 'nullable',
                'product_category_id' => 'exists:product_categories,id',
            ]);
    
            if ($request->hasFile('image')) {
                $validateData['image'] = $request->file('image')->store('images');
            }
    
            // Perbarui data produk
            $product->update($validateData);
            $product->refresh();
    
            $data = [
                'status' => true,
                'message' => "Data berhasil diupdate!",
                'data' => $product
            ];
    
            return response()->json($data, Response::HTTP_OK);
    
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                "message" => "Data gagal diperbarui!",
                "error" => $th->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product = Product::where('id', $product->id);

            if (!$product){
                return response()->json([
                    "Message" => "Data tidak ditemukan"
                ], Response::HTTP_NOT_FOUND);
            }
            $product->delete();

            $data = [
                'message' => "Data berhasil dihapus!",
                'data' => $product 
            ];

            return response()->json($data, Response::HTTP_OK);

        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Data gagal dihapus!",
                "error" => $th->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function getProductList()
    {
        try {
            $products = Product::with('productCategory:id,category_name')
                ->get(['id', 'product_category_id', 'name', 'description', 'price'])
                ->map(function ($product) {
                    return [
                        'id_produk' => $product->id,
                        'kategori' => $product->productCategory->category_name,
                        'nama_produk' => $product->name,
                        'deskripsi' => $product->description,
                        'harga_produk' => $product->price,
                    ];
                });
    
            return response()->json([
                'message' => 'Daftar produk berhasil ditampilkan',
                'data' => $products
            ], Response::HTTP_OK);
            
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menampilkan daftar produk',
                'error' => $th->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getProductTransactionCount()
    {
        try {
            $products = Product::with('productCategory:id,category_name')
                        ->withCount('transaction')
                        ->get(['id', 'product_category_id', 'name', 'price'])
                        ->map(function ($product) {
                            return [
                                'id_produk' => $product->id,
                                'kategori_produk' => $product->productCategory->category_name,
                                'nama_produk' => $product->name,
                                'harga' => $product->price,
                                'total_transaksi' => $product->transaction_count,
                            ];
                        });
    
            return response()->json([
                'message' => 'Data produk dan jumlah transaksi berhasil ditampilkan',
                'data' => $products
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Data gagal ditampilkan!',
                'error' => $th->getMessage()
            ], 500);
        }
    }
    
}
