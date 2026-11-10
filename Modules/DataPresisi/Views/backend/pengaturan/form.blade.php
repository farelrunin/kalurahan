@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')

@section('title')
    <h1>
        Salin Data Presisi {{ $tahun->tahun }}
        <small>Pengaturan Data Presisi</small>
    </h1>
@endsection

@section('breadcrumb')
    <li>Beranda</li>
    <li><a href="{{ ci_route('data_presisi.pengaturan') }}">Pengaturan Data Presisi</a></li>
    <li class="active">Salin Data</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ ci_route('data_presisi.pengaturan') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Papan"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Pengaturan Data
                        Presisi</a>
                </div>
                {!! form_open('', 'class="form-validasi"') !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-10">
                            <input
                                type="number"
                                class="form-control input-sm required angka"
                                id="tahun"
                                name="tahun"
                                value=""
                                min="{{ date('Y') }}"
                                max="{{ date('Y') + 5 }}"
                            >
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    {!! batal() !!}
                    <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class='fa fa-check'></i>
                        Simpan</button>
                </div>
                {!! form_close() !!}
            </div>
        </div>
    </div>
@endsection
