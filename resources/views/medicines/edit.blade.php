<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Obat
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('medicines.update', $medicine) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @role('manager')
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Nama Obat</label>
                        <input type="text" name="nama_obat"
                               class="w-full border rounded p-2"
                               value="{{ old('nama_obat', $medicine->nama_obat) }}">
                        @error('nama_obat')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Jenis</label>
                        <input type="text" name="jenis"
                               class="w-full border rounded p-2"
                               value="{{ old('jenis', $medicine->jenis) }}">
                        @error('jenis')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    @endrole

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Stok</label>
                        <input type="number" name="stok"
                               class="w-full border rounded p-2"
                               value="{{ old('stok', $medicine->stok) }}">
                        @error('stok')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    @role('manager')
                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Harga</label>
                        <input type="number" name="harga"
                               class="w-full border rounded p-2"
                               value="{{ old('harga', $medicine->harga) }}">
                        @error('harga')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    @endrole

                    <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded">
                        Update
                    </button>
                    <a href="{{ route('medicines.index') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded ml-2">
                        Batal
                    </a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>