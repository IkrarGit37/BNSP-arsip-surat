@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-6">Edit Surat</h1>

    <form action="{{ route('surats.update', $surat->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
        @csrf
        @method('PUT')

        <div class="flex items-start gap-4">
            <label class="w-40 pt-1">Nomor Surat</label>
            <input type="text" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}"
                class="flex-1 border rounded px-3 py-1 focus:outline-none focus:ring focus:border-blue-300">
            @error('nomor_surat')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-start gap-4">
            <label class="w-40 pt-1">Kategori</label>
            <select name="kategori_id"
                class="flex-1 border rounded px-3 py-1 focus:outline-none focus:ring focus:border-blue-300">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $surat->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
            @error('kategori_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-start gap-4">
            <label class="w-40 pt-1">Judul Surat</label>
            <input type="text" name="judul" value="{{ old('judul', $surat->judul) }}"
                class="flex-1 border rounded px-3 py-1 focus:outline-none focus:ring focus:border-blue-300">
            @error('judul')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-start gap-4">
            <label class="w-40 pt-1">File Lama</label>
            <p>
                <a href="{{ asset('storage/' . $surat->file) }}" target="_blank" class="flex-1 border rounded px-3 py-1 text-blue-500 underline">
                    {{ $surat->file }}
                </a>
            </p>
        </div>

        <div class="flex items-start gap-4">
            <label class="w-40 pt-1">Upload File Baru (opsional)</label>
            <input type="file" name="file" class="flex-1 border rounded px-3 py-1 focus:outline-none focus:ring focus:border-blue-300">
            @error('file')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('surats.show', $surat->id) }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
