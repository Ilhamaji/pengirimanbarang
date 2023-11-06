<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Barangs;
use Illuminate\Http\RedirectResponse;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $barangs = Barangs::select('*')->get();
        return view('pages.barang.index', ['barangs' => $barangs, 'jmlBarangs' => $barangs->count()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        //
        $barangs = new Barangs;

        $request->validate([
            'nama' => 'required',
            'beratBarang' => 'required',
        ]);

        $barangs->nama=$request->nama;
        $barangs->beratBarang=$request->beratBarang;
        $barangs->save();

        return redirect("/barang");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $barang = DB::table('Barangs')->where('idBarang', '=', $id)->get();
        return view('pages.barang.edit', ['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        //
        $barang = Barangs::find($id)->update([
            'nama' => $request->nama,
            'beratBarang' => $request->beratBarang,
        ]);;

        return redirect("barang");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        //
        $barang = Barangs::find($id);
        $barang->delete();

        return redirect("barang");
    }
}
