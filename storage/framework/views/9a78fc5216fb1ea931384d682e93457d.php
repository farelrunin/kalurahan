<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo e(site_url()); ?></loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>

    <!-- Sitemap -->
    <?php $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc><?php echo e(site_url('artikel/' . buat_slug($a))); ?></loc>
            <lastmod><?php echo e(date_format(date_create($a['tgl_upload']), 'Y-m-d')); ?></lastmod>
            <priority>0.5</priority>
            <changefreq>weekly</changefreq>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</urlset>
<?php /**PATH /home/sitb2342/public_html/resources/views/sitemap.blade.php ENDPATH**/ ?>