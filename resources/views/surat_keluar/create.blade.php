<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Tambah Surat Keluar
        </h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('surat-keluar.store') }}">
            @csrf

            <input type="text" name="no_surat" placeholder="No Surat" class="block mb-2">
            <input type="date" name="tgl_surat" class="block mb-2">
            <input type="text" name="tujuan" placeholder="Tujuan" class="block mb-2">
            <input type="text" name="perihal" placeholder="Perihal" class="block mb-2">

            <button class="bg-green-600 text-white px-4 py-2 rounded">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>
