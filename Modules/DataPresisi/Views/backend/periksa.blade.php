@extends('admin.layouts.index')

@section('title')
    <h1>
        Data Presisi <small>Periksa Data</small>
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Periksa Data</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="row">
        <div class="col-md-12" id="main-content">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Periksa {{ ucwords(str_replace(['-'], [' '], $sub_modul_ini)) }}</h3>
                </div>
                <div class="box-body">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab-ganda" data-toggle="tab">
                                Data Ganda
                                <span class="badge bg-red">{{ $dataGanda->count() }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab-tidak-sinkron" data-toggle="tab">
                                Data Tidak Sinkron dengan RTM
                                <span class="badge bg-yellow">{{ $dataTidakSinkron->count() }}</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Tab Data Ganda -->
                        <div class="tab-pane active" id="tab-ganda">
                            <div class="box">
                                <div class="box-header with-border">
                                    <a href="#confirm-delete" title="Hapus Data Terpilih" onclick="deleteAllBox('mainform','{{ ci_route($baseRoute . '.deleteDataGanda') }}')"
                                        class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"
                                    >
                                        <i class='fa fa-trash-o'></i> Hapus Data Terpilih
                                    </a>
                                </div>
                                <div class="box-body">
                                    @if ($dataGanda->count() > 0)
                                        {!! form_open(null, 'id="mainform" name="mainform"') !!}
                                        <div class="table-responsive">
                                            @include($baseView . '.detail_ganda', ['dataGanda' => $dataGanda])
                                        </div>
                                        </form>
                                    @else
                                        <div class="alert alert-success">
                                            <i class="fa fa-check"></i> Tidak ada data ganda untuk modul {{ ucwords(str_replace(['-'], [' '], $sub_modul_ini)) }}</i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Tab Data Tidak Sinkron -->
                        <div class="tab-pane" id="tab-tidak-sinkron">
                            <div class="box">
                                <div class="box-header with-border">
                                    <a href="#confirm-delete" title="Hapus Data Terpilih" onclick="deleteAllBox('mainform-sinkron','{{ ci_route($baseRoute . '.deleteDataGanda') }}')"
                                        class="btn btn-social btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih"
                                    >
                                        <i class='fa fa-trash-o'></i> Hapus Data Terpilih
                                    </a>
                                    <a href="#confirm-pindah" id="btn-pindah" title="Pindahkan Data Terpilih" class="btn btn-social btn-warning btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block hapus-terpilih">
                                        <i class='fa fa-exchange'></i> Pindahkan Data Terpilih
                                    </a>
                                </div>

                                <div class="box-body">
                                    @if ($dataTidakSinkron->count() > 0)
                                        {!! form_open(null, 'id="mainform-sinkron" name="mainform-sinkron"') !!}
                                        <div class="table-responsive">
                                            @include($baseView . '.tidak_sinkron', ['dataTidakSinkron' => $dataTidakSinkron])
                                        </div>
                                        </form>
                                    @else
                                        <div class="alert alert-success">
                                            <i class="fa fa-check"></i> Tidak ada data yang tidak sesuai untuk modul {{ ucwords(str_replace(['-'], [' '], $sub_modul_ini)) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.components.konfirmasi_hapus')
    @include('datapresisi::components.konfirmasi_pindah')
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Aktifkan tab functionality
            $('#myTab a').click(function(e) {
                e.preventDefault();
                $(this).tab('show');
            });

            $('#btn-pindah').click(function() {
                const action = '{{ ci_route($baseRoute . '.pindahkanRTM') }}'
                $("#confirm-pindah").modal("show");
                $("#ok-pindah").click(function() {
                    $("#mainform-sinkron").attr("action", action);
                    refreshFormCsrf();
                    $("#mainform-sinkron").submit();
                });
                return false;
            })
        });
    </script>
@endpush
