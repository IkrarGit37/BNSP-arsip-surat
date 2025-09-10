@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">Lihat Surat</h1>

    <p><strong>Nomor Surat:</strong> {{ $surat->nomor_surat }}</p>
    <p><strong>Judul:</strong> {{ $surat->judul }}</p>
    <p><strong>Kategori:</strong> {{ $surat->kategori->nama_kategori }}</p>
    <p><strong>Waktu Arsip:</strong> {{ $surat->waktu_pengarsipan }}</p>

    <div class="mt-6">
        <iframe src="{{ asset('storage/' . $surat->file) }}" width="100%" height="600px"></iframe>
    </div>

    <div class="mt-4 flex gap-5">
        <a href="{{ route('surats.index') }}" 
           class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
           Kembali
        </a>
        <a href="{{ asset('storage/' . $surat->file) }}" 
            download="{{ $surat->getDownloadName() }}"
            class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-700">
            Unduh
        </a>
        <a href="{{ route('surats.edit', $surat->id) }}" 
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-900">
            Edit/Ganti File
        </a>
    </div>
</div>
@endsection
