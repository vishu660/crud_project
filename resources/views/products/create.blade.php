<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud_Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="bg-dark text-center text-white py-2">
             <h1 class="h3">Crud_Project</h1>
    </div>
    <div class="container">
          <div class="row">
            <div class="d-flex justify-content-end p-0 mt-3">
                 <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a>
            </div>
            <div class="card p-0 mt-3 mb-5">
                <div class="card-header bg-dark text-white">
                    <h2 class="h4">Create Product</h2>
                    
                </div>
                <div class="card-body shadow-lg">
                  <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="py-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" 
                          id="name" name="name" placeholder="Enter product name">
                        @error('name')
                            <p class="invalid-feedack text-danger">{{$message}}</p>
                        @enderror
                    </div>
                     <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" >
                         @error('image')
                            <p class="invalid-feedack text-danger">{{$message}}</p>
                        @enderror
                    </div>
                      <div class="mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input value="{{ old('sku') }}" type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" placeholder="Enter product sku">
                         @error('sku')
                            <p class="invalid-feedack text-danger">{{$message}}</p>
                        @enderror
                    </div>
                      <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input value="{{ old('price') }}" type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter product price">
                         @error('price')
                            <p class="invalid-feedack text-danger">{{$message}}</p>
                        @enderror
                    </div>
                      <div class="mb-3">
                        <label for="price" class="form-label">Status</label>
                         <select class="form-select" id="status" name="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>

                          
                    </div>
                   <button  class="btn btn-primary">Save</button>

                  </form>
                </div>


            </div>

          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>