<div class="penduduk_form penduduk_luar_desa penduduk_luar_<?php echo e($index); ?> <?php echo e(count($opsiSumberPenduduk) > 1 ? 'hide' : ''); ?>">
    <div class="form-group">
        <label class="col-sm-3 control-label"><strong>Nama Lengkap / NIK KTP</strong></label>
        <div class="col-sm-5 col-lg-6">
            <input <?php echo e($kategori == 'individu' ? 'data-visible-required="1"' : ''); ?> name="<?php echo e($kategori); ?>[nama]" class="form-control input-sm isi-penduduk-luar" type="text" placeholder="Nama Lengkap" />
        </div>
        <div class="col-sm-3 col-lg-2">
            <input <?php echo e($kategori == 'individu' ? 'data-visible-required="1"' : ''); ?> name="<?php echo e($kategori); ?>[nik]" class="form-control input-sm isi-penduduk-luar nik" type="text" placeholder="NIK" />
        </div>
    </div>
    <?php if(in_array('tempat_lahir', $input) && in_array('tanggal_lahir', $input)): ?>
        <div class="form-group">
            <label for="tempatlahir" class="col-sm-3 control-label">Tempat Tanggal Lahir</label>
            <div class="col-sm-5 col-lg-6">
                <input class="form-control input-sm" type="text" name="<?php echo e($kategori); ?>[tempatlahir]" id="tempatlahir" placeholder="Tempat Lahir" />
            </div>
            <div class="col-sm-3 col-lg-2">
                <div class="input-group input-group-sm date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input title="Pilih Tanggal" class="form-control datepicker input-sm" name="<?php echo e($kategori); ?>[tanggallahir]" type="text" placeholder="Tgl. Lahir" />
                </div>
            </div>
        </div>
    <?php elseif(in_array('tempat_lahir', $input)): ?>
        <div class="form-group">
            <label for="tempatlahir" class="col-sm-3 control-label">Tempat Lahir</label>
            <div class="col-sm-5 col-lg-6">
                <input class="form-control input-sm" type="text" name="<?php echo e($kategori); ?>[tempatlahir]" id="tempatlahir" placeholder="Tempat Lahir" />
            </div>
        </div>
    <?php elseif(in_array('tanggal_lahir', $input)): ?>
        <div class="form-group">
            <label for="tempatlahir" class="col-sm-3 control-label">Tanggal Lahir</label>
            <div class="col-sm-3 col-lg-2">
                <div class="input-group input-group-sm date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input title="Pilih Tanggal" class="form-control datepicker input-sm" name="<?php echo e($kategori); ?>[tanggallahir]" type="text" placeholder="Tgl. Lahir" />
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(in_array('jenis_kelamin', $input)): ?>
        <div class="form-group">
            <label for="tempatlahir" class="col-sm-3 control-label">Jenis Kelamin</label>
            <div class="col-sm-3">
                <select class="form-control input-sm select2" name="<?php echo e($kategori); ?>[jenis_kelamin]">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <?php $__currentLoopData = \App\Enums\JenisKelaminEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data); ?>"><?php echo e($data); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    <?php endif; ?>
    <?php if(in_array('agama', $input)): ?>
        <div class="form-group">
            <label for="tempatlahir" class="col-sm-3 control-label">Agama</label>
            <div class="col-sm-3">
                <select class="form-control input-sm select2" name="<?php echo e($kategori); ?>[agama]">
                    <option value="">-- Pilih Agama --</option>
                    <?php $__currentLoopData = \App\Enums\AgamaEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data); ?>"><?php echo e($data); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    <?php endif; ?>
    <?php if(in_array('pekerjaan', $input)): ?>
        <div class="form-group">
            <label for="tempatlahir" class="col-sm-3 control-label">Pekerjaan</label>
            <div class="col-sm-3">
                <select class="form-control input-sm select2" name="<?php echo e($kategori); ?>[pekerjaan]">
                    <option value="">-- Pilih Pekerjaan --</option>
                    <?php $__currentLoopData = \App\Enums\PekerjaanEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data); ?>"><?php echo e($data); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    <?php endif; ?>
    <?php if(in_array('warga_negara', $input)): ?>
        <div class="form-group">
            <label for="tempatlahir" class="col-sm-3 control-label">Warga Negara</label>
            <div class="col-sm-3">
                <select class="form-control input-sm select2" name="<?php echo e($kategori); ?>[warga_negara]">
                    <option value="">-- Pilih Warga Negara --</option>
                    <?php $__currentLoopData = \App\Enums\WargaNegaraEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data); ?>"><?php echo e($data); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    <?php endif; ?>

    <?php if(in_array('pendidikan_kk', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Pendidikan Terakhir</strong></label>
            <div class="col-sm-3">
                <select class="form-control input-sm select2" name="<?php echo e($kategori); ?>[pendidikan_kk]">
                    <option value="">-- Pilih Pendidikan Terakhir --</option>
                    <?php $__currentLoopData = \App\Enums\PendidikanKKEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data); ?>"><?php echo e($data); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    <?php endif; ?>
    <?php if(in_array('alamat', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Alamat</strong></label>
            <div class="col-sm-9 row">
                <div class="col-sm-12">
                    <input name="<?php echo e($kategori); ?>[alamat_jalan]" class="form-control input-sm" type="text" placeholder="Alamat" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Dusun / RT / RW</strong></label>
            <div class="col-sm-9 row">
                <div class="col-sm-6">
                    <input name="<?php echo e($kategori); ?>[nama_dusun]" class="form-control input-sm" type="text" placeholder="Dusun" />
                </div>
                <div class="col-sm-3">
                    <input name="<?php echo e($kategori); ?>[nama_rw]" class="form-control input-sm" type="text" placeholder="RW" />
                </div>
                <div class="col-sm-3">
                    <input name="<?php echo e($kategori); ?>[nama_rt]" class="form-control input-sm" type="text" placeholder="RT" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Desa / Kecamatan</strong></label>
            <div class="col-sm-9 row">
                <div class="col-sm-6">
                    <input name="<?php echo e($kategori); ?>[pend_desa]" class="form-control input-sm" type="text" placeholder="Desa" />
                </div>
                <div class="col-sm-6">
                    <input name="<?php echo e($kategori); ?>[pend_kecamatan]" class="form-control input-sm" type="text" placeholder="Kecamatan" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Kabupaten / Provinsi</strong></label>
            <div class="col-sm-9 row">
                <div class="col-sm-6">
                    <input name="<?php echo e($kategori); ?>[pend_kabupaten]" class="form-control input-sm" type="text" placeholder="Kabupaten" />
                </div>
                <div class="col-sm-6">
                    <input name="<?php echo e($kategori); ?>[pend_provinsi]" class="form-control input-sm" type="text" placeholder="Provinsi" />
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(in_array('golongan_darah', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Golongan Darah</strong></label>
            <div class="col-sm-3">
                <select class="form-control input-sm select2" name="<?php echo e($kategori); ?>[gol_darah]">
                    <option value="">-- Pilih Golongan Darah --</option>
                    <?php $__currentLoopData = \App\Enums\GolonganDarahEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data); ?>"><?php echo e($data); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    <?php endif; ?>

    <?php if(in_array('status_perkawinan', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Status Perkawinan</strong></label>
            <div class="col-sm-3">
                <select class="form-control input-sm select2" name="<?php echo e($kategori); ?>[status_kawin]">
                    <option value="">-- Pilih Status Perkawinan --</option>
                    <?php $__currentLoopData = \App\Enums\StatusKawinEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data); ?>"><?php echo e($data); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    <?php endif; ?>

    <?php if(in_array('tanggal_perkawinan', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Tanggal Perkawinan</strong></label>
            <div class="col-sm-3 col-lg-2">
                <div class="input-group input-group-sm date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input title="Pilih Tanggal" class="form-control datepicker input-sm" name="<?php echo e($kategori); ?>[tanggalperkawinan]" type="text" placeholder="Tgl. Perkawinan" />
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(in_array('shdk', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Status Hubungan Dalam Keluarga</strong></label>
            <div class="col-sm-3">
                <select class="form-control input-sm select2" name="<?php echo e($kategori); ?>[hubungan_kk]">
                    <option value="">-- Pilih Status Hubungan Dalam Keluarga --</option>
                    <?php $__currentLoopData = \App\Enums\SHDKEnum::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data); ?>"><?php echo e($data); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    <?php endif; ?>

    <?php if(in_array('no_paspor', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>No. Paspor</strong></label>
            <div class="col-sm-5 col-lg-6">
                <input class="form-control input-sm" type="text" name="<?php echo e($kategori); ?>[dokumen_pasport]" placeholder="No. Paspor" />
            </div>
        </div>
    <?php endif; ?>

    <?php if(in_array('no_kitas', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>No. KITAS / KITAP</strong></label>
            <div class="col-sm-5 col-lg-6">
                <input class="form-control input-sm" type="text" name="<?php echo e($kategori); ?>[dokumen_kitas]" placeholder="No. KITAS / KITAP" />
            </div>
        </div>
    <?php endif; ?>

    <?php if(in_array('nama_ayah', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Nama Ayah</strong></label>
            <div class="col-sm-5 col-lg-6">
                <input class="form-control input-sm" type="text" name="<?php echo e($kategori); ?>[nama_ayah]" placeholder="Nama Ayah" />
            </div>
        </div>
    <?php endif; ?>

    <?php if(in_array('nama_ibu', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Nama Ibu</strong></label>
            <div class="col-sm-5 col-lg-6">
                <input class="form-control input-sm" type="text" name="<?php echo e($kategori); ?>[nama_ibu]" placeholder="Nama Ibu" />
            </div>
        </div>
    <?php endif; ?>

    <?php if(in_array('no_kk', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>No. KK</strong></label>
            <div class="col-sm-5 col-lg-6">
                <input class="form-control input-sm no_kk" type="text" name="<?php echo e($kategori); ?>[no_kk]" placeholder="No. KK" />
            </div>
        </div>
    <?php endif; ?>

    <?php if(in_array('kepala_kk', $input)): ?>
        <div class="form-group">
            <label class="col-sm-3 control-label"><strong>Kepala Keluarga</strong></label>
            <div class="col-sm-5 col-lg-6">
                <input class="form-control input-sm" type="text" name="<?php echo e($kategori); ?>[kepala_kk]" placeholder="Kepala Keluarga" />
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/surat/penduduk_luar_desa.blade.php ENDPATH**/ ?>