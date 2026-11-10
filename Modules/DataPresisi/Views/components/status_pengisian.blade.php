<div class="col-sm-2">
    <select name="status_pengisian" id="status_pengisian" class="form-control input-sm select2">
        <option value="">Pilih Status</option>
        @foreach (\Modules\DataPresisi\Enums\StatusPengisianEnum::all() as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
        @endforeach
    </select>
</div>
