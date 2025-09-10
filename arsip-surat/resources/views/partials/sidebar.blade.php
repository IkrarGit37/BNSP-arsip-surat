<!-- resources/views/partials/sidebar.blade.php -->
<aside class="w-64 bg-white shadow h-screen p-4 fixed top-0 left-0">
   <div class=" text-center gap-2 p-3 border-b mb-2 border-gray-700">
      <span class="text-xl font-bold">SIMAS</span>      
      <p class="text-lg font-bold">DESA KARANGDUREN</p>
   </div>
    <nav class="space-y-2">
        <a href="{{ route('surats.index') }}" 
           class="block px-3 py-2 rounded  {{ Route::is('surats.*') ? 'bg-blue-500 text-white' : 'hover:bg-blue-100' }}">
           Arsip Surat
        </a>        
        <a href="{{ route('kategoris.index') }}" 
           class="block px-3 py-2 rounded {{  Route::is('kategoris.*') ? 'bg-blue-500 text-white' : 'hover:bg-blue-100' }}">
           Kategori Surat
        </a>
        <a href="{{ url('/about')}}" 
           class="block px-3 py-2 rounded {{ Route::is('about') ? 'bg-blue-500 text-white' : 'hover:bg-blue-100' }}">
           Tentang
        </a>
    </nav>
</aside>
