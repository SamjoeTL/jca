@extends('layouts.menu')

@section('title-head', 'Home')

@push('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.css') }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <div class="breadcrumbs-top">
                    <h2 class="content-header-title border-0 float-left mb-0">Home</h2>
                </div>
            </div>
        </div>
        <div class="content-body ecommerce-application">
          <div class="row list-view mt-1">
            @foreach ($data as $item)
            <div class="col-12 col-lg-12">
              <div class="card ecommerce-card">
                <div class="card-body item-img border-0">
                  <img class="img-fluid rounded" src="{{ asset($item->foto) }}" alt="img-placeholder" />
                </div>
                <div class="card-body justify-content-center">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="english-tab" data-toggle="tab" href="#english" role="tab" aria-selected="true">English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="indonesia-tab" data-toggle="tab" href="#indonesia" role="tab" aria-selected="false">Indonesia</a>
                    </li>
                  </ul>
                  <div class="tab-content mt-2">
                    <div class="tab-pane active" id="english" role="tabpanel">
                      <h2 class="mb-1">{{ $item->judul_en }}</h2>
                      @if($item->subjudul_en != null)
                        <h5>{{$item->subjudul_en}}</h5>
                      @endif
                      {!!$item->desk_en!!}
                    </div>
                    <div class="tab-pane" id="indonesia" role="tabpanel">
                      <h2 class="mb-1">{{ $item->judul }}</h2>
                      @if($item->subjudul != null)
                        <h5>{{$item->subjudul}}</h5>
                      @endif
                      {!!$item->desk!!}
                    </div>
                  </div>
                    
                </div>
                <div class="item-options text-center">
                    <a href="{{route('admin.home.edit',$item->id)}}" class="btn btn-outline-warning mt-1">
                        <i data-feather="edit" class="align-middle"></i> Edit
                    </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row">
            <div class="col-12">

            </div>
          </div>
        </div>

    </div>
@endsection
