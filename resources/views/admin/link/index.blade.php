@extends('layouts.menu')

@section('title-head', 'link')

@push('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/jquery.rateyo.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/plugins/extensions/ext-component-ratings.css') }}">
    <style>
        .w-50 {
            width: 40%;
        }
    </style>
@endpush

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-left mb-0">Drive</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Website Content</a></li>
                <li class="breadcrumb-item active">Drive</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                      <div class="dt-action-buttons text-right">
                        <div class="dt-buttons d-inline-flex">
                          <button class="btn btn-success btntambah" data-toggle="modal" data-target="#modal-link"><i data-feather="plus"></i> Tambah link</button>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <table class="table table-bordered table-hover" id="link">
                        <thead class="text-center">
                          <tr>
                            <th>Nama</th>
                            <th>Link</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody id="link-data">
                          <!-- Data akan dimuat di sini dengan AJAX -->
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<div class="modal fade text-left" id="modal-link" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tittlemodal"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="jquery-val-form" class="formlink" action="#" method="post">
        <input type="hidden" name="id" id="id">
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-6 col-12">
                <label class="col-form-label"><b>Nama</b></label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group col-md-12">
                <label class="col-form-label"><b>Link</b></label>
                <div class="form-label-group mb-0">
                    <textarea data-length="500" class="form-control char-textarea" rows="4" name="pesan" id="pesan"></textarea>
                </div>
                <small class="textarea-counter-value float-right"><span class="char-count">0</span> / 500 </small>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btn-submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
        </div>
        @csrf
      </form>
    </div>
  </div>
</div>
@endsection

@push('vendor-js')
    <script src="{{ asset('app-assets/vendors/js/extensions/jquery.rateyo.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/extensions/ext-component-ratings.js')}}"></script>
@endpush

@push('page-js')
<script>
  $(document).ready(function() {

    function loadLinkData() {
        $.ajax({
            url: '{!! route('admin.Link.dt') !!}',
            method: 'GET',
            success: function(data) {
                $('#link-data').empty();
                data.forEach(function(link) {
                    $('#link-data').append(`
                        <tr>
                            <td>${link.nama}</td>
                            <td>${link.pesan}</td>
                            <td class="text-center">
                                <button type="button" value="${link.id}" class="btn btn-sm btn-outline-warning btnubah" data-toggle="modal" data-target="#modal-link"><i data-feather="edit"></i> Ubah</button>
                                <form class="d-inline btnhapus" action="{{ route('admin.link.delete') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="${link.id}">
                                    <button type="submit" class="btn btn-sm btn-outline-danger"><i data-feather="trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    `);
                });
                feather.replace();
            }
        });
    }

    loadLinkData();

    $('.btntambah').on('click', function() {
        $('#tittlemodal').text('TAMBAH LINK');
        $('.formlink').attr('action', '{{ route('admin.link.store') }}');
        $('#nama').val('');
        $('#pesan').val('');
    });


    $('#link-data').on('click', '.btnubah', function() {
        $('#tittlemodal').text('UBAH LINK');
        $('.formlink').attr('action', '{{ route('admin.link.update') }}');
        var id = $(this).val();


        $.ajax({
            url: `/admin/link/${id}/edit`,
            method: 'GET',
            success: function(data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#pesan').val(data.pesan);
            }
        });
    });


    $('#link-data').on('click', '.btnhapus', function(event) {
        var linkName = $(this).closest('tr').find('td:first').text();
        if (!confirm(`Lanjutkan proses hapus Link dari ${linkName}?`)) {
            event.preventDefault();
        }
    });
  });
</script>
@endpush
