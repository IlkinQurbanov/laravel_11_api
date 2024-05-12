<?php

namespace App\Http\Controllers;
use App\Models\Product;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
  
        $products = Product::all();

        return response()->json([
            'Products: ' => $products,
        ]);
    }


    public function store(Request $request){

        $input = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
        ]);

        $product = Product::create($input);

        if ($product->save()){

            return response()->json([
                'Message: ' => 'Success!',
                'Product created: ' => $product
            ], 200);

        }else {

            return response([

                'Message: ' => 'We could not create a new product.',

            ], 500);
        }

    }



    public function update(Request $request, string $id){

        $product = Product::find($id);

        if($product){

           $input = $request->validate([
              'title' => ['required'],
              'description' => ['required'],
              'price' => ['required'],
            ]);

            $product->title = $input['title'];
            $product->description = $input['description'];
            $product->price = $input['price'];

            if($product->save()){

                return response()->json([

                    'Message: ' => 'Product updated with success.',
                    'Product: ' => $product

                ], 200);


            }else {

                return response([

                    'Message: ' => 'We could not update the product.',
    
                ], 500);

            }
        }else {

            return response([

                'Message: ' => 'We could not find the product.',

            ], 500);
        }

    }


    public function show(string $id){

        $product = Product::find($id);

        if ($product){

            return response()->json([
                'Message: ' => 'Product found.',
                'Product: ' => $product
            ], 200);

        }else {

            return response([

                'Message: ' => 'We could not find the product.',

            ], 500);
        }

    }


    public function destroy(string $id){

        $product = Product::find($id);

        if($product){

            $product->delete();

            return response()->json([

                'Message: ' => 'product deleted with success.',

            ], 200);

        }else {

            return response([
                
                'Message: ' => 'We could not find the product.',

            ], 500);
        }

    }



}
