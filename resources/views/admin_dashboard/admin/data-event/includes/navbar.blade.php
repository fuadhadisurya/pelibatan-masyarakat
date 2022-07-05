<div class="layout-top-spacing">
    <div class="widget-content widget-content-area simple-pills mb-3">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(4) == 'deskripsi' ? 'active' : '' }}" href="{{ route('data-event.deskripsi.index',[$event->id]) }}">Deskripsi</a>
            </li>
            <li class="nav-item">
               <a class="nav-link {{ Request::segment(4) == 'dokumentasi' ? 'active' : '' }}" href="{{ route('data-event.dokumentasi.index',[$event->id]) }}">Dokumentasi</a>
           </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(4) == 'peserta' ? 'active' : '' }}" href="{{ route('data-event.peserta.index',[$event->id]) }}">Peserta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(4) == 'presensi' ? 'active' : '' }}" href="{{ route('data-event.presensi.index',[$event->id]) }}">Presensi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(4) == 'sertifikat' ? 'active' : '' }}" href="{{ route('data-event.sertifikat.index',[$event->id]) }}">Sertifikat</a>
            </li>
            {{-- @if ($event->status == 'Kegiatan Berlangsung' || $event->status == 'Selesai')
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(4) == 'forum' ? 'active' : '' }}" href="{{ route('data-event.forum.index',[$event->id]) }}">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(4) == 'materi' ? 'active' : '' }}" href="{{ route('data-event.materi.index',[$event->id]) }}">Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(4) == 'tugas' || Request::segment(4) == 'periksa-tugas' ? 'active' : '' }}" href="{{ route('data-event.tugas.index',[$event->id]) }}">Tugas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(4) == 'presensi' ? 'active' : '' }}" href="{{ route('data-event.presensi.index',[$event->id]) }}">Presensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(4) == 'quiz' ? 'active' : '' }}" href="{{ route('data-event.quiz.index',[$event->id]) }}">Quiz</a>
                </li>
                @if ($event->status == 'Selesai')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(4) == 'testimoni' ? 'active' : '' }}" href="{{ route('data-event.testimoni.index',[$event->id]) }}">Testimoni</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Testimoni</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Tugas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Presensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Testimoni</a>
                </li>
            @endif --}}
        </ul>
    </div>
</div>