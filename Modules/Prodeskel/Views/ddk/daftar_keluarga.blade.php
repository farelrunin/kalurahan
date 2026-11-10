<div class="modal fade" id="unduhDaftarKeluargaDanAnggotaDDK" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    Pilih Keluarga
                    <small>yang akan disertakan dalam file unduhan</small>
                </h4>
            </div>
            <div class="modal-body">
                <h5><b>Filter Wilayah</b></h5>
                <div class="row mepet">
                    @include('prodeskel::ddk.components.wilayah')
                </div>
                <br>
                <table class="table table-bordered table-hover" id="tabeldata-keluarga">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkall" /></th>
                            <th class="padat">No KK (Aktif)</th>
                            <th class="padat">Kepala Keluarga</th>
                            <th>Dusun</th>
                            <th>RW</th>
                            <th>RT</th>
                        </tr>
                    </thead>
                </table>
                {!! form_open(ci_route('keluarga.filter.cari'), 'id="form-ke-keluarga"') !!}
                <input id="cari" name="cari" type="hidden">
                </form>
            </div>
            <div class="modal-footer">
                {!! form_open(ci_route($downloadUrl ?? 'prodeskel.ddk.impor.download-daftar-data-prodeskel-online'), 'id="unduhDataKeluargaForm"') !!}
                <input type="hidden" name="ids" value="">
                <button type="submit" class="unduhSemuaDataKeluarga btn btn-social btn-info btn-sm pull-left">
                    <i class="fa fa-download"></i>Unduh semua data keluarga
                    (Aktif)
                </button>
                <button type="submit" disabled class="unduhDataKeluargaTerpilih btn btn-social btn-info btn-sm pull-left">
                    <i class="fa fa-download"></i>Unduh 0 data terpilih
                </button>
                </form>
                <button type="button" class="btn btn-social btn-warning btn-sm" data-dismiss="modal"><i class="fa fa-sign-out"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    let terpilih = [];
    $(document).ready(function() {        
        var TableDataKeluarga = $('#tabeldata-keluarga').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,  
               
            deferLoading: 0,        // <--- cegah load pertama       
            ajax: {
                url: "{{ ci_route('prodeskel.datatablesDDK') }}",
                data: function(d) {
                    d.dusun = $('#unduhDaftarKeluargaDanAnggotaDDK #dusun-modal').val();
                    d.rw = $('#unduhDaftarKeluargaDanAnggotaDDK #rw-modal').val();
                    d.rt = $('#unduhDaftarKeluargaDanAnggotaDDK #rt-modal').val();
                }
            },
            columns: [{
                    data: 'ceklist',
                    class: 'padat',
                    searchable: false,
                    orderable: false,
                    render: function(data, type, full, meta) {
                        if (terpilih.indexOf(full.id) != -1) {
                            return `<input type="checkbox" checked name="id_cb[]" value="${full.id}"/>`;
                        }

                        return data;
                    }
                },
                {
                    data: 'no_kk',
                    name: 'no_kk',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'nama',
                    name: 'nama',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'dusun',
                    name: 'dusun',
                    searchable: true,
                    orderable: false
                },
                {
                    data: 'rw',
                    name: 'rw',
                    searchable: true,
                    orderable: false
                },
                {
                    data: 'rt',
                    name: 'rt',
                    searchable: true,
                    orderable: false
                },
            ],
            order: [
                [2, 'asc']
            ],
            "fnDrawCallback": function(oSettings) {
                let terpilih_semua = true;
                $(document).find('#tabeldata-keluarga input[name="id_cb[]"]').each(function(index, el) {
                    if (terpilih.indexOf(el.value) == -1) {
                        terpilih_semua = false;
                    }
                });
                $('#tabeldata-keluarga #checkall').prop('checked', terpilih_semua && terpilih.length > 0);
            }
        });

        $(document).on('click', '#tabeldata-keluarga input[name="id_cb[]"]', function(ev) {
            let el = ev.currentTarget;
            if (el.checked) {
                terpilih.push(el.value);
            } else if (terpilih.indexOf(el.value) != -1) {
                terpilih.splice(terpilih.indexOf(el.value), 1);
            }
            $('.unduhDataKeluargaTerpilih').prop('disabled', terpilih.length == 0).html(`<i class="fa fa-download"></i>Unduh ${terpilih.length} data terpilih`);
            $('#tabeldata-keluarga #checkall').prop('checked', false);
        });
        $(document).on('click', '#tabeldata-keluarga #checkall', function(ev) {
            let el = ev.currentTarget;
            $(document).find('#tabeldata-keluarga input[name="id_cb[]"]').each(function(index, el2) {
                if (el.checked && terpilih.indexOf(el2.value) == -1) {
                    terpilih.push(el2.value);
                } else if (!el.checked) {
                    terpilih.splice(terpilih.indexOf(el2.value), 1);
                }
            });
            $('.unduhDataKeluargaTerpilih').prop('disabled', terpilih.length == 0).html(`<i class="fa fa-download"></i>Unduh ${terpilih.length} data terpilih`);
        });
        $('.unduhSemuaDataKeluarga').on('click', function() {
            $('#unduhDataKeluargaForm input[name="ids"]').val('semua');
            $('#unduhDataKeluargaForm').submit();
            refreshFormCsrf();
        });
        $('.unduhDataKeluargaTerpilih').on('click', function() {            
            $('#unduhDataKeluargaForm input[name="ids"]').val(terpilih);
            $('#unduhDataKeluargaForm').submit();
            refreshFormCsrf();
        });

        $('#unduhDaftarKeluargaDanAnggotaDDK #dusun-modal,#unduhDaftarKeluargaDanAnggotaDDK #rw-modal,unduhDaftarKeluargaDanAnggotaDDK #rt-modal').change(function() {
            TableDataKeluarga.draw()
        })        

        $('#unduhDaftarKeluargaDanAnggotaDDK').on('shown.bs.modal', function() {
            if (TableDataKeluarga && TableDataKeluarga.rows().data().length === 0) {
                $('#unduhDaftarKeluargaDanAnggotaDDK #dusun-modal').trigger('change');      
            }
        });
    });
</script>
@endpush