<div class="col-md-3">
    <?php if(!$kk_baru): ?>
        <input name="no_kk" type="hidden" value="<?php echo e($penduduk['no_kk']); ?>">
    <?php endif; ?>
    <?php echo $__env->make('admin.layouts.components.ambil_foto', ['id_sex' => $penduduk['id_sex'], 'foto' => $penduduk['foto']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="col-md-9">
    <div class="box box-primary">
        <div class="box-header with-border">
            <?php if(preg_match('/keluarga/i', $_SERVER['HTTP_REFERER'])): ?>
                <a href="<?php echo e($_SERVER['HTTP_REFERER']); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Anggota Keluarga"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Daftar Anggota
                    Keluarga</a>
            <?php endif; ?>
            <?php if(preg_match('/rtm/i', $_SERVER['HTTP_REFERER'])): ?>
                <a href="<?php echo e($_SERVER['HTTP_REFERER']); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Daftar Anggota Rumah Tangga"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Daftar Anggota
                    Rumah Tangga</a>
            <?php endif; ?>
            <a href="<?php echo e(ci_route('penduduk.clear')); ?>" class="btn btn-social btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Penduduk"><i class="fa fa-arrow-circle-o-left"></i>Kembali Ke Daftar Penduduk</a>
        </div>
        <div class="box-body">
            <?php echo $__env->make('admin.penduduk.penduduk_form_isian_bersama', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php if($penduduk['status_dasar_id'] == 1 || !isset($penduduk['status_dasar_id'])): ?>
            <div class="box-footer">
                <button type="reset" class="btn btn-social btn-danger btn-sm"><i class='fa fa-times'></i> Batal</button>
                <button type="submit" class="btn btn-social btn-info btn-sm pull-right" onclick="$('#'+'mainform').attr('action', '<?php echo e($form_action); ?>');$('#'+'mainform').submit();"><i class="fa fa-check"></i> Simpan</button>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/penduduk/penduduk_form_isian.blade.php ENDPATH**/ ?>