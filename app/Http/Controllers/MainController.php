<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function create(){
        $db=Category::all();
        return view('welcome',['db1'=>$db]);
    }

    public function create2($ind){
        $db=Product::where(['idcategory'=>$ind])->get();
        return view('welcome',['db2'=>$db]);
    }

    public function createproduct(){
        $cat=Category::select('id','name')->get();
        return view('createproduct',['cat'=>$cat]);
    }
    public function create_product(ProductRequest $request){
        $img=$request->file('img')->store('images','public');
        Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'img'=>$img,
            'cost'=>$request->cost,
            'idcategory'=>$request->idcategory,
        ]);
        return back();
    }
    public function createcategory(){
        return view('createcategory');
    }
    public function create_category(CategoryRequest $request){
        $img=$request->file('img')->store('images','public');
        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'img'=>$img,
        ]);
        return back();
    }

    public function product($ind){
        $db=Product::where(['products.id'=>$ind])->first();
        $cat=Category::select('name')->where(['id'=>$db->idcategory])->first();
        return view('product',['db'=>$db,'cat'=>$cat]);
    }

    public function deletecategory($ind){
        $img=Category::where(['id'=>$ind])->first();
        if(File::exists(public_path('/storage/'.$img->img))) File::delete(public_path('/storage/'.$img->img));
        Category::destroy($ind);
        return back();
    }
    public function deleteproducts($ind){
        $img=Product::where(['id'=>$ind])->first();
        if(File::exists(public_path('/storage/'.$img->img))) File::delete(public_path('/storage/'.$img->img));
        Product::destroy($ind);
        return back();
    }
    public function updatecategory($ind){
        $db=Category::where(['id'=>$ind])->first();
        return view('createcategory',['db'=>$db,'ind'=>$ind]);
    }
    public function updateproduct($ind){
        $cat=Category::select('id','name')->get();
        $db=Product::where(['id'=>$ind])->first();
        return view('createproduct',['db'=>$db,'ind'=>$ind,'cat'=>$cat]);
    }
    public function update_category(CategoryRequest $request,$ind){
        $img1=Category::where(['id'=>$ind])->first();
        if(File::exists(public_path('/storage/'.$img1->img))) File::delete(public_path('/storage/'.$img1->img));
        $img2=$request->file('img')->store('images','public');
        Category::where(['id'=>$ind])->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'img'=>$img2,
        ]);
        return $this->create();
    }
    public function update_product(ProductRequest $request,$ind){
        $img1=Product::where(['id'=>$ind])->first();
        if(File::exists(public_path('/storage/'.$img1->img))) File::delete(public_path('/storage/'.$img1->img));
        $img2=$request->file('img')->store('images','public');
        Product::where(['id'=>$ind])->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'img'=>$img2,
            'cost'=>$request->cost,
            'idcategory'=>$request->idcategory,
        ]);
        return $this->create();
    }
}
