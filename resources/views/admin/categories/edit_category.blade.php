@include('partials/navbar')
@include('partials/sidebar')

@extends('layouts/app')
@section('admin_css')
<link rel="stylesheet" href="{{ asset('asset/css/admin.css') }}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Session::has('success'))
        <div class="alert alert-danger">
            <ul>
                "Success" {{ session('success') }}
            </ul>
        </div>
        @endif
        <h1 class="h2">Edit Category</h1>
        <div class="border-bottom mb-3"></div>
        <form method="post"
        action="@if(isset($category)){{ url('admin/category',$category->id)}}
                @else
                    {{ url('admin.category.store') }}
                @endif">
            {{ csrf_field() }}
            @if(isset($category))
                @method('put')
            @endif
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}" aria-describedby="emailHelp">
              <p class="form-text text-muted">http://localhost/myecommerce/<span id="url">{{ $category->slug }}</span></p>
              <input type="hidden" id="slug" name="slug" value="{{ $category->slug }}">
            </div>
            <div class="form-group">
                <label for="createdescription">Description</label>
                <textarea class="form-control" id="editor" name="description">{!! $category->description !!}</textarea>
            </div>
            <div class="form-group">
                @php
                $ids=Arr::pluck($category->children, 'id')
                @endphp
                <label for="exampleFormControlTextarea1">Select Category</label>
                <select class="js-example-basic-multiple container-fluid" name="parent_id[]" id="parent_id" multiple="multiple">
                    {{-- @foreach($categories as $d)
                        <option value="{{ $d->id }}" selected>{{ $d->title }}</option>
                    @endforeach --}}
                    @if(isset($category))
                        @foreach($categories as $d)
                            <option value="{{ $d->id }}">{{ $d->title }}</option>
                        @endforeach
                    @else

                    @endif
                </select>
            </div>
            <div class="form-group">
                <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </main>
    </div>
</div>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ))
        .catch( error => {
            console.error( error );
        } );

        $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
        });
</script>

<script>
    // $('#title').keyup(function(){
    //     var str=$(this).val();
    //     var trims=$.trim(str);
    // })

    $(document).ready(function(){
        $("#title").keyup(function(){
            var val = $("#title").val()
            var dataval = val.replace(/\s+/g,'-')  //replace space with -
            .replace(/[^\w\-]+/g,'')    //remove all non word character
            .replace(/\-\-+/g,'-')      //remove multiple - with -
            .replace(/^-+/,'')          //trim - from start of txt
            .replace(/-+$/,'');         //trim . - . from end of text
            $("#url").text(dataval);
            $("#slug").val(dataval);
        });
    });
  </script>
@endsection
