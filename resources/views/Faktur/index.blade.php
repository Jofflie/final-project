<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Faktur Lists</h1>
    <ul>
        @foreach ($fakturs as $faktur)
            <li>{{ $faktur->kode_pos }} {{ $faktur->alamat_pengiriman }}
             <a href="{{ route('faktur.show',$faktur->slug) }}">Show</a></li>
        @endforeach
    </ul>
</body>
</html>