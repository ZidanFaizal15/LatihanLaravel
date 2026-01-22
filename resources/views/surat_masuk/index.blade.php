<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Surat Masuk</h2>
    </x-slot>

    <div class="p-6 space-y-6">

        {{-- FORM INPUT --}}
        <div class="bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-4">Form Surat Masuk</h3>

            <form action="{{ route('surat-masuk.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-2 gap-4">

                    {{-- No Surat --}}
                    <div>
                        <label class="block mb-1">No Surat</label>
                        <input type="text" name="no_surat" class="border p-2 w-full" required>
                    </div>

                    {{-- Tanggal --}}
                    <div>
                        <label class="block mb-1">Tanggal Surat</label>
                        <input type="date" name="tgl_surat" class="border p-2 w-full" required>
                    </div>

                    {{-- Pengirim --}}
                    <div>
                        <label class="block mb-1">Pengirim</label>
                        <input type="text" name="pengirim" class="border p-2 w-full" required>
                    </div>

                    {{-- Perihal --}}
                    <div>
                        <label class="block mb-1">Perihal</label>
                        <input type="text" name="perihal" class="border p-2 w-full" required>
                    </div>
                </div>

                {{-- JENIS SURAT (RADIO) --}}
                <div class="mt-4">
                    <label class="block font-semibold mb-2">Jenis Surat</label>
                    <label class="mr-4">
                        <input type="radio" name="jenis_surat" value="Internal" required>
                        Internal
                    </label>
                    <label class="mr-4">
                        <input type="radio" name="jenis_surat" value="Eksternal">
                        Eksternal
                    </label>
                </div>

                {{-- SIFAT SURAT (RADIO) --}}
                <div class="mt-4">
                    <label class="block font-semibold mb-2">Sifat Surat</label>
                    <label class="mr-4">
                        <input type="radio" name="sifat_surat" value="Biasa" required>
                        Biasa
                    </label>
                    <label class="mr-4">
                        <input type="radio" name="sifat_surat" value="Penting">
                        Penting
                    </label>
                    <label class="mr-4">
                        <input type="radio" name="sifat_surat" value="Rahasia">
                        Rahasia
                    </label>
                </div>

                {{-- SUBMIT --}}
                <div class="mt-6">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-black rounded hover:bg-blue-700">
                        Simpan Surat Masuk
                    </button>
                </div>
            </form>
        </div>

        {{-- TABEL DATA --}}
        <div class="bg-white p-6 rounded shadow">
            <h3 class="font-semibold mb-4">Data Surat Masuk</h3>

            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">No Surat</th>
                        <th class="border p-2">Pengirim</th>
                        <th class="border p-2">Jenis</th>
                        <th class="border p-2">Sifat</th>
                        <th class="border p-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suratMasuk as $item)
                        <tr>
                            <td class="border p-2">{{ $item->no_surat }}</td>
                            <td class="border p-2">{{ $item->pengirim }}</td>
                            <td class="border p-2">{{ $item->jenis_surat }}</td>
                            <td class="border p-2">{{ $item->sifat_surat }}</td>
                            <td class="border p-2">{{ $item->tgl_surat }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
