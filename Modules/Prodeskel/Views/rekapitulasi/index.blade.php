@include('admin.layouts.components.asset_datatables')

@extends('admin.layouts.index')

@section('title')
    <h1>
        Prodeskel <small>Potensi </small>
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

                </div>
                <div class="box-body">

                </div>
            </div>
        </div>
    </div>
@endsection
