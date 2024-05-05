<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h1>Create new product</h1>
                    <form action="{{ route("product.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="">Kategori: </label>
                            <input type="text" name="kategori">
                        </div>
                        <div>
                            <label for="">Nama: </label>
                            <input type="text" name="nama">
                        </div>
                        <div>
                            <label for="">Harga: </label>
                            <input type="number" name="harga">
                        </div>
                        <div>
                            <label for="">Jumlah: </label>
                            <input type="number" name="jumlah">
                        </div>
                        <div>
                            <label for="">Masukkan foto: </label>
                            <input type="file" name="foto">
                        </div>
 
                        <button>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
