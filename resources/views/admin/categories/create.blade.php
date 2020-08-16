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
            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index')}}">Go Back</a></li>
        </ol>
        </nav>
    </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{ route('admin.categories.store') }}" method="POST" role="form" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Category Name <span class="m-l-5 text-danger"> *</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="exampleInputName1" name="name" placeholder="Name">
                        @error('name') {{ $message }} @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="description">{{ old('description') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Parent Catogory <span class="m-l-5 text-danger"> *</label>
                        <select class="form-control  @error('parent_id') is-invalid @enderror" id="exampleSelectGender" name="parent_id">
                        <option value="0">Select a parent category</option>
                            @foreach($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                @endforeach
                        </select>
                        @error('parent_id') {{ $message }} @enderror
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                        <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="featured" name="featured">Featured Category </label>
                        </div>        
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                        <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="menu" name="menu">Show in Menu </label>
                        </div>        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Category Image</label>
                        <input type="file" class="form-control  @error('image') is-invalid @enderror" id="exampleInputCity1" name="image">
                        @error('image') {{ $message }} @enderror
                      </div>
                      
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <a class="btn btn-light" href="{{ route('admin.categories.index') }}">Cancel</a>
                    </form>
                  </div>
                </div>
            </div>

</div>
</div></div></div>
@endsection             
