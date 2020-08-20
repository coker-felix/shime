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
            <li class="breadcrumb-item"><a href="{{ route('admin.attributes.index')}}">Go Back</a></li>
        </ol>
        </nav>
    </div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <form class="forms-sample" action="{{ route('admin.attributes.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="exampleInputName1">Code <span class="m-l-5 text-danger"> *</label>
                    <input type="text" placeholder="Enter attribute code" value="{{ old('code') }}" class="form-control  @error('code') is-invalid @enderror" id="exampleInputName1" name="code" required>
                    @error('code') {{ $message }} @enderror
                    </div>
                    <div class="form-group">
                    <label for="exampleInputName1">Name <span class="m-l-5 text-danger"> *</label>
                    <input type="text" placeholder="Enter attribute name" value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror" id="exampleInputName1" name="name" required>
                    @error('name') {{ $message }} @enderror
                    </div>

                    <div class="form-group">
                    <label for="exampleInputName1">Frontend Type <span class="m-l-5 text-danger"> *</label>
                    @php $types = ['select' => 'Select Box', 'radio' => 'Radio Button', 'text' => 'Text Field', 'text_area' => 'Text Area']; @endphp
                    <select name="frontend_type" id="frontend_type" class="form-control" required> 
                        @foreach($types as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    
                    </div>
                    <div class="form-group">
                    <div class="form-check">
                    <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="is_filterable" name="is_filterable">Filterable </label>
                    </div>        
                    </div>
                    <div class="form-group">
                    <div class="form-check">
                    <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="is_required" name="is_required">Required </label>
                    </div>        
                    </div>

                    
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="{{ route('admin.attributes.index') }}">Cancel</a>
                </form>
                </div>
            </div>
        </div>

</div>
</div></div></div>
@endsection             
