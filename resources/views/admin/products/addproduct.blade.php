@include('partials/navbar')
@include('partials/sidebar')

@extends('layouts/app')
@section('admin_css')
<link rel="stylesheet" href="{{ asset('asset/css/admin.css') }}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 ">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
            <h1 class="h2">Add Products</h1>
            @foreach($errors->all() as $message)
            <div class="alert alert-danger">
                <li>
                    {{ $message }}
                </li>
            </div>
            @endforeach
            <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <p class="form-text text-muted">http://localhost/myecommerce/<span id="url"></span></p>
                        <input type="hidden" id="slug" name="slug" value="">
                        <div class="form-group">
                            <label for="createdescription">Description</label>
                            <textarea class="form-control" id="editor" name="description"></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>Price</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="0" name="price">
                                </div>
                            </div>
                            <div class="col">
                                <p>Discount</p>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="0" name="discount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col">
                        <div class="card m-2">
                            <div class="card-header bg-primary text-white text-bold">
                                Select Featured Image
                            </div>
                            <div class="card-body">
                                <select class="custom-select" name="status">
                                    <option value="1" selected>Pending</option>
                                    <option value="2">Publish</option>
                                </select>
                            </div>
                        </div>
                        <div class="card m-2">
                            <div class="card-header bg-primary text-white text-bold">
                                Select Featured Image
                            </div>
                            <div class="card-body">
                                <img id="blah" alt="your image"
                                    src="{{ asset('/asset/images/laptopuser.png') }} " width="100"
                                    height="100"><br>
                                <input class="mt-3" type="file" name="thumbnail"
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div class="card-footer">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                        <input type="checkbox" aria-label="Checkbox for following text input" name="featured" value="on">
                                      </div>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Text input with checkbox"  placeholder="Featured Product">
                                </div>
                            </div>
                        </div>
                        <div class="card m-2">
                            <div class="card-header bg-primary text-white text-bold">
                                Select Category
                            </div>
                            <div class="card-body">
                                <select class="js-example-basic-multiple container-fluid" name="category_id[]" id="category_id"
                                    multiple="multiple">
                                    <option value="">Parent</option>
                                    @foreach($categories as $d)
                                        <option value="{{ $d->id }}">{{ $d->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </main>
    </div>
</div>
</main>
</div>
</div>

<script>
    $(document).ready(function () {
        $("#title").keyup(function () {
            var val = $("#title").val()
            var dataval = val.replace(/\s+/g, '-') //replace space with -
                .replace(/[^\w\-]+/g, '') //remove all non word character
                .replace(/\-\-+/g, '-') //remove multiple - with -
                .replace(/^-+/, '') //trim - from start of txt
                .replace(/-+$/, ''); //trim . - . from end of text
            $("#url").text(dataval);
            $("#slug").val(dataval);
        });
    });



    $('selectpicker').selectpicker();

    feather.replace()

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>


@endsection
