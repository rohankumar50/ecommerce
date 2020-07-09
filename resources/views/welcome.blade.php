@extends('layouts\frontend')
<!-- Styles -->

@section('admin_css')
<link rel="stylesheet" href="{{ asset('asset/css/frontcss.css') }}">
@endsection

@section('content')

@include('partials/navbar')
<main role="main">
  <section class="jumbotron text-center">
    <div class="container">
      <h1>Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </section>
  @if(session()->has('message'))
      <p class="alert alert-success">{{ session()->get('message') }}</p>
    @endif
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
      @foreach($product as $product)
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm" style="width: 20rem;">
            <img class="card-img-top" src="{{ url($product->thumbnail) }}">
            <div class="card-body">
              <h4 class="card-title">{!! $product->title !!}</h4>
              <p class="card-text">{!! Str::limit($product->description,30) !!}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ url('product/'.$product->id).'/'.$product->slug }}">View Product</a>
                  <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('addtocart',$product) }}">Add to cart</a>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
      @endforeach
</main>

<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="/docs/4.5/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>

@endsection
