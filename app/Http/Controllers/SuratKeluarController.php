<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = SuratKeluar::latest()->get();
        return view('surat_keluar.index', compact('suratKeluar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required',
            'tgl_surat' => 'required|date',
            'tujuan' => 'required',
            'perihal' => 'required',
            'jenis_surat' => 'required',
            'sifat_surat' => 'required',
            'file_digital' => 'nullable|mimes:pdf|max:2048',
        ]);

        $filePath = null;
        if ($request->hasFile('file_digital')) {
            $filePath = $request->file('file_digital')->store('surat_keluar', 'public');
        }

        SuratKeluar::create([
            'no_surat' => $request->no_surat,
            'tgl_surat' => $request->tgl_surat,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'jenis_surat' => $request->jenis_surat,
            'sifat_surat' => $request->sifat_surat,
            'file_digital' => $filePath,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('dashboard')
            ->with('success', 'Surat keluar berhasil disimpan');
    }

    public function create()
    {
        return view('surat-keluar.create');
    }

}
