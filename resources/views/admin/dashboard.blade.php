@extends('layouts.menu')

@section('title-head', 'Dashboard')

@push('vendor-css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/extensions/swiper.min.css')}}">
@endpush

@push('page-css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/extensions/ext-component-swiper.min.css')}}">
@endpush

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Dashboard</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Jembatan Cemerlang abadi</a></li>
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section id="component-swiper-multiple">
    <div class="card">
      <div class="card-body">
        <div class="swiper-multiple swiper-container">
          <div class="swiper-wrapper">
            @foreach ($abouts as $a)
            <div class="swiper-slide">
              <img class="img-fluid" src="{{asset($a->foto)}}" alt="banner" />
            </div>
            @endforeach
          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </section>

  <div class="row">
    <div class="col-md-6">
      <h4 class="mb-1">Produk</h4>
      <div class="row match-height">
        @foreach ($products as $p)
        <div class="col-md-4">
          <div class="card">
              <div class="card-body p-1 text-center">
                <img src="{{asset($p->gambar)}}" class="rounded img-fluid mb-1" alt="">
                  <h5 class="mb-25"></h5>
                  <small>{{$p->nama}}</small>
              </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-md-6">
      <h4 class="mb-1">Home</h4>
      <div class="row match-height">
        @foreach ($homes as $h)
        <div class="col-md-6">
          <div class="card shadow-none">
              <div class="card-body p-1">
                  {{-- <h4 class="card-title text-white">Success card title</h4> --}}
                  <img src="{{asset($h->cover)}}" class="rounded img-fluid mb-1" alt="">
                  <p class="card-text font-italic mb-50"> {{$h->nama}}</p>
                  <div class="d-flex justify-content-between">


                  </div>
              </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')

@endsection

@push('vendor-js')
<script src="{{asset('app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
@endpush

@push('page-js')
<script src="{{asset('app-assets/js/scripts/extensions/ext-component-swiper.min.js')}}"></script>
<script>
  $(document).ready(function() {
  });
</script>
@endpush
