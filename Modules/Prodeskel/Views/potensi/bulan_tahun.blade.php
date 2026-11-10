<div class="form-group">
    <label for="bulan" class="{{ $controlLabel ?? 'col-sm-2' }} control-label">Bulan</label>
    <div class="{{ $controlInput ?? 'col-sm-10' }}">
        <select name="bulan" class="form-control required">
            @for ($i = 1; $i <= 12; $i++)
                <option @selected($default['bulan'] == $i) value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
</div>
<div class="form-group">
    <label for="tahun" class="{{ $controlLabel ?? 'col-sm-2' }} control-label">Tahun</label>
    <div class="{{ $controlInput ?? 'col-sm-10' }}">
        <select name="tahun" class="form-control required">
            @for ($i = $default['tahun'] - 2; $i <= $default['tahun']; $i++)
                <option @selected($default['tahun'] == $i) value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
</div>
