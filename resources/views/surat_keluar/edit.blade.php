<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Surat Keluar</h2>
    </x-slot>

    <div class="p-6 bg-white rounded shadow">
        <form action="{{ route('surat-keluar.update', $surat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <label>No Surat</label>
                    <input type="text" name="no_surat"
                        value="{{ $surat->no_surat }}"
                        class="border p-2 w-full">
                </div>

                <div>
                    <label>Tanggal Surat</label>
                    <input type="date" name="tgl_surat"
                        value="{{ $surat->tgl_surat }}"
                        class="border p-2 w-full">
                </div>

                <div>
                    <label>Tujuan</label>
                    <input type="text" name="tujuan"
                        value="{{ $surat->tujuan }}"
                        class="border p-2 w-full">
                </div>

                <div>
                    <label>Perihal</label>
                    <input type="text" name="perihal"
                        value="{{ $surat->perihal }}"
                        class="border p-2 w-full">
                </div>
            </div>

            {{-- JENIS --}}
            <div class="mt-4">
                <label class="font-semibold">Jenis Surat</label><br>
                <input type="radio" name="jenis_surat" value="Internal"
                    {{ $surat->jenis_surat == 'Internal' ? 'checked' : '' }}>
                Internal
                <input type="radio" name="jenis_surat" value="Eksternal"
                    {{ $surat->jenis_surat == 'Eksternal' ? 'checked' : '' }}>
                Eksternal
            </div>

            {{-- SIFAT --}}
            <div class="mt-4">
                <label class="font-semibold">Sifat Surat</label><br>
                <input type="radio" name="sifat_surat" value="Biasa"
                    {{ $surat->sifat_surat == 'Biasa' ? 'checked' : '' }}>
                Biasa
                <input type="radio" name="sifat_surat" value="Penting"
                    {{ $surat->sifat_surat == 'Penting' ? 'checked' : '' }}>
                Penting
                <input type="radio" name="sifat_surat" value="Rahasia"
                    {{ $surat->sifat_surat == 'Rahasia' ? 'checked' : '' }}>
                Rahasia
            </div>

            <div class="mt-6">
                <button class="px-6 py-2 bg-blue-600 rounded text-black">
                    Update
                </button>
                <a href="{{ route('surat-keluar.index') }}"
                   class="ml-2 px-6 py-2 bg-gray-400 rounded text-black">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
