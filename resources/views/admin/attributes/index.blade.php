@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('admin.partials.flash')

<div class="page-header">
    <h3 class="page-title"> {{ $subTitle }} </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.attributes.create')}}">Add Attribute</a></li>
        
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
                <th> Code </th>
                <th> Name </th>
                <th> Frontend Type</th>
                <th> Filterable </th>
                <th> Required </th>
                <th> Actions </th>
            </tr>
            </thead>
            <tbody>
            @foreach($attributes as $attribute)
            <tr>
                <td>{{ $attribute->id }}</td>
                <td>{{ $attribute->code }}</td>
                <td>{{ $attribute->name }}</td>
                <td>{{ $attribute->frontend_type }}</td>
                <td class="text-center">
                    @if ($attribute->is_filterable == 1)
                        <span class="badge badge-success">Yes</span>
                    @else
                        <span class="badge badge-danger">No</span>
                    @endif
                </td>
                <td class="text-center">
                    @if ($attribute->is_required == 1)
                        <span class="badge badge-success">Yes</span>
                    @else
                        <span class="badge badge-danger">No</span>
                    @endif
                </td>
                <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Second group">
                        <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('admin.attributes.delete', $attribute->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach


            </tbody>
            </table>
        </div>
    </div>


@endsection     