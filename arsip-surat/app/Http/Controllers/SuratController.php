<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Surat::with('kategori')->latest();
    
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nomor_surat', 'like', "%{$search}%")
                  ->orWhere('judul', 'like', "%{$search}%")
                  ->orWhereHas('kategori', function ($q) use ($search) {
                      $q->where('nama_kategori', 'like', "%{$search}%");
                  });
        }
    
        $surats = $query->get();
    
        return view('surats.index', compact('surats'));
    }    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('surats.create', compact('kategoris'));
    }

    public function show(Surat $surat)
    {
        return view('surats.show', compact('surat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|unique:surats,nomor_surat',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $kategori = Kategori::findOrFail($request->kategori_id);

        // buat slug kategori + rapikan nomor surat
        $kategoriSlug = Str::slug($kategori->nama_kategori, '-');
        $nomorSurat = str_replace('/', '-', $request->nomor_surat);

        $fileName = $kategoriSlug . '_' . $nomorSurat . '.' . $request->file('file')->getClientOriginalExtension();

        $filePath = $request->file('file')->storeAs('surat', $fileName, 'public');

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'waktu_pengarsipan' => now(),
            'file' => $filePath,
        ]);

        return redirect()->route('surats.index')->with('success', 'Surat berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        $kategoris = Kategori::all();
        return view('surats.edit', compact('surat', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'nomor_surat' => 'required|unique:surats,nomor_surat,' . $surat->id,
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->only(['nomor_surat', 'kategori_id', 'judul']);

        if ($request->hasFile('file')) {
            $kategori = Kategori::findOrFail($request->kategori_id);
            $kategoriSlug = Str::slug($kategori->nama_kategori, '-');
            $nomorSurat = str_replace('/', '-', $request->nomor_surat);

            $fileName = $kategoriSlug . '_' . $nomorSurat . '.' . $request->file('file')->getClientOriginalExtension();

            $data['file'] = $request->file('file')->storeAs('surat', $fileName, 'public');
        }

        $surat->update($data);

        return redirect()->route('surats.index')->with('success', 'Surat berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        // hapus file dari storage
        if ($surat->file && Storage::disk('public')->exists($surat->file)) {
            Storage::disk('public')->delete($surat->file);
        }

        $surat->delete();

        return redirect()->route('surats.index')->with('success', 'Surat berhasil dihapus');
    }
}
