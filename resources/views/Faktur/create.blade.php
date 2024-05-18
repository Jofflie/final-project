<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Faktur</h1>

    @foreach ($products as $product)
        <h1>{{ $product->nama }}</h1>
        <p>
            product kategori: {{$product->kategori->nama_kategori}}
            <br>
            product harga: {{$product->harga}}
            <br>
            product jumlah: {{$product->jumlah}}
            <br>
            product foto: 
            <br>
            <img src="{{asset($product->foto)}}" alt="">
        </p>
    

        <h2>Add this product to faktur</h2>
        <form action="{{ route("faktur.store") }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="number" name="kuantitas"> 
    @endforeach
    
            <div>
                <label for="">Alamat pengiriman: </label>
                <input type="text" name="alamat_pengiriman">
            </div>
            <div>
                <label for="">Kode pos: </label>
                <input type="number" name="kode_pos"> 
            </div>

            <button>Save</button>
        </form>

    
    
</body>
</html>