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
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index')}}">Go Back</a></li>
        </ol>
        </nav>
    </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" action="{{ route('admin.products.store') }}" method="POST" role="form" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Name <span class="m-l-5 text-danger"> *</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="exampleInputName1" name="name" placeholder="Name" value="{{ old('name') }}">
                        @error('name') {{ $message }} @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Product Sku <span class="m-l-5 text-danger"> *</label>
                        <input type="text" class="form-control  @error('sku') is-invalid @enderror" id="exampleInputName1" name="sku" placeholder="Sku" value="{{ old('Sku') }}">
                        @error('sku') {{ $message }} @enderror
                      </div>
                      <div class="form-group">
                        <label class="control-label" for="brand_id">Brand</label>
                        <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                            <option value="0">Select a brand</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback active">
                            <i class="fa fa-exclamation-circle fa-fw"></i> @error('brand_id') <span>{{ $message }}</span> @enderror
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="categories">Categories</label>
                            <select name="categories[]" id="categories" class="form-control" multiple>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Price <span class="m-l-5 text-danger"> *</label>
                            <input type="text" class="form-control  @error('price') is-invalid @enderror" id="exampleInputName1" name="price" placeholder="Price" value="{{ old('price') }}">
                            @error('price') {{ $message }} @enderror
                      </div>

                      <div class="form-group">
                            <label for="exampleInputName1">Special Price <span class="m-l-5 text-danger"> *</label>
                            <input type="text" class="form-control  @error('special_price') is-invalid @enderror" id="exampleInputName1" name="special_price" placeholder="Special Price" value="{{ old('special_price') }}">
                            @error('special_price') {{ $message }} @enderror
                      </div>

                      <div class="form-group">
                            <label for="exampleInputName1">Quantity <span class="m-l-5 text-danger"> *</label>
                            <input type="text" class="form-control  @error('quantity') is-invalid @enderror" id="exampleInputName1" name="quantity" placeholder="Quantity" value="{{ old('quantity') }}">
                            @error('quantity') {{ $message }} @enderror
                      </div>

                      <div class="form-group">
                            <label for="exampleInputName1">Weight <span class="m-l-5 text-danger"> *</label>
                            <input type="text" class="form-control  @error('weight') is-invalid @enderror" id="exampleInputName1" name="weight" placeholder="Weight" value="{{ old('weight') }}">
                            @error('weight') {{ $message }} @enderror
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="description">Description</label>
                        <textarea name="description" id="description" rows="8" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input"
                                        type="checkbox"
                                        id="status"
                                        name="status"
                                    />Status
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input"
                                        type="checkbox"
                                        id="featured"
                                        name="featured"
                                    />Featured
                            </label>
                        </div>
                    </div>
                    </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    </form>
                  </div>
                </div>
            </div>

</div>
</div></div></div>
@endsection        