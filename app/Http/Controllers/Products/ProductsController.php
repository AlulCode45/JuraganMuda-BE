<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\FotoProdukModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->successRes(ProdukModel::with('fotoProduk')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = [
            'user_id' => $request->user_id,
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'harga_produk' => $request->harga_produk
        ];

        $saveProduk = ProdukModel::create($save);
        $foto_produk = [];
        if ($request->foto_produk) {
            foreach ($request->foto_produk as $key => $d) {
                $foto_produk[$key] = [
                    'product_id' => $saveProduk->id,
                    'foto_produk' => $d['foto_produk']
                ];
            }
            if (FotoProdukModel::insert($foto_produk)) {
                return $this->successRes($save, code: 201);
            }
        } else {
            if ($saveProduk) {
                return $this->successRes($save, code: 201);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->successRes(
            ProdukModel::with('fotoProduk')->where('id', $id)->get(),
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ProdukModel::find($id);
        if ($data) {
            if ($data->delete()) {
                return $this->successRes();
            }
        } else {
            return $this->errRes("produk tidak ditemukan", 401);
        }
    }
}
