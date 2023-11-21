@extends('admin.layouts.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Advanced Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/admin/products')}}">Back</a></li>
                        <li class="breadcrumb-item active">Advanced Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$title}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @if (session('error_message'))
                        <div class="alert alert-danger">
                            {{ session('error_message') }}
                        </div>
                        @endif
                        @if (session('success_message'))
                        <div class="alert alert-success">
                            {{ session('success_message') }}
                        </div>
                        @endif
                        <form name="productform" id="productform" @if(empty($product['id'])) action="{{url('admin/add-edit-product-page')}}" @else action="{{url('admin/add-edit-product-page/'.$product['id'])}}" @endif method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- <div class="form-group">
                                    <label for="category_id">select category </label>
                                    <input type="text" 
                                    class="form-control" 
                                    id="category_name" 
                                    name="category_name" 
                                    placeholder="Enter product name" 
                                    value="{{ isset($product['category_name']) ? $product['category_name'] : old('category_name') }}">
                                         @error('category_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div> --}}
                                <div class="form-group ">
                                    <label for="category_id">select category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">select</option>
                                        @foreach ($getcategories as $cat)
                                            <option @if(!empty(old('$category_id')) && $cat['id']==old('$category_id')) selected="" @endif value="{{$cat['id']}}" >{{$cat['category_name']}} </option>

                                            @if (!empty($cat['subcategories']))
                                                @foreach ($cat['subcategories'] as $subcat)
                                                    <option  @if(!empty(old('$category_id')) && $subcat['id']==old('$category_id')) selected="" @endif value="{{$subcat['id']}}"  > &nbsp;&nbsp;-> {{ $subcat['category_name'] }}</option>
                                                    
                                                    @if (!empty($subcat['subcategories']))
                                                        @foreach ($subcat['subcategories'] as $subsubcat)
                                                            <option  @if(!empty(old('$category_id')) && $subsubcat['id']==old('$category_id')) selected="" @endif value="{{$cat['id']}}" > &nbsp;&nbsp;&nbsp;&nbsp;->-> {{ $subsubcat['category_name'] }}</option>
                                                                                                                         
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="product_name">product name<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder=" Enter product name" value="{{ isset($product['product_name']) ? $product['product_name'] : old('product_name') }}">
                                    @error('product_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_code">product Code <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="product_code" name="product_code" placeholder=" Enter product Code" value="{{ isset($product['product_code']) ? $product['product_code'] : old('product_code') }}">
                                    @error('product_code')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_color">product Color<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="product_color" name="product_color" placeholder=" Enter product Code" value="{{ isset($product['product_color']) ? $product['product_color'] : old('product_color') }}">
                                    @error('product_color')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="family_color">Family Color<span style="color: red">*</span></label>
                                       <select name="family_color" id="family_color">
                                           <option value="select">select</option>                                                   
                                            <option value="green">green</option>    
                                            <option value="black">black</option>    
                                            <option value="blue">blue</option>    
                                            <option value="orange">orange</option>    
                                            <option value="white">white</option>    
                                            <option value="gray">gray</option>    
                                            <option value="gray">gray</option>    
                                            <option value="silver">silver</option>    
                                            <option value="golden">golden</option>    
                                        </select>                                    
                                </div>
                                <div class="form-group">
                                    <label for="group_code">Group Code </label>
                                    <input type="text" class="form-control" id="group_code" name="group_code" placeholder=" Enter group Code" value="{{ isset($product['group_code']) ? $product['group_code'] : old('group_code') }}">
                                    @error('group_code')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_price">Product Price <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="product_price" name="product_price" placeholder=" Enter product price" value="{{ isset($product['product_price']) ? $product['product_price'] : old('product_price') }}">
                                    @error('product_price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_discount">product Discount (%)<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="product_discount" name="product_discount" value="{{ isset($product['product_discount']) ? $product['product_discount'] : old('product_discount') }}">
                                    @error('product_discount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_weight">product Weight</label>
                                    <input type="text" class="form-control" id="product_weight" name="product_weight" value="{{ isset($product['product_weight']) ? $product['product_weight'] : old('product_weight') }}">
                                    @error('product_weight')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">description </label>
                                    <input type="text" class="form-control" id="description" name="description" value="{{ isset($product['description']) ? $product['description'] : old('description') }}">
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_video">product Video</label>
                                    <input type="file" class="form-control" id="product_video" name="product_video" value="{{ isset($product['product_video']) ? $product['product_video'] : old('product_video') }}">
                                    @error('product_discount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                
                                {{-- <div class="form-group">
                                    <label for="image">product Image*</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @if(!empty($product['product_image']))
                                    <a href="{{ asset('./admin-assets/front/product/' . $product['product_image']) }}" target="_blank">
                                        <img src="{{ asset('./admin-assets/front/product/' . $product['product_image']) }}" alt="" style="width: 70px">

                                    </a>    
                                        <!-- Your existing delete button with SweetAlert confirmation -->
                                        <a href="javascript:void(0)" record="product-page" record_id="{{$product['id']}}" name="product page" check="product-page" class="confirmdelete btn btn-danger btn-sm" title=" delete it!"><i class="fas fa-trash"></i></a>
                                    @endif
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                --}}

                            {{-- </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div> --}}

                <!-- right column -->
                {{-- <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-body"> --}}
                            <div class="form-group">
                                <label for="fabric"> Fabric</label>
                                <select name="fabric" id="fabric" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($productsfilter['fabricArray'] as $fabric)
                                        <option value="{{ $fabric }}">{{ $fabric }}</option>
                                    @endforeach 
                                </select>     
                            </div>
                            
                            <div class="form-group">
                                <label for="sleeve"> Sleeve</label>
                                <select name="sleeve" id="sleeve" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($productsfilter['SleeveArray'] as $sleeve)
                                        <option value="{{$sleeve}}">{{$sleeve}}</option>
                                    @endforeach 
                                 </select>     
                              
                            </div>
                            <div class="form-group">
                                <label for="pattern"> pattern</label>
                                <select name="pattern" id="pattern" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($productsfilter['PatternArray'] as $pattern)
                                        <option value="{{$pattern}}">{{$pattern}}</option>
                                    @endforeach 
                                 </select>     
                              
                            </div>
                            <div class="form-group">
                                <label for="fit"> fit</label>
                                <select name="fit" id="fit" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($productsfilter['FitArray'] as $fit)
                                        <option value="{{$fit}}">{{$fit}}</option>
                                    @endforeach 
                                 </select>     
                              
                            </div>
                            <div class="form-group">
                                <label for="occassion"> occasion</label>
                                <select name="occassion" id="occassion" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($productsfilter['OccasionArray'] as $occasion)
                                        <option value="{{$occasion}}">{{$occasion}}</option>
                                    @endforeach 
                                 </select>     
                              
                            </div>
                            <div class="form-group">
                                <label for="washcare"> washcare</label>
                                <textarea class="form-control" id="washcare" name="washcare" placeholder="Enter washcare" ></textarea>
                                @error('washcare')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keywords"> search Keywords</label>
                                <textarea class="form-control" id="keywords" name="keywords" placeholder="Enter keywords"></textarea>
                                @error('keywords')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta Title*</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta_Title" value="{{ isset($product['meta_title']) ? $product['meta_title'] : old('meta_title') }}">
                                @error('meta_title')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Description*</label>
                                <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Meta_Description"value="{{ isset($product['meta_description']) ? $product['meta_description'] : old('meta_description') }}">
                                @error('meta_description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords*</label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta_Keywords" value="{{ isset($product['meta_keywords']) ? $product['meta_keywords'] : old('meta_keywords') }}">
                                @error('meta_keywords')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="is_featured">Featured Item</label>
                                <input type="checkbox" class="form-control" value="Yes" id="is_featured" name="is_featured" placeholder=" enter item" >
                                @error('is_featured')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- /.card -->
                {{-- </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid --> --}}
    </section>
    <!-- /.content -->
</div>
@endsection
