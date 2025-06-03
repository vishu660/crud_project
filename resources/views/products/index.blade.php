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
                 <a href="{{ route('products.create') }}" class="btn btn-dark">Create</a>
            </div>
           @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                      {{ Session::get('success') }}
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
             @endif

            @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                      {{ Session::get('error') }}
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
             @endif
            <div class="card p-0 mt-3">
                <div class="card-header bg-dark text-white">
                    <h2 class="h4">Products</h2>
                    
                </div>
                <div class="card-body shadow-lg">
                      <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th width="100">Status</th>
                                <th width="120" class="text-center" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @if ($products->isNotEmpty())
                            @foreach ( $products as $product )
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                  @if (!empty($product->image))
                                   <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image" width="50" class="rounded">

                                     @else
                                    <img src="https://placehold.co/50x50" alt="Product Image" width="50" class="rounded">
                                      
                                  @endif
                                </td>
                            
                                <td>{{ $product->name }}</td>
                                <td> {{ $product->sku }}</td>
                                <td>{{ $product->price }}</td>
                                
                                   <td>
                                       @if ($product->status == 'Active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif


                                  </td>


                               
                                <td width="120" class="text-center">
                                    
                                <a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                  

                                </td>
                            </tr>
                            @endforeach
                            @else
                              <tr>
                                <td colspan="7" class="text-center">No products found</td>
                              </tr>
                              
                          @endif

                         
                        </tbody>

                      </table>
                </div>


            </div>

          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>