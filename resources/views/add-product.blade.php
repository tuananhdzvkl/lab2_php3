<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://caodang.fpt.edu.vn/wp-content/uploads/cropped-logo-fpt-32x32.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<style>
    .form-container {
        border-radius: 15px;
        border: 1px solid #ccc;
        padding: 20px;
        max-width: 600px;
        margin: 20px auto;
    }

    .input-group-text {
        width: 45px;
        justify-content: center;
    }
    .h2{
        font-size: 20px;
        font-family:'Times New Roman', Times, serif;
    }
</style>
<body>
    <div class="container">
        <br>
        <h3>Add Product</h3>
        <form method="POST" action="{{ route('product.addPost') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="view" class="form-label">View</label>
                <input type="number" class="form-control" id="view" name="view" required>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Add Product</button>
            <a href="{{route('product.list')}}" class="btn btn-secondary btn-sm">Cancel</a>
        </form>
    </div>
</body>
</html>
