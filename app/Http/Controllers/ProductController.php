<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator;

class ProductController extends Controller
{
    //get product list
    function getproducts($id=null)
    {
        return $id?Product::find($id):Product::all();
    }

    //add a product
    function addproducts(Request $req)
    {
        $rules=array(
            "product_name"=>"required|min:2|max:20",
            "price"=>"required",
            "available"=>"required",
        );

        $validation=Validator::make($req->all(),$rules);

        if($validation->fails())
        {
            return $validation->errors();
        }
        else
        {
            $product=new Product;
            $product->id=$req->id;
            $product->product_name=$req->product_name;
            $product->price=$req->price;
            $product->available=$req->available;
            $product->description=$req->description;
            $result=$product->save();

            if($result)
            {
                return ["result"=>"data save and validation success"];
            }
            else
            {
                return ["result"=>"data save not success"];
            }
        }
    }


    //edit a product
    function editproducts(Request $req)
    {
        $product=Product::find($req->id);
        $product->product_name=$req->product_name;
        $product->price=$req->price;
        $product->description=$req->description;
        $product->available=$req->available;
        $result=$product->save();

        if($result)
        {
            return ["result"=>"data update success"];
        }
        else
        {
            return ["result"=>"data update not success"];
        }
    }

    //deleting a product
    function deleteproduct($id)
    {
        $product=Product::find($id);
        $result=$product->delete();

        if($result)
        {
            return ["result"=>"data delete success"];
        }
        else
        {
            return ["result"=>"data delete not success"];
        }
    }

     //search using keyword
     function searchproduct($name)
     {
          return Product::where("product_name",$name)->get();
     }
}
