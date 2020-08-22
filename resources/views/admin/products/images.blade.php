@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
@include('admin.partials.flash')

<div class="tab-pane" id="images">
    <div class="tile">
        <h3 class="tile-title">Upload Image</h3>
        <hr>
        <div class="tile-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.products.images.upload')}}" method="POST" enctype="multipart/form-data" >
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        {{ csrf_field() }}
                        <input type="file" name="image" required />
                        <button class="btn btn-success" type="submit">
                        <i class="fa fa-fw fa-lg fa-upload"></i>Upload Images
                    </button>
                    </form>
                </div>
            </div>
            @if ($product->images)
                <hr>
                <div class="row">
                    @foreach($product->images as $image)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('storage/'.$image->full) }}" id="brandLogo" class="img-fluid" alt="img">
                                    <a class="card-link float-right text-danger" href="{{ route('admin.products.images.delete', $image->id) }}">
                                        <i class="fa fa-fw fa-lg fa-trash"></i>Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>



@endsection   