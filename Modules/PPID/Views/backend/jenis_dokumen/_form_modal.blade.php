<div class="modal fade" id="jenisDokumenModal" tabindex="-1" role="dialog" aria-labelledby="jenisDokumenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="jenisDokumenModalLabel"></h4>
            </div>
            <div class="modal-body">
                <form id="jenisDokumenForm" class="row">
                    <input type="hidden" name="id" id="dokumenId">
                    <div class="form-group col-md-12">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="icon">Icon</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="icon" name="icon" required readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" id="selectIconBtn" onclick="showIconModal()">Pilih Icon</button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="bgicon">Warna Background Icon</label>
                        <input type="color" class="form-control" id="bgicon" name="bgicon" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="status">Status</label>
                        <select class="form-control" id="statusf" name="status" required>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk memilih ikon -->
<div class="modal fade" id="iconSelectModal" tabindex="-1" role="dialog" aria-labelledby="iconSelectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="iconSelectModalLabel">Pilih Icon</h5>
            </div>
            <div class="modal-body">
                <div class="icon-grid">
                    <?php
                    foreach (Modules\PPID\Enums\IconBIEnum::all() as $icon) {
                        echo '<i class="bi ' . $icon . ' margin" data-icon="' . $icon . '"></i>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            function clearForm() {
                $('#jenisDokumenModal #dokumenId').val('');
                $('#jenisDokumenModal #nama_kategori').val('');
                $('#jenisDokumenModal #status').val('1').trigger('change');
                $('#jenisDokumenModal #nama_kategori').prop('readonly', false);
            }

            $(document).on('click', '.add-btn', function(e) {
                e.preventDefault();
                clearForm();
                $('#jenisDokumenModalLabel').text('Tambah Data');
                $('#jenisDokumenModal').modal('show'); // Show the modal
            });

            $(document).on('click', '.edit-btn', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                let rowData = TableData.row($(this).parents('tr')).data();
                $('#jenisDokumenModal #nama_kategori').prop('readonly', false);
                $('#jenisDokumenModalLabel').text('Ubah Data');
                $('#jenisDokumenModal #dokumenId').val(rowData.id);
                $('#jenisDokumenModal #nama_kategori').val(rowData.nama_kategori);
                $('#jenisDokumenModal #deskripsi').val(rowData.deskripsi);
                $('#jenisDokumenModal #icon').val(rowData.icon);
                $('#jenisDokumenModal #bgicon').val(rowData.bgicon);
                $('#jenisDokumenModal #status').val(rowData.status).trigger('change');
                $('#jenisDokumenModal').modal('show');
                if (!rowData.ceklist) {
                    $('#jenisDokumenModal #nama_kategori').prop('readonly', true);
                }
            });

            $('#jenisDokumenForm').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let id = $('#dokumenId').val(); // Get the document ID

                if (id) {
                    // Update existing document
                    formData['_method'] = 'PUT';
                    $.ajax({
                        url: "{{ ci_route('ppid.jenis-dokumen') }}/" + id,
                        type: 'PUT',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    timer: 2000,
                                });
                                TableData.draw(); // Refresh the table
                                $('#jenisDokumenModal').modal('hide'); // Hide the modal
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error: ' + xhr.responseText,
                                timer: 2000,
                            });
                        }
                    });
                } else {
                    // Store new document
                    $.ajax({
                        url: "{{ ci_route('ppid.jenis-dokumen') }}",
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: response.message,
                                    timer: 2000,
                                });
                                TableData.draw(); // Refresh the table
                                $('#jenisDokumenModal').modal('hide'); // Hide the modal
                            }
                        },
                        error: function(xhr) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Error: ' + xhr.responseText,
                                timer: 2000,
                            });
                        }
                    });
                }
            });

            // Show icon selection modal
            $('#selectIconBtn').on('click', function() {
                $('#iconSelectModal').modal('show');
            });

            // Set selected icon to input field
            $('.icon-grid i').on('click', function() {
                let selectedIcon = $(this).data('icon');
                $('#icon').val(selectedIcon); // Set the selected icon to the input
                $('#iconSelectModal').modal('hide'); // Hide the modal
            });
        });
    </script>
@endpush
