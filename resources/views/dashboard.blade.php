<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- MENU UTAMA -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                <!-- SURAT MASUK -->
                <a href="{{ route('surat-masuk.index') }}"
                   class="block bg-white p-6 rounded-lg shadow hover:shadow-md transition">

                    <h3 class="text-lg font-bold mb-2">
                        📥 Surat Masuk
                    </h3>

                    <p class="text-gray-600">
                        Input dan lihat data surat masuk
                    </p>
                </a>

                <!-- SURAT KELUAR -->
                <a href="{{ route('surat-keluar.index') }}"
                   class="block bg-white p-6 rounded-lg shadow hover:shadow-md transition">

                    <h3 class="text-lg font-bold mb-2">
                        📤 Surat Keluar
                    </h3>

                    <p class="text-gray-600">
                        Input dan lihat data surat keluar
                    </p>
                </a>

            </div>

            <!-- RINGKASAN SURAT MASUK -->
            <div class="bg-white p-6 rounded shadow mb-8">
                <h3 class="font-semibold mb-4">Surat Masuk Terbaru</h3>

                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">No Surat</th>
                            <th class="border p-2">Pengirim</th>
                            <th class="border p-2">Perihal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\SuratMasuk::latest()->take(5)->get() as $item)
                            <tr>
                                <td class="border p-2">{{ $item->no_surat }}</td>
                                <td class="border p-2">{{ $item->pengirim }}</td>
                                <td class="border p-2">{{ $item->perihal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- RINGKASAN SURAT KELUAR -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-semibold mb-4">Surat Keluar Terbaru</h3>

                <table class="w-full border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border p-2">No Surat</th>
                            <th class="border p-2">Tujuan</th>
                            <th class="border p-2">Perihal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\SuratKeluar::latest()->take(5)->get() as $item)
                            <tr>
                                <td class="border p-2">{{ $item->no_surat }}</td>
                                <td class="border p-2">{{ $item->tujuan }}</td>
                                <td class="border p-2">{{ $item->perihal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
