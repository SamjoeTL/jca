@extends('layouts.menu')

@section('title-head', 'Home')

@push('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-quill-editor.css') }}">
@endpush

@push('page-css')
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/cropper/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/filepond/filepond-plugin-image-preview.min.css') }}">

    <style>
        /* image uploader */
        .photo-crop-container {
            position: relative;
        }

        .photo-crop-container:before {
            content: '';
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            position: absolute;
            height: 0px;
            width: 100%;
            z-index: 9;
            background-color: #f5f5f5;
            vertical-align: middle;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            opacity: 0;
            top: 80px;
            -webkit-transition: all linear 0.3s 0.1s;
            -o-transition: all linear 0.3s 0.1s;
            transition: all linear 0.3s 0.1s;
        }

        .photo-crop-container.show-loader:before {
            content: 'Cropping...';
            opacity: 1;
            height: calc(100% - 80px);
        }

        .photo-crop-container {
            position: relative;
            overflow: hidden;
        }

        .photo-crop-container img {
            display: block;
            max-width: 100%;
            width: 100%;
            height: 100%;
        }

        .photo-crop-container .crop-preview-cont {
            overflow: hidden;
            -webkit-transition: all linear 0.2s;
            -o-transition: all linear 0.2s;
            transition: all linear 0.2s;
            -webkit-transform: translateY(0%);
            -ms-transform: translateY(0%);
            transform: translateY(0%);
            opacity: 1;
            height: 100%;
            display: none;
        }

        .photo-crop-container .crop-preview-cont #crop_img {
            position: relative;
            margin-top: 10px;
            float: right;
            bottom: 0;
            z-index: 1;
            color: #fff;
            text-decoration: underline;
            right: 0;
            cursor: pointer;
            background-color: rgba(0, 0, 0, 0.30196078431372547);
            padding: 2px 10px;
        }

        .photo-crop-container.show-result .crop-preview-cont .img_container {
            max-width: 400px;
        }

        .photo-crop-container.show-result .crop-preview-cont {
            -webkit-transform: translateY(10%);
            -ms-transform: translateY(10%);
            transform: translateY(10%);
            opacity: 0;
            height: 0;
        }

        .photo-crop-container #user_cropped_img {
            -webkit-transition: all linear 0.2s 2s;
            -o-transition: all linear 0.2s 2s;
            transition: all linear 0.2s 2s;
            -webkit-transform: translateY(-10%);
            -ms-transform: translateY(-10%);
            transform: translateY(-10%);
            opacity: 0;
            position: absolute;
        }

        .photo-crop-container.show-result #user_cropped_img {
            -webkit-transform: translateY(0%);
            -ms-transform: translateY(0%);
            transform: translateY(0%);
            opacity: 1;
            position: relative;
        }

        .photo-crop-container #user_cropped_img img {
            max-width: 300px;
        }

        .photo-crop-container #user_cropped_img img {
            -webkit-transition: all cubic-bezier(0.22, 0.61, 0.36, 1) 0.2s 2.3s;
            -o-transition: all cubic-bezier(0.22, 0.61, 0.36, 1) 0.2s 2.3s;
            transition: all cubic-bezier(0.22, 0.61, 0.36, 1) 0.2s 2.3s;
            -webkit-transform: translateY(-10%);
            -ms-transform: translateY(-10%);
            transform: translateY(-10%);
            opacity: 0;
            scroll-behavior: smooth;
        }

        .photo-crop-container.show-result #user_cropped_img img {
            -webkit-transform: translateY(0%);
            -ms-transform: translateY(0%);
            transform: translateY(0%);
            opacity: 1;
        }

        @media only screen and (max-width: 575px) {
            .photo-crop-container #user_cropped_img img {
                max-width: 100%;
            }
        }

        .filepond--root {
            margin-bottom: 0
        }

    </style>
@endpush


@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Home
                        </h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Tambah</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                          <form id="jquery-val-form" class="forms-sample" action="{{route('admin.home.store')}}" method="post" enctype="multipart/form-data" id="formdosen">
                              <div class="row">
                                  <div class="form-group col-md-12">
                                      <label class="col-sm-12 col-form-label"><b>Nama Gambar Home</b></label>
                                      <div class="col-sm-12">
                                          <input type="text" name="nama" class="form-control" required>
                                      </div>
                                  </div>

                                  <div class="form-group col-12">
                                    <label class="col-sm-12 col-form-label"><b>Deskripsi Gambar Home</b></label>
                                    <div class="col-sm-12">
                                      <div class="form-label-group mb-0">
                                          <textarea data-length="300" class="form-control char-textarea" rows="2" name="deskripsi" id="deskripsi"></textarea>
                                      </div>
                                      <small class="textarea-counter-value float-right"><span class="char-count">0</span> / 300 </small>
                                    </div>
                                  </div>

                                  <div class="form-group col-12">
                                    <label class="col-sm-12 col-form-label"><b>Gambar Home</b></label>
                                    <div class="col-sm-12">
                                      <div class="body">
                                          <input type="file" class="upload-photo" name="gambar[]" required multiple/>
                                      </div>
                                    </div>
                                    <label class="col-sm-12 col-form-label"><small>*Dapat menambahkan lebih dari 1 gambar <b>(gambar teratas disetting menjadi cover)</b>, file format <b>.jpg</b> and <b>.jpeg</b>, maximum size 2MB</small></label>
                                  </div>

                                  <div class="col-sm-12 mt-2">
                                      <div class="col-sm-12">
                                          <button type="submit" id="btn-submit"
                                              class="btn btn-icon btn-lg btn-block btn-success mb-2"><i
                                                  data-feather="save"></i> Simpan</button>
                                      </div>
                                  </div>

                              </div>
                              {{ csrf_field() }}
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    </div>
@endsection


@section('modal')
<div class="modal fade" id="modalCropper" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalCropperLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCropperLabel">Crop Gambar</h5>
        </div>
        <div class="modal-body">
          <div class="photo-crop-container">
            <div class="crop-preview-cont">
              <div class="img_container"></div>
              <button class="btn btn-sm btn-success waves-effect waves-float waves-light" id="crop_img">Confirm</button>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('vendor-js')
    <script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
@endpush

@push('page-js')
    <script src="{{ asset('app-assets/js/scripts/pages/page-blog-edit.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-quill-editor.js')}}"></script>

    <script src="{{ asset('app-assets/plugins/filepond/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/filepond/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/filepond/filepond-plugin-file-validate-type.min.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/filepond/filepond-plugin-image-validate-size.min.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/filepond/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/filepond/filepond.jquery.js') }}"></script>
    <script src="{{ asset('app-assets/plugins/cropper/cropper.min.js') }}"></script>

    <script>
        $.fn.filepond.registerPlugin(
            FilePondPluginFileValidateSize,
            FilePondPluginFileValidateType,
            FilePondPluginImageValidateSize,
            FilePondPluginImagePreview,
            FilePondPluginFileEncode
        );

        FilePond.create(
            document.querySelector('.upload-photo'), {
                labelIdle: '<div class="uploading-frame">Drag your photo here or <span class="filepond--label-action fontDarkOrange"> Click to upload </span></div>',
                checkValidity: true,
                dropValidation: true,
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                imageValidateSizeMinWidth: 100,
                imageValidateSizeMinHeight: 100,
                labelMaxFileSize: 'Maximum file size allowed is {filesize}',
                labelFileProcessing: 'Generating file for cropping',
                labelFileProcessingComplete: 'Click to upload new Image.',
                storeAsFile: true,
                labelIdle: 'Drop files here or <span class="filepond--label-action"> Click </span> to upload.',
                maxFileSize: '10MB',
                required: true,
            }
        );

        const pond = document.querySelector('.filepond--root');

        // const pond = document.querySelector('.upload-photo');
        // Container to show the preview of uploaded image
        var photo_crop_container = $('.photo-crop-container');
        var crop_preview_cont = photo_crop_container.find('.crop-preview-cont');
        var filepond_img_Container = photo_crop_container.find('.img_container');
        // var photo_preview_container = $('#user_cropped_img');
        var img_cropping = '';

        // pond.getFile();
        var crop = 0;
        var first_photo = 0;
        var cropped_img = '';
        var file_add = '';
        var window_height = $(window).height();

        pond.addEventListener('FilePond:addfile', function (e, file) {
            // console.log(e.detail.file.id);
            if (crop < 1) {
                $('#modalCropper').modal('show');
                // console.log(crop);

                file_add = e;
            }

        });

        $('#modalCropper').on('shown.bs.modal', function () {
            // console.log($('#modalCropper').find('.img_container').width(), $('#modalCropper').find('.img_container').height());
            // console.log('tes');
            crop_preview_cont.slideDown('slow');
            const image = new Image();
            image.src = URL.createObjectURL(file_add.detail.file.file);
            filepond_img_Container.append(image);
            img_cropping = filepond_img_Container.find('img');
            img_cropping.attr('src', image.src);
            img_cropping.cropper({
                viewMode: 2,
                dragMode: 'move',
                guides: true,
                cropBoxResizable: true,
                minContainerWidth: $('#modalCropper').find('.img_container').width(),
                minContainerHeight: 500
                // minCropBoxWidth: 500,
                // minCropBoxHeight: 292
            });
        });

        $('#crop_img').on('click', function (ev) {
            $('html,body').animate({
                scrollTop: $(".photo-crop-container").offset().top - 80
            }, 'slow');
            photo_crop_container.addClass('show-loader show-result');
            cropped_img = img_cropping.cropper('getCroppedCanvas', {
                width: 853,
                height: 1280,
                imageSmoothingEnabled: false,
                imageSmoothingQuality: 'high',
            }).toDataURL('image/jpeg');
            console.log(cropped_img);
            setTimeout(function () {
                photo_crop_container.removeClass('show-loader');
            }, 1900);
            $('.upload-photo').filepond('removeFile', file_add.detail.file.id);
            $('.upload-photo').filepond('addFile', cropped_img);
            setTimeout(function () {
                photo_crop_container.removeClass('show-result');
            }, 1000);
            crop_preview_cont.slideUp();
            // crop_preview_cont.html('');
            img_cropping.cropper('destroy').html('');
            $('#modalCropper').modal('hide');
            filepond_img_Container.html('');

            crop = 1;
        });

        pond.addEventListener('FilePond:removefile', function (e, file) {
            if (crop > 1) {
                crop = 0;
                console.log('hapus dr event');
            } else {
                crop = crop + 1;
            }
        });
    </script>

    <script>
    $(document).ready(function() {
        $("#idkategori").select2({
            ajax: {
                url: '{!! route('s2.kategori') !!}',
                dataType: 'json',
                data: function(params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
        });

        $('#btn-submit').on('click', function() {
            var myEditor = document.querySelector('.editor')
            var html = myEditor.children[0].innerHTML
            $('#isi').val(html)
        })
    });
    </script>
@endpush

