<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Surat Masuk</h2>
    </x-slot>

    <div class="p-6 bg-white rounded shadow">
        <form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST">
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
                    <label>Tanggal</label>
                    <input type="date" name="tgl_surat"
                        value="{{ $surat->tgl_surat }}"
                        class="border p-2 w-full">
                </div>

                <div>
                    <label>Pengirim</label>
                    <input type="text" name="pengirim"
                        value="{{ $surat->pengirim }}"
                        class="border p-2 w-full">
                </div>

                <div>
                    <label>Perihal</label>
                    <input type="text" name="perihal"
                        value="{{ $surat->perihal }}"
                        class="border p-2 w-full">
                </div>
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
