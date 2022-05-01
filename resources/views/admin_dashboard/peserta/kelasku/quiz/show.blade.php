@extends('admin_dashboard.layouts.main')
@section('title')
    Soal Quiz | Kegiatan Pelibatan Masyarakat
@endsection

@section('content')
    @include('admin_dashboard.tutor.kelasku.includes.navbar')
    <form action="{{ route('peserta.quiz.jawaban.store', [$kelas->id, $quiz->id]) }}" method="post" onsubmit="setFormSubmitting()">
        @csrf
        <div class="row layout-top-spacing">
            {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing"> --}}
            <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
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
                    <h3>Soal</h3>
                    <section>
                        @forelse ($quiz->quizSoal as $index => $soal)
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="mb-3">
                                        <p>{{ $index+1 . ". " . $soal->soal }}</p>
                                    </div>
                                    <div class="mb-3">
                                        @if ($soal->file_extension == 'jpg' || $soal->file_extension == 'jpeg' || $soal->file_extension == 'png')
                                            <img src="{{ Storage::url($soal->file) }}" class="img-fluid" alt="...">
                                        @elseif($soal->file_extension == 'mp4')
                                            <div class="embed-responsive embed-responsive-16by9">
                                                <video class="embed-responsive-item" controls>
                                                    <source src="{{ Storage::url($soal->file) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        @elseif($soal->file_extension == 'mp3')
                                            <audio controls>
                                                <source src="{{ Storage::url($soal->file) }}" type="audio/mpeg">
                                                Your browser does not support the audio tag.
                                            </audio>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            {{-- <td><input name="jawaban[{{ $index }}]" type="radio" value="A" required="required"></td> --}}
                                            <td><input name="jawaban[{{ $index }}]" type="radio" value="A"></td>
                                            <td> A. </td>
                                            <td>{{ $soal->a }}</td>
                                        </tr>
                                        <tr>
                                            <td><input name="jawaban[{{ $index }}]" type="radio" value="B"></td>
                                            <td> B. </td>
                                            <td>{{ $soal->b }}</td>
                                        </tr>
                                        <tr>
                                            <td><input name="jawaban[{{ $index }}]" type="radio" value="C"></td>
                                            <td> C. </td>
                                            <td>{{ $soal->c }}</td>
                                        </tr>
                                        <tr>
                                            <td><input name="jawaban[{{ $index }}]" type="radio" value="D"></td>
                                            <td> D. </td>
                                            <td>{{ $soal->d }}</td>
                                        </tr>
                                    </table>
                                    @if ($soal->pembahasan != null)
                                        <div>
                                            <strong>Pembahasan</strong>
                                            <p>{{ $soal->pembahasan }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p>Soal tidak ditemukan</p>
                        @endforelse
                    </section>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
                <div class="layout-spacing sticky-top" style="top: 105px;">
                    <div class="widget-content-area">
                        <div class="table-responsive">
                            <table class="w-70">
                                <tbody>
                                    <tr>
                                        <td><b>Judul Kuis</b></td>
                                        <td>: {{ $quiz->nama_quiz }}</td>
                                    <tr>
                                    </tr>
                                        <td><b>Tanggal</b></td>
                                        <td>: {{ $quiz->tanggal_quiz }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Jumlah Soal</b></td>
                                        <td>: {{ count($quiz->quizSoal) }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Sisa Waktu</b></td>
                                        <td>: <span class="badge badge-pill badge-warning"><span class="text-light" id="menit">44</span><span class="text-light">:</span><span class="text-light" id="detik">49</span></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{-- <button type="submit" id="btn-submit" class="btn btn-block btn-primary">Kirim Jawaban</button> --}}
                            <input type="submit" id="btn-submit" class="btn btn-block btn-primary" value="Kirim Jawaban" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/elements/alert.css') }}">
    <link href="{{ asset('admin_dashboard/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('admin_dashboard/plugins/sweetalerts/promise-polyfill.js') }}"></script>
@endpush

@push('scripts')
    <script src="{{ asset('admin_dashboard/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
    <script>
        var formSubmitting = false;
        var setFormSubmitting = function() { formSubmitting = true; };

        window.onload = function() {
            window.addEventListener("beforeunload", function (e) {
                if (formSubmitting) {
                    return undefined;
                }

                var confirmationMessage="It looks like you have been editing something. "
                                        + 'If you leave before saving, your changes will be lost.';
                
                (e || window.event).returnValue = confirmationMessage; //Gecko + IE
                return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
            });
        };
    </script>
    <script type="text/javascript">
        document.addEventListener('keydown', (e) => {
            e = e || window.event;
            // F5
            if(e.keyCode == 116){
                e.preventDefault();
            }
            // F11
            if(e.keyCode == 122){
                e.preventDefault();
            }
            if (e.ctrlKey) {
            var c = e.which || e.keyCode;
                // ctrl + R
                if (c == 82) {
                    e.preventDefault();
                    e.stopPropagation();
                }
                // ctrl + F5
                if (c == 116) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            }
        });
    </script>
    <script>
        $('#btn-submit').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents('form');
            Swal.fire({
                title: "Apakah kamu sudah yakin?",
                text: "Mohon periksa lagi jawaban anda, jika anda sudah yakin silahkan klik tombol konfirmasi!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Konfirmasi",
                cancelButtonText: 'Batalkan',
                closeOnConfirm: false,
            }).then((result) => {
                if (result.value) {
                    if (result) form.submit();
                }
            })
        });
    </script>
@endpush