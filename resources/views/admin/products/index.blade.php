@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('admin.partials.flash')

    <!-- <div class="content-wrapper"> -->
    <div class="page-header">
        <h3 class="page-title"> {{ $subTitle }} </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.products.create')}}">Add Product</a></li>
            <!-- <li class="breadcrumb-item active" aria-current="page">Basic tables</li> -->
        </ol>
        </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <!-- <h4 class="card-title">Striped Table</h4> -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> SKU </th>
                          <th> Name </th>
                          <th> Brand </th>
                          <th> Category </th>
                          <th> Price </th>
                          <th> Status </th>
                          <th> Actions </th>
                          <th> Product Images </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                                
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->brand->name }}</td>
                                        <td> 
                                            @foreach($product->categories as $category)
                                                <span class="badge badge-info">{{ $category->name }}</span>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                        {{ config('settings.currency_symbol') }}{{ $product->price }}
                                        </td>
                                        <td class="text-center">
                                            @if ($product->status == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Not Active</span>
                                            @endif
                                        </td>
                                       
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                               
                                            </div>
                                        </td>
                                        <td>
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.products.images', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            
                                        </div>
                                        </td>
                                    </tr>
                                
                            @endforeach

                      
                      </tbody>
                    </table>
                  </div>
                </div>
              <!-- </div> -->

@endsection     

