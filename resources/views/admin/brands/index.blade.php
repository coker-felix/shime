@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('admin.partials.flash')

<div class="page-header">
    <h3 class="page-title"> {{ $subTitle }} </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.brands.create')}}">Add Brand</a></li>
        
    </ol>
    </nav>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th> # </th>
                <th> Name </th>
                <th> Slug </th>
                <th> Logo </th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
            @foreach($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->slug }}</td>
                <td><img src="{{ asset('storage/'.$brand->logo) }}" id="categoryImage" class="img-fluid" alt="img"></td>
                <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Second group">
                        <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('admin.brands.delete', $brand->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach


            </tbody>
            </table>
        </div>
    </div>


@endsection     