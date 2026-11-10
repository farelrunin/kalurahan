@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>{{ ucwords($judul) }} </small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Prodeskel</li>
    <li class="breadcrumb-item"><a href="{{ ci_route('prodeskel.rekapitulasi') }}">Rekapitulasi</a></li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row">
        <div class="col-md-2">
            @include('prodeskel::rekapitulasi.menu')
        </div>
        <div class="col-md-10">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="form form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-sm-1">Tahun</label>
                            <div class="col-sm-2">
                                <select name="tahun" class="form-control select2">
                                    <option value="">-- Pilih Tahun --</option>
                                    @foreach ($tahuns as $tahun)
                                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <a id="download-pdf" data-href="{{ ci_route('prodeskel.rekapitulasi.report.pdf') }}" href="#" class="btn bg-fuchsia btn-sm" title="Cetak PDF" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-body" id="main-content">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#download-pdf').hide()
            $('select[name=tahun]').change(function() {
                var tahun = $(this).val();
                $('#main-content').empty()
                if (tahun) {
                    $.ajax({
                        url: '{{ ci_route('prodeskel.rekapitulasi.report') }}',
                        data: {
                            'tipe': '{{ $tipe }}',
                            'tahun': tahun
                        },
                        beforeSend: function() {
                            $('#main-content').html('Memuat data dari server');
                            $('#download-pdf').hide()
                        },
                        success: function(data) {
                            if (data === '') {
                                window.location.href = '{{ ci_route('prodeskel.rekapitulasi.profil') }}'
                            }
                            $('#main-content').html(data);
                            $('#download-pdf').attr('href', $('#download-pdf').data('href') + '?tahun=' + tahun + '&tipe={{ $tipe }}')
                            $('#download-pdf').show()
                        }
                    })
                } else {
                    $('#main-content').empty()
                    $('#download-pdf').hide()
                }
            })
        });
    </script>
@endpush
