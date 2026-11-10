<div class="box-body">
    <h5><b>Rincian Suplemen</b></h5>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover tabel-rincian">
            <tbody>
                <tr>
                    <td width="20%">Nama Data</td>
                    <td width="1%">:</td>
                    <td><?php echo e(strtoupper($suplemen->nama)); ?></td>
                </tr>
                <tr>
                    <td>Sasaran Terdata</td>
                    <td>:</td>
                    <td><?php echo e($sasaran[$suplemen->sasaran]); ?></td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td><?php echo e($suplemen->keterangan); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/suplemen/rincian.blade.php ENDPATH**/ ?>