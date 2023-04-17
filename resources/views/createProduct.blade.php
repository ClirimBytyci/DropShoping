<!-- Example Code -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Create Product</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    input {
        height: 40px;
    }
</style>
<body class="container w-50 pt-5 mt-4">
@error('additionalPhotos')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<div style="border-radius: 15px; background-color: #ded9d9;" class="p-5">
    <form method="post" action="{{ route('create.product') }}" enctype="multipart/form-data">
        @csrf
        <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger">
            Product Registration
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="product-name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product-name" name="name" required>
            </div>
            <div class="col-md-6">
                <label for="title" class="form-label">Title Description</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category" name="category">
                    @foreach($categories as $category)
                        <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="tax" class="form-label">Tax</label>
                <select class="form-select" id="tax" name="tax">
                    <option value="standard" selected>Standard Tax</option>
                    <option value="high">High Tax</option>
                </select>
            </div>
            <div class="col-md-2 pt-4" >
                <div class="form-check form-switch pt-3 ml">
                    <input class="form-check-input" type="checkbox" id="active" name="active" checked>
                    <label class="form-check-label" for="active">
                        Active
                    </label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="product-number" class="form-label">Product Number</label>
                <input type="text" class="form-control" id="product-number" name="product-number" required>
            </div>
            <div class="col-md-4">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text">€</span>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>
            </div>
            <div class="col-md-4">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="main-photo" class="form-label">Main Photo</label>
                <input class="form-control" type="file" id="main-photo" name="mainPhoto">
            </div>
            <div class="col-md-6">
                <label for="additional-photos" class="form-label">Additional Photos</label>
                <input class="form-control" type="file" id="additional-photos" name="additionalPhotos[]" multiple>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary mt-4 w-100" style="height: 50px">Save</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
