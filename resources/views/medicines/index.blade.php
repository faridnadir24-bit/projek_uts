<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Obat
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if(session('success'))
                    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @role('manager')
                <a href="{{ route('medicines.create') }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                    + Tambah Obat
                </a>
                @endrole

                <table class="w-full border-collapse border border-gray-300 mt-4">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">Nama Obat</th>
                            <th class="border p-2">Jenis</th>
                            <th class="border p-2">Stok</th>
                            <th class="border p-2">Harga</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($medicines as $medicine)
                        <tr>
                            <td class="border p-2">{{ $medicine->nama_obat }}</td>
                            <td class="border p-2">{{ $medicine->jenis }}</td>
                            <td class="border p-2">{{ $medicine->stok }}</td>
                            <td class="border p-2">Rp {{ number_format($medicine->harga, 0, ',', '.') }}</td>
                            <td class="border p-2">
                                <a href="{{ route('medicines.edit', $medicine) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                                @role('manager')
                                <form action="{{ route('medicines.destroy', $medicine) }}"
                                      method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded"
                                            onclick="return confirm('Yakin hapus?')">
                                        Hapus
                                    </button>
                                </form>
                                @endrole
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>