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
                    <form class="forms-sample" action="{{ route('admin.categories.update') }}" method="POST" role="form" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Category Name <span class="m-l-5 text-danger"> *</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="exampleInputName1" name="name" value="{{ old('name', $targetCategory->name) }}">
                        <input type="hidden" name="id" value="{{ $targetCategory->id }}">
                        @error('name') {{ $message }} @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="description">{{ old('description', $targetCategory->description) }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Parent Category <span class="m-l-5 text-danger"> *</label>
                        <select class="form-control  @error('parent_id') is-invalid @enderror" id="exampleSelectGender" name="parent_id">
                        <option value="0">Select a parent category</option>
                            @foreach($categories as $category)
                                @if ($targetCategory->parent_id == $category->id)
                                        <option value="{{ $category->id }}" selected> {{ $category->name }} </option>
                                    @else
                                        <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                    @endif
                                @endforeach
                        </select>
                        @error('parent_id') {{ $message }} @enderror
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                        <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="featured" name="featured"  {{ $targetCategory->featured == 1 ? 'checked' : '' }}>Featured Category </label>
                        </div>        
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                        <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="menu" name="menu" {{ $targetCategory->menu == 1 ? 'checked' : '' }}>Show in Menu </label>
                        </div>        
                      </div>
                      <div class="form-group">
                        <div class="row">
                                <div class="col-md-2">
                                    @if ($targetCategory->image != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset('storage/'.$targetCategory->image) }}" id="categoryImage" class="img-fluid" alt="img">
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                <label for="exampleInputCity1">Category Image</label>
                                <input type="file" class="form-control  @error('image') is-invalid @enderror" id="exampleInputCity1" name="image">
                                @error('image') {{ $message }} @enderror
                                </div>    
                        </div>  
                        
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
