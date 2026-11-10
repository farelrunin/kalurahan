<div class="penduduk_form penduduk_desa">
    <div class="form-group">
        <label for="nik" class="col-sm-3 control-label">NIK / Nama</label>
        <div class="col-sm-6 col-lg-4">
            <select
                autofocus
                name="<?php echo e($kategori); ?>[nik]"
                class="form-control input-sm isi-penduduk-desa nama-kategori-<?php echo e($kategori); ?> <?php echo e($kategori == 'individu' ? 'required' : ''); ?> select2-nik-ajax"
                data-surat="<?php echo e($surat->id); ?>"
                data-hubungan="<?php echo e($surat->form_isian->$kategori->hubungan); ?>"
                data-kategori="<?php echo e($kategori); ?>"
                data-url="<?php echo e(site_url('surat/list_penduduk_ajax')); ?>"
                data-sumber_penduduk_berulang="<?php echo e(setting('sumber_penduduk_berulang_surat') ?? $surat->sumber_penduduk_berulang); ?>"
                data-placeholder="-- Cari NIK / Tag ID Card / Nama Penduduk --"
                onchange="loadDataPenduduk(this)"
            >
            </select>
        </div>
    </div>
    <div class="data_penduduk_desa"></div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        function loadDataPenduduk(elm) {
            let _idSurat = $(elm).data('surat')
            let _val = $(elm).val()
            let _kategori = $(elm).data('kategori')
            let _pendudukDesaElm = $(elm).closest('.penduduk_desa')
            _pendudukDesaElm.find('.data_penduduk_desa').empty()
            if (!$.isEmptyObject(_val)) {
                $.get('<?php echo e(ci_route('datasuratpenduduk.index')); ?>', {
                    id_surat: _idSurat,
                    id_penduduk: _val,
                    kategori: _kategori
                }, function(data) {
                    _pendudukDesaElm.find('.data_penduduk_desa').html(data.html)

                    for (let i = 0; i < data.hubungan.length; i++) {
                        let hubungan = data.hubungan[i]
                        let option = data[`option${hubungan}`]
                        let html = data[`html${hubungan}`]
                        $(`#kategori-${hubungan}`).find('.select2-nik-ajax').empty().append(option)
                        $(`#kategori-${hubungan}`).find('.data_penduduk_desa').empty().html(html)
                    }
                }, 'json')
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/surat/penduduk_desa.blade.php ENDPATH**/ ?>