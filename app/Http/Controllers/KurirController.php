<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Kurirs;
use Illuminate\Support\Str;

class KurirController extends Controller
{
    //
    public function index(): View
    {
        $kurirs = DB::table('kurirs')->get();
        return view('pages.kurir.index', ['kurirs' => $kurirs, 'jmlKurirs' => $kurirs->count()]);
    }

    public function store(Request $request) : RedirectResponse {
        $kurirs = new Kurirs;

        $request->validate([
            'namaKurir' => 'required',
            'noHp' => 'required',
            'wilayah' => 'required',
            'alamat' => 'required',
            'jenKel' => 'required',
        ]);

        $kurirs->namaKurir=$request->namaKurir;
        $kurirs->noHp=$request->noHp;
        $kurirs->wilayah=$request->wilayah;
        $kurirs->alamat=$request->alamat;
        $kurirs->jenKel=Str::lower($request->jenKel);
        $kurirs->save();

        return redirect('/kurir');
    }

    public function destroy(string $id) : RedirectResponse
    {
        //
        $kurir = Kurirs::find($id);
        $kurir->delete();

        return redirect("kurir");
    }

    public function edit(string $id) {
        $kurir = DB::table('Kurirs')->where('idKurir', '=', $id)->get();
        return view('pages.kurir.edit', ['kurir' => $kurir]);
    }

    public function update(Request $request, string $id) : RedirectResponse {
        $kurir = Kurirs::find($id)->update([
            'namaKurir' => $request->nama,
            'jenKel' => $request->jenKel,
            'noHp' => $request->noHp,
            'alamat' => $request->alamat,
            'wilayah' => $request->wilayah,
        ]);

        return redirect("kurir");
    }
}
