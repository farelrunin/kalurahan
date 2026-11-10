@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')
@include('admin.layouts.components.datetime_picker')
@section('title')
    <h1>
        Daftar Dokumen
        <small>{{ $action }} Data</small>
    </h1>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ ci_route('ppid.daftar-dokumen') }}">Daftar Dokumen</a></li>
    <li class="active">{{ $action }} Data</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="{{ ci_route('ppid.daftar-dokumen') }}" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                <i class="fa fa-arrow-circle-left"></i> Kembali Ke Daftar Dokumen
            </a>
        </div>
        {!! form_open($form_action, 'class="form-horizontal" id="validasi" enctype="multipart/form-data"') !!}
        <div class="box-body">
            <div class="form-group">
                <input type="hidden" name="uuid" id="dokumenId" value="{{ $dokumen->id }}">
                <label class="col-sm-3 control-label">Jenis Dokumen</label>
                <div class="col-sm-7">
                    <select id="kategori_info_publik" name="kategori_info_publik" class="form-control input-sm select2" @if ($readonly) disabled @endif>
                        <option value="" selected disabled>Pilih Jenis Dokumen</option>
                        @foreach ($jenis_dokumen as $tipe)
                            <option value="{{ $tipe->external_code }}" @selected(($dokumen->kategori_info_publik ?? '') == $tipe->external_code)>
                                {{ $tipe->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    <label class="help-block error" style="display: none"></label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="nama">Judul Dokumen</label>
                <div class="col-sm-7">
                    <input
                        class="form-control input-sm"
                        type="text"
                        name="nama"
                        id="nama"
                        value="{{ $dokumen->nama ?? '' }}"
                        placeholder="Judul Dokumen"
                        @if ($readonly) disabled @endif
                    >
                    <label class="help-block error" style="display: none"></label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Retensi Dokumen</label>
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-6">
                            <input
                                class="form-control input-sm"
                                placeholder="Jumlah (0-31)"
                                type="number"
                                name="retensi_number"
                                id="retensi_number"
                                min="0"
                                max="31"
                                value="{{ $dokumen->retensi_number ?? 0 }}"
                                @if ($readonly) disabled @endif
                            >
                            <label class="help-block error" style="display: none"></label>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control input-sm" name="retensi_unit" id="retensi_unit" @if ($readonly) disabled @endif>
                                <option value="hari" {{ isset($dokumen) && $dokumen->retensi_unit == 'hari' ? 'selected' : '' }}>Hari
                                </option>
                                <option value="minggu" {{ isset($dokumen) && $dokumen->retensi_unit == 'minggu' ? 'selected' : '' }}>Minggu
                                </option>
                                <option value="bulan" {{ isset($dokumen) && $dokumen->retensi_unit == 'bulan' ? 'selected' : '' }}>Bulan
                                </option>
                                <option value="tahun" {{ isset($dokumen) && $dokumen->retensi_unit == 'tahun' ? 'selected' : '' }}>Tahun
                                </option>
                            </select>
                        </div>
                    </div>
                    <label class="control-label text-danger">Nilai harus antara 0 hingga 31. Isi 0 jika tidak
                        digunakan.</label>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="nama">Tipe Dokumen</label>
                <div class="col-sm-7">
                    <select name="tipe" id="tipe" class="form-control input-sm required">
                        @foreach (\Modules\PPID\Enums\TipeDokumenEnum::all() as $key => $item)
                            <option value="{{ $key }}" @selected($dokumen->tipe == $key)>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="d-unggahn" style="display: {{ $dokumen->tipe == \Modules\PPID\Enums\TipeDokumenEnum::URL ? 'none' : '' }};">
                @if ($dokumen->satuan)
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Dokumen</label>
                        <div class="col-sm-7">
                            <i class="fa fa-file-pdf-o pop-up-file" aria-hidden="true" style="font-size: 60px; cursor: pointer; color: red;" data-title="Berkas {{ $dokumen->nama }}" data-url="{{ $dokumen->url_file }}" title="{{ $dokumen->satuan }}"></i>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label class="col-sm-3 control-label">Unggah Dokumen</label>
                    <div class="col-sm-7">
                        <div class="input-group input-group-sm">
                            <input
                                type="text"
                                class="form-control"
                                id="file_path"
                                name="file_path"
                                placeholder="Pilih file..."
                                value="{{ $dokumen->satuan ?? '' }}"
                                @if ($readonly) disabled @endif
                            >

                            <input id="file" type="file" class="hidden" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx" @if ($readonly) disabled @endif>

                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" id="file_browser" @if ($readonly) disabled @endif>
                                    <i class="fa fa-search"></i> Browse
                                </button>
                            </span>
                        </div>
                        <label class="help-block error" style="display: none"></label>
                        <label class="control-label text-danger">
                            Batas maksimal pengunggahan file: <strong>{{ max_upload() }} MB</strong>.
                            Hanya mendukung format dokumen (.pdf, .doc, .docx, .xls, .xlsx).
                        </label>
                    </div>
                </div>
            </div>
            <div id="d-url" class="form-group" style="display: {{ $dokumen->tipe == \Modules\PPID\Enums\TipeDokumenEnum::URL ? '' : 'none' }};">
                <label class="control-label col-sm-3" for="nama">Link/URL Dokumen</label>
                <div class="col-sm-7">
                    <input id="url" name="url" class="form-control input-sm {{ $dokumen->tipe == \Modules\PPID\Enums\TipeDokumenEnum::URL ? 'required' : '' }}" type="text" value="{{ $dokumen->url }}"></input>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Keterangan</label>
                <div class="col-sm-7">
                    <textarea
                        name="keterangan"
                        class="form-control input-sm"
                        maxlength="300"
                        placeholder="Keterangan"
                        rows="3"
                        style="resize:none;"
                        @if ($readonly) disabled @endif
                    >{{ $dokumen->keterangan ?? '' }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="tanggal">Tanggal Terbit</label>
                <div class="col-sm-7">
                    <div class="input-group input-group-sm date">
                        <div class="input-group-addon" style="border-radius: 5px 0 0 5px">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input
                            type="text"
                            name="published_at"
                            value="{{ $dokumen->published_at ? tgl_indo_out($dokumen->published_at) : date('d-m-Y') }}"
                            class="form-control input-sm datepicker required"
                            title="Tanggal Terbit"
                            placeholder="Masukan Tanggal Terbit"
                            style="border-radius: 0 5px 5px 0"
                            @disabled($readonly)
                            required
                        >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="status">Status Terbit</label>
                <div class="btn-group col-sm-7" data-toggle="buttons">
                    <label id="sx3" class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label @active(!empty($dokumen) ? $dokumen->status == 1 : true)" @disabled($readonly)>
                        <input
                            type="radio"
                            name="status"
                            class="form-check-input"
                            value="1"
                            @checked(!empty($dokumen) ? $dokumen->status == 1 : true)
                            @if ($readonly)
                        disabled
                        @endif>
                        Ya
                    </label>
                    <label id="sx4" class="btn btn-info btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label @active(!empty($dokumen) ? $dokumen->status == 0 : false)" @disabled($readonly)>
                        <input
                            type="radio"
                            name="status"
                            class="form-check-input"
                            value="0"
                            @checked(!empty($dokumen) ? $dokumen->status == 0 : false)
                            @if ($readonly)
                        disabled
                        @endif>
                        Tidak
                    </label>
                </div>
            </div>

        </div>

        @if (!$readonly)
            <div class="box-footer">
                <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                    Simpan</button>
            </div>
        @endif
        </form>
    </div>
    @include('ppid::backend.daftar_dokumen._modal_cari_permohonan_informasi')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var retensiNumberInput = document.getElementById('retensi_number');

            retensiNumberInput.addEventListener('input', function() {
                var masaBerlaku = parseInt(retensiNumberInput.value, 10);

                if (masaBerlaku < 0) {
                    retensiNumberInput.value = 0;
                } else if (masaBerlaku > 31) {
                    retensiNumberInput.value = 31;
                }
            });
        });
    </script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tipe').on('change', function() {
                if (this.value == 1) {
                    $('#d-unggahn').show();
                    $('#d-url').hide();
                    $("#file_path").addClass("required");
                    $("#url").removeClass("required");
                } else {
                    $('#d-unggahn').hide();
                    $('#d-url').show();
                    $("#file_path").removeClass("required");
                    $("#url").addClass("required");
                }
            });
            $('.pop-up-file').on('click', function() {
                const fileUrl = $(this).data('url');
                const titleModal = $(this).data('title');
                const fileTitle = titleModal.toLowerCase().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g,
                    '-');

                Swal.fire({
                    customClass: {
                        popup: "swal-lg",
                    },
                    title: titleModal,
                    html: `
                        <object data="${fileUrl}" style="width: 100%;min-height: 400px;" type="application/pdf"></object>
                        <div style="margin-top: 15px;">
                            <a href="${fileUrl}" download="${fileTitle}" class="btn btn-primary">Unduh</a>
                            <button type="button" class="btn btn-danger" onclick="Swal.close()">Tutup</button>
                        </div>
                    `,
                    showConfirmButton: false
                });
            });

            $('#validasi').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'Accept': 'application/json'
                    },
                    beforeSend: function() {
                        $('button[type="submit"]').prop('disabled', true);
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message,
                            }).then(() => {
                                window.location.href =
                                    "{{ ci_route('ppid.daftar-dokumen') }}";
                            });
                        }
                    },
                    error: function(error) {
                        if (error.status === 422) {
                            let errors = error.responseJSON.errors;
                            // console.log(errors);

                            for (let field in errors) {
                                let errorMessage = errors[field][0];
                                let fieldElement = $(`[name="${field}"]`).closest(
                                    '.form-group');

                                fieldElement.addClass('has-error');
                                fieldElement.find('.help-block').html(errorMessage).show();
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                html: error.responseJSON.message,
                            });
                        }
                    },
                    complete: function() {
                        $('button[type="submit"]').prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endpush
