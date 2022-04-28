@extends('admin_dashboard.layouts.main')
@section('title')
    Buat Quiz | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">

            @include('admin_dashboard.tutor.kelasku.includes.navbar')
            <div class="widget-content-area br-4">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="far fa-times-circle"></i></button>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="form" action="{{ route('tutor.kelasku.quiz.store', [$kelas->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div id="quiz">
                        <h3>Informasi Quiz</h3>
                        <section> 
                            <div class="form-group">
                                <label for="nama_quiz">Nama quiz</label>
                                <input type="text" class="form-control" id="nama_quiz" name="nama_quiz" required>
                            </div> 
                            <div class="form-group">
                                <label for="batas_waktu">Batas Waktu</label>
                                <input id="dateTimeFlatpickr" name="batas_waktu" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Pilih Waktu.." required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="selectpicker form-control" name="status">
                                    <option value="Persiapan">Persiapan</option>
                                    <option value="Quiz Dimulai">Quiz Dimulai</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="aktif">Aktif?</label>
                                <div class="row">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="aktif1" value="Y" name="aktif" class="custom-control-input" required="required">
                                        <label class="custom-control-label" for="aktif1">Ya</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="aktif2" value="N" name="aktif" class="custom-control-input">
                                        <label class="custom-control-label" for="aktif2">Tidak</label>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3>Soal</h3>
                        <section>
                            <div id="listSoal">
                                <div class="control-group card mb-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="soal[]">Soal</label>
                                            <textarea class="form-control" id="soal[]" name="soal[]" rows="2" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="file[]">File (Audio, Gambar, Video)</label>
                                            <input type="file" name="file[]" id="file[]" accept="image/*, video/*, audio/*">
                                        </div>
                                        <div class="form-group row">
                                            <label for="a[]" class="col-sm-1 col-form-label">A.</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="a[]" name="a[]" placeholder="Jawaban A.">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="b[]" class="col-sm-1 col-form-label">B.</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="b[]" name="b[]" placeholder="Jawaban B.">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="c[]" class="col-sm-1 col-form-label">C.</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="c[]" name="c[]" placeholder="Jawaban C.">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="d[]" class="col-sm-1 col-form-label">D.</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" id="d[]" name="d[]" placeholder="Jawaban D.">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="kunci_jawaban[]">Kunci Jawaban</label>
                                            <select class="form-control" id="kunci_jawaban[]" name="kunci_jawaban[]">
                                                <option value="" hidden selected>Pilih Kunci Jawaban</option>
                                                <option value="A">A.</option>
                                                <option value="B">B.</option>
                                                <option value="C">C.</option>
                                                <option value="D">D.</option>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-success add-more" type="button">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('tutor.kelasku.quiz.index', [$kelas->id]) }}" class="btn btn-sm btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="d-none">
        <div class="copy">
            <div class="control-group card mb-3">
                <div class="card-body">
                    <div class="form-group">
                        <label for="soal[]">Soal</label>
                        <textarea class="form-control" id="soal[]" name="soal[]" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="file[]">File (Audio, Gambar, Video)</label>
                        <input type="file" name="file[]" id="file[]" accept="image/*, video/*, audio/*" multiple>
                    </div>
                    <div class="form-group row">
                        <label for="a[]" class="col-sm-1 col-form-label">A.</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="a[]" name="a[]" placeholder="Isi Jawaban A.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="b[]" class="col-sm-1 col-form-label">B.</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="b[]" name="b[]" placeholder="Isi Jawaban B.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="c[]" class="col-sm-1 col-form-label">C.</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="c[]" name="c[]" placeholder="Isi Jawaban C.">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="d[]" class="col-sm-1 col-form-label">D.</label>
                        <div class="col-sm-11">
                            <input type="text" class="form-control" id="d[]" name="d[]" placeholder="Isi Jawaban D.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kunci_jawaban[]">Kunci Jawaban</label>
                        <select class="form-control" name="kunci_jawaban[]">
                            <option value="" hidden selected>Pilih Kunci Jawaban</option>
                            <option value="A">A.</option>
                            <option value="B">B.</option>
                            <option value="C">C.</option>
                            <option value="D">D.</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-danger remove" type="button">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_dashboard/plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/bootstrap-select/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/plugins/jquery-step/jquery.steps.css') }}">
    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
    </style>
    <style>
        .btn-light { border-color: transparent; }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script>
        $("#quiz").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            autoFocus: true,
            cssClass: 'pill wizard',
            onFinished: function (event, currentIndex) {
                // var form = $(this);
                // Submit form input
                // form.submit();
                $("#form").submit();
            },
        });
    </script>
    <script>
        var f2 = flatpickr(document.getElementById('dateTimeFlatpickr'), {
            minDate: "today",
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true
        });
    </script>
    <script>
        $(".selectpicker").selectpicker({
            "title": "Pilih Menu"
        }).selectpicker("render");
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more").click(function(){ 
                var html = $(".copy").html();
                $("#listSoal").append(html);
            });
        
            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click",".remove",function(){ 
                $(this).parents(".control-group").remove();
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function () {
            var waris = '{{ is_array(old("ktp_ahli_waris")) ? count(old("ktp_ahli_waris"))-1 : 0 }}';

            $('#btnWarisAdd').on('click', function() {
                waris++;
                $('#ahli-waris').append(`
                    <div class="form-group" id="waris`+ waris +`">
                        <label for="ktp_ahli_waris[`+ waris +`]">KTP Ahli Waris</label>
                        <input type="file" name="ktp_ahli_waris[`+ waris +`]" id="ktp_ahli_waris[`+ waris +`]" class="form-control-file" required>
                    </div>
                `)
                $('#btnWarisDel').prop('disabled',false);
            })

            $('#btnWarisDel').click(function(){
                $('#waris'+waris+'').remove();
                waris--;
                if (pcr === 0) {
                    $('#btnWarisDel').prop('disabled',true);
                }
            });
        })
    </script> --}}
@endpush