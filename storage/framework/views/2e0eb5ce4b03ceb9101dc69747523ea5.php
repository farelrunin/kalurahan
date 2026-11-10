<rss
    version="2.0"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
>
    <channel>
        <title>Desa <?php echo e($data_config['nama_desa']); ?></title>
        <link><?php echo e(base_url()); ?></link>
        <atom:link href="<?php echo e(base_url('feed')); ?>" rel="self" type="application/rss+xml" />
        <description>Situs Web
            <?php echo e(ucwords(setting('sebutan_desa') . ' ' . $data_config['nama_desa'] . ' ' . setting('sebutan_kecamatan_singkat') . ' ' . $data_config['nama_kecamatan'] . ' ' . setting('sebutan_kabupaten_singkat') . ' ' . $data_config['nama_kabupaten'] . ' Prov. ' . $data_config['nama_propinsi'])); ?>.
        </description>
        <dc:language>id</dc:language>
        <dc:rights>Copyright 2016-<?php echo e(date('Y') . ' ' . config_item('nama_lembaga') . ' - ' . config_item('nama_aplikasi') . ' ' . setting('current_version')); ?></dc:rights>
        <?php $__currentLoopData = $feeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <item>
                <title><?php echo e(htmlspecialchars($key->judul)); ?></title>
                <link><?php echo e(site_url('artikel/' . buat_slug((array) $key))); ?></link>
                <guid><?php echo e(site_url('artikel/' . buat_slug((array) $key))); ?></guid>
                <pubDate><?php echo e(date(DATE_RSS, strtotime($key->tgl_upload))); ?></pubDate>
                <category>
                    <![CDATA[<?php echo e($key->kategori); ?>]]>
                </category>
                <description>
                    <![CDATA[
                        <?php if(is_file(LOKASI_FOTO_ARTIKEL . "sedang_{$key->gambar}")): ?>
<img src="<?php echo e(base_url(LOKASI_FOTO_ARTIKEL . "sedang_{$key->gambar}")); ?>" />
<?php endif; ?>
                        <?php
                            if (strlen($key->isi) > 260) {
                                $position = strpos($key->isi, ' ', 260);
                                if ($position === false) {
                                    $position = 260;
                                }
                            } else {
                                // Jika string lebih pendek dari offset, ambil seluruh string
                                $position = strlen($key->isi);
                            }
                            echo htmlentities(strip_tags(substr($key->isi, 0, max($position, 200))) . '[...]');
                        ?>
                    ]]>
                </description>
                <content:encoded>
                    <![CDATA[
                        <?php if(is_file(LOKASI_FOTO_ARTIKEL . "sedang_{$key->gambar}")): ?>
<img src="<?php echo e(base_url(LOKASI_FOTO_ARTIKEL . "sedang_{$key->gambar}")); ?>" />
<?php endif; ?>
                        <?php echo $key->isi; ?>

                    ]]>
                </content:encoded>
                <dc:creator><?php echo e($key->owner); ?></dc:creator>
            </item>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </channel>
</rss>
<?php /**PATH /home/sitb2342/public_html/resources/views/feed.blade.php ENDPATH**/ ?>