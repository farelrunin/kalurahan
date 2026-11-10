@push('css')
    <style>
        .checkbox-item {
            border-bottom: 1px solid #ccc;
            margin-bottom: 10px;
        }

        .checkbox-item:hover {
            background-color: #f0f0f0;
        }

        .checkbox-item label {
            max-width: 80% !important;
        }

        .preview-img img {
            max-height: 300px;
        }
    </style>
@endpush

@extends('admin.layouts.index')
@include('admin.layouts.components.asset_validasi')

@section('title')
    <h1>
        Pengaturan PPID <small>Informasi dan Pengaturan</small>
    </h1>
@endsection

@section('breadcrumb')
    <li class="active">Pengaturan PPID</li>
@endsection

@section('content')
    @include('admin.layouts.components.notifikasi')
    <div class="row" id="contentContainer">
        <div class="col-md-3" id="view1">
            {!! form_open_multipart(ci_route('ppid.pengaturan.simpan-banner'), 'class="form-horizontal" id="validasi"') !!}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <b>Banner PPID</b>
                </div>
                <div class="box-body box-profile preview-img">
                    <a href="<?= ci_route('ppid.pengaturan.ambil-banner') ?>" class="progressive replace">
                        <img class="preview" loading="lazy" src="<?= base_url('assets/images/img-loader.gif') ?>" alt="Banner PPID" width="100%" />
                    </a>
                    <br />
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control file-path" name="ppid_banner" readonly>
                        <input type="file" class="hidden file-input" name="ppid_banner" accept=".gif,.jpg,.jpeg,.png">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat file-browser"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>

                @if (can('u'))
                    <div class="box-footer">
                        <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan Banner</button>
                    </div>
                @endif
            </div>
            {!! form_close() !!}
        </div>
        <div class="col-md-9" id="view2">
            {!! form_open_multipart(ci_route('ppid.pengaturan.simpan-pengaturan'), 'class="form-horizontal" id="validasi"') !!}
            <div class="box box-info">
                <div class="box-header with-border">
                    <b>Pengaturan Dasar</b>
                </div>
                <div class="box-body">
                    @php
                        $multiSelectDynamic = collect($list_setting)
                            ->filter(function ($setting) {
                                return $setting->key == 'ppid_permohonan_keberatan' || $setting->key == 'ppid_cara_memperoleh_informasi' || $setting->key == 'ppid_mendapat_salinan_informasi';
                            })
                            ->values();
                        
                        $list_setting = collect($list_setting)
                            ->reject(function ($setting) {
                                return $setting->key == 'ppid_permohonan_keberatan' || $setting->key == 'ppid_cara_memperoleh_informasi' || $setting->key == 'ppid_mendapat_salinan_informasi';
                            })
                            ->values();
                    @endphp

                    @include('admin.pengaturan.form')
                </div>

                <div class="box-header with-border">
                    <b>Form Permohonan</b>
                </div>
                <div class="box-body">
                    @foreach ($multiSelectDynamic as $pengaturan)
                        <div class="form-group" id="form_{{ $pengaturan->key }}">
                            <label class="col-sm-12 col-md-3" for="nama">
                                {{ SebutanDesa($pengaturan->judul) }}
                                <a class="btn btn-social btn-success btn-sm" onclick="addCheckbox('{{ $pengaturan->key }}')" style="margin-top:10px"><i class="fa fa-plus"></i> Tambah Informasi</a>
                            </label>
                            <div class="col-sm-12 col-md-7">
                                <template id="template_{{ $pengaturan->key }}">
                                    <div class="checkbox-item">
                                        <input type="checkbox" name="{{ $pengaturan->key }}[]" value="" />
                                        <input type="hidden" name="{{ $pengaturan->key }}[options][]" value="" />
                                        <label></label>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="removeCheckbox(this)" style="position: absolute; right: 10px;"><i class="fa fa-trash"></i></a>
                                    </div>
                                </template>
                                @foreach ($pengaturan->option as $option)
                                    <div class="checkbox-item">
                                        @php
                                            $decodedValue = json_decode($pengaturan->value, true);
                                            $isChecked = in_array($option['id'], $decodedValue) ? 'checked' : '';
                                        @endphp
                                        <input id="{{ $pengaturan->key }}_{{ $option['id'] }}" name="{{ $pengaturan->key }}[]" type="checkbox" value="{{ $option['id'] }}" {{ $isChecked }} />
                                        <input name="{{ $pengaturan->key }}[options][{{ $option['id'] }}]" type="hidden" value="{{ $option['nama'] }}" />
                                        <label for="{{ $pengaturan->key }}_{{ $option['id'] }}">{{ $option['nama'] }}</label>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="removeCheckbox(this)" style="position: absolute; right: 10px;"><i class="fa fa-trash"></i></a>
                                        <br>
                                    </div>
                                @endforeach
                            </div>
                            <label class="col-sm-12 col-md-2 pull-left" for="nama">{!! SebutanDesa($pengaturan->keterangan) !!}</label>
                        </div>
                        @if (!$loop->last)
                            <hr style="margin-top: 0; margin-bottom: 10px;">
                        @endif
                    @endforeach
                </div>

                @if (can('u'))
                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                        <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
                    </div>
                @endif
            </div>
            {!! form_close() !!}
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        function addCheckbox(key) {
            const template = document.getElementById(`template_${key}`);
            const newCheckbox = template.content.cloneNode(true);

            Swal.fire({
                title: 'Masukkan nilai untuk opsi baru:',
                input: 'text',
                inputPlaceholder: 'Isi nilai...',
                showCancelButton: true,
                confirmButtonText: 'Tambah',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    const optionValue = result.value.trim();
                    if (optionValue) {
                        const checkboxCount = document.querySelectorAll(`#form_${key} input[type="checkbox"]`).length + 1;

                        const newId = `${key}_${optionValue.replace(/\s+/g, '_').toLowerCase()}`;
                        newCheckbox.querySelector('input[type="checkbox"]').id = newId;
                        newCheckbox.querySelector('input[type="checkbox"]').name = `${key}[]`;
                        newCheckbox.querySelector('input[type="checkbox"]').value = optionValue.replace(/\s+/g, '_').toLowerCase();
                        newCheckbox.querySelector('input[type="checkbox"]').checked = true;
                        newCheckbox.querySelector('input[type="hidden"]').name = `${key}[options][${optionValue.replace(/\s+/g, '_').toLowerCase()}]`;
                        newCheckbox.querySelector('input[type="hidden"]').value = optionValue;
                        newCheckbox.querySelector('label').textContent = optionValue;
                        newCheckbox.querySelector('label').setAttribute('for', newId);

                        const lastCheckbox = document.querySelectorAll(`#form_${key} input[type="checkbox"]`);
                        const checkboxContainer = lastCheckbox[checkboxCount - 2].parentElement.parentElement;
                        checkboxContainer.appendChild(newCheckbox);
                    } else {
                        Swal.fire('Error', 'Nilai tidak boleh kosong!', 'error');
                    }
                } else if (result.isDismissed) {
                    Swal.fire('Batal', 'Penambahan checkbox dibatalkan.', 'info');
                }
            });
        }

        function removeCheckbox(button) {
            const checkboxContainer = button.parentElement.parentElement;
            const checkboxCount = checkboxContainer.querySelectorAll('input[type="checkbox"]').length;

            if (checkboxCount > 1) {
                button.parentElement.remove(); // Menghapus checkbox item
            } else {
                Swal.fire('Peringatan', 'Minimal harus ada 1 checkbox!', 'warning');
            }
        }

        $('#file').change(function() {
            previewImage(this, '.preview-img');
        });
    </script>
@endpush
