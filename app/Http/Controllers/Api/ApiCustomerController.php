<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class ApiCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function getCustomerTransactionCount()
    {
        try {
            $customers = Customer::withCount('transaction')
                        ->get(['id', 'name', 'phone_number', 'address'])
                        ->map(function ($customer) {
                            return [
                                'id_pelanggan' => $customer->id,
                                'nama' => $customer->name,
                                'nomor_telepon' => $customer->phone_number,
                                'alamat' => $customer->address,
                                'total_transaksi' => $customer->transaction_count,
                            ];
                        });

            return response()->json([
                'message' => 'Data pelanggan dan jumlah transaksi berhasil ditampilkan',
                'data' => $customers
            ], 200);
            
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Data pelanggan dan jumlah transaksi gagal ditampilkan!',
                'error' => $th->getMessage()
            ], 500);
        }
    }

}
