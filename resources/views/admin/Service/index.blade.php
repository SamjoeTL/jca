@extends('layouts.menu')

@section('title-head', 'Service')

@push('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.css') }}">
@endpush

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="breadcrumbs-top">
                <h2 class="content-header-title border-0 float-left mb-0">Service</h2>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 ">
            <a href="{{route('admin.service.create')}}" class="btn btn-danger"><i data-feather="plus"></i> Tambah
                service</a>
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
                                <a class="nav-link active" id="english{{$item->id}}-tab" data-toggle="tab" href="#english{{$item->id}}" role="tab" aria-selected="true">English</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="indonesia-tab{{$item->id}}" data-toggle="tab" href="#indonesia{{$item->id}}" role="tab" aria-selected="false">Indonesia</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-1">
                            <div class="tab-pane active" id="english{{$item->id}}" role="tabpanel">
                                <h2 class="mb-1">{{ $item->judul_en }}</h2>
                                <p class="card-text text-justify">{!!$item->desk_en!!}</p>
                            </div>
                            <div class="tab-pane" id="indonesia{{$item->id}}" role="tabpanel">
                                <h2 class="mb-1">{{ $item->judul }}</h2>
                                <p class="card-text text-justify">{!!$item->desk!!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="item-options text-center">
                        <a href="{{route('admin.service.edit',$item->id)}}" class="btn btn-outline-warning mt-1">
                            <i data-feather="edit" class="align-middle"></i> Edit
                        </a>
                        <form action="{{route('admin.service.delete')}}"
                            onsubmit="return confirm('Lanjutkan proses hapus services {{ $item->judul }}?')"
                            method="post">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-outline-danger w-100 mt-50"><i
                                    data-feather="trash-2"></i> Hapus</button>
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
