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

    public function create()
    {
        return view('surat_keluar.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'no_surat'     => 'required',
            'tgl_surat'    => 'required|date',
            'tujuan'       => 'required',
            'perihal'      => 'required',
            'jenis_surat'  => 'required|in:Internal,Eksternal',
            'sifat_surat'  => 'required|in:Biasa,Rahasia',
            'file_digital' => 'nullable|mimes:pdf|max:2048',
        ]);

        // 🔥 FIX UTAMA (ANTI ERROR SQLITE)
        $data['jenis_surat'] = strtoupper($data['jenis_surat']);
        $data['sifat_surat'] = strtoupper($data['sifat_surat']);

        if ($request->hasFile('file_digital')) {
            $data['file_digital'] = $request->file('file_digital')
                ->store('surat_keluar', 'public');
        }

        $data['created_by'] = Auth::id();

        SuratKeluar::create($data);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil disimpan');
    }

    public function edit($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('surat_keluar.edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'no_surat'    => 'required',
            'tgl_surat'   => 'required|date',
            'tujuan'      => 'required',
            'perihal'     => 'required',
            'jenis_surat' => 'required|in:Internal,Eksternal',
            'sifat_surat' => 'required|in:Biasa,Rahasia',
        ]);

        // 🔥 FIX UTAMA
        $data['jenis_surat'] = strtoupper($data['jenis_surat']);
        $data['sifat_surat'] = strtoupper($data['sifat_surat']);

        SuratKeluar::findOrFail($id)->update($data);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Data surat keluar berhasil diperbarui');
    }

    public function destroy($id)
    {
        $surat = SuratKeluar::findOrFail($id);

        if ($surat->file_digital) {
            Storage::disk('public')->delete($surat->file_digital);
        }

        $surat->delete();

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Data surat keluar berhasil dihapus');
    }
}
