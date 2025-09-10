@extends('layouts.app')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h1 class="text-2xl font-bold mb-1">Edit Kategori</h1>
    <p class="mb-2">Edit data kategori yang telah ada. Jika sudah selesai, harap klik <b>Update</b></p><br>

    <form action="{{ route('kategoris.update', $kategori) }}" method="POST" class="space-y-3">
        @csrf
        @method('PUT')
        <div class="flex items-start gap-4">
            <label class="w-40 pt-1">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="flex-1 border rounded px-3 py-1 focus:outline-none focus:ring focus:border-blue-300" value="{{ $kategori->nama_kategori }}" required>
        </div>
        <div class="flex items-start gap-4">
            <label class="w-40 pt-1">Keterangan</label>
            <textarea name="keterangan" class="flex-1 border rounded px-3 py-1 focus:outline-none focus:ring focus:border-blue-300">{{ $kategori->keterangan }}</textarea>
        </div><br>
        <div class="flex justify-between">
            <a href="{{ route('kategoris.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
