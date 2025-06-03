<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('products.index',[
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validtator = Validator::make($request->all(), [
         'name' => 'required',
         'sku' => 'required|unique:products,sku',
         'price' => 'required|numeric',
        'status' => 'required',
         'image' => 'image|mimes:jpeg,png,jpg|max:2048',
       ]);

         if ($validtator->fails()) {
              return redirect(route('products.create'))->withErrors($validtator)->withInput();
         }
            $product = new Product();
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->save();

           if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/products');
            $image->move($path, $filename);



            $product->image = $filename;
            $product->save();
}




            return redirect(route('products.index'))->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrfail($id);
        
       return view('products.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        
        $product = Product::findOrfail($id);
        $oldImage = $product->image;

       $validtator = Validator::make($request->all(), [
         'name' => 'required',
         'sku' => 'required|unique:products,sku' .$id,
         'price' => 'required|numeric',
         'status' => 'required',
         'image' => 'image|mimes:jpeg,png,jpg|max:2048',
       ]);

         if ($validtator->fails()) {
              return redirect(route('products.edit',$product->id))->withErrors($validtator)->withInput();
         }
           
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->save();


           if ($request->hasFile('image')) {

              if ($oldImage != null && File::exists(public_path('uploads/products/' . $oldImage))) {
                File::delete(public_path('uploads/products/' . $oldImage));
            }

            $image = $request->image;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('uploads/products');
            $image->move($path, $filename);



            $product->image = $filename;
            $product->save();
}




            return redirect(route('products.index'))->with('success', 'Product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $product = Product::findOrfail($id);
           if ($product->image != null && File::exists(public_path('uploads/products/' .$product->image))) {
                File::delete(public_path('uploads/products/' . $product->image));
            }
        $product->delete();
        return redirect(route('products.index'))->with('success', 'Product Deleted successfully');
    }
}
