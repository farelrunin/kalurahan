<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $(function() {
                $('#dusun').on('change', function() {
                    var dusun = $(this).val();
                    if (dusun) {
                        $.ajax({
                            url: "<?php echo e(ci_route('internal_api.wilayah.get_rw')); ?>",
                            type: "GET",
                            data: {
                                dusun: dusun,
                            },
                            success: function(data) {
                                $('#rw').empty();
                                if (Object.keys(data).length === 0) {
                                    $('#rw').addClass('hide');
                                } else {
                                    $('#rw').removeClass('hide');
                                    $('#rw').append($('<option>', {
                                        value: '',
                                        text: 'Pilih RW'
                                    }));
                                    $.each(data, function(key, value) {
                                        $('#rw').append($('<option>', {
                                            value: value.rw,
                                            text: value.rw
                                        }));
                                    });
                                }
                            }
                        });
                    } else {
                        $('#rw').empty();
                        $('#rw').addClass('hide');
                    }

                    $('#rt').empty();
                    $('#rt').addClass('hide');
                });
            });

            $(function() {
                $('#rw').on('change', function() {
                    var dusun = $('#dusun').val();
                    var rw = $(this).val();
                    if (rw) {
                        $.ajax({
                            url: "<?php echo e(ci_route('internal_api.wilayah.get_rt')); ?>",
                            type: "GET",
                            data: {
                                dusun: dusun,
                                rw: rw,
                            },
                            success: function(data) {
                                console.log(Object.keys(data).length);
                                $('#rt').empty();
                                if (Object.keys(data).length === 0) {
                                    $('#rt').addClass('hide');
                                } else {
                                    $('#rt').removeClass('hide');
                                    $('#rt').append($('<option>', {
                                        value: '',
                                        text: 'Pilih RT'
                                    }));
                                    $.each(data, function(key, value) {
                                        $('#rt').append($('<option>', {
                                            value: value.rt,
                                            text: value.rt
                                        }));
                                    });
                                }
                            }
                        });
                    } else {
                        $('#rt').empty();
                        $('#rt').addClass('hide');
                    }
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/sitb2342/public_html/resources/views/admin/layouts/components/filter_wilayah.blade.php ENDPATH**/ ?>