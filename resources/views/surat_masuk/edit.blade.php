<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Surat Masuk</h2>
    </x-slot>

    <div class="p-6 bg-white rounded shadow">

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">

                {{-- NO SURAT --}}
                <div>
                    <label>No Surat</label>
                    <input type="text" name="no_surat"
                        value="{{ old('no_surat', $surat->no_surat) }}"
                        class="border p-2 w-full" required>
                </div>

                {{-- TANGGAL --}}
                <div>
                    <label>Tanggal</label>
                    <input type="date" name="tgl_surat"
                        value="{{ old('tgl_surat', $surat->tgl_surat) }}"
                        class="border p-2 w-full" required>
                </div>

                {{-- PENGIRIM --}}
                <div>
                    <label>Pengirim</label>
                    <input type="text" name="pengirim"
                        value="{{ old('pengirim', $surat->pengirim) }}"
                        class="border p-2 w-full" required>
                </div>

                {{-- PERIHAL --}}
                <div>
                    <label>Perihal</label>
                    <input type="text" name="perihal"
                        value="{{ old('perihal', $surat->perihal) }}"
                        class="border p-2 w-full" required>
                </div>
            </div>

            {{-- JENIS SURAT --}}
            <div class="mt-4">
                <label class="block font-semibold mb-2">Jenis Surat</label>
                <label class="mr-4">
                    <input type="radio" name="jenis_surat" value="Internal"
                        {{ old('jenis_surat', $surat->jenis_surat) == 'Internal' ? 'checked' : '' }}>
                    Internal
                </label>
                <label class="mr-4">
                    <input type="radio" name="jenis_surat" value="Eksternal"
                        {{ old('jenis_surat', $surat->jenis_surat) == 'Eksternal' ? 'checked' : '' }}>
                    Eksternal
                </label>
            </div>

            {{-- SIFAT SURAT --}}
            <div class="mt-4">
                <label class="block font-semibold mb-2">Sifat Surat</label>
                <label class="mr-4">
                    <input type="radio" name="sifat_surat" value="Biasa"
                        {{ old('sifat_surat', $surat->sifat_surat) == 'Biasa' ? 'checked' : '' }}>
                    Biasa
                </label>
                <label class="mr-4">
                    <input type="radio" name="sifat_surat" value="Penting"
                        {{ old('sifat_surat', $surat->sifat_surat) == 'Penting' ? 'checked' : '' }}>
                    Penting
                </label>
                <label class="mr-4">
                    <input type="radio" name="sifat_surat" value="Rahasia"
                        {{ old('sifat_surat', $surat->sifat_surat) == 'Rahasia' ? 'checked' : '' }}>
                    Rahasia
                </label>
            </div>

            <div class="mt-6">
                <button class="px-6 py-2 bg-blue-600 rounded text-black">
                    Update
                </button>
                <a href="{{ route('surat-masuk.index') }}"
                   class="ml-2 px-6 py-2 bg-gray-400 rounded text-black">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
