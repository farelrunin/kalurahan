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
use App\Models\Wilayah;
use Modules\Prodeskel\Enums\DDKEnum;
use Modules\Prodeskel\Services\ProdeskelDDKImporServices;
use Modules\Prodeskel\Services\ProdeskelDDKServices;
use Modules\Prodeskel\Services\ProdeskelDDKTemplateHtmlServices;
use Modules\Prodeskel\Services\ProdeskelOnlineServices;

class DDK extends AdminModulController
{
    public $modul_ini       = 'prodeskel';
    public $sub_modul_ini   = 'prodeskel-ddk';
    public $aliasController = 'prodeskel';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $wilayah  = Wilayah::treeAccess();
        return view('prodeskel::ddk.index', compact('wilayah'));
    }

    public function datatablesDDK()
    {
        if ($this->input->is_ajax_request()) {
            return (new ProdeskelDDKServices())->datatables();
        }

        show_error('Hanya bisa diakses melalui ajax', 405);
    }

    public function ddkForm($keluarga_id)
    {
        return (new ProdeskelDDKServices())->form($keluarga_id);
    }

    public function ddkSave($tipe, $keluarga_id = null)
    {
        if (! $this->input->is_ajax_request()) {
            show_error('Hanya bisa diakses melalui ajax', 405);
        }

        switch ($tipe) {
            case 'pengaturan':
                return (new ProdeskelDDKServices())->savePengaturan($this->request);

            case 'form':
                return (new ProdeskelDDKServices())->save($keluarga_id, $this->request);

            default:
                show_404();
        }
    }

    public function ddkCetak($keluarga_id)
    {
        return (new ProdeskelDDKServices())->rtf($keluarga_id);
    }

    public function ddkImpor($tipe = 'impor')
    {
        if (! $this->input->is_ajax_request()) {
            switch ($tipe) {
                case 'download-template-impor-ddk':
                    ambilBerkas('TemplateImporDDK.xlsm', null, null, DDKEnum::PATH_TEMPLATE);
                    break;

                case 'download-daftar-data-impor-ddk':
                    (new ProdeskelDDKImporServices())->downloadDaftarDataImpor($this->request);
                    redirect('prodeskel/ddk/impor');
                    break;

                case 'download-daftar-data-prodeskel-online':
                    (new ProdeskelOnlineServices())->downloadDataKeluargaAnggota($this->request);
                    redirect('prodeskel/ddk/impor');
                    break;

                case 'upload-excel-ubahan':
                    (new ProdeskelDDKImporServices())->prosesImporExcelUbahan($this->request);
                    break;

                default:
                    $wilayah  = Wilayah::treeAccess();
                    return view('prodeskel::ddk.impor', compact('wilayah'));
            }
        }

        show_404();
    }

    public function templateHtml(): void
    {
        echo ProdeskelDDKTemplateHtmlServices::templateKeluarga() . ProdeskelDDKTemplateHtmlServices::templateAnggota();
    }
}
