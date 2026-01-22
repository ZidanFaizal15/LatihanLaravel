<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratMasukController extends Controller
{
    /**
     * INDEX = FORM + LIST DATA
     */
    public function index()
    {
        $suratMasuk = SuratMasuk::latest()->get();

        return view('surat_masuk.index', compact('suratMasuk'));
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_surat'    => 'required',
            'tgl_surat'   => 'required|date',
            'pengirim'    => 'required',
            'perihal'     => 'required',
            'jenis_surat' => 'required',
            'sifat_surat' => 'required',
        ]);

        SuratMasuk::create([
            'no_surat'    => $request->no_surat,
            'tgl_surat'   => $request->tgl_surat,
            'pengirim'    => $request->pengirim,
            'perihal'     => $request->perihal,
            'jenis_surat' => $request->jenis_surat,
            'sifat_surat' => $request->sifat_surat,
            'created_by'  => Auth::id(),
        ]);

        return redirect()->route('surat-masuk.index')
            ->with('success', 'Surat masuk berhasil disimpan');
    }
}
