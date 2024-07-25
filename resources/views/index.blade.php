<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel PHP3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="https://caodang.fpt.edu.vn/wp-content/uploads/cropped-logo-fpt-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('product.home') }}"><i class="fa-solid fa-house" style="font-size: 25px"></i></a>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <a class="navbar-brand" aria-current="page" href="{{ route('product.list') }}" style="font-size: 19px;">Products</a>
                <a class="navbar-brand" aria-current="page" href="{{ route('product.add') }}" style="font-size: 19px;">Add Products</a>
            </ul>
            <form class="d-flex" method="GET" action="{{ route('product.list') }}">
                <input class="form-control me-2" type="search" name="search" id="searchInput" placeholder="Enter product name">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
    </nav>

    <br>
    <a href="{{ route('product.add') }}" class="btn btn-primary btn-sm">Add Products</a>

    @if (session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
    @endif
    <table class="table table-hover" style="text-align: center">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">NAME</th>
                <th scope="col">PRICE</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">VIEW</th>
                <th scope="col">CREATE_AT</th>
                <th scope="col">UPDATE_AT</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listProducts as $product)
            <tr>
                <td style="font-weight: 500">{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>
                    @php
                        echo number_format($product->price);
                    @endphp
                </td>
                <td>{{ $product->category_name }}</td>
                <td>
                    @php
                        echo number_format($product->view);
                    @endphp
                </td>
                <td>{{ \Carbon\Carbon::parse($product->create_at)->format('d-m-Y | H:i:s') }}</td>
                <td>{{ \Carbon\Carbon::parse($product->update_at)->format('d-m-Y | H:i:s') }}</td>
                <td>
                    <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                alert('{{ session('success') }}');
            @endif
            @if(session('error'))
                alert('{{ session('error') }}');
            @endif
        });
    </script>
</body>
</html>
