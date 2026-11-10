<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        Highcharts.chart('container', {
            chart: {
                height: 600,
                width: <?php echo e(setting('ukuran_lebar_bagan')); ?>,
                inverted: true
            },

            title: {
                text: 'Struktur Organisasi <?php echo e(ucwords(setting('sebutan_pemerintah_desa'))); ?>'
            },

            accessibility: {
                point: {
                    descriptionFormatter: function(point) {
                        var nodeName = point.toNode.name,
                            nodeId = point.toNode.id,
                            nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
                            parentDesc = point.fromNode.id;
                        return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
                    }
                }
            },

            series: [{
                type: 'organization',
                name: "<?php echo e(ucwords(setting('sebutan_desa') . ' ' . $desa['nama_desa'])); ?>",
                keys: ['from', 'to'],
                data: [
                    <?php if($ada_bpd): ?>
                        ['BPD', 'LPM'],
                    <?php endif; ?>
                    <?php $__currentLoopData = $bagan['struktur']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $struktur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        [<?php echo e(key($struktur)); ?>, <?php echo e(current($struktur)); ?>],
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                levels: [{
                    level: 0,
                    color: 'gold',
                    dataLabels: {
                        color: 'black'
                    },
                    height: 25
                }, {
                    level: 1,
                    color: 'MediumTurquoise',
                    dataLabels: {
                        color: 'white'
                    },
                    height: 25
                }, {
                    level: 2,
                    color: '#980104',
                    dataLabels: {
                        color: 'white'
                    },
                    height: 25
                }, {
                    level: 4,
                    color: '#359154',
                    dataLabels: {
                        color: 'white'
                    },
                    height: 25
                }],

                linkColor: "#ccc",
                linkLineWidth: 2,
                linkRadius: 0,

                nodes: [
                    <?php if($ada_bpd): ?>
                        {
                            id: 'BPD',
                            color: 'gold',
                            column: 0,
                            offset: '-150'
                        }, {
                            id: 'LPM',
                            color: 'gold',
                            column: 0,
                            dataLabels: {
                                color: 'black'
                            },
                            offset: '150'
                        },
                    <?php endif; ?>
                    <?php $__currentLoopData = $bagan['nodes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pamong): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        {
                            id: <?php echo e($pamong['pamong_id']); ?>,
                            title: '<?php echo e($pamong['jabatan']['nama']); ?>',
                            name: `<?php echo e($pamong['pamong_nama']); ?>`,
                            image: '<?php echo e(AmbilFoto($pamong['foto_staff'], '', $pamong['jenis_kelamin'])); ?>',
                            <?php if(!empty($pamong['bagan_tingkat'])): ?>
                                column: <?php echo e($pamong['bagan_tingkat'] ?: ''); ?>,
                            <?php endif; ?>
                            <?php if(!empty($pamong['bagan_offset'])): ?>
                                offset: '<?php echo e($pamong['bagan_offset'] ?: ''); ?>%',
                            <?php endif; ?>
                            <?php if(!empty($pamong['bagan_layout'])): ?>
                                layout: '<?php echo e($pamong['bagan_layout'] ?: ''); ?>',
                            <?php endif; ?>
                            <?php if(!empty($pamong['bagan_warna'])): ?>
                                color: '<?php echo e($pamong['bagan_warna'] ?: ''); ?>',
                            <?php endif; ?>
                        },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                colorByPoint: false,
                color: '#007ad0',
                dataLabels: {
                    color: 'white'
                },
                shadow: {
                    color: '#ccc',
                    width: 10,
                    offsetX: 0,
                    offsetY: 0
                },
                borderColor: 'white',
                nodeWidth: 75
            }],
            tooltip: {
                outside: true
            },
            exporting: {
                allowHTML: true,
                sourceWidth: 800,
                sourceHeight: 600
            }

        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/pengurus/chart_bagan.blade.php ENDPATH**/ ?>