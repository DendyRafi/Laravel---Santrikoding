<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Draft Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5">

    <!-- HEADER -->
    <div>
        <h3 class="text-center my-4">Halaman Draft Produk</h3>
        <hr>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <a href="{{ route('products.index') }}" class="btn btn-success mb-3">
                KEMBALI
            </a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>IMAGE</th>
                        <th>TITLE</th>
                        <th>PRICE</th>
                        <th>STOCK</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>

                <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/products/'.$product->image) }}" width="120">
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>Rp {{ number_format($product->price,2,',','.') }}</td>
                        <td>{{ $product->stock }}</td>

                        <td>
                            <!-- tombol publish balik -->
                            <form action="{{ route('products.publish', $product->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success btn-sm">PUBLISH</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada draft</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

</body>
</html>