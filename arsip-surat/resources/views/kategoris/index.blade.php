@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    <div class="bg-white shadow rounded p-6">
        <h2 class="text-2xl font-bold mb-1">Kategori Surat</h2>
        <p>Berikut ini merupakan kategori yang bisa digunakan untuk melabeli surat. Klik <b>Tambah Kategori</b> untuk menambahkan kategori baru.</p> <br>

        @if(session('success'))
        <div id="flash-message" 
            class="fixed top-4 right-4 bg-green-100 text-green-700 px-8 py-6 rounded shadow-lg w-80 overflow-hidden">
            <div class="flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button onclick="document.getElementById('flash-message').remove()" 
                        class="ml-3 text-green-700 hover:text-green-900 font-bold">
                    ✖
                </button>
            </div>
            <!-- Progress bar -->
            <div class="absolute bottom-0 left-0 h-1 bg-green-500 animate-progress"></div>
        </div>

        <style>
            @keyframes progress {
                from { width: 100%; }
                to { width: 0%; }
            }
            .animate-progress {
                animation: progress 5s linear forwards;
            }
        </style>

        <script>
            setTimeout(() => {
                const el = document.getElementById('flash-message');
                if (el) el.remove();
            }, 5000);
        </script>
        @endif

        <div class="mb-4">
            <label for="search" class="block text-gray-700 font-medium mb-2">
                Cari Kategori:
            </label>

            <form action="{{ route('kategoris.index') }}" method="GET" class="flex gap-2">
                <div class="relative flex-1">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        🔍
                    </span>
                    <input type="text" name="search" id="search"
                        value="{{ request('search') }}"
                        placeholder="Cari Kategori"
                        class="w-full border rounded px-10 py-2 focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <button type="submit" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Cari
                </button>
            </form>
        </div>


        <table class="w-full mt-4 border-collapse">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th class="p-3 border">No</th>
                    <th class="p-3 border">Nama Kategori</th>
                    <th class="p-3 border">Keterangan</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kategoris as $kategori)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border w-[5%]">{{ $loop->iteration }}</td>
                        <td class="p-3 border w-[15%]">{{ $kategori->nama_kategori }}</td>
                        <td class="p-3 border w-[60%]">{{ $kategori->keterangan }}</td>
                        <td class="p-3 border w-[20%]">
                            <a href="{{ route('kategoris.edit', $kategori->id) }}" 
                               class="inline-flex items-center justify-center px-3 py-2 min-w-[80px] h-9 bg-blue-500 text-white rounded hover:bg-blue-700">
                                Edit
                            </a>
                            <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST" class="inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="inline-flex items-center justify-center px-3 py-2 min-w-[80px] h-9 bg-red-500 text-white rounded hover:bg-red-700 delete-btn">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-3 text-center border text-gray-500">Belum ada kategori</td>
                    </tr>
                @endforelse
            </tbody>
        </table><br>
        <a href="{{ route('kategoris.create') }}" 
           class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-900">
            + Tambah Kategori
        </a>
    </div>

     <!-- Modal Konfirmasi -->
     <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-200 p-6 text-center">
            <h2 class="text-lg font-semibold text-gray-800 mb-3">Yakin hapus data ini?</h2>
            <p class="text-gray-600 text-sm mb-5">Data yang sudah dihapus tidak bisa dikembalikan.</p>
            <div class="flex justify-between gap-3">
                <button id="cancelDelete" 
                        class="px-4 py-2 w-full bg-gray-300 rounded hover:bg-gray-400">
                    Batal
                </button>
                <button id="confirmDelete" 
                        class="px-4 py-2 w-full bg-red-500 text-white rounded hover:bg-red-600">
                    Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        let deleteForm = null;

        document.querySelectorAll(".delete-btn").forEach(btn => {
            btn.addEventListener("click", function () {
                deleteForm = this.closest("form"); // simpan form yang diklik
                document.getElementById("deleteModal").classList.remove("hidden");
            });
        });

        document.getElementById("cancelDelete").addEventListener("click", function () {
            document.getElementById("deleteModal").classList.add("hidden");
            deleteForm = null;
        });

        document.getElementById("confirmDelete").addEventListener("click", function () {
            if (deleteForm) deleteForm.submit();
        });
    </script>
@endsection
