<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Products - SantriKoding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5">

    <!-- ✅ HEADER (DITAMBAHKAN LAGI) -->
    <div>
        <h3 class="text-center my-4">Tutorial Laravel 12 untuk Pemula</h3>
        <h5 class="text-center">
            <a href="https://santrikoding.com">www.santrikoding.com</a>
        </h5>
        <hr>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <!-- ✅ BUTTON ATAS -->
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    ADD PRODUCT
                </a>

                <a href="{{ route('products.draftList') }}" class="btn btn-warning">
                    LIHAT DRAFT
                </a>
            </div>

            <!-- TABLE -->
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-center">IMAGE</th>
                        <th>TITLE</th>
                        <th>PRICE</th>
                        <th>STOCK</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>

                @forelse ($products as $product)
                    <tr>
                        <td class="text-center">
                            <img src="{{ asset('storage/products/'.$product->image) }}" width="120" class="rounded">
                        </td>

                        <td>{{ $product->title }}</td>

                        <td>Rp {{ number_format($product->price,2,',','.') }}</td>

                        <td>{{ $product->stock }}</td>

                        <!-- STATUS -->
                        <td class="text-center">
                            <span class="badge bg-success">PUBLISH</span>
                        </td>

                        <!-- ACTIONS -->
                        <td class="text-center">

                            <!-- SHOW -->
                            <a href="{{ route('products.show', $product->id) }}" 
                               class="btn btn-sm btn-dark">
                               SHOW
                            </a>

                            <!-- EDIT -->
                            <a href="{{ route('products.edit', $product->id) }}" 
                               class="btn btn-sm btn-primary">
                               EDIT
                            </a>

                            <!-- DRAFT -->
                            <form action="{{ route('products.draft', $product->id) }}" 
                                  method="POST" 
                                  style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-warning">
                                    DRAFT
                                </button>
                            </form>

                            <!-- DELETE -->
                            <form action="{{ route('products.destroy', $product->id) }}" 
                                  method="POST" 
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin hapus?')">
                                    HAPUS
                                </button>
                            </form>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Data belum ada
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>

            <!-- PAGINATION -->
            <div class="mt-3">
                {{ $products->links() }}
            </div>

        </div>
    </div>
</div>

</body>
</html>