@extends('layouts.app')

@section('title', 'Tentang Aplikasi')

@section('content')
<div class="bg-white p-6 shadow rounded">
<h2 class="text-2xl font-bold mb-1">Tentang</h2>
<p>Aplikasi ini dibuat oleh:</p><br>

<div class="flex items-start space-x-6">
    <!-- Avatar / Foto -->
    <div class="w-32 h-50 bg-gray-200 rounded-lg flex items-center justify-center">
        <img src="{{ asset('storage/about.png') }}" 
            alt="Foto Profil" 
            class="w-full h-full object-cover">
    </div>

    <!-- Info -->
    <div class="space-y-2">
        <p><span class="font-semibold">NAMA</span> : IK-RARS'JATI PRAMESTI</p>
        <p><span class="font-semibold">PRODI</span> : D-IV SISTEM INFORMASI BISNIS</p>
        <p><span class="font-semibold">NIM</span> : 2141762003</p>
        <p><span class="font-semibold">TANGGAL</span> : 8 September 2025</p>
    </div>
</div>
</div>
@endsection
