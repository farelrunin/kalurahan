<?php

/*
 *
 * File ini bagian dari:
 *
 * OpenSID
 *
 * Sistem informasi desa sumber terbuka untuk memajukan desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * Hak Cipta 2016 - 2025 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package   OpenSID
 * @author    Tim Pengembang OpenDesa
 * @copyright Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright Hak Cipta 2016 - 2025 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

namespace Modules\Prodeskel\Services;

use App\Enums\AgamaEnum;
use App\Enums\CacatEnum;
use App\Enums\CaraKBEnum;
use App\Enums\JenisKelaminEnum;
use App\Enums\PekerjaanEnum;
use App\Enums\PendidikanKKEnum;
use App\Enums\PendidikanSedangEnum;
use App\Enums\SHDKEnum;
use App\Enums\StatusDasarEnum;
use App\Enums\StatusKawinEnum;
use App\Enums\WargaNegaraEnum;
use Modules\Prodeskel\Enums\DDKEnum;
use Modules\Prodeskel\Enums\DDKPilihanCheckboxEnum;
use Modules\Prodeskel\Enums\DDKPilihanSelectEnum;
use Modules\Prodeskel\Models\Keluarga;
use Modules\Prodeskel\Models\Penduduk;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Common\Entity\Style\Style;

use OpenSpout\Writer\XLSX\Writer;
use Throwable;
use ZipArchive;

defined('BASEPATH') || exit('No direct script access allowed');

class ProdeskelOnlineServices
{
    private $mapKode = [];
    public function __construct()
    {
        $this->mapKode = $this->generateMapKode();    
        log_message('error', json_encode($this->mapKode));    
    }
    /**
     * Download data keluarga dan anggota dalam format seperti Data.Keluarga.Anggota.xlsx
     */
    public function downloadDataKeluargaAnggota(array $request): void
    {
        try {
            $ids = explode(',', $request['ids']);
            if ($request === [] || empty($ids) || ! is_array($ids)) {
                redirect_with('error', 'Not Acceptable', 'prodeskel/ddk/impor');
            }

            $keluarga = Keluarga::status()
                ->when(! in_array('semua', $ids), static function ($builder) use ($ids): void {
                    $builder->whereIn('id', $ids);
                })
                ->with([
                    'kepalaKeluarga' => static function ($builder): void {
                        $builder->withOnly(['wilayah']);
                        $builder->status(StatusDasarEnum::HIDUP);
                    },
                    'anggota' => static function ($builder): void {
                        $builder->withOnly(['wilayah']);
                        $builder->status(StatusDasarEnum::HIDUP);
                    },
                ])->with(['prodeskelDDK' => static fn($p) => $p->with(['detail' => static fn($q) => $q->whereNotNull('penduduk_id')])])
                ->get();
                    
            $writer = new Writer();
            $fileName = 'Data.Keluarga.Anggota.xlsx';
            $writer->openToBrowser($fileName);

            // Set header
            $this->setHeaderDataKeluargaAnggota($writer);
            
            // Generate data untuk setiap keluarga dan anggotanya
            foreach ($keluarga as $keluarganya) {
                $noUrut = 1;
                $ddk = collect();
                if($keluarganya->prodeskelDDK){
                    $ddk = $keluarganya->prodeskelDDK->detail->groupBy('penduduk_id') ?? collect();
                }
                foreach ($keluarganya->anggota as $anggota) {
                    $ddkAnggota = $ddk->get($anggota->id);
                    $this->generateExcelDataKeluargaAnggota($writer, $keluarganya, $anggota, $ddkAnggota, $noUrut++);
                }
            }
            $writer->close();
        } catch (Throwable $th) {
            log_message('error', $th->getMessage());
            show_error($th->getMessage());
        }
    }

    /**
     * Set header untuk format Data Keluarga Anggota
     */
    private function setHeaderDataKeluargaAnggota(Writer &$writer): void
    {
        $style = (new Style())->setFontBold()->setFontSize(12);

        // Header baris pertama dengan colspan
        $headers1 = [
            'No. KK',
            'No. NIK',
            'NAMA KK',
            'No. Urut Keluarga',
            'Nama Lengkap',
            'Nama Dusun',
            'RT',
            'RW',
            'ALAMAT',
            'No. Akta Kelahiran',
            'Jenis Kelamin',
            'HubKel',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Status Perkawinan',
            'Agama',
            'Golongan_Darah',
            'Kewarnanegaraan',
            'Etnis / Suku',
            'Pendidikan Terakhir',
            'Pekerjaan',
            'Nama Ayah / Ibu',
            'Akseptor KB',
            'Cacat Fisik',
            '',
            '',
            'Cacat Mental',
            '',
            '',
            'Kedudukan sebagai Wajib Pajak',
            '',
            '',
            'Lembaga Pemerintahan yang diikuti',
            '',
            '',
            'Lembaga Kemasyarakatan yang diikuti',
            '',
            '',
            'Lembaga Ekonomi yang diikuti',
            '',
            ''
        ];

        $writer->addRow(Row::fromValues($headers1, $style));
    }

    /**
     * Generate data untuk setiap anggota keluarga
     */
    private function generateExcelDataKeluargaAnggota(Writer &$writer, Keluarga $keluarga, Penduduk $anggota, $ddkAnggota, $noUrut): void
    {        
        // Data untuk kolom biasa
        $basicData = [
            strtoupper($keluarga->no_kk ?? ''),
            strtoupper($anggota->nik ?? ''),
            strtoupper($this->replaceSpasi($keluarga->kepalaKeluarga->nama ?? '')),            
            $noUrut,
            strtoupper($this->replaceSpasi($anggota->nama ?? '')),
            strtoupper('DUSUN<SP>'.$this->replaceSpasi($anggota->wilayah->dusun ?? '')),
            strtoupper($anggota->wilayah->rt ?? ''),
            strtoupper($anggota->wilayah->rw ?? ''),
            strtoupper($this->replaceSpasi($anggota->wilayah->alamat ?? '')),
            strtoupper($anggota->akta_lahir ?? ''),
            strtoupper(JenisKelaminEnum::valueOf($anggota->sex, '')),
            $this->getSHDKValue($anggota->kk_level),
            strtoupper($anggota->tempatlahir ?? ''),
            strtoupper($anggota->tanggallahir ? date('d/m/Y', strtotime($anggota->tanggallahir)) : ''),
            $this->getStatusKawinValue($anggota->status_kawin),
            AgamaEnum::valueOf($anggota->agama_id , ''),
            $anggota->golongan_darah ?? 'Tidak Tahu',
            strtoupper(WargaNegaraEnum::valueOf($anggota->warganegara_id , '')),
            strtoupper($anggota->suku ?? ''),
            $this->getPendidikanValue($anggota->pendidikan_sedang_id),
            $this->mapEnumToPekerjaan($anggota->pekerjaan_id),
            strtoupper($this->replaceSpasi($anggota->nama_ayah  . '/' . $anggota->nama_ibu)),            
        ];
        $akseptorKB = $this->getAkseptorKB($ddkAnggota);
        // Data untuk kolom dengan colspan 3        
        $cacatFisikData = $this->getCacatFisikData($ddkAnggota);
        $cacatMentalData = $this->getCacatMentalData($ddkAnggota);
        $wajibPajakData = $this->getWajibPajakData($ddkAnggota);
        $lembagaPemerintahanData = $this->getLembagaPemerintahanData($ddkAnggota);
        $lembagaKemasyarakatanData = $this->getLembagaKemasyarakatanData($ddkAnggota);
        $lembagaEkonomiData = $this->getLembagaEkonomiData($ddkAnggota);

        // Gabungkan semua data
        $data = array_merge(
            $basicData,
            $akseptorKB,
            $cacatFisikData,
            $cacatMentalData,
            $wajibPajakData,
            $lembagaPemerintahanData,
            $lembagaKemasyarakatanData,
            $lembagaEkonomiData
        );

        $writer->addRow(Row::fromValues($data));
    }

    /**
     * Mendapatkan data untuk kolom Cacat Fisik (3 sub-kolom)
     */
    private function mapKodeValueDDK($ddkAnggota, $kodeField): array
    {
        $data = ['Tidak Ada', 'Tidak Ada', 'Tidak Ada'];        
        if(!$ddkAnggota){
            return $data;
        }        
        $item = $ddkAnggota->where('kode_field', $kodeField)->first()->value ?? [];            
        if($item){
            $temp = $this->getValueKode($kodeField, $item);
            $temp = is_array($temp) ? $temp : [$temp];
            foreach ($temp as $key => $value) {
                if($key > 2) continue;
                $data[$key] = $value;
            }
        }
        return $data;
    }

    /**
     * Mendapatkan data untuk kolom Akseptor KB
     */
    private function getAkseptorKB($ddkAnggota): array
    {
        $akseptorKB = $this->mapKodeValueDDK($ddkAnggota, DDKEnum::KODE_AKSEPTOR_KB);        
        if($akseptorKB[0] == 'Tidak Ada'){
            $akseptorKB[0] = 'Tidal Menjawab';
        }
        return [$akseptorKB[0] ?? 'Tidak Menjawab'];
    }

    /**
     * Mendapatkan data untuk kolom Cacat Fisik (3 sub-kolom)
     */
    private function getCacatFisikData($ddkAnggota): array
    {
        return $this->mapKodeValueDDK($ddkAnggota, DDKEnum::KODE_CACAT_FISIK);        
    }

    /**
     * Mendapatkan data untuk kolom Cacat Mental (3 sub-kolom)
     */
    private function getCacatMentalData($ddkAnggota): array
    {
        return $this->mapKodeValueDDK($ddkAnggota, DDKEnum::KODE_CACAT_MENTAL);
    }

    /**
     * Mendapatkan data untuk kolom Kedudukan sebagai Wajib Pajak (3 sub-kolom)
     */
    private function getWajibPajakData($ddkAnggota): array
    {
        return $this->mapKodeValueDDK($ddkAnggota, DDKEnum::KODE_KEDUDUKAN_ANGGOTA_SEBAGAI_WAJIB_PAJAK_DAN_RETRIBUSI);
    }

    /**
     * Mendapatkan data untuk kolom Lembaga Pemerintahan yang diikuti (3 sub-kolom)
     */
    private function getLembagaPemerintahanData($ddkAnggota): array
    {
        return $this->mapKodeValueDDK($ddkAnggota, DDKEnum::KODE_LEMBAGA_PEMERINTAHAN_YANG_DIIKUTI_ANGGOTA);
    }

    /**
     * Mendapatkan data untuk kolom Lembaga Kemasyarakatan yang diikuti (3 sub-kolom)
     */
    private function getLembagaKemasyarakatanData($ddkAnggota): array
    {
        return $this->mapKodeValueDDK($ddkAnggota, DDKEnum::KODE_LEMBAGA_KEMASYARAKATAN_YANG_DIIKUTI_ANGGOTA);
    }

    /**
     * Mendapatkan data untuk kolom Lembaga Ekonomi yang diikuti (3 sub-kolom)
     */
    private function getLembagaEkonomiData($ddkAnggota): array
    {
        return $this->mapKodeValueDDK($ddkAnggota, DDKEnum::KODE_LEMBAGA_EKONOMI_YANG_DIMILIKI_ANGGOTA);
    }

    /**
     * Menambahkan mergeCells ke file XLSX hasil OpenSpout
     *
     * @param string $filePath  Lokasi file XLSX (harus sudah dibuat oleh OpenSpout)
     * @param array $ranges     Contoh: ['A1:C1', 'B2:D2', 'A3:A5']
     *
     * @return bool
     */
    function mergeCells(string $filePath, array $ranges)
    {
        $zip = new ZipArchive;

        if ($zip->open($filePath) === TRUE) {

            // ambil isi sheet1.xml
            $xml = $zip->getFromName('xl/worksheets/sheet1.xml');

            if (! $xml) {
                return false;
            }

            // buat blok mergeCells
            $mergeCount = count($ranges);
            $mergeBlock = "<mergeCells count=\"{$mergeCount}\">";

            foreach ($ranges as $ref) {
                $mergeBlock .= "<mergeCell ref=\"{$ref}\"/>";
            }

            $mergeBlock .= "</mergeCells>";

            // tempatkan sebelum </worksheet>
            $xml = str_replace('</worksheet>', $mergeBlock . '</worksheet>', $xml);

            // simpan balik ke ZIP
            $zip->addFromString('xl/worksheets/sheet1.xml', $xml);

            $zip->close();
            return true;
        }

        return false;
    }

    private function replaceSpasi($string){
        return str_replace(' ','<SP>', $string);
    }

    private function generateMapKode()
    {
        return array_merge(DDKEnum::semuaMultipleSelect(),
            [
                DDKEnum::KODE_LEMBAGA_PEMERINTAHAN_YANG_DIIKUTI_ANGGOTA => DDKPilihanSelectEnum::LEMBAGA_PEMERINTAHAN_YANG_DIIKUTI_ANGGOTA,
            ]
        );
    }
    private function getValueKode($kode, $value)
    {
        if (is_array($value)) {
                $result = [];
                foreach($value as $item){
                    $temp = $this->mapKode[$kode][$item] ?? '';
                    if($temp){
                        array_push($result, $temp);
                    }
                }
                return $result;
            }
        return $this->mapKode[$kode][$value] ?? '';
    }

    private function getSHDKValue($kkLevel){
        $value = SHDKEnum::valueOf($kkLevel);
        if($value == 'ANAK'){
            $value = 'Anak Kandung';
        }
        return ucwords(strtolower($value));
    }

    private function getStatusKawinValue($statusKawin){
        $value = in_array($statusKawin, [StatusKawinEnum::CERAIHIDUP, StatusKawinEnum::CERAIMATI]) ? 'Janda/Duda' : StatusKawinEnum::valueOf($statusKawin);
        return ucwords(strtolower($value));
    }

    private function getPendidikanValue($pendidikanSedang){
        $value = PendidikanSedangEnum::valueOf($pendidikanSedang);
        return ucwords(strtolower($value));
    }

    /**
     * Convert OpenSID enum values to detailed job titles
     *
     * @param int $pekerjaanEnum The OpenSID enum value to convert
     * @return string The corresponding detailed job title
     */
    public function mapEnumToPekerjaan(int $pekerjaanEnum): string
    {        
        // Define the mapping array - keys are OpenSID enum values, values are detailed job titles
        $jobMapping = array(
            PekerjaanEnum::BELUM_TIDAK_BEKERJA => 'Belum Bekerja',
            PekerjaanEnum::MENGURUS_RUMAH_TANGGA => 'Ibu Rumah Tangga',
            PekerjaanEnum::PELAJAR_MAHASISWA => 'Pelajar',
            PekerjaanEnum::PENSIUNAN => 'Purnawirawan/Pensiunan',
            PekerjaanEnum::PEGAWAI_NEGERI_SIPIL_PNS => 'Pegawai Negeri Sipil',
            PekerjaanEnum::TENTARA_NASIONAL_INDONESIA_TNI => 'TNI',
            PekerjaanEnum::KEPOLISIAN_RI_POLRI => 'POLRI',
            PekerjaanEnum::PERDAGANGAN => 'Pedagang Keliling',
            PekerjaanEnum::PETANI_PEKEBUN => 'Petani',
            PekerjaanEnum::PETERNAK => 'Peternak',
            PekerjaanEnum::NELAYAN_PERIKANAN => 'Nelayan',
            PekerjaanEnum::INDUSTRI => '', // More specific mapping needed based on actual industry
            PekerjaanEnum::KONSTRUKSI => '', // More specific mapping needed based on actual construction job
            PekerjaanEnum::TRANSPORTASI => 'Buruh usaha jasa transportasi dan perhubungan',
            PekerjaanEnum::KARYAWAN_SWASTA => 'Karyawan Perusahaan Swasta',
            PekerjaanEnum::KARYAWAN_BUMN => 'Karyawan Perusahaan Pemerintah',
            PekerjaanEnum::KARYAWAN_BUMD => 'Karyawan Perusahaan Pemerintah',
            PekerjaanEnum::KARYAWAN_HONORER => 'Karyawan Honorer',
            PekerjaanEnum::BURUH_HARIAN_LEPAS => 'Buruh Harian Lepas',
            PekerjaanEnum::BURUH_TANI_PERKEBUNAN => 'Buruh Tani',
            PekerjaanEnum::BURUH_NELAYAN_PERIKANAN => '', // Could be more specific
            PekerjaanEnum::BURUH_PETERNAKAN => '', // Could be more specific
            PekerjaanEnum::PEMBANTU_RUMAH_TANGGA => 'Pembantu rumah tangga',
            PekerjaanEnum::TUKANG_CUKUR => 'Tukang Cukur',
            PekerjaanEnum::TUKANG_LISTRIK => 'Tukang Listrik',
            PekerjaanEnum::TUKANG_BATU => 'Tukang Batu',
            PekerjaanEnum::TUKANG_KAYU => 'Tukang Kayu',
            PekerjaanEnum::TUKANG_SOL_SEPATU => '', // Specific to shoe repair
            PekerjaanEnum::TUKANG_LAS_PANDAI_BESI => 'Tukang Las',
            PekerjaanEnum::TUKANG_JAHIT => 'Tukang Jahit',
            PekerjaanEnum::TUKANG_GIGI => 'Tukang Gigi',
            PekerjaanEnum::PENATA_RIAS => 'Tukang Rias',
            PekerjaanEnum::PENATA_BUSANA => '', // Could be related to fashion design
            PekerjaanEnum::PENATA_RAMBUT => '', // Could be related to hairdresser
            PekerjaanEnum::MEKANIK => 'Montir',
            PekerjaanEnum::SENIMAN => 'Seniman/artis',
            PekerjaanEnum::TABIB => 'Dukun Tradisional',
            PekerjaanEnum::PARAJI => '', // Traditional birth attendant
            PekerjaanEnum::PERANCANG_BUSANA => '', // Could be related to design
            PekerjaanEnum::PENTERJEMAH => '', // Translator
            PekerjaanEnum::IMAM_MASJID => 'Pemuka Agama',
            PekerjaanEnum::PENDETA => 'Pemuka Agama',
            PekerjaanEnum::PASTOR => 'Pemuka Agama',
            PekerjaanEnum::WARTAWAN => 'Wartawan',
            PekerjaanEnum::USTADZ_MUBALIGH => 'Pemuka Agama',
            PekerjaanEnum::JURU_MASAK => 'Juru Masak',
            PekerjaanEnum::PROMOTOR_ACARA => '',
            PekerjaanEnum::ANGGOTA_DPR_RI => 'Anggota Legislatif',
            PekerjaanEnum::ANGGOTA_DPD => 'Anggota Legislatif',
            PekerjaanEnum::ANGGOTA_BPK => '', // Could map to government position
            PekerjaanEnum::PRESIDEN => 'Presiden',
            PekerjaanEnum::WAKIL_PRESIDEN => 'Wakil presiden',
            PekerjaanEnum::ANGGOTA_MAHKAMAH_KONSTITUSI => 'Anggota mahkamah konstitusi',
            PekerjaanEnum::ANGGOTA_KABINET_KEMENTERIAN => 'Anggota kabinet kementrian',
            PekerjaanEnum::DUTA_BESAR => 'Duta besar',
            PekerjaanEnum::GUBERNUR => 'Gubernur',
            PekerjaanEnum::WAKIL_GUBERNUR => 'Wakil Gubernur',
            PekerjaanEnum::BUPATI => 'Bupati/walikota',
            PekerjaanEnum::WAKIL_BUPATI => 'Wakil bupati',
            PekerjaanEnum::WALIKOTA => 'Bupati/walikota',
            PekerjaanEnum::ANGGOTA_DPRD_PROVINSI => 'Anggota Legislatif',
            PekerjaanEnum::ANGGOTA_DPRD_KABUPATEN_KOTA => 'Anggota Legislatif',
            PekerjaanEnum::DOSEN => 'Dosen swasta',
            PekerjaanEnum::GURU => 'Guru swasta',
            PekerjaanEnum::PILOT => 'Pilot',
            PekerjaanEnum::PENGACARA => 'Pengacara',
            PekerjaanEnum::NOTARIS => 'Notaris',
            PekerjaanEnum::ARSITEK => 'Arsitektur/Desainer',
            PekerjaanEnum::AKUNTAN => 'Akuntan',
            PekerjaanEnum::KONSULTAN => 'Jasa Konsultansi Manajemen dan Teknis',
            PekerjaanEnum::DOKTER => 'Dokter swasta',
            PekerjaanEnum::BIDAN => 'Bidan swasta',
            PekerjaanEnum::PERAWAT => 'Perawat swasta',
            PekerjaanEnum::APOTEKER => 'Apoteker',
            PekerjaanEnum::PSIKIATER_PSIKOLOG => 'Pskiater/Psikolog',
            PekerjaanEnum::PENYIAR_TELEVISI => '', // Could be more specific
            PekerjaanEnum::PENYIAR_RADIO => 'Penyiar radio',
            PekerjaanEnum::PELAUT => 'Pelaut',
            PekerjaanEnum::PENELITI => 'Peneliti',
            PekerjaanEnum::SOPIR => 'Sopir',
            PekerjaanEnum::PIALANG => 'Pialang',
            PekerjaanEnum::PARANORMAL => 'Dukun/paranormal/supranatural',
            PekerjaanEnum::PEDAGANG => 'Pedagang barang kelontong',
            PekerjaanEnum::PERANGKAT_DESA => 'Perangkat Desa',
            PekerjaanEnum::KEPALA_DESA => 'Kepala Daerah',
            PekerjaanEnum::BIARAWATI => 'Biarawati',
            PekerjaanEnum::WIRASWASTA => 'Wiraswasta',
            PekerjaanEnum::LAINNYA => '',
        );        
        // Return the mapped value or the original if no mapping exists
        return $jobMapping[$pekerjaanEnum] ?? PekerjaanEnum::valueOf($pekerjaanEnum);
    }
}
