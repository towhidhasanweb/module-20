@extends('layouts.app')

@section('content')
      <div class="content-body">
        <div class="container-fluid">
          <div class="page-titles">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="javascript:void(0)">Products</a>
              </li>
            </ol>
          </div>
          <!-- row -->

          <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('products') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search by Product ID or Description"
                               value="{{ old('search', $search) }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">All products</h4>
                  <a href="{{ route('create.product') }}" class="btn btn-rounded btn-info btn-sm">
                    <span class="btn-icon-left text-info"
                      ><i class="fa fa-plus color-info"></i> </span
                    >Add new product
                  </a>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-responsive-md">
                      <thead>
                        <tr>
                          <th class="width80">#</th>
                          <th><a href="{{ route('products', ['sort_by' => 'name', 'sort_order' => $sortBy === 'name' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                  Name
                                  @if ($sortBy === 'name')
                                      @if ($sortOrder === 'asc') ▲ @else ▼ @endif
                                  @endif
                              </a></th>
                          <th>product id</th>
                          <th>image</th>
                          <th>Stock</th>
                          <th><a href="{{ route('products', ['sort_by' => 'price', 'sort_order' => $sortBy === 'price' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                                  Price
                                  @if ($sortBy === 'price')
                                      @if ($sortOrder === 'asc') ▲ @else ▼ @endif
                                  @endif
                              </a></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @forelse( $products as $product)
                        <tr>
                          <td><strong>{{$loop->iteration}}</strong></td>
                          <td>{{$product->name}}</td>
                          <td>{{$product->product_id}}</td>
                          <td>@if($product->image)
                            <img width="60px" src="{{url('storage/'.$product->image)}}" alt="product image" />
                            @else
                            
                            <img width="60px" src="{{asset('assets/images/product/1.jpg')}}" alt="product image" />
                            @endif
                          </td>
                          <td>
                              {{$product->stock}}
                          </td>
                          <td>{{$product->price}}</td>
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn btn-success light sharp"
                                data-toggle="dropdown"
                              >
                                <svg
                                  width="20px"
                                  height="20px"
                                  viewBox="0 0 24 24"
                                  version="1.1"
                                >
                                  <g
                                    stroke="none"
                                    stroke-width="1"
                                    fill="none"
                                    fill-rule="evenodd"
                                  >
                                    <rect x="0" y="0" width="24" height="24" />
                                    <circle
                                      fill="#000000"
                                      cx="5"
                                      cy="12"
                                      r="2"
                                    />
                                    <circle
                                      fill="#000000"
                                      cx="12"
                                      cy="12"
                                      r="2"
                                    />
                                    <circle
                                      fill="#000000"
                                      cx="19"
                                      cy="12"
                                      r="2"
                                    />
                                  </g>
                                </svg>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('show.product', [$product->id])}}">View</a>
                                <a class="dropdown-item" href="{{route('edit.product', [$product->id])}}">Edit</a>
                                  <form  action="{{route('delete.product', [$product->id] )}}" method="post" onsubmit="return confirm('Are you sure you want to delete this product?');" >
                                      @csrf
                                      @method('DELETE')
                                <button type="submit" class="dropdown-item" >Delete</button>
                                  </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @empty
                          <tr >
                              <td colspan="7" style="text-align: center">No products found.</td>
                          </tr>
                      @endforelse
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                     </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection


