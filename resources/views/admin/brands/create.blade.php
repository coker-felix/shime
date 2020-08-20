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
                <form class="forms-sample" action="{{ route('admin.brands.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="exampleInputName1">Name </label>
                    <input type="text" placeholder="Enter Brand name" value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputName1" name="name" required>
                    @error('name') {{ $message }} @enderror
                    </div>

                    <div class="form-group">
                    <label for="exampleInputName1">Brand Logo </label>
                    <input type="file" placeholder="Enter Brand logo" value="{{ old('logo') }}" class="form-control  @error('logo') is-invalid @enderror" id="exampleInputName1" name="logo" required>
                    @error('logo') {{ $message }} @enderror
                    </div>



                    
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="{{ route('admin.brands.index') }}">Cancel</a>
                </form>
                </div>
            </div>
        </div>

</div>
</div></div></div>
@endsection             
