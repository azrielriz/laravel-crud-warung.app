<?php

namespace App\Http\Controllers;

use App\Models\stocks;
use Illuminate\Http\Request;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks = stocks::orderBy('nama','ASC')->simplePaginate(5);
        return view('Stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Stocks.membuat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $request->validate([
        'nama'=>'required|min:4|max:20',
        'kategori'=>'required',
        'harga'=>'required|numeric',
        'stock'=>'required',
     ],[
        'kategori.required'=>'jenis produk wajib diisi',
        'nama.required'=>'nama produk wajib diisi',
        'nama.min'=>'nama produk minimal 4 karakter',
        'nama.max'=>'nama produk maximal 20 karakter',
        'harga.required'=>'harga produk wajib diisi',
        'harga.numeric'=>'harga produk harus berupa angka',
        'stock.required'=>'stock produk wajib diisi'

     ]);

     $proses = stocks::create([
        'kategori'=>$request->kategori,
        'nama'=>$request->nama,
        'harga'=>$request->harga,
        'stock'=>$request->stock,
     ]);

     if($proses){
        return redirect()->back()->with('success','produk berhasil ditambahkan');
     } else {
        return redirect()->back()->with('failed','produk gagal ditambahkan');
     }
    }

    /**
     * Display the specified resource.
     */
    public function show(stocks $stocks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $stocks = stocks::where('id', $id)->first();
        return view('Stocks.edit', compact('stocks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:4|max:20',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'stock' => 'required',
        ], [
            'kategori.required' => 'jenis produk wajib diisi',
            'nama.required' => 'nama produk wajib diisi',
            'nama.min' => 'nama produk minimal 4 karakter',
            'nama.max' => 'nama produk maksimal 20 karakter',
            'harga.required' => 'harga produk wajib diisi',
            'harga.numeric' => 'harga produk harus berupa angka',
            'stock.required' => 'stock produk wajib diisi'
        ]);
    
        stocks::where('id', $id)->update([
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stock' => $request->stock,
        ]);
    
        return redirect()->back()->with('success', 'Produk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stocks = stocks::where('id', $id)->delete();

        return redirect()->back()->with('success', 'produk berhasil dihapus');
    }
}
