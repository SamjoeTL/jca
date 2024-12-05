@extends('layouts.menu')

@section('title-head', 'Product')

@push('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.css') }}">
<link rel="stylesheet" href="{{ asset('app-assets/plugins/fancybox/jquery.fancybox.min.css') }}">
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="breadcrumbs-top">
                    <h2 class="content-header-title border-0 float-left mb-0">Product</h2>
                    
                </div>
            </div>
      <div class="content-header-right text-md-right col-md-3 ">
        <a href="{{route('admin.product.create')}}" class="btn btn-danger"><i data-feather="plus"></i> Tambah Product</a>
      </div>
    </div>

    <div class="content-body ecommerce-application">
      <div class="row list-view mt-1">
        @foreach ($data as $item)
        <div class="col-12 col-lg-12">
          <div class="card ecommerce-card">
            <div class="card-body item-img border-0">
              <img class="img-fluid rounded" src="{{ asset($item->gambar) }}" alt="img-placeholder" />
            </div>
            <div class="card-body d-block">
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
                  <h2 class="mb-50">{{ $item->nama_en }}</h2>
                  {!!$item->desk_en!!}
                </div>
                <div class="tab-pane" id="indonesia{{$item->id}}" role="tabpanel">
                  <h2 class="mb-50">{{ $item->nama }}</h2>
                  {!!$item->desk!!}
                </div>
              </div>

            </div>
            <div class="item-options text-center">
                <a href="{{asset($item->file)}}" class="lightbox-image btn btn-outline-info">
                    <i data-feather="file-text"></i> File Catalog
                </a>
                <a href="{{route('admin.product.edit',$item->id)}}" class="btn btn-outline-warning mt-1">
                    <i data-feather="edit"></i> Edit
                </a>
                <form action="{{route('admin.product.delete')}}" onsubmit="return confirm('Lanjutkan proses hapus product {{ $item->judul }}?')" method="post">
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  <button type="submit" class="btn btn-outline-danger w-100 mt-1"><i data-feather="trash-2"></i> Hapus</button>
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

@section('modal')

@endsection


@push('page-js')
<script src="{{ asset('app-assets/plugins/fancybox/jquery.fancybox.js') }}"></script>
<script>
    $('.lightbox-image').fancybox({
        openEffect  : 'fade',
        closeEffect : 'fade',
        helpers : {
            media : {}
        }
    });
</script>
@endpush
