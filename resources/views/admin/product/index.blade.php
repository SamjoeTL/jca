@extends('layouts.menu')

@section('title-head', 'Product')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Product</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Website Content</a></li>
                <li class="breadcrumb-item active">Product</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="content-body">
                    <div class="card">
                        <div class="card-header border-bottom p-1">
                            <div class="head-label">
                                <h4 class="card-title">Kategori</h4>
                            </div>
                            <div class="dt-action-buttons">
                                <div class="dt-buttons d-flex-row">
                                    <button class="btn btn-icon btn-success btn-sm" id="btntambahkategori" type="button" data-toggle="modal" data-target="#modalkategori" data-backdrop="static" data-keyboard="false"><i data-feather="plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-1">
                            <form action="{{ route('admin.product') }}" method="get">
                                <div class="d-flex">
                                    <input type="submit" name="kategori" value="semua" class="d-none">
                                    <a href="#" class="btn btn-block {{ request()->input('kategori') == 'semua' || request()->input('kategori') == '' ? 'btn-gradient-success' : 'btn-outline-success pilihKategori' }}">Semua ({{ $total }})</a>
                                </div>
                                @foreach ($kategori as $k)
                                <div class="d-flex mt-50">
                                    <input type="submit" name="kategori" value="{{ $k->nama }}" class="d-none">
                                    <a href="#" class="btn btn-block {{ request()->input('kategori') == $k->nama ? 'btn-gradient-success' : 'btn-outline-success pilihKategori' }}">{{ $k->nama }} ({{ $k->products_count }})</a>
                                    <button type="button" data-target="#modalkategori" name="button" data-toggle="modal" value="{{ $k->id }}" class="btn btn-sm btn-outline-warning btnubah"><i data-feather="edit"></i></button>
                                </div>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="card">
                    <div class="card-header border-bottom p-1">
                        <div class="head-label">
                            <h4 class="card-title">{{ $idkategori != null ? $idkategori->nama : 'Semua' }}</h4>
                        </div>
                        <div class="dt-action-buttons">
                            <div class="dt-buttons d-flex-row">
                                <a class="btn btn-sm btn-gradient-success" href="{{route('admin.product.create')}}"><i data-feather="plus-circle"></i> Tambah Produk</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row">
                        @foreach ($data2 as $d)
                            <div class="col-md-6 col-lg-4">
                                <div id="kerjasama" class="card border">
                                    <span class="btn btn-gradient-secondary btn-block" style="border-radius: 0.5rem 0.5rem 0 0; margin: 0;">{{ $d->kategori->nama }}</span>
                                        <img src="{{ asset($d->gambar) }}" class="img-fluid" alt="" />
                                    <div class="row">
                                        <div class="col-6 pr-0">
                                            <a href="{{route('admin.product.edit', $d->id)}}" class="btn btn-sm btn-block btn-warning waves-effect waves-float waves-light" style="border-radius: 0 0 0 0.5rem; margin: 0;"><i data-feather="edit"></i> Ubah</a>
                                        </div>
                                        <div class="col-6 pl-0">
                                            <form action="{{route('admin.product.delete')}}" onsubmit="return confirm('Lanjutkan proses hapus {{ $d->nama }}?')" method="post">
                                                <input type="hidden" name="id" value="{{$d->id}}">
                                                <button type="submit" class="btn btn-sm btn-block btn-danger" style="border-radius: 0 0 0.5rem 0; margin: 0;"><i data-feather="trash-2"></i> Hapus</button>
                                                {{csrf_field()}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                {{-- <nav aria-label="Page navigation">
                                    {{ $data->appends(request()->input())->links('pagination::admin-pagination') }}
                                </nav> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<div class="modal fade text-left" id="modalkategori" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="tittle-modal"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formkategori" action="#" method="post" enctype="multipart/form-data">
          <input type="hidden" id="id" name="id">
          <div class="modal-body">
            <div class="row">

              <div class="form-group col-md-12">
                <label class="col-sm-12 col-form-label"><b>Nama Kategori</b></label>
                <div class="col-sm-12">
                  <input type="text" id="nama" name="nama" class="form-control">
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Kembali</button>
          </div>
          @csrf
        </form>
      </div>
    </div>
</div>
@endsection


@push('page-js')
<script>
    $(document).ready(function () {
        $('.pilihKategori').click(function () {
            $(this).prev('input').click();
        });
    });
</script>

<script>
  $('#btntambahkategori').on('click', function () {
    $('#modalkategori #tittle-modal').text('TAMBAH KATEGORI')
    $('#formkategori').attr('action', '{{ route('admin.product.kategori.store') }}')
    $('#formkategori #nama').val('')
  });

  $('.btnubah').on('click', function () {
    $('#modalkategori #tittle-modal').text('UBAH KATEGORI')
    $('#formkategori').attr('action', '{{ route('admin.product.kategori.update') }}')
    id = $(this).val()
    $('#formkategori #id').val(id)
    $.get('/admin/Product/category/' + id, function(data) {
      $('#formkategori #nama').val(data.nama)
    })
  });
</script>
@endpush
