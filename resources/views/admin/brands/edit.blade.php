@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('admin.partials.flash')

<div class="container-fluid page-body-wrapper">
<div class="main-panel">
    <div class="page-header">
        <h3 class="page-title"> {{ $subTitle }} </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.brands.index')}}">Go Back</a></li>
        </ol>
        </nav>
    </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <form class="forms-sample" action="{{ route('admin.brands.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="exampleInputName1">Name </label>
                    <input type="text" placeholder="Enter Brand name" value="{{ old('name', $brand->name) }}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputName1" name="name" required>
                    @error('name') {{ $message }} @enderror
                    </div>

                    <div class="row">
                    
                        @if ($brand->logo != null)
                        <div class="col-md-2">
                            <figure class="mt-2" style="width: 80px; height: auto;">
                                <img src="{{ asset('storage/'.$brand->logo) }}" id="categoryImage" class="img-fluid" alt="img" name="logo">
                            </figure>
                            </div>
                        @endif
                    
                    <div class="col-md-10">
                    <label for="exampleInputCity1">Brand Logo</label>
                    <input type="file" class="form-control  @error('logo') is-invalid @enderror" id="exampleInputCity1" name="logo">
                    @error('logo') {{ $message }} @enderror
                    </div>    
                        </div>



                    <input type="hidden" value="{{ $brand->id }}" name="id"/>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Save Brand</button>
                    <a class="btn btn-light" href="{{ route('admin.brands.index') }}">Cancel</a>
                </form>
                </div>
            </div>
        </div>

</div>
</div></div></div>
@endsection             
