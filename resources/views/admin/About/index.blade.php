@extends('layouts.menu')

@section('title-head', 'About')

@push('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.css') }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">About
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather='home'></i></a></li>
                                <li class="breadcrumb-item active">About</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
      <div class="content-header-right text-md-right col-md-3 ">
        <a href="{{route('admin.about.create')}}" class="btn btn-danger"><i data-feather="plus"></i> Tambah About</a>
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
                <h2 class="mb-1">{{ $item->judul }}</h2>
                @if($item->subjudul != null)
                <h5>{{$item->subjudul}}</h5>
                @endif
                <p class="card-text text-justify" >{!!$item->desk!!}</p>
            </div>
            <div class="item-options text-center">
                <a href="{{route('admin.about.edit',$item->id)}}" class="btn btn-outline-warning mt-1">
                    <i data-feather="edit" class="align-middle"></i> Edit
                </a>
                <form action="{{route('admin.about.delete')}}" onsubmit="return confirm('Lanjutkan proses hapus abouts {{ $item->judul }}?')" method="post">
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  <button type="submit" class="btn btn-outline-danger w-100 mt-50"><i data-feather="trash-2"></i> Hapus</button>
                  {{csrf_field()}}
                </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

</div>
@endsection
