@extends('layouts.menu')

@section('title-head', 'homes')

@push('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.css') }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Home
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather='home'></i></a></li>
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body ecommerce-application">
          <div class="row list-view mt-1">
            @foreach ($data as $item)
            <div class="col-12 col-lg-12">
              <div class="card ecommerce-card">
                @php
                    $jml = $item->gambar->count();
                @endphp
                @if ($jml > 1)
                <div id="carousel-example-generic-{{$item->id}}" class="carousel slide card-body item-img border-0" data-ride="carousel">
                  <ol class="carousel-indicators">
                    @for ($i = 0 ; $i < $jml; $i++)
                      <li data-target="#carousel-example-generic-{{$item->id}}" data-slide-to="{{$i}}" class="{{ $i == 0 ? 'active':''}}"></li>
                    @endfor
                  </ol>
                  <div class="carousel-inner" role="listbox">
                      @foreach ($item->gambar as $dg)
                      <div class="carousel-item @if($loop->first) active @endif">
                          <img class="img-fluid rounded" src="{{asset($dg->file)}}" alt="First slide" />
                      </div>
                      @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#carousel-example-generic-{{$item->id}}" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carousel-example-generic-{{$item->id}}" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                  </a>
                </div>
                @else
                <div class="card-body item-img border-0">
                  <img class="img-fluid rounded" src="{{ asset($item->foto) }}" alt="img-placeholder" />
                </div>
                @endif
                <div class="card-body justify-content-center">
                    <h2 class="mb-1">{{ $item->nama }}</h2>
                    <p class="card-text text-justify" >{!!$item->desk!!}</p>
                </div>
                <div class="item-options text-center">
                    <a href="{{route('admin.home.edit',$item->id)}}" class="btn btn-outline-warning mt-1">
                        <i data-feather="edit" class="align-middle"></i> Edit
                    </a>
                    <form action="{{route('admin.home.delete')}}" onsubmit="return confirm('Lanjutkan proses hapus homes {{ $item->nama }}?')" method="post">
                      <input type="hidden" name="id" value="{{ $item->id }}">
                      <button type="submit" class="btn btn-outline-danger w-100 mt-50"><i data-feather="trash-2"></i> Hapus</button>
                      {{csrf_field()}}
                    </form>
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
