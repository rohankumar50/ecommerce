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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center border-bottom mb-3">
                <h1 class="h2">Dashboard</h1>
                {{-- <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary mr-2">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                    <a class="btn btn-primary" href="{{ url('admin/categorybtn') }}" role="button">Add Categories</a>
                </div> --}}
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
            @if (Session::has('success'))
            <div class="alert alert-danger">
                <ul>
                    {{ session('success') }}
                </ul>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-sm table-bordered overflow-hidden">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Slug</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Featured</th>
                            <th>Thumbnail</th>
                            <th>Categories</th>
                            <th>Date Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    @foreach($cat as $c)
                    <tbody>
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->title }}</td>
                            <td>{{ $c->description }}</td>
                            <td>{{ $c->slug }}</td>
                            <td>{{ $c->price }}</td>
                            <td>{{ $c->discount }}</td>
                            <td>{{ $c->featured }}</td>
                            <td><img src="{{ url($c->thumbnail) }}" width="100"></td>
                            <td>
                                @if($c->category())
                                    @foreach ($c->category as $child)
                                        {{ $child->title }},
                                    @endforeach
                                @else
                                    <strong>{{ "Parent" }}</strong>
                                @endif
                            </td>
                            <td>{{ $c->created_at }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('category.edit',$c->id) }}">Edit</a> | <a class="btn btn-warning btn-sm" href="#" onclick="trashdelete('{{ $c->id }}')">Trash</a>
                                <form method="POST" id="deletecat-{{ $c->id }}" action="{{ route('btn_trashproduct',$c->id) }}">
                                    @csrf
                                </form>
                                <form method="get" id="trashcat-{{ $c->id }}" action="{{ route('btn_trashproduct',$c->id) }}">
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col-md-9">
                        {{ $cat->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    function trashdelete(id)
    {
        var choice = confirm("Are you sure you want to delete");
        if(choice){
                document.getElementById('trashcat-'+id).submit();
        }
    }
</script>

@endsection
