@extends('layouts.app')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('products') }}">Product</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="javascript:void(0)">Edit product</a>
                    </li>
                </ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-xl-10 col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Product details</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="post" action="{{route('update.product', $product->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control input-default" value="{{$product->name}}" name="name" placeholder="Product Name">
                                        <input type="hidden" class="form-control input-default" value="{{$product->id}}" name="id" >
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Product description</label>
                                        <textarea class="form-control" rows="4" name="description" id="comment">{{$product->description}}</textarea>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Price</label>
                                            <input type="text" class="form-control" value="{{$product->price}}" name="price" placeholder="price">
                                            @if ($errors->has('price'))
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>stock</label>
                                            <input type="number" class="form-control" value="{{$product->stock}}" name="stock" placeholder="stock">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>product id</label>
                                            <input type="text" class="form-control" value="{{$product->product_id}}" name="product_id" placeholder="product_id">
                                            @if ($errors->has('product_id'))
                                                <span class="text-danger">{{ $errors->first('product_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Product image</label>

                                                                              <div class="input-group mb-3">

                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">Upload</span>
                                                                                </div>
                                                                                <div class="custom-file">
                                                                                    <input name="image" class="custom-file-input" type="file"
                                                                                           onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                                                    <label class="custom-file-label">Choose file</label>
                                                                                </div>
                                                                            </div>
                                            @if ($product->image)
                                                <p>Current Image:</p>
                                                <img id="blah" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150">

                                            @endif
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
