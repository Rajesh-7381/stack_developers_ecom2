<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class ProductsController extends Controller
{
    //
    public function products(){
        $products=Products::with('category')->get()->toArray();
        // dd($products);
        return view('admin.products.products')->with(compact('products'));
    }
    public function updateproductstatus(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status'] == 'Active') {
                $status = 0;
            } else {
                $status = 1;
            }
            Products::where('id', $data['product_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'product_id' => $data['product_id']]);
        }
    }
    public function deleteproduct($id)
    {
        Products::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'deleted successfully');
    }
    public function addedit(Request $request,$id=null){
        if (empty($id)) {
            $title = "Add New Products";
            $product = new Products;
            // $product=array();
            $message = "Product added successfully";
        } else {
            $title = "Edit Products";
            $product = Products::find($id);
            if (!$product) {
                return redirect()->back()->with('error_message', 'Product not found');
            }
        }
        if($request->isMethod('post')){
            $data=$request->all();
            // echo '<pre>';
            // print_r($data);
            // die;

            // product validation
            $rules = [
                'category_id' => 'required',
                'product_name' => 'required|regex:/^[PL\S\-]+$/u|max:255', 
                'product_code' => 'required', 
                // 'product_code' => 'required|regex:/^[w\-]+$/u|max:30', 
                'product_price' => 'required|numeric',
                'product_color' => 'required|regex:/^[PL\S\-]+$/u|max:255', // Example: Allow only letters and spaces for color
                'family_color' => 'required|regex:/^[PL\S\-]+$/u|max:255', // Example: Allow only letters and spaces for family color
                // Add other validation rules as needed
            ];
            

            $customMessages = [
                'category_id.required' => "product  is required",
                'product_name.required' => "product  is required",
                'product_name.regex' => "valid product must be required",
                'product_code.required' => "product code is required",
                // 'product_code.regex' => "valid product code must be required",
                'product_price.required' => "product price is required",
                'product_price.numeric' => "valid product price must be required",
                'product_color.required' => "product color is required",
                'product_color.regex' => "valid product color must be required",
                'family_color.required' => "family color is required",
                'family_color.regex' => "valid family color must be required",
                // Add other custom messages for validation
            ];
            $this->validate($request,$rules,$customMessages);
            // Handle product video if uploaded
        if ($request->hasFile('product_video')) {
            $videoFile = $request->file('product_video');
            if ($videoFile->isValid()) {
                $videoName = rand() . '.' . $videoFile->getClientOriginalExtension();
                $videoPath = "admin-assets/front/VIDEOS";
                $videoFile->move($videoPath, $videoName);
                // Save the video path to the product
                $product->product_video = $videoName;
            }
        }
           
            $product->category_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->family_color = $data['family_color'];
            $product->group_code = $data['group_code'];
            $product->product_price = $data['product_price'];
            $product->product_discount = isset($data['product_discount']) ? $data['product_discount'] : 0;
            $product->product_weight = isset($data['product_weight']) ? $data['product_weight'] : 0;
            $product->description = isset($data['description']) ? $data['description'] :0;
            $product->washcare = $data['washcare'];
            $product->fabric = $data['fabric'];
            $product->pattern = $data['pattern'];
            $product->sleeve = $data['sleeve'];
            $product->fit = $data['fit'];
            $product->occassion = $data['occassion'];
            $product->meta_title = $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keywords = $data['meta_keywords'];
            if(!empty($data['is_featured'])){
                $product->is_featured =$data['is_featured'];
            }else{
                $product->is_featured ="No";
            }
            $product->status=1;
            
            try {
                $product->save();
                return redirect('admin/products')->with('success_message', $message);
            } catch (\Exception $e) {
                // Handle the database saving error appropriately, show error message, log, etc.
                return redirect()->back()->with('error_message', 'Product could not be saved: ' . $e->getMessage());
            }
            
        }
        // get categories and sub categories
        $getcategories=Category::getcategories();

        // product filters
        $productsfilter=Products::productsfilter();

        return view('admin.products.add-edit-product-page')->with(compact('title','getcategories','productsfilter','product'));
    }
}




