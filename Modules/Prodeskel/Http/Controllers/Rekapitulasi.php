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

use App\Models\Pamong;
use Modules\Prodeskel\Libraries\Perkembangan as PerkembanganConverter;
use Modules\Prodeskel\Libraries\Potensi as PotensiConverter;
use Modules\Prodeskel\Models\Komoditas;
use Modules\Prodeskel\Models\Perkembangan;
use Modules\Prodeskel\Models\Potensi;
use Spipu\Html2Pdf\Html2Pdf;

class Rekapitulasi extends AdminModulController
{
    public $modul_ini       = 'prodeskel';
    public $aliasController = 'prodeskel';
    public $sub_modul_ini   = 'prodeskel-rekapitulasi';
    private $readonlyForm   = false;
    private $tipeLaporan    = '';
    protected $activeMenu   = '';
    private $listTahun      = [];
    private $childMenu      = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('prodeskel::rekapitulasi.index', ['activeMenu' => $this->activeMenu]);
    }

    public function profil()
    {
        $this->tipeLaporan = 'profil';
        $this->childMenu   = 'profil';
        $this->utama();
    }

    public function potensi()
    {
        $this->tipeLaporan = 'potensi';
        $this->childMenu   = 'potensi';
        $this->listTahun   = Potensi::distinct('tahun')->select(['tahun'])->orderByDesc('tahun')->pluck('tahun', 'tahun');
        $this->utama();
    }

    public function perkembangan()
    {
        $this->tipeLaporan = 'perkembangan';
        $this->childMenu   = 'perkembangan';
        $this->listTahun   = Perkembangan::distinct('tahun')->select(['tahun'])->orderByDesc('tahun')->pluck('tahun', 'tahun');
        $this->utama();
    }

    private function utama()
    {
        $judul = $this->tipeLaporan == 'profil' ? 'profil desa & kelurahan' : $this->tipeLaporan;

        return view('prodeskel::rekapitulasi.utama', ['judul' => $judul, 'childMenu' => $this->childMenu, 'activeMenu' => $this->activeMenu, 'tahuns' => $this->listTahun, 'tipe' => $this->tipeLaporan]);
    }

    public function report($aksi = 'html')
    {
        $tipe   = $this->input->get('tipe');
        $tahun  = $this->input->get('tahun');
        $sekdes = Pamong::sekretarisDesa()->first();
        $kades  = Pamong::kepalaDesa()->first();
        $data   = $this->getData($tipe, $tahun);

        if ($aksi == 'pdf') {
            $html = view('prodeskel::rekapitulasi.partial.' . $tipe, ['tahun' => $tahun, 'kades' => $kades, 'sekdes' => $sekdes, 'data' => $data], [], true);

            return $this->downloadPdf($html);
        }
        if ($data) {
            return view('prodeskel::rekapitulasi.partial.' . $tipe, ['tahun' => $tahun, 'kades' => $kades, 'sekdes' => $sekdes, 'data' => $data]);
        }
    }

    private function downloadPdf($html)
    {
        $html2pdf = new TCPDF();
        // add a page
        $html2pdf->AddPage();
        // $html2pdf = new Html2Pdf();
        $html2pdf->writeHTML($html, true, false, true, false, '');
        $html2pdf->output(tempnam(sys_get_temp_dir(), '') . '.pdf', 'FI');
    }

    private function getData($tipe, $tahun)
    {
        if (empty($tahun)) {
            redirect_with('error', 'Tahun harus diisi', 'prodeskel/rekapitulasi/' . $tipe);
        }

        switch ($tipe) {
            case 'potensi':
                $dataKomoditas = Komoditas::selectRaw('1 as bulan, tahun, data, kategori, komoditas as item')->where(['tahun' => $tahun]);
                $dataPotensi   = Potensi::selectRaw('bulan, tahun, data, kategori, 1 as item')->where(['tahun' => $tahun])->union($dataKomoditas)->get()->groupBy('kategori');

                return (new PotensiConverter($dataPotensi))->convert();

            case 'perkembangan':
                $kategoriPertanian = ['produksi-perikanan', 'produksi-peternakan', 'hasil-produksi-kebun', 'hasil-produksi-pangan'];
                $kategoriPotensi   = ['batas-wilayah', 'sarana-dusun', 'badan-perwakilan-desa', 'sarana-desa'];
                $dataPotensi       = Potensi::selectRaw('bulan, tahun, data, kategori, 1 as item')->whereIn('kategori', $kategoriPotensi)->where(['tahun' => $tahun]);
                $dataKomoditas     = Komoditas::selectRaw('1 as bulan, tahun, data, kategori, komoditas as item')->whereIn('kategori', $kategoriPertanian)->where(['tahun' => $tahun]);
                $dataPerkembangan  = Perkembangan::select(['bulan', 'tahun', 'data', 'kategori', 'item'])->where(['tahun' => $tahun])->union($dataKomoditas)->union($dataPotensi)->get()->groupBy('kategori');

                return (new PerkembanganConverter($dataPerkembangan))->convert();

            default:
                return [];
        }
    }
}
