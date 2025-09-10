@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-6">Tambah Surat</h1>

    <form action="{{ route('surats.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="flex items-start">
            <label for="nomor_surat" class="w-40 pt-2">Nomor Surat</label>
            <input type="text" placeholder="XXX/XX/XX.XX.XX/XX/2025" name="nomor_surat" id="nomor_surat"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="flex items-start">
            <label for="kategori_id" class="w-40 pt-2">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-start">
            <label for="judul" class="w-40 pt-2">Judul</label>
            <input type="text" placeholder="Judul Surat" name="judul" id="judul"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="flex items-start">
            <label for="file" class="w-40 pt-2">Upload File (PDF)</label>
            <input type="file" name="file" id="file" 
                   accept="application/pdf"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('surats.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
