<?php

defined('BASEPATH') || exit('No direct script access allowed');

use Illuminate\Support\Facades\DB;

class Migrasi_2026111201 extends MY_model
{
    public function up(): bool
    {
        $pamongIds = DB::table('tweb_desa_pamong as pamong')
            ->join('ref_jabatan as jabatan', 'jabatan.id', '=', 'pamong.jabatan_id')
            ->join('config', 'config.id', '=', 'pamong.config_id')
            ->where('pamong.pamong_status', 1)
            ->whereNotNull('pamong.id_pend')
            ->where('jabatan.nama', 'Lurah')
            ->where('config.nama_desa', 'Sitimulyo')
            ->select('pamong.id_pend');

        DB::table('tweb_penduduk')
            ->whereIn('id', $pamongIds)
            ->where('nama', 'H. JUWENI, SE')
            ->update(['nama' => 'MISNAWI, S.Pd.']);

        return true;
    }

    public function down(): bool
    {
        return true;
    }
}
