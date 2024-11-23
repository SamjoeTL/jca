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
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Product
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather='home'></i></a></li>
                                <li class="breadcrumb-item active">Product</li>
                            </ol>
                        </div>
                    </div>
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
                <h2 class="mb-50">{{ $item->nama_en }}</h2>
                {!!$item->desk_en!!}
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
