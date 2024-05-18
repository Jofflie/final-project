<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
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
                    <h1>Edit product</h1>
                   

                    <form action="{{ route("product.update", $product->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="">Kategori id: </label>
                            <input type="number" name="kategori_id" value="{{$product->kategori->id}}">
                        </div>

                        <div>
                            <label for="">Nama: </label>
                            <input type="text" name="nama" value="{{$product->nama}}">
                        </div>
                        <div>
                            <label for="">Harga: </label>
                            <input type="number" name="harga" value="{{$product->harga}}">
                        </div>
                        <div>
                            <label for="">Jumlah: </label>
                            <input type="number" name="jumlah" value="{{$product->jumlah}}">
                        </div>
                        <div>
                            <label for="">Masukkan foto: </label>
                            <input type="file" name="foto" value="{{$product->foto}}">
                        </div>

                        <button>Submit</button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
