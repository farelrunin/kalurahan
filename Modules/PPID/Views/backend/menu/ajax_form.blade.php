<form action="{{ $form_action }}" method="post" id="validasi">
    <div class="modal-body">
        <input name="parrent" type="hidden" value="{{ $menu_utama['uuid'] ?? 0 }}" />
        @if ($menu_utama)
            <div class="form-group">
                <label class="control-label" for="menu_utama">Menu Utama</label>
                <select name="parrent" class="form-control input-sm required">
                    <option value="0">Menu Utama</option>
                    @forelse ($menu_utama as $key => $item)
                        <option value="{{ $key }}" @selected($key == $menu['parrent'])>{{ $item }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
        @endif
        <div class="form-group">
            <label class="control-label" for="nama">Nama</label>
            <input name="nama" class="form-control input-sm required nomor_sk" maxlength="50" type="text" value="{{ $menu['nama'] }}" />
        </div>
        @if (!empty($menu['link']))
            <div class="form-group">
                <label class="control-label" for="link_sebelumnya">Link Sebelumnya</label>
                <input class="form-control input-sm" type="text" value="{{ $menu['link_url'] }}" disabled />
            </div>
        @endif
        <div class="form-group">
            <label class="control-label" for="link">Jenis Link</label>
            <select class="form-control input-sm required" id="link_tipe" name="link_tipe" onchange="ganti_jenis_link(this);">
                <option option value="">-- Pilih Jenis Link --</option>
                @foreach ($link_tipe as $id => $nama)
                    <option value="{{ $id }}" @selected($menu['link_tipe'] == $id)>{{ $nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" id="jenis_link" style="@if (!$menu['link_tipe']) display:none; @endif">
            <label class="control-label" for="link">Link</label>
            <select id="artikel_statis" class="form-control input-sm jenis_link select2" name="{{ jecho($menu['link_tipe'], 1, 'link') }}" style="@if ($menu['link_tipe'] != 1) display:none; @endif">
                <option value="">-- Pilih Artikel Statis --</option>
                @foreach ($artikel_statis as $data)
                    <option value="artikel/{{ $data['id'] }}" @selected($menu['link'] == "artikel/{$data['id']}")>{{ $data['judul'] }}</option>
                @endforeach
            </select>
            <span id="eksternal" class="jenis_link" style="@if (!in_array($menu['link_tipe'], [App\Enums\TipeLinkEnum::EKSTERNAL])) display:none; @endif">
                <input name="@if (in_array($menu['link_tipe'], [App\Enums\TipeLinkEnum::EKSTERNAL])) {{ 'link' }} @endif" class="form-control input-sm" type="text" value="{{ $menu['link'] }}" />
                <span class="text-sm text-red">(misalnya: https://opendesa.id)</span>
            </span>
        </div>
        <div class="form-group">
            <label class="control-label" for="enabled">Status</label>
            <select name="enabled" class="form-control input-sm required">
                <option value="1" @selected($menu['enabled'] == 1)>Aktif</option>
                <option value="0" @selected($menu['enabled'] == 0)>Tidak Aktif</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        {!! batal() !!}
        <button type="submit" class="btn btn-social btn-info btn-sm confirm"><i class="fa fa-check"></i> Simpan</button>
    </div>
</form>
@include('admin.layouts.components.form_modal_validasi')
<script>
    function ganti_jenis_link(elm) {
        let jenis = $(elm).val()
        $('#jenis_link').show();
        $('.jenis_link').hide();
        $('.jenis_link').removeAttr("name");
        $('.jenis_link').removeClass('required');
        // Select2 membuat span terpisah dan perlu ditangani khusus
        $('#validasi span.select2').hide();
        $('#eksternal > input').attr('name', '');

        if (jenis == '1') {
            $('#artikel_statis').show();
            $('#artikel_statis').attr('name', 'link');
            $('#artikel_statis').addClass('required');
        } else if (jenis == {{ App\Enums\TipeLinkEnum::EKSTERNAL }}) {
            $('#eksternal').show();
            $('#eksternal > input').show();
            $('#eksternal > input').attr('name', 'link');
        } else {
            $('#jenis_link').hide();
        }

        $('select.jenis_link:visible').select2({
            width: '100%',
            dropdownAutoWidth: true
        });
    }

    $(document).ready(function() {

        $('#batal').click(function() {
            $('#link_tipe').change();
        });

        setTimeout(function() {
            $('#link_tipe').change();
        }, 500);
    });
</script>
