<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://caodang.fpt.edu.vn/wp-content/uploads/cropped-logo-fpt-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <br>
        <h3>Edit Product</h3>
        <form method="POST" action="{{ route('product.editPost', ['id' => $product->id]) }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>
            <div class="mb-3">
                <label for="view" class="form-label">View</label>
                <input type="number" class="form-control" id="view" name="view" value="{{ $product->view }}" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Update Product</button>
            <a href="{{route('product.list')}}" class="btn btn-secondary btn-sm">Cancel</a>
        </form>
    </div>
</body>
</html>
