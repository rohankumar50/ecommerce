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
                <h1 class="h2">Trash</h1>
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
                    {{ session('success',$errors->all()) }}
                </ul>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-sm table-bordered overflow-hidden">
                    <thead>
                        <tr> <th>#</th>
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
                                <a class="btn btn-warning btn-sm" href="#" onclick="restore('{{ $c->id }}')">Restore</a> | <a class="btn btn-danger btn-sm" href="#" onclick="confirmdelete('{{ $c->id }}')">Permanent Delete</a>
                                <form method="get" id="deletecat-{{ $c->id }}" action="{{ route('btn_delete',$c->id) }}">
                                    @csrf
                                </form>
                                <form method="get" id="restore-{{ $c->id }}" action="{{ route('btn_restore',$c->id) }}">
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
    function confirmdelete(id)
    {
        var choice = confirm("Are you sure you want to parmanent delete");
        if(choice){
                document.getElementById('deletecat-'+id).submit();
        }
    }
    function restore(id)
    {
        var choice = confirm("Are you sure you want to restore");
        if(choice){
                document.getElementById('restore-'+id).submit();
        }
    }
</script>

@endsection
