<div class="{{ $coldusun ?? 'col-sm-2' }}">
    @if ($labelWilayah)
        <label for="dusun-modal">{{ ucwords(setting('sebutan_dusun')) }}</label>
    @endif
    <select id="dusun-modal" class="form-control input-sm select2" @disabled($disableFilter ?? false)>
        <option value="">Pilih {{ ucwords(setting('sebutan_dusun')) }}</option>
        @foreach ($wilayah as $keydusun => $dusun)
            <option value="{{ $keydusun }}">{{ $keydusun }}</option>
        @endforeach
    </select>
</div>
<div class="{{ $colRw ?? 'col-sm-2' }}">
    @if ($labelWilayah)
        <label for="rw-modal">RW</label>
    @endif
    <select id="rw-modal" class="form-control input-sm select2" @disabled($disableFilter ?? false)>
        <option value="">Pilih RW</option>
        @foreach ($wilayah as $keydusun => $dusun)
            <optgroup value="{{ $keydusun }}" label="{{ ucwords(setting('sebutan_dusun')) . ' ' . $keydusun }}">
                @foreach ($dusun as $keyRw => $rw)
                    <option value="{{ $keydusun }}__{{ $keyRw }}">{{ $keyRw }}</option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>
<div class="{{ $colRt ?? 'col-sm-2' }}">
    @if ($labelWilayah)
        <label for="rt-modal">RT</label>
    @endif
    <select id="rt-modal" class="form-control input-sm select2" @disabled($disableFilter ?? false)>
        <option value="">Pilih RT</option>
        @foreach ($wilayah as $keydusun => $dusun)
            @foreach ($dusun as $keyRw => $rw)
                <optgroup value="{{ $keydusun }}__{{ $keyRw }}" label="{{ 'RW ' . $keyRw }}">
                    @foreach ($rw as $rt)
                        <option value="{{ $rt->id }}">{{ $rt->rt }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        @endforeach
    </select>
</div>
@push('css')
    <style>
        .select2-results__option[aria-disabled=true] {
            display: none;
        }
    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dusun-modal').change(function() {
                let _label = $(this).find('option:selected').val()
                $('#rw-modal').find(`optgroup`).prop('disabled', 1)
                if ($(this).val()) {
                    $('#rw-modal').closest('div').show()
                    $('#rw-modal').find(`optgroup[value="${_label}"]`).prop('disabled', 0)
                } else {
                    $('#rw-modal').closest('div').hide()
                    $('#rw-modal').find(`optgroup`).prop('disabled', 1)
                }
                $('#rw-modal').val('')
                $('#rw-modal').trigger('change')
            })

            $('#rw-modal').change(function() {
                let _label = $(this).find('option:selected').val()
                $('#rt-modal').find(`optgroup`).prop('disabled', 1)
                if ($(this).val()) {
                    $('#rt-modal').closest('div').show()
                    $('#rt-modal').find(`optgroup[value="${_label}"]`).prop('disabled', 0)
                } else {
                    $('#rt-modal').closest('div').hide()
                    $('#rt-modal').find(`optgroup`).prop('disabled', 1)
                }
            })            
        })
    </script>
@endpush
