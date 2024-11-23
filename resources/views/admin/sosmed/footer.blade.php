@extends('layouts.menu')

@section('title-head', 'Sosial Media')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Sosial Media
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i data-feather='home'></i></a></li>
                                <li class="breadcrumb-item active">Sosial Media</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card">
          <div class="card-header border-bottom py-1">
            <div class="head-label">
                <h4 class="card-title">Sosial Media</h4>
              </div>
          </div>
          <div class="card-body pt-1">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <td>
                    @php
                        $facebook = $sosmed->where('jenis',1)->first();
                    @endphp
                    <div class="user-info-title">
                      <i data-feather='facebook' class="mr-1"></i>
                      <span class="card-text user-info-title font-weight-bold mb-0">Facebook</span>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      @if ($facebook != null)
                        <span class="card-text user-info-title font-weight-bold mb-0 mr-1">{{$facebook->nama}}</span>
                        <a class="btn btn-sm btn-outline-info" href="{{$facebook->link}}" target="_blank"><i data-feather='link'></i> Link</a>
                      @else
                      <span class="card-text user-info-title font-weight-bold mb-0 mr-1">-</span>
                      @endif
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center justify-content-end ml-1" style="white-space: nowrap;">
                      @if ($facebook != null)
                      <button type="button" value="{{$facebook->id}}" class="btn btn-sm btn-outline-success mr-1 btneditsosmed" data-toggle="modal" data-target="#modalsosmed" data-backdrop="static" data-keyboard="false"><i data-feather='edit'></i> Edit</button>
                      <form class="d-inline" action="{{route('admin.deletesosmed')}}" onsubmit="return confirm('Lanjutkan proses hapus sosmed facebook?')" method="post">
                        <input type="hidden" name="id" value='{{$facebook->id}}'>
                        <input type="hidden" name="jenis" value='{{$facebook->jenis}}'>
                        <button type="submit" class="btn btn-sm btn-outline-danger waves-effect waves-float waves-light" name="button" title="Hapus"><i data-feather="trash-2"></i> Hapus</button>
                        @csrf
                      </form>
                      @else
                      <button type="button" value="1" class="btn btn-sm btn-outline-success mr-1 btntambahsosmed" data-toggle="modal" data-target="#modalsosmed" data-backdrop="static" data-keyboard="false"><i data-feather='plus-circle'></i> Tambah Akun</button>
                      @endif
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    @php
                        $whatsapp = $sosmed->where('jenis',2)->first();
                    @endphp
                    <div class="user-info-title">
                      <i data-feather='phone' class="mr-1"></i>
                      <span class="card-text user-info-title font-weight-bold mb-0">Whatsapp</span>
                    </div>
                  </td>
                  <td>
                    @if ($whatsapp != null)
                    <div class="d-flex align-items-center">
                      <span class="card-text user-info-title font-weight-bold mb-0 mr-1">{{$whatsapp->nama}}</span>
                      <a class="btn btn-sm btn-outline-info" href="{{$whatsapp->link}}" target="_blank"><i data-feather='link'></i> Link</a>
                    </div>
                    @else
                    <span class="card-text user-info-title font-weight-bold mb-0 mr-1">-</span>
                    @endif
                  </td>
                  <td>
                    <div class="d-flex align-items-center justify-content-end ml-1" style="white-space: nowrap;">
                      @if ($whatsapp != null)
                      <button type="button" value="{{$whatsapp->id}}" class="btn btn-sm btn-outline-success mr-1 btneditsosmed" data-toggle="modal" data-target="#modalsosmed" data-backdrop="static" data-keyboard="false"><i data-feather='edit'></i> Edit</button>
                      <form class="d-inline" action="{{route('admin.deletesosmed')}}" onsubmit="return confirm('Lanjutkan proses hapus whatsapp?')" method="post">
                        <input type="hidden" name="id" value='{{$whatsapp->id}}'>
                        <input type="hidden" name="jenis" value='{{$whatsapp->jenis}}'>
                        <button type="submit" class="btn btn-sm btn-outline-danger waves-effect waves-float waves-light" name="button" title="Hapus"><i data-feather="trash-2"></i> Hapus</button>
                        @csrf
                      </form>
                      @else
                      <button type="button" value="2" class="btn btn-sm btn-outline-success mr-1 btntambahsosmed" data-toggle="modal" data-target="#modalsosmed" data-backdrop="static" data-keyboard="false"><i data-feather='plus-circle'></i> Tambah Akun</button>
                      @endif
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    @php
                        $instagram = $sosmed->where('jenis',3)->first();
                    @endphp
                    <div class="user-info-title">
                      <i data-feather='instagram' class="mr-1"></i>
                      <span class="card-text user-info-title font-weight-bold mb-0">Instagram</span>
                    </div>
                  </td>
                  <td>
                    @if ($instagram != null)
                    <div class="d-flex align-items-center">
                      <span class="card-text user-info-title font-weight-bold mb-0 mr-1">{{$instagram->nama}}</span>
                      <a class="btn btn-sm btn-outline-info" href="{{$instagram->link}}" target="_blank"><i data-feather='link'></i> Link</a>
                    </div>
                    @else
                    <span class="card-text user-info-title font-weight-bold mb-0 mr-1">-</span>
                    @endif
                  </td>
                  <td>
                    <div class="d-flex align-items-center justify-content-end ml-1" style="white-space: nowrap;">
                      @if ($instagram != null)
                      <button type="button" value="{{$instagram->id}}" class="btn btn-sm btn-outline-success mr-1 btneditsosmed" data-toggle="modal" data-target="#modalsosmed" data-backdrop="static" data-keyboard="false"><i data-feather='edit'></i> Edit</button>
                      <form class="d-inline" action="{{route('admin.deletesosmed')}}" onsubmit="return confirm('Lanjutkan proses hapus instagram?')" method="post">
                        <input type="hidden" name="id" value='{{$instagram->id}}'>
                        <input type="hidden" name="jenis" value='{{$instagram->jenis}}'>
                        <button type="submit" class="btn btn-sm btn-outline-danger waves-effect waves-float waves-light" name="button" title="Hapus"><i data-feather="trash-2"></i> Hapus</button>
                        @csrf
                      </form>
                      @else
                      <button type="button" value="3" class="btn btn-sm btn-outline-success mr-1 btntambahsosmed" data-toggle="modal" data-target="#modalsosmed" data-backdrop="static" data-keyboard="false"><i data-feather='plus-circle'></i> Tambah Akun</button>
                      @endif
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    @php
                        $youtube = $sosmed->where('jenis',4)->first();
                    @endphp
                    <div class="user-info-title">
                      <i data-feather='youtube' class="mr-1"></i>
                      <span class="card-text user-info-title font-weight-bold mb-0">Youtube</span>
                    </div>
                  </td>
                  <td>
                    @if ($youtube != null)
                    <div class="d-flex align-items-center">
                      <span class="card-text user-info-title font-weight-bold mb-0 mr-1">{{$youtube->nama}}</span>
                      <a class="btn btn-sm btn-outline-info" href="{{$youtube->link}}" target="_blank"><i data-feather='link'></i> Link</a>
                    </div>
                    @else
                    <span class="card-text user-info-title font-weight-bold mb-0 mr-1">-</span>
                    @endif
                  </td>
                  <td>
                    <div class="d-flex align-items-center justify-content-end ml-1" style="white-space: nowrap;">
                      @if ($youtube != null)
                      <button type="button" value="{{$youtube->id}}" class="btn btn-sm btn-outline-success mr-1 btneditsosmed" data-toggle="modal" data-target="#modalsosmed" data-backdrop="static" data-keyboard="false"><i data-feather='edit'></i> Edit</button>
                      <form class="d-inline" action="{{route('admin.deletesosmed')}}" onsubmit="return confirm('Lanjutkan proses hapus youtube?')" method="post">
                        <input type="hidden" name="id" value='{{$youtube->id}}'>
                        <input type="hidden" name="jenis" value='{{$youtube->jenis}}'>
                        <button type="submit" class="btn btn-sm btn-outline-danger waves-effect waves-float waves-light" name="button" title="Hapus"><i data-feather="trash-2"></i> Hapus</button>
                        @csrf
                      </form>
                      @else
                      <button type="button" value="4" class="btn btn-sm btn-outline-success mr-1 btntambahsosmed" data-toggle="modal" data-target="#modalsosmed" data-backdrop="static" data-keyboard="false"><i data-feather='plus-circle'></i> Tambah Akun</button>
                      @endif
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <hr class="m-0">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')

<div class="modal fade text-left" id="modalsosmed" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tittlemodalsosmed"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="jquery-val-form" class="formsosmed" action="#" method="post">
        <input type="hidden" name="id" id="id">
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-12">
                <label class="col-form-label"><b>Jenis Sosmed</b></label>
                <input type="hidden" id="jenis" name="jenis" class="form-control">
                <input type="text" id="jenisnama" class="form-control" readonly>
            </div>

            <div class="form-group col-md-12">
              <label class="col-form-label"><b class="linklabel"></b></label>
              <input type="text" id="link" name="link" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group col-md-12">
              <label class="col-form-label"><b class="linknama"></b></label>
              <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btn-submit" class="btn btn-sm btn-success">Simpan</button>
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Kembali</button>
        </div>
        @csrf
      </form>
    </div>
  </div>
</div>

@endsection

@section('page-js')
<script>
  $(document).ready(function() {
    $('.btntambahsosmed').on('click', function() {
      $('.formsosmed').attr('action', '{{route('admin.storesosmed')}}')
      var jenis = $(this).val()
      $('.formsosmed #jenis').val(jenis)
      $('.formsosmed #link').val('')
      $('.formsosmed #nama').val('')
      if (jenis == 1) {
        $('#tittlemodalsosmed').text('FACEBOOK')
        $('.formsosmed #jenisnama').val('Facebook')
        $('.formsosmed .linklabel').text('Link Facebook')
        $('.formsosmed .linknama').text('Akun Facebook')
      } else if (jenis == 2) {
        $('#tittlemodalsosmed').text('WHATSAPP')
        $('.formsosmed #jenisnama').val('Whatsapp')
        $('.formsosmed .linklabel').text('Link WhatsApp')
        $('.formsosmed .linknama').text('Nomor WhatsApp')
      } else if (jenis == 3) {
        $('#tittlemodalsosmed').text('INSTAGRAM')
        $('.formsosmed #jenisnama').val('Instagram')
        $('.formsosmed .linklabel').text('Link Instagram')
        $('.formsosmed .linknama').text('Akun Instagram')
      } else if (jenis == 4) {
        $('#tittlemodalsosmed').text('YOUTUBE')
        $('.formsosmed #jenisnama').val('Youtube')
        $('.formsosmed .linklabel').text('Link Youtube')
        $('.formsosmed .linknama').text('Akun Youtube')
      }
    });

    $('.btneditsosmed').on('click', function() {
      $('.formsosmed').attr('action', '{{route('admin.updatesosmed')}}')
      var id = $(this).val()
      $('.formsosmed #id').val(id);
      $.get('/admin/sosmed/getsosmed/'+id, function(data){
        if (data.jenis == 1) {
          $('#tittlemodalsosmed').text('FACEBOOK')
          $('.formsosmed #jenisnama').val('Facebook')
          $('.formsosmed .linklabel').text('Link Facebook')
          $('.formsosmed .linknama').text('Akun Facebook')
        } else if (data.jenis == 2) {
          $('#tittlemodalsosmed').text('WHATSAPP')
          $('.formsosmed #jenisnama').val('Whatsapp')
          $('.formsosmed .linklabel').text('Link WhatsApp')
          $('.formsosmed .linknama').text('Nomor WhatsApp')
        } else if (data.jenis == 3) {
          $('#tittlemodalsosmed').text('INSTAGRAM')
          $('.formsosmed #jenisnama').val('Instagram')
          $('.formsosmed .linklabel').text('Link Instagram')
          $('.formsosmed .linknama').text('Akun Instagram')
        } else if (data.jenis == 4) {
          $('#tittlemodalsosmed').text('YOUTUBE')
          $('.formsosmed #jenisnama').val('Youtube')
          $('.formsosmed .linklabel').text('Link Youtube')
          $('.formsosmed .linknama').text('Akun Youtube')
        }
        $('.formsosmed #jenis').val(data.jenis)
        $('.formsosmed #link').val(data.link)
        $('.formsosmed #nama').val(data.nama)
      });
    });
  });
</script>
@stop
