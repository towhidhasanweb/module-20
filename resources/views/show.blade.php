@extends('layouts.app')

@section('content')
<div class="content-body">
  <div class="container-fluid">
      <div class="page-titles">
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{route('products')}}">Products</a></li>
  <li class="breadcrumb-item active"><a href="javascript:void(0)">{{$product->name}}</a></li>
</ol>
      </div>
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                              <!-- Tab panes -->
                              <div class="tab-content">
                                  <div role="tabpanel" class="tab-pane fade show active" id="first">
                                    @if($product->image)
                                      <img class="img-fluid" src="{{url('storage/'.$product->image)}}" alt="{{$product->name}}">
                                      @else
                                      <img class="img-fluid" src="{{asset('assets/images/product/1.jpg')}}" alt="{{$product->name}}">
                                      @endif
                                  </div>
                                  
                              </div>
                              <div class="tab-slide-content new-arrival-product mb-4 mb-xl-0">
                                  <!-- Nav tabs -->
                                  <ul class="nav slide-item-list mt-3" role="tablist">
                                      <li role="presentation" class="show">
                                          <a href="#first" role="tab" data-toggle="tab">
                                            @if($product->image)
                                              <img class="img-fluid" src="{{url('storage/'.$product->image)}}" alt="{{$product->name}}" width="50">
                                            
                                              @endif
                                          </a>
                                      </li>
                                      
                                  </ul>
                              </div>
                          </div>
                          <!--Tab slider End-->
                          <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                              <div class="product-detail-content">
                                  <!--Product details-->
                                  <div class="new-arrival-content pr">
                                      <h4>{{$product->name}}</h4>
                                      <div class="comment-review star-rating">
                                  </div>
              <div class="d-table mb-2">
                <p class="price float-left d-block">{{$product->price}}</p>
                                      </div>
                                      <p>Availability: <span class="item"> {{$product->quantity}} <i
                                                  class="fa fa-shopping-basket"></i></span>
                                      </p>
                                      <p>Product code: <span class="item">{{$product->product_id}}</span> </p>
                                      
                                      <p class="text-content">{{$product->description}}</p>
                                      
                                      
                                      <div class="shopping-cart mt-3">
                                          <a class="btn btn-primary btn-sm" href="javascript:void(0)"><i
                                                  class="fa fa-shopping-basket mr-2"></i>Add
                                              to cart</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </div>
</div>
@endsection