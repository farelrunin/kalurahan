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

namespace Modules\Prodeskel\Libraries;

use Illuminate\Support\Collection;
use Modules\Prodeskel\Enums\AngkatanKerjaEnum;
use Modules\Prodeskel\Enums\JenisBahanGalianEnum;
use Modules\Prodeskel\Enums\JenisCacatEnum;
use Modules\Prodeskel\Enums\JenisPekerjaanEnum;
use Modules\Prodeskel\Enums\JenisPerikananEnum;
use Modules\Prodeskel\Enums\JenisPotensiAirEnum;
use Modules\Prodeskel\Enums\JenisSumberAirEnum;
use Modules\Prodeskel\Enums\JenisTernakEnum;
use Modules\Prodeskel\Enums\KomoditasAgamaEnum;
use Modules\Prodeskel\Enums\KomoditasAirPanasEnum;
use Modules\Prodeskel\Enums\KomoditasHasilHutanEnum;
use Modules\Prodeskel\Enums\KomoditasJenisDampakHutanEnum;
use Modules\Prodeskel\Enums\KomoditasJenisHutanEnum;
use Modules\Prodeskel\Enums\KomoditasJenisLembagaEnum;
use Modules\Prodeskel\Enums\KomoditasJenisTempatIbadahEnum;
use Modules\Prodeskel\Enums\KomoditasKebisinganEnum;
use Modules\Prodeskel\Enums\KomoditasKualitasAirEnum;
use Modules\Prodeskel\Enums\KomoditasKualitasUdaraEnum;
use Modules\Prodeskel\Enums\KomoditasLembagaEkonomiEnum;
use Modules\Prodeskel\Enums\KomoditasLembagaPendidikanEnum;
use Modules\Prodeskel\Enums\KomoditasPotensiWisataEnum;
use Modules\Prodeskel\Enums\KomoditasRuangPublikEnum;
use Modules\Prodeskel\Enums\KomoditasSukuEnum;
use Modules\Prodeskel\Enums\KomoditasTanamanBuahEnum;
use Modules\Prodeskel\Enums\KomoditasTanamanKebunEnum;
use Modules\Prodeskel\Enums\KomoditasTanamanPanganEnum;
use Modules\Prodeskel\Enums\KomoditasWargaNegaraEnum;
use Modules\Prodeskel\Enums\KriteriaTenagaKerjaEnum;
use Modules\Prodeskel\Enums\PrasaranaKesehatanEnum;
use Modules\Prodeskel\Enums\SaranaKesehatanEnum;
use Modules\Prodeskel\Enums\SaranaOlahragaEnum;
use Modules\Prodeskel\Enums\SaranaPendidikanEnum;
use Modules\Prodeskel\Enums\SaranaWisataEnum;
use Modules\Prodeskel\Enums\YaEnum;

defined('BASEPATH') || exit('No direct script access allowed');

class Potensi
{
    private $data;

    public function __construct(Collection $data)
    {
        $this->data = $data;
    }

    public function convert()
    {
        $batasWilayah            = $this->data['batas-wilayah'] ? $this->data['batas-wilayah']->sortByDesc('bulan')->first()->data : [];
        $jenisLahan              = $this->data['jenis-lahan'] ? $this->data['jenis-lahan']->sortByDesc('bulan')->first()->data : [];
        $iklim                   = $this->data['iklim'] ? $this->data['iklim']->sortByDesc('bulan')->first()->data : [];
        $topografi               = $this->data['topografi'] ? $this->data['topografi']->sortByDesc('bulan')->first()->data : [];
        $kepemilikanLahan        = $this->data['kepemilikan-lahan'] ? $this->data['kepemilikan-lahan']->sortByDesc('bulan')->first()->data : [];
        $dataHasilProduksiPangan = $this->data['hasil-produksi-pangan'] ? $this->data['hasil-produksi-pangan']->groupBy('item') : [];
        $hasilProduksiPangan     = [];
        if ($dataHasilProduksiPangan) {
            foreach ($dataHasilProduksiPangan as $key => $item) {
                $dataItem                                                       = $item->sortByDesc('bulan')->first()->data;
                $hasilProduksiPangan[KomoditasTanamanPanganEnum::valueOf($key)] = $dataItem;
            }
        }
        $kepemilikanLahanBuah  = $this->data['kepemilikan-lahan-buah'] ? $this->data['kepemilikan-lahan-buah']->sortByDesc('bulan')->first()->data : [];
        $dataHasilProduksiBuah = $this->data['hasil-produksi-buah'] ? $this->data['hasil-produksi-buah']->groupBy('item') : [];
        $hasilProduksiBuah     = [];
        if ($dataHasilProduksiBuah) {
            foreach ($dataHasilProduksiBuah as $key => $item) {
                $dataItem                                                   = $item->sortByDesc('bulan')->first()->data;
                $hasilProduksiBuah[KomoditasTanamanBuahEnum::valueOf($key)] = $dataItem;
            }
        }
        $kepemilikanLahanKebun  = $this->data['kepemilikan-lahan-kebun'] ? $this->data['kepemilikan-lahan-kebun']->sortByDesc('bulan')->first()->data : [];
        $dataHasilProduksiKebun = $this->data['hasil-produksi-kebun'] ? $this->data['hasil-produksi-kebun']->groupBy('item') : [];
        $hasilProduksiKebun     = [];
        if ($dataHasilProduksiKebun) {
            foreach ($dataHasilProduksiKebun as $key => $item) {
                $dataItem                                                     = $item->sortByDesc('bulan')->first()->data;
                $hasilProduksiKebun[KomoditasTanamanKebunEnum::valueOf($key)] = $dataItem;
            }
        }
        $kepemilikanLahanHutan  = $this->data['kepemilikan-lahan-hutan'] ? $this->data['kepemilikan-lahan-hutan']->sortByDesc('bulan')->first()->data : [];
        $dataHasilProduksiHutan = $this->data['hasil-hutan'] ? $this->data['hasil-hutan']->groupBy('item') : [];
        $hasilProduksiHutan     = [];
        if ($dataHasilProduksiHutan) {
            foreach ($dataHasilProduksiHutan as $key => $item) {
                $dataItem                                                   = $item->sortByDesc('bulan')->first()->data;
                $hasilProduksiHutan[KomoditasHasilHutanEnum::valueOf($key)] = $dataItem;
            }
        }
        $dataKondisiHutan = $this->data['kondisi-hutan'] ? $this->data['kondisi-hutan']->groupBy('item') : [];
        $kondisiHutan     = [];
        if ($dataKondisiHutan) {
            foreach ($dataKondisiHutan as $key => $item) {
                $dataItem                                             = $item->sortByDesc('bulan')->first()->data;
                $kondisiHutan[KomoditasJenisHutanEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataDampakPengolahanHutan = $this->data['dampak-pengolahan-hutan'] ? $this->data['dampak-pengolahan-hutan']->groupBy('item') : [];
        $dampakPengolahanHutan     = [];
        if ($dataDampakPengolahanHutan) {
            foreach ($dataDampakPengolahanHutan as $key => $item) {
                $dataItem                                                            = $item->sortByDesc('bulan')->first()->data;
                $dampakPengolahanHutan[KomoditasJenisDampakHutanEnum::valueOf($key)] = $dataItem;
            }
        }
        $dataJenisPopulasiTernak = $this->data['jenis-populasi-ternak'] ? $this->data['jenis-populasi-ternak']->groupBy('item') : [];
        $jenisPopulasiTernak     = [];
        if ($dataJenisPopulasiTernak) {
            foreach ($dataJenisPopulasiTernak as $key => $item) {
                $dataItem                                            = $item->sortByDesc('bulan')->first()->data;
                $jenisPopulasiTernak[JenisTernakEnum::valueOf($key)] = $dataItem;
            }
        }
        $dataProduksiPeternakan = $this->data['produksi-peternakan'] ? $this->data['produksi-peternakan']->groupBy('item') : [];
        $produksiPeternakan     = [];
        if ($dataProduksiPeternakan) {
            foreach ($dataProduksiPeternakan as $key => $item) {
                $dataItem                 = $item->sortByDesc('bulan')->first()->data;
                $produksiPeternakan[$key] = $dataItem;
            }
        }

        $lahanPakanTernak          = $this->data['lahan-dan-pakan-ternak'] ? $this->data['lahan-dan-pakan-ternak']->sortByDesc('bulan')->first()->data : [];
        $dataPengolahanHasilTernak = $this->data['pengolahan-hasil-ternak'] ? $this->data['pengolahan-hasil-ternak']->groupBy('item') : [];
        $pengolahanHasilTernak     = [];
        if ($dataPengolahanHasilTernak) {
            foreach ($dataPengolahanHasilTernak as $key => $item) {
                $dataItem                    = $item->sortByDesc('bulan')->first()->data;
                $pengolahanHasilTernak[$key] = $dataItem;
            }
        }
        $dataProduksiPerikanan = $this->data['produksi-perikanan'] ? $this->data['produksi-perikanan']->groupBy('item') : [];
        $produksiPerikanan     = [];
        if ($dataProduksiPerikanan) {
            foreach ($dataProduksiPerikanan as $key => $item) {
                $dataItem                                             = $item->sortByDesc('bulan')->first()->data;
                $produksiPerikanan[JenisPerikananEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataProduksiPerikananTawar = $this->data['alat-produksi-ikan-tawar'] ? $this->data['alat-produksi-ikan-tawar']->groupBy('item') : [];
        $produksiPerikananTawar     = [];
        if ($dataProduksiPerikananTawar) {
            foreach ($dataProduksiPerikananTawar as $key => $item) {
                $dataItem                     = $item->sortByDesc('bulan')->first()->data;
                $produksiPerikananTawar[$key] = $dataItem;
            }
        }

        $dataProduksiPerikananLaut = $this->data['alat-produksi-ikan-laut'] ? $this->data['alat-produksi-ikan-laut']->groupBy('item') : [];
        $produksiPerikananLaut     = [];
        if ($dataProduksiPerikananLaut) {
            foreach ($dataProduksiPerikananLaut as $key => $item) {
                $dataItem                    = $item->sortByDesc('bulan')->first()->data;
                $produksiPerikananLaut[$key] = $dataItem;
            }
        }
        $dataProduksiBahanGalian = $this->data['deposit-dan-produksi-bahan-galian'] ? $this->data['deposit-dan-produksi-bahan-galian']->groupBy('item') : [];
        $produksiBahanGalian     = [];
        if ($dataProduksiBahanGalian) {
            foreach ($dataProduksiBahanGalian as $key => $item) {
                $dataItem                                                 = $item->sortByDesc('bulan')->first()->data;
                $produksiBahanGalian[JenisBahanGalianEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataPotensiSumberDayaAir = $this->data['potensi-dan-pemanfaatan-air'] ? $this->data['potensi-dan-pemanfaatan-air']->groupBy('item') : [];
        $potensiSumberDayaAir     = [];
        if ($dataPotensiSumberDayaAir) {
            foreach ($dataPotensiSumberDayaAir as $key => $item) {
                $dataItem                                                 = $item->sortByDesc('bulan')->first()->data;
                $potensiSumberDayaAir[JenisPotensiAirEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataSumberAirBersih = $this->data['sumber-air-bersih'] ? $this->data['sumber-air-bersih']->groupBy('item') : [];
        $sumberAirBersih     = [];
        if ($dataSumberAirBersih) {
            foreach ($dataSumberAirBersih as $key => $item) {
                $dataItem                                           = $item->sortByDesc('bulan')->first()->data;
                $sumberAirBersih[JenisSumberAirEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataKualitasAirMinum = $this->data['kualitas-air'] ? $this->data['kualitas-air']->groupBy('item') : [];
        $kualitasAirMinum     = [];
        if ($dataKualitasAirMinum) {
            foreach ($dataKualitasAirMinum as $key => $item) {
                $dataItem                                                  = $item->sortByDesc('bulan')->first()->data;
                $kualitasAirMinum[KomoditasKualitasAirEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataAirPanas = $this->data['air-panas'] ? $this->data['air-panas']->groupBy('item') : [];
        $airPanas     = [];
        if ($dataAirPanas) {
            foreach ($dataAirPanas as $key => $item) {
                $dataItem                                       = $item->sortByDesc('bulan')->first()->data;
                $airPanas[KomoditasAirPanasEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataKualitasUdara = $this->data['kualitas-udara'] ? $this->data['kualitas-udara']->groupBy('item') : [];
        $kualitasUdara     = [];
        if ($dataKualitasUdara) {
            foreach ($dataKualitasUdara as $key => $item) {
                $dataItem                                                 = $item->sortByDesc('bulan')->first()->data;
                $kualitasUdara[KomoditasKualitasUdaraEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataKebisingan = $this->data['kebisingan'] ? $this->data['kebisingan']->groupBy('item') : [];
        $kebisingan     = [];
        if ($dataKebisingan) {
            foreach ($dataKebisingan as $key => $item) {
                $dataItem                                           = $item->sortByDesc('bulan')->first()->data;
                $kebisingan[KomoditasKebisinganEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataRuangPublikTaman = $this->data['ruang-publik'] ? $this->data['ruang-publik']->groupBy('item') : [];
        $ruangPublikTaman     = [];
        if ($dataRuangPublikTaman) {
            foreach ($dataRuangPublikTaman as $key => $item) {
                $dataItem                                                  = $item->sortByDesc('bulan')->first()->data;
                $ruangPublikTaman[KomoditasRuangPublikEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataPotensiWisata = $this->data['potensi-wisata'] ? $this->data['potensi-wisata']->groupBy('item') : [];
        $potensiWisata     = [];
        if ($dataPotensiWisata) {
            foreach ($dataPotensiWisata as $key => $item) {
                $dataItem                                                 = $item->sortByDesc('bulan')->first()->data;
                $potensiWisata[KomoditasPotensiWisataEnum::valueOf($key)] = $dataItem;
            }
        }

        $sdmJumlah = $this->data['sdm-jumlah'] ? $this->data['sdm-jumlah']->sortByDesc('bulan')->first()->data : [];
        $sdmUsia   = $this->data['sdm-usia'] ? $this->data['sdm-usia']->sortByDesc('bulan')->first()->data : [];

        $dataSdmPendidikan = $this->data['sdm-pendidikan'] ? $this->data['sdm-pendidikan']->groupBy('item') : [];
        $sdmPendidikan     = [];
        if ($dataSdmPendidikan) {
            foreach ($dataSdmPendidikan as $key => $item) {
                $dataItem            = $item->sortByDesc('bulan')->first()->data;
                $sdmPendidikan[$key] = $dataItem;
            }
        }

        $dataSdmMataPencaharian = $this->data['mata-pencarian-pokok'] ? $this->data['mata-pencarian-pokok']->groupBy('item') : [];
        $sdmMataPencaharian     = [];
        if ($dataSdmMataPencaharian) {
            foreach ($dataSdmMataPencaharian as $key => $item) {
                $dataItem                                              = $item->sortByDesc('bulan')->first()->data;
                $sdmMataPencaharian[JenisPekerjaanEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataSdmAgama = $this->data['agama'] ? $this->data['agama']->groupBy('item') : [];
        $sdmAgama     = [];
        if ($dataSdmAgama) {
            foreach ($dataSdmAgama as $key => $item) {
                $dataItem                                    = $item->sortByDesc('bulan')->first()->data;
                $sdmAgama[KomoditasAgamaEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataSdmKewarganegaraan = $this->data['kewarganegaraan'] ? $this->data['kewarganegaraan']->groupBy('item') : [];
        $sdmKewarganegaraan     = [];
        if ($dataSdmKewarganegaraan) {
            foreach ($dataSdmKewarganegaraan as $key => $item) {
                $dataItem                                                    = $item->sortByDesc('bulan')->first()->data;
                $sdmKewarganegaraan[KomoditasWargaNegaraEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataSdmEtnis = $this->data['etnis-suku'] ? $this->data['etnis-suku']->groupBy('item') : [];
        $sdmEtnis     = [];
        if ($dataSdmEtnis) {
            foreach ($dataSdmEtnis as $key => $item) {
                $dataItem                                   = $item->sortByDesc('bulan')->first()->data;
                $sdmEtnis[KomoditasSukuEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataSdmCacat = $this->data['cacat-mental-dan-fisik'] ? $this->data['cacat-mental-dan-fisik']->groupBy('item') : [];
        $sdmCacat     = [];
        if ($dataSdmCacat) {
            foreach ($dataSdmCacat as $key => $item) {
                $dataItem                                = $item->sortByDesc('bulan')->first()->data;
                $sdmCacat[JenisCacatEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataSdmAngkatanKerja = $this->data['kualitas-angkatan-kerja'] ? $this->data['kualitas-angkatan-kerja']->groupBy('item') : [];
        $sdmAngkatanKerja     = [];
        if ($dataSdmAngkatanKerja) {
            foreach ($dataSdmAngkatanKerja as $key => $item) {
                $dataItem                                           = $item->sortByDesc('bulan')->first()->data;
                $sdmAngkatanKerja[AngkatanKerjaEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataSdmTenagaKerja = $this->data['tenaga-kerja'] ? $this->data['tenaga-kerja']->groupBy('item') : [];
        $sdmTenagaKerja     = [];
        if ($dataSdmTenagaKerja) {
            foreach ($dataSdmTenagaKerja as $key => $item) {
                $dataItem                                               = $item->sortByDesc('bulan')->first()->data;
                $sdmTenagaKerja[KriteriaTenagaKerjaEnum::valueOf($key)] = $dataItem;
            }
        }
        $lembagaPemerintah         = $this->data['lembaga-pemerintah'] ? $this->data['lembaga-pemerintah']->sortByDesc('bulan')->first()->data : [];
        $lembagaAdat               = $this->data['lembaga-adat'] ? $this->data['lembaga-adat']->sortByDesc('bulan')->first()->data : [];
        $lembagaKeamanan           = $this->data['lembaga-keamanan'] ? $this->data['lembaga-keamanan']->sortByDesc('bulan')->first()->data : [];
        $dataLembagaKemasyarakatan = $this->data['lembaga-kemasyarakatan'] ? $this->data['lembaga-kemasyarakatan']->groupBy('item') : [];
        $lembagaKemasyarakatan     = [];
        if ($dataLembagaKemasyarakatan) {
            foreach ($dataLembagaKemasyarakatan as $key => $item) {
                $dataItem                                                        = $item->sortByDesc('bulan')->first()->data;
                $lembagaKemasyarakatan[KomoditasJenisLembagaEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataLembagaEkonomi = $this->data['lembaga-ekonomi'] ? $this->data['lembaga-ekonomi']->groupBy(static function ($q) {
            $kategori = explode('__', $q['item']);

            return $kategori[0];
        })->map(static fn ($q) => $q->groupBy('jenis')) : [];
        $lembagaEkonomi = [];
        if ($dataLembagaEkonomi) {
            foreach ($dataLembagaEkonomi as $key => $items) {
                $lembagaEkonomi[KomoditasLembagaEkonomiEnum::valueOf($key)] = [];

                foreach ($items as $item) {
                    $dataItem                                                     = $item->sortByDesc('bulan')->first()->data;
                    $lembagaEkonomi[KomoditasLembagaEkonomiEnum::valueOf($key)][] = $dataItem;
                }
            }
        }

        $dataLembagaPendidikan = $this->data['lembaga-pendidikan'] ? $this->data['lembaga-pendidikan']->groupBy(static function ($q) {
            $kategori = explode('__', $q['item']);

            return $kategori[0];
        })->map(static fn ($q) => $q->groupBy('tingkatan')) : [];
        $lembagaPendidikan = [];
        if ($dataLembagaPendidikan) {
            foreach ($dataLembagaPendidikan as $key => $items) {
                $lembagaPendidikan[$key] = [];

                foreach ($items as $item) {
                    $dataItem                  = $item->sortByDesc('bulan')->first()->data;
                    $lembagaPendidikan[$key][] = $dataItem;
                }
            }
        }

        $dataSaranaTransportasiDarat = $this->data['sarana-transportasi-darat'] ? $this->data['sarana-transportasi-darat']->groupBy('item') : [];
        $saranaTransportasiDarat     = [];
        if ($dataSaranaTransportasiDarat) {
            foreach ($dataSaranaTransportasiDarat as $key => $item) {
                $dataItem                      = $item->sortByDesc('bulan')->first()->data;
                $saranaTransportasiDarat[$key] = $dataItem;
            }
        }

        $dataSaranaAngkutanLain = $this->data['sarana-angkutan-lainnya'] ? $this->data['sarana-angkutan-lainnya']->groupBy('item') : [];
        $saranaAngkutanLain     = [];
        if ($dataSaranaAngkutanLain) {
            foreach ($dataSaranaAngkutanLain as $key => $item) {
                $dataItem                 = $item->sortByDesc('bulan')->first()->data;
                $saranaAngkutanLain[$key] = $dataItem;
            }
        }

        $dataSaranaKomunikasiInformasi = $this->data['sarana-komunikasi-informasi'] ? $this->data['sarana-komunikasi-informasi']->groupBy(static function ($q) {
            $kategori = explode('__', $q['item']);

            return $kategori[0];
        })->map(static fn ($q) => $q->groupBy(static fn ($r) => $r['data']['jenis'])) : [];

        $saranaKomunikasiInformasi = [];
        if ($dataSaranaKomunikasiInformasi) {
            foreach ($dataSaranaKomunikasiInformasi as $key => $items) {
                $saranaKomunikasiInformasi[$key] = [];

                foreach ($items as $item) {
                    $dataItem                          = $item->sortByDesc('bulan')->first()->data;
                    $saranaKomunikasiInformasi[$key][] = $dataItem;
                }
            }
        }

        $airBersih        = $this->data['air-bersih'] ? $this->data['air-bersih']->sortByDesc('bulan')->first()->data : [];
        $sanitasi         = $this->data['sanitasi'] ? $this->data['sanitasi']->sortByDesc('bulan')->first()->data : [];
        $prasaranaIrigasi = $this->data['prasarana-irigasi'] ? $this->data['prasarana-irigasi']->sortByDesc('bulan')->first()->data : [];
        // sarana desa
        $saranaDesa  = $this->data['sarana-desa'] ? $this->data['sarana-desa']->sortByDesc('bulan')->first()->data : [];
        $saranaBpd   = $this->data['badan-perwakilan-desa'] ? $this->data['badan-perwakilan-desa']->sortByDesc('bulan')->first()->data : [];
        $saranaDusun = $this->data['sarana-dusun'] ? $this->data['sarana-dusun']->sortByDesc('bulan')->first()->data : [];

        $dataSaranaAgama = $this->data['prasarana-peribadatan'] ? $this->data['prasarana-peribadatan']->groupBy('item') : [];
        $saranaAgama     = [];
        if ($dataSaranaAgama) {
            foreach ($dataSaranaAgama as $key => $item) {
                $dataItem                                                   = $item->sortByDesc('bulan')->first()->data;
                $saranaAgama[KomoditasJenisTempatIbadahEnum::valueOf($key)] = $dataItem;
            }
        }
        $dataSaranaOlahraga = $this->data['sarana-olahraga'] ? $this->data['sarana-olahraga']->groupBy('item') : [];
        $saranaOlahraga     = [];
        if ($dataSaranaOlahraga) {
            foreach ($dataSaranaOlahraga as $key => $item) {
                $dataItem                                          = $item->sortByDesc('bulan')->first()->data;
                $saranaOlahraga[SaranaOlahragaEnum::valueOf($key)] = $dataItem;
            }
        }
        $dataPrasaranaKesehatan = $this->data['prasarana-kesehatan'] ? $this->data['prasarana-kesehatan']->groupBy('item') : [];
        $prasaranaKesehatan     = [];
        if ($dataPrasaranaKesehatan) {
            foreach ($dataPrasaranaKesehatan as $key => $item) {
                $dataItem                                                  = $item->sortByDesc('bulan')->first()->data;
                $prasaranaKesehatan[PrasaranaKesehatanEnum::valueOf($key)] = $dataItem;
            }
        }
        $dataSaranaKesehatan = $this->data['sarana-kesehatan'] ? $this->data['sarana-kesehatan']->groupBy('item') : [];
        $saranaKesehatan     = [];
        if ($dataSaranaKesehatan) {
            foreach ($dataSaranaKesehatan as $key => $item) {
                $dataItem                                            = $item->sortByDesc('bulan')->first()->data;
                $saranaKesehatan[SaranaKesehatanEnum::valueOf($key)] = $dataItem;
            }
        }
        $dataSaranaPendidikan = $this->data['sarana-pendidikan'] ? $this->data['sarana-pendidikan']->groupBy('item') : [];
        $saranaPendidikan     = [];
        if ($dataSaranaPendidikan) {
            foreach ($dataSaranaPendidikan as $key => $item) {
                $dataItem                                              = $item->sortByDesc('bulan')->first()->data;
                $saranaPendidikan[SaranaPendidikanEnum::valueOf($key)] = $dataItem;
            }
        }

        $dataSaranaWisata = $this->data['sarana-wisata'] ? $this->data['sarana-wisata']->groupBy('item') : [];
        $saranaWisata     = [];
        if ($dataSaranaWisata) {
            foreach ($dataSaranaWisata as $key => $item) {
                $dataItem                                      = $item->sortByDesc('bulan')->first()->data;
                $saranaWisata[SaranaWisataEnum::valueOf($key)] = $dataItem;
            }
        }

        $saranaEnergi                   = $this->data['sarana-energi'] ? $this->data['sarana-energi']->sortByDesc('bulan')->first()->data : [];
        $saranaKebersihan               = $this->data['sarana-kebersihan'] ? $this->data['sarana-kebersihan']->sortByDesc('bulan')->first()->data : [];
        $prasaranaLembagaKemasyarakatan = $this->data['prasarana-lembaga-kemasyarakatan'] ? $this->data['prasarana-lembaga-kemasyarakatan']->sortByDesc('bulan')->first()->data : [];

        return [
            'data_umum' => [
                'luas_desa'        => $batasWilayah['luas_desa'] ?? 0,
                'nama_kepala_desa' => $batasWilayah['nama_kepala_desa'] ?? '',
                'nama_pengisi'     => $batasWilayah['nama_pengisi'] ?? '',
                'pekerjaan'        => $batasWilayah['pekerjaan'] ?? '',
                'jabatan'          => $batasWilayah['jabatan'] ?? '',
                'peta_wilayah'     => $batasWilayah['peta_wilayah'] ?? '',
                'referensi_1'      => $batasWilayah['referensi_1'] ?? '',
                'referensi_2'      => $batasWilayah['referensi_2'] ?? '',
                'referensi_3'      => $batasWilayah['referensi_3'] ?? '',
                'referensi_4'      => $batasWilayah['referensi_4'] ?? '',
            ],
            'batas_wilayah' => [
                'desa_sebelah_utara'   => $batasWilayah['batas_desa_utara'] ?? '',
                'desa_sebelah_selatan' => $batasWilayah['batas_desa_selatan'] ?? '',
                'desa_sebelah_timur'   => $batasWilayah['batas_desa_timur'] ?? '',
                'desa_sebelah_barat'   => $batasWilayah['batas_desa_barat'] ?? '',
                'kec_sebelah_utara'    => $batasWilayah['batas_kecamatan_utara'] ?? '',
                'kec_sebelah_selatan'  => $batasWilayah['batas_kecamatan_selatan'] ?? '',
                'kec_sebelah_timur'    => $batasWilayah['batas_kecamatan_timur'] ?? '',
                'kec_sebelah_barat'    => $batasWilayah['batas_kecamatan_barat'] ?? '',
            ],
            'penetapan_batas_dan_peta_wilayah' => [
                'penetapan_batas'    => $batasWilayah['penetapan_batas'] ?? 0,
                'dasar_hukum_perdes' => $batasWilayah['dasar_hukum_perdes'] ?? '',
                'dasar_hukum_perda'  => $batasWilayah['dasar_hukum_perda'] ?? '',
                'peta_wilayah'       => $batasWilayah['peta_wilayah'] ?? 0,
            ],
            // belum tau sumber datanya
            'luas_wilayah' => [
                'luas_pemukiman'              => 0,
                'luas_persawahan'             => 0,
                'luas_perkebunan'             => 0,
                'luas_kuburan'                => 0,
                'luas_pekarangan'             => 0,
                'luas_taman'                  => 0,
                'perkantoran'                 => 0,
                'luas_prasarana_umum_lainnya' => 0,
                'total_luas'                  => 0,
            ],

            'tanah_sawah' => [
                'sawah_irigasi_teknis'          => $jenisLahan['sawah_irigasi_teknis'] ?? 0,
                'sawah_irigasi_setengah_teknis' => $jenisLahan['sawah_irigasi_setengah_teknis'] ?? 0,
                'sawah_tadah_hujan'             => $jenisLahan['sawah_tadah_hujan'] ?? 0,
                'sawah_pasang_surut'            => $jenisLahan['sawah_pasang_surut'] ?? 0,
                'total_luas'                    => $jenisLahan['luas_tanah_sawah'] ?? 0,
            ],

            'tanah_kering' => [
                'tegal_ladang' => $jenisLahan['tegal_ladang'] ?? 0,
                'pemukiman'    => $jenisLahan['pemukiman'] ?? 0,
                'pekarangan'   => $jenisLahan['pekarangan'] ?? 0,
                'total_luas'   => $jenisLahan['luas_tanah_kering'] ?? 0,
            ],

            'tanah_basah' => [
                'tanah_rawa'       => $jenisLahan['tanah_rawa'] ?? 0,
                'pasang_surut'     => $jenisLahan['tanah_pasang_surut'] ?? 0,
                'lahan_gambut'     => $jenisLahan['tanah_lahan_gambut'] ?? 0,
                'situ_waduk_danau' => $jenisLahan['tanah_situ_danau'] ?? 0,
                'total_luas'       => $jenisLahan['luas_tanah_basah'] ?? 0,
            ],

            'tanah_perkebunan' => [
                'tanah_perkebunan_rakyat'     => $jenisLahan['tanah_kebun_rakyat'] ?? 0,
                'tanah_perkebunan_negara'     => $jenisLahan['tanah_kebun_negara'] ?? 0,
                'tanah_perkebunan_swasta'     => $jenisLahan['tanah_kebun_swasta'] ?? 0,
                'tanah_perkebunan_perorangan' => $jenisLahan['tanah_kebun_perorangan'] ?? 0,
                'total_luas'                  => $jenisLahan['luas_tanah_perkebunan'] ?? 0,
            ],

            'tanah_fasilitas_umum' => [
                'kas_desa_kelurahan'                   => $jenisLahan['luas_tanah_kas'] ?? 0,
                'tanah_bengkok'                        => $jenisLahan['tanah_bengkok'] ?? 0,
                'tanah_titi_sara'                      => $jenisLahan['tanah_titi_sara'] ?? 0,
                'kebun_desa'                           => $jenisLahan['tanah_kebun_desa'] ?? 0,
                'sawah_desa'                           => $jenisLahan['tanah_sawah_desa'] ?? 0,
                'lapangan_olahraga'                    => $jenisLahan['tanah_lapangan_olahraga'] ?? 0,
                'perkantoran_pemerintah'               => $jenisLahan['tanah_perkantoran'] ?? 0,
                'ruang_publik_taman_kota'              => $jenisLahan['tanah_ruang_publik'] ?? 0,
                'tempat_pemakaman_desa_umum'           => $jenisLahan['tanah_pemakaman_umum'] ?? 0,
                'tempat_pembuangan_sampah'             => $jenisLahan['tanah_pembuangan_sampah'] ?? 0,
                'bangunan_sekolah_perguruan_tinggi'    => $jenisLahan['tanah_sekolah'] ?? 0,
                'pertokoan'                            => $jenisLahan['tanah_pertokoan'] ?? 0,
                'fasilitas_pasar'                      => $jenisLahan['tanah_pasar'] ?? 0,
                'terminal'                             => $jenisLahan['tanah_terminal'] ?? 0,
                'jalan'                                => $jenisLahan['tanah_jalan'] ?? 0,
                'daerah_tangkapan_air'                 => $jenisLahan['tanah_tangkapan_air'] ?? 0,
                'usaha_perikanan'                      => $jenisLahan['tanah_perikanan'] ?? 0,
                'sutet_aliran_listrik_tegangan_tinggi' => $jenisLahan['tanah_sutet'] ?? 0,
                'total_luas'                           => $jenisLahan['luas_tanah_fasilitas_umum'] ?? 0,
            ],

            'tanah_hutan' => [
                'hutan_lindung'        => $jenisLahan['tanah_hutan_lindung'] ?? 0,
                'hutan_produksi'       => $jenisLahan['luas_tanah_hutan_produktif'] ?? 0,
                'hutan_produksi_tetap' => $jenisLahan['tanah_hutan_produksi_tetap'] ?? 0,
                'hutan_terbatas'       => $jenisLahan['tanah_hutan_produksi_terbatas'] ?? 0,
                'hutan_konservasi'     => $jenisLahan['tanah_hutan_konservatif'] ?? 0,
                'hutan_adat'           => $jenisLahan['tanah_hutan_adat'] ?? 0,
                'hutan_asli'           => $jenisLahan['tanah_hutan_asli'] ?? 0,
                'hutan_sekunder'       => $jenisLahan['tanah_hutan_sekunder'] ?? 0,
                'hutan_buatan'         => $jenisLahan['tanah_hutan_buatan'] ?? 0,
                'hutan_mangrove'       => $jenisLahan['tanah_hutan_manggrove'] ?? 0,
                'hutan_suaka'          => $jenisLahan['luas_tanah_hutan_suaka'] ?? 0,
                'suaka_alam'           => $jenisLahan['tanah_hutan_suaka_alam'] ?? 0,
                'suaka_margasatwa'     => $jenisLahan['tanah_hutan_suaka_margasatwa'] ?? 0,
                'hutan_rakyat'         => $jenisLahan['tanah_hutan_rakyat'] ?? 0,
                'total_luas'           => $jenisLahan['luas_tanah_hutan'] ?? 0,
            ],

            'iklim' => [
                'curah_hujan'                       => $iklim['curah_hujan'] ?? 0,
                'jumlah_bulan_hujan'                => $iklim['jumlah_bulan_hujan'] ?? 0,
                'kelembapan'                        => $iklim['kelembaban_udara'] ?? 0,
                'suhu_rata_rata_harian'             => $iklim['suhu_rata_harian'] ?? 0,
                'tinggi_tempat_dari_permukaan_laut' => $iklim['tinggi_diatas_laut'] ?? 0,
            ],

            'jenis_dan_kesuburan_tanah' => [
                'warna_tanah'              => $iklim['warna_tanah'] ?? 0,
                'tekstur_tanah'            => $iklim['tekstur_tanah'] ?? 0,
                'tingkat_kemiringan_tanah' => $iklim['kemiringan_tanah'] ?? 0,
                'lahan_kritis'             => $iklim['lahan_kritis'] ?? 0,
                'lahan_terlantar'          => $iklim['lahan_terlantar'] ?? 0,
            ],
            'tingkat_erosi_tanah' => [
                'luas_tanah_erosi_ringan'         => $iklim['tanah_erosi_ringan'] ?? 0,
                'luas_tanah_erosi_sedang'         => $iklim['tanah_erosi_sedang'] ?? 0,
                'luas_tanah_erosi_berat'          => $iklim['tanah_erosi_berat'] ?? 0,
                'luas_tanah_yang_tidak_ada_erosi' => $iklim['tanah_tidak_ada_erosi'] ?? 0,
            ],
            'topografi' => [
                'desa_kelurahan_dataran_rendah'            => $topografi['dataran_rendah'] ?? 0,
                'desa_kelurahan_berbukit'                  => $topografi['berbukit_bukit'] ?? 0,
                'desa_kelurahan_dataran_tinggi_pegunungan' => $topografi['dataran'] ?? 0,
                'desa_kelurahan_lereng_gunung'             => $topografi['lereng_gunung'] ?? 0,
                'desa_kelurahan_tepi_pantai_pesisir'       => $topografi['tepi_pantai_pesisir'] ?? 0,
                'desa_kelurahan_kawasan_rawa'              => $topografi['kawasan_rawa'] ?? 0,
                'desa_kelurahan_kawasan_gambut'            => $topografi['kawasan_gambut'] ?? 0,
                'desa_kelurahan_aliran_sungai'             => $topografi['aliran_sungai'] ?? 0,
                'desa_kelurahan_bantaran_sungai'           => $topografi['bantaran_sungai'] ?? 0,
                'lain_lain'                                => $topografi['lain_lain'] ?? 0,
            ],
            'letak' => [
                'desa_kelurahan_kawasan_perkantoran'              => $topografi['kawasan_perkantoran'] ?? 0,
                'desa_kelurahan_kawasan_pertokoan_bisnis'         => $topografi['kawasan_pertokoan'] ?? 0,
                'desa_kelurahan_kawasan_campuran'                 => $topografi['kawasan_campuran'] ?? 0,
                'desa_kelurahan_kawasan_industri'                 => $topografi['kawasan_industri'] ?? 0,
                'desa_kelurahan_kepulauan'                        => $topografi['kepulauan'] ?? 0,
                'desa_kelurahan_pantai_pesisir'                   => $topografi['pantai_pesisir'] ?? 0,
                'desa_kelurahan_kawasan_hutan'                    => $topografi['kawasan_hutan'] ?? 0,
                'desa_kelurahan_taman_suaka'                      => $topografi['taman_suaka'] ?? 0,
                'desa_kelurahan_kawasan_wisata'                   => $topografi['kawasan_wisata'] ?? 0,
                'desa_kelurahan_perbatasan_dengan_negara_lain'    => $topografi['perbatasan_dengan_negara_lain'] ?? 0,
                'desa_kelurahan_perbatasan_dengan_provinsi_lain'  => $topografi['perbatasan_dengan_provinsi_lain'] ?? 0,
                'desa_kelurahan_perbatasan_dengan_kabupaten_lain' => $topografi['perbatasan_dengan_kabupaten_lain'] ?? 0,
                'desa_kelurahan_perbatasan_antar_kecamatan_lain'  => $topografi['perbatasan_antar_kecamatan_lain'] ?? 0,
                'desa_kelurahan_das_bantaran_sungai'              => $topografi['DAS_bantaran_sungai'] ?? 0,
                'desa_kelurahan_rawan_banjir'                     => $topografi['rawan_banjir'] ?? 0,
                'desa_kelurahan_bebas_banjir'                     => $topografi['bebas_banjir'] ?? 0,
                'desa_kelurahan_potensial_tsunami'                => $topografi['potensi_tsunami'] ?? 0,
                'desa_kelurahan_rawan_jalur_gempa_bumi'           => $topografi['rawan_jalur_gempa'] ?? 0,
            ],
            'orbitasi' => [
                'jarak_ke_ibu_kota_kecamatan'                                                              => $topografi['jarak_ke_ibukota_kecamatan'] ?? 0,
                'lama_jarak_tempuh_ke_ibu_kota_kecamatan_dengan_kendaraan_bermotor'                        => $topografi['lama_jarak_tempuh_ke_ibukota_kecamatan_dengan_kendaraan_bermotor'] ?? 0,
                'lama_jarak_tempuh_ke_ibu_kota_kecamatan_dengan_berjalan_kaki_atau_kendaraan_non_bermotor' => $topografi['lama_jarak_tempuh_ke_ibukota_kecamatan_dengan_jalan_kaki'] ?? 0,
                'kendaraan_umum_ke_ibu_kota_kecamatan'                                                     => $topografi['kendaraan_umum_ke_ibukota_kecamatan'] ?? 0,
                'jarak_ke_ibu_kota_kabupaten_kota'                                                         => $topografi['jarak_ke_ibukota_kabupaten_kota'] ?? 0,
                'lama_jarak_tempuh_ke_ibu_kota_kabupaten_dengan_kendaraan_bermotor'                        => $topografi['lama_jarak_tempuh_ke_ibukota_kabupaten_dengan_kendaraan_bermotor'] ?? 0,
                'lama_jarak_tempuh_ke_ibu_kota_kabupaten_dengan_berjalan_kaki_atau_kendaraan_non_bermotor' => $topografi['lama_jarak_tempuh_ke_ibukota_kabupaten_dengan_jalan_kaki'] ?? 0,
                'kendaraan_umum_ke_ibu_kota_kabupaten_kota'                                                => $topografi['kendaraan_umum_ke_ibukota_kabupaten'] ?? 0,
                'jarak_ke_ibu_kota_provinsi'                                                               => $topografi['jarak_ke_ibukota_provinsi_kota'] ?? 0,
                'lama_jarak_tempuh_ke_ibu_kota_provinsi_dengan_kendaraan_bermotor'                         => $topografi['lama_jarak_tempuh_ke_ibukota_provinsi_dengan_kendaraan_bermotor'] ?? 0,
                'lama_jarak_tempuh_ke_ibu_kota_provinsi_dengan_berjalan_kaki_atau_kendaraan_non_bermotor'  => $topografi['lama_jarak_tempuh_ke_ibukota_provinsi_dengan_jalan_kaki'] ?? 0,
                'kendaraan_umum_ke_ibu_kota_provinsi'                                                      => $topografi['kendaraan_umum_ke_ibukota_provinsi'] ?? 0,
            ],
            'pemilikan_lahan_pertanian_tanaman_pangan' => [
                'jumlah_keluarga_memiliki_tanah_pertanian' => $kepemilikanLahan['jumlah_keluarga_memiliki_tanah'] ?? 0,
                'tidak_memiliki'                           => $kepemilikanLahan['jumlah_keluarga_tidak_memiliki_tanah'] ?? 0,
                'memiliki_kurang_10_ha'                    => $kepemilikanLahan['memiliki_kurang_10_ha'] ?? 0,
                'memiliki_10_50_ha'                        => $kepemilikanLahan['memiliki_10_50_ha'] ?? 0,
                'memiliki_50_100_ha'                       => $kepemilikanLahan['memiliki_50_100_ha'] ?? 0,
                'memiliki_lebih_dari_100_ha'               => $kepemilikanLahan['memiliki_lebih_dari_100_ha'] ?? 0,
                'jumlah_total_keluarga_petani'             => $kepemilikanLahan['jumlah_keluarga_petani_tanaman_pangan'] ?? 0,
            ],

            'produksi_tanaman_pangan'               => $hasilProduksiPangan,
            'kepemilikan_lahan_tanaman_buah_buahan' => [
                'jumlah_keluarga_memiliki_tanah_perkebunan' => $kepemilikanLahanBuah['jumlah_keluarga_memiliki_tanah'] ?? 0,
                'tidak_memiliki'                            => $kepemilikanLahanBuah['jumlah_keluarga_tidak_memiliki_tanah'] ?? 0,
                'memiliki_kurang_dari_10_ha'                => $kepemilikanLahanBuah['memiliki_kurang_10_ha'] ?? 0,
                'memiliki_10_50_ha'                         => $kepemilikanLahanBuah['memiliki_10_50_ha'] ?? 0,
                'memiliki_50_100_ha'                        => $kepemilikanLahanBuah['memiliki_50_100_ha'] ?? 0,
                'memiliki_100_500_ha'                       => $kepemilikanLahanBuah['memiliki_lebih_dari_100_ha'] ?? 0,
                'memiliki_500_1000_ha'                      => $kepemilikanLahanBuah['memiliki_500_1000_ha'] ?? 0,
                'memiliki_lebih_dari_1000_ha'               => $kepemilikanLahanBuah['memiliki_lebih_dari_1000_ha'] ?? 0,
                'jumlah_total_keluarga_perkebunan'          => $kepemilikanLahanBuah['jumlah_keluarga_petani_tanaman_buah'] ?? 0,
            ],
            'hasil_tanaman_dan_luas_tanaman_buah_buahan'      => $hasilProduksiBuah,
            'pemasaran_hasil_tanaman_pangan_dan_tanaman_buah' => [
                'dijual_langsung_ke_konsumen' => $hasilProduksiBuah ? YaEnum::valueOf($hasilProduksiBuah[array_keys($hasilProduksiBuah)[0]]['dijual_langsung_ke_konsumen']) : 'Tidak',
                'dijual_ke_pasar'             => $hasilProduksiBuah ? YaEnum::valueOf($hasilProduksiBuah[array_keys($hasilProduksiBuah)[0]]['dijual_ke_pasar']) : 'Tidak',
                'dijual_melalui_kud'          => $hasilProduksiBuah ? YaEnum::valueOf($hasilProduksiBuah[array_keys($hasilProduksiBuah)[0]]['dijual_melalui_KUD']) : 'Tidak',
                'dijual_melalui_tengkulak'    => $hasilProduksiBuah ? YaEnum::valueOf($hasilProduksiBuah[array_keys($hasilProduksiBuah)[0]]['dijual_melalui_tengkulak']) : 'Tidak',
                'dijual_melalui_pengecer'     => $hasilProduksiBuah ? YaEnum::valueOf($hasilProduksiBuah[array_keys($hasilProduksiBuah)[0]]['dijual_melalui_pengecer']) : 'Tidak',
                'dijual_ke_lumbung_desa_kel'  => $hasilProduksiBuah ? YaEnum::valueOf($hasilProduksiBuah[array_keys($hasilProduksiBuah)[0]]['dijual_ke_lumbung_desa']) : 'Tidak',
                'tidak_dijual'                => $hasilProduksiBuah ? YaEnum::valueOf($hasilProduksiBuah[array_keys($hasilProduksiBuah)[0]]['tidak_dijual']) : 'Tidak',
            ],
            'pemilikan_lahan_perkebunan' => [
                'jumlah_keluarga_memiliki_tanah_perkebunan'         => $kepemilikanLahanKebun['jumlah_keluarga_memiliki_tanah'] ?? 0,
                'tidak_memiliki'                                    => $kepemilikanLahanKebun['jumlah_keluarga_tidak_memiliki_tanah'] ?? 0,
                'memiliki_kurang_dari_5_ha'                         => $kepemilikanLahanKebun['memiliki_kurang_10_ha'] ?? 0,
                'memiliki_10_50_ha'                                 => $kepemilikanLahanKebun['memiliki_10_50_ha'] ?? 0,
                'memiliki_50_100_ha'                                => $kepemilikanLahanKebun['memiliki_50_100_ha'] ?? 0,
                'memiliki_100_500_ha'                               => $kepemilikanLahanKebun['memiliki_lebih_dari_100_ha'] ?? 0,
                'memiliki_500_1000_ha'                              => $kepemilikanLahanKebun['memiliki_500_1000_ha'] ?? 0,
                'memiliki_lebih_dari_1000_ha'                       => $kepemilikanLahanKebun['memiliki_lebih_dari_1000_ha'] ?? 0,
                'jumlah_total_keluarga_perkebunan'                  => $kepemilikanLahanKebun['jumlah_keluarga_petani_tanaman_kebun'] ?? 0,
                'kepemilikan_usaha_perkebunan_yang_dimiliki_negara' => $kepemilikanLahanKebun['kepemilikan_usaha_perkebunan_yang_dimiliki_negara'] ?? 0,
                'total_luas_perkebunan'                             => 0,
            ],

            'luas_dan_hasil_perkebunan_menurut_jenis_komoditas' => $hasilProduksiKebun,
            'pemasaran_hasil_perkebunan'                        => [
                'dijual_langsung_ke_konsumen' => $hasilProduksiKebun ? YaEnum::valueOf($hasilProduksiKebun[array_keys($hasilProduksiKebun)[0]]['dijual_langsung_ke_konsumen']) : 'Tidak',
                'dijual_ke_pasar_hewan'       => $hasilProduksiKebun ? YaEnum::valueOf($hasilProduksiKebun[array_keys($hasilProduksiKebun)[0]]['dijual_ke_pasar_hewan']) : 'Tidak',
                'dijual_melalui_kud'          => $hasilProduksiKebun ? YaEnum::valueOf($hasilProduksiKebun[array_keys($hasilProduksiKebun)[0]]['dijual_melalui_KUD']) : 'Tidak',
                'dijual_melalui_tengkulak'    => $hasilProduksiKebun ? YaEnum::valueOf($hasilProduksiKebun[array_keys($hasilProduksiKebun)[0]]['dijual_melalui_tengkulak']) : 'Tidak',
                'dijual_melalui_pengecer'     => $hasilProduksiKebun ? YaEnum::valueOf($hasilProduksiKebun[array_keys($hasilProduksiKebun)[0]]['dijual_melalui_pengecer']) : 'Tidak',
                'dijual_ke_lumbung_desa_kel'  => $hasilProduksiKebun ? YaEnum::valueOf($hasilProduksiKebun[array_keys($hasilProduksiKebun)[0]]['dijual_ke_lumbung_desa']) : 'Tidak',
                'tidak_dijual'                => $hasilProduksiKebun ? YaEnum::valueOf($hasilProduksiKebun[array_keys($hasilProduksiKebun)[0]]['tidak_dijual']) : 'Tidak',
            ],
            'luas_lahan_menurut_pemilikan' => [
                'milik_negara'                => $kepemilikanLahanHutan['milik_negara_ha'] ?? 0,
                'milik_adat_ulayat'           => $kepemilikanLahanHutan['milik_adat_ulayat_ha'] ?? 0,
                'perhutani_instansi_sektoral' => $kepemilikanLahanHutan['perhutan_instansi_sektoral'] ?? 0,
                'milik_masyarakat_perorangan' => $kepemilikanLahanHutan['milik_masyarakat_perorangan'] ?? 0,
                'total'                       => $kepemilikanLahanHutan['jumlah_luas_hutan'] ?? 0,
            ],
            'hasil_hutan'                              => $hasilProduksiHutan,
            'kondisi_hutan'                            => $kondisiHutan,
            'dampak_yang_timbul_dari_pengolahan_hutan' => $dampakPengolahanHutan,
            'mekanisme_pemasaran_hasil_hutan'          => [
                'dijual_langsung_ke_konsumen' => $hasilProduksiHutan ? YaEnum::valueOf($hasilProduksiHutan[array_keys($hasilProduksiHutan)[0]]['dijual_langsung_ke_konsumen']) : 'Tidak',
                'dijual_ke_pasar'             => $hasilProduksiHutan ? YaEnum::valueOf($hasilProduksiHutan[array_keys($hasilProduksiHutan)[0]]['dijual_ke_pasar']) : 'Tidak',
                'dijual_melalui_kud'          => $hasilProduksiHutan ? YaEnum::valueOf($hasilProduksiHutan[array_keys($hasilProduksiHutan)[0]]['dijual_melalui_KUD']) : 'Tidak',
                'dijual_melalui_tengkulak'    => $hasilProduksiHutan ? YaEnum::valueOf($hasilProduksiHutan[array_keys($hasilProduksiHutan)[0]]['dijual_melalui_tengkulak']) : 'Tidak',
                'dijual_melalui_pengecer'     => $hasilProduksiHutan ? YaEnum::valueOf($hasilProduksiHutan[array_keys($hasilProduksiHutan)[0]]['dijual_melalui_pengecer']) : 'Tidak',
                'dijual_ke_lumbung_desa_kel'  => $hasilProduksiHutan ? YaEnum::valueOf($hasilProduksiHutan[array_keys($hasilProduksiHutan)[0]]['dijual_ke_lumbung_desa']) : 'Tidak',
                'tidak_dijual'                => $hasilProduksiHutan ? YaEnum::valueOf($hasilProduksiHutan[array_keys($hasilProduksiHutan)[0]]['tidak_dijual']) : 'Tidak',
            ],
            'jenis_populasi_ternak'             => $jenisPopulasiTernak,
            'produksi_peternakan'               => $produksiPeternakan,
            'ketersediaan_hijauan_pakan_ternak' => [
                'luas_tanaman_pakan_ternak_rumput_gajah_dll' => $lahanPakanTernak['luas_tanaman_pakan_ternak'] ?? 0,
                'produksi_hijauan_makanan_ternak'            => $lahanPakanTernak['produksi_hijauan'] ?? 0,
                'luas_lahan_gembalaan'                       => $lahanPakanTernak['luas_lahan_gembalan'] ?? 0,
                'dipasok_dari_luar_desa_kelurahan'           => $lahanPakanTernak['dipasok_luar'] ?? 0,
                'disubsidi_dinas'                            => $lahanPakanTernak['disubsidi_dinas'] ?? 0,
                'lainnya'                                    => $lahanPakanTernak['ketersediaan_lainnya'] ?? 0,
            ],
            'pemilik_usaha_pengolahan_hasil_ternak' => $pengolahanHasilTernak,
            'pemasaran_hasil_ternak'                => [
                'dijual_langsung_ke_konsumen' => $jenisPopulasiTernak ? YaEnum::valueOf($jenisPopulasiTernak[array_keys($jenisPopulasiTernak)[0]]['jual_konsumen']) : 'Tidak',
                'dijual_ke_pasar'             => $jenisPopulasiTernak ? YaEnum::valueOf($jenisPopulasiTernak[array_keys($jenisPopulasiTernak)[0]]['jual_pasar']) : 'Tidak',
                'dijual_melalui_kud'          => $jenisPopulasiTernak ? YaEnum::valueOf($jenisPopulasiTernak[array_keys($jenisPopulasiTernak)[0]]['jual_kud']) : 'Tidak',
                'dijual_melalui_tengkulak'    => $jenisPopulasiTernak ? YaEnum::valueOf($jenisPopulasiTernak[array_keys($jenisPopulasiTernak)[0]]['jual_tengkulak']) : 'Tidak',
                'dijual_melalui_pengecer'     => $jenisPopulasiTernak ? YaEnum::valueOf($jenisPopulasiTernak[array_keys($jenisPopulasiTernak)[0]]['jual_pengecer']) : 'Tidak',
                'dijual_ke_lumbung_desa_kel'  => $jenisPopulasiTernak ? YaEnum::valueOf($jenisPopulasiTernak[array_keys($jenisPopulasiTernak)[0]]['jual_desa']) : 'Tidak',
                'tidak_dijual'                => $jenisPopulasiTernak ? YaEnum::valueOf($jenisPopulasiTernak[array_keys($jenisPopulasiTernak)[0]]['tidak_dijual']) : 'Tidak',
            ],
            'ketersediaan_lahan_pemeliharaan_ternak_padang_penggembalaan' => [
                'milik_masyarakat_umum'             => $lahanPakanTernak['milik_masyarakat'] ?? 0,
                'milik_perusahaan_peternakan_ranch' => $lahanPakanTernak['milik_perusahaan'] ?? 0,
                'milik_perorangan'                  => $lahanPakanTernak['milik_perorangan'] ?? 0,
                'sewa_pakai'                        => $lahanPakanTernak['sewa_pakai'] ?? 0,
                'milik_pemerintah'                  => $lahanPakanTernak['milik_pemerintah'] ?? 0,
                'milik_masyarakat_adat'             => $lahanPakanTernak['milik_adat'] ?? 0,
                'lainnya'                           => $lahanPakanTernak['milik_lainnya'] ?? 0,
            ],
            'jenis_dan_alat_produksi_budidaya_ikan_laut_dan_payau' => $produksiPerikananLaut,
            'jenis_dan_sarana_produksi_budidaya_ikan_air_tawar'    => $produksiPerikananTawar,
            'jenis_ikan_dan_produksi'                              => $produksiPerikanan,
            'pemasaran_hasil_perikanan'                            => [
                'dijual_langsung_ke_konsumen' => $produksiPerikanan ? YaEnum::valueOf($produksiPerikanan[array_keys($produksiPerikanan)[0]]['jual_konsumen']) : 'Tidak',
                'dijual_ke_pasar'             => $produksiPerikanan ? YaEnum::valueOf($produksiPerikanan[array_keys($produksiPerikanan)[0]]['jual_pasar']) : 'Tidak',
                'dijual_melalui_kud'          => $produksiPerikanan ? YaEnum::valueOf($produksiPerikanan[array_keys($produksiPerikanan)[0]]['jual_kud']) : 'Tidak',
                'dijual_melalui_tengkulak'    => $produksiPerikanan ? YaEnum::valueOf($produksiPerikanan[array_keys($produksiPerikanan)[0]]['jual_tengkulak']) : 'Tidak',
                'dijual_melalui_pengecer'     => $produksiPerikanan ? YaEnum::valueOf($produksiPerikanan[array_keys($produksiPerikanan)[0]]['jual_pengecer']) : 'Tidak',
                'dijual_ke_lumbung_desa_kel'  => $produksiPerikanan ? YaEnum::valueOf($produksiPerikanan[array_keys($produksiPerikanan)[0]]['jual_desa']) : 'Tidak',
                'tidak_dijual'                => $produksiPerikanan ? YaEnum::valueOf($produksiPerikanan[array_keys($produksiPerikanan)[0]]['tidak_dijual']) : 'Tidak',
            ],
            'jenis_dan_deposit_bahan_galian'           => $produksiBahanGalian,
            'produksi_bahan_galian'                    => $produksiBahanGalian,
            'kepemilikan_dan_pengelolaan_bahan_galian' => $produksiBahanGalian,
            'pemasaran_hasil_galian'                   => [
                'dijual_langsung_ke_konsumen' => $produksiBahanGalian ? YaEnum::valueOf($produksiBahanGalian[array_keys($produksiBahanGalian)[0]]['dijual_langsung_ke_konsumen']) : 'Tidak',
                'dijual_ke_pasar'             => $produksiBahanGalian ? YaEnum::valueOf($produksiBahanGalian[array_keys($produksiBahanGalian)[0]]['dijual_ke_pasar']) : 'Tidak',
                'dijual_melalui_kud'          => $produksiBahanGalian ? YaEnum::valueOf($produksiBahanGalian[array_keys($produksiBahanGalian)[0]]['dijual_melalui_KUD']) : 'Tidak',
                'dijual_melalui_tengkulak'    => $produksiBahanGalian ? YaEnum::valueOf($produksiBahanGalian[array_keys($produksiBahanGalian)[0]]['dijual_melalui_tengkulak']) : 'Tidak',
                'dijual_melalui_pengecer'     => $produksiBahanGalian ? YaEnum::valueOf($produksiBahanGalian[array_keys($produksiBahanGalian)[0]]['dijual_melalui_pengecer']) : 'Tidak',
                'dijual_ke_perusahaan'        => $produksiBahanGalian ? YaEnum::valueOf($produksiBahanGalian[array_keys($produksiBahanGalian)[0]]['dijual_ke_perusahaan']) : 'Tidak',
                'dijual_ke_lumbung_desa_kel'  => $produksiBahanGalian ? YaEnum::valueOf($produksiBahanGalian[array_keys($produksiBahanGalian)[0]]['dijual_ke_lumbung_desa']) : 'Tidak',
                'tidak_dijual'                => $produksiBahanGalian ? YaEnum::valueOf($produksiBahanGalian[array_keys($produksiBahanGalian)[0]]['tidak_dijual']) : 'Tidak',
            ],
            'potensi_air_dan_sumber_daya_air' => $potensiSumberDayaAir,
            'sumber_air_bersih'               => $sumberAirBersih,
            'kualitas_air_minum'              => $kualitasAirMinum,
            // belum tau sumbernya
            'sungai' => [
                'jumlah_sungai'                                    => 0,
                'kondisi'                                          => 0,
                'tercemar'                                         => 0,
                'pendangkalan_pengendapan_lumpur_tinggi'           => 0,
                'keruh'                                            => 0,
                'jernih_dan_tidak_tercemar_memenuhi_baku_mutu_air' => 0,
                'berkurangnya_biota_sungai'                        => 0,
                'kering'                                           => 0,
            ],
            'rawa' => [
                'luas_rawa'                           => 0,
                'pemanfaatan'                         => 0,
                'perikanan_darat_maupun_laut'         => 0,
                'air_baku_untuk_pengolahan_air_minum' => 0,
                'cuci_dan_mandi'                      => 0,
                'irigasi'                             => 0,
                'buang_air_besar'                     => 0,
                'perikanan'                           => 0,
                'sayuran'                             => 0,
                'pembudidayaan_hutan_manggrove'       => 0,
                'lain-lain'                           => 0,
            ],
            'pemanfaatan_dan_kondisi_danau_waduk_situ' => [
                'luas'                   => 0,
                'perikanan'              => 0,
                'air_minum_air_baku'     => 0,
                'cuci_dan_mandi'         => 0,
                'irigasi'                => 0,
                'buang_air_besar'        => 0,
                'pembangkit_listrik'     => 0,
                'prasarana_transportasi' => 0,
                'lainnya'                => 0,

                'tercemar'     => 0,
                'pendangkalan' => 0,
                'keruh'        => 0,
                'berlumpur'    => 0,
            ],
            'air_panas'          => $airPanas,
            'kualitas_udara'     => $kualitasUdara,
            'kebisingan'         => $kebisingan,
            'ruang_publik_taman' => $ruangPublikTaman,
            'potensi_wisata'     => $potensiWisata,
            'sdm_jumlah'         => [
                'jumlah_laki_laki'       => $sdmJumlah['jumlah_laki'] ?? 0,
                'jumlah_perempuan'       => $sdmJumlah['jumlah_pr'] ?? 0,
                'jumlah_total'           => $sdmJumlah['jumlah_warga'] ?? 0,
                'jumlah_kepala_keluarga' => $sdmJumlah['jumlah_kk'] ?? 0,
                'kepadatan_penduduk'     => $sdmJumlah['kepadatan'] ?? 0,
            ],
            'usia_sdm'                => $sdmUsia,
            'tingkatan_pendidikan'    => $sdmPendidikan,
            'mata_pencaharian_pokok'  => $sdmMataPencaharian,
            'agama'                   => $sdmAgama,
            'kewarganegaraan'         => $sdmKewarganegaraan,
            'etnis'                   => $sdmEtnis,
            'cacat_mental_dan_fisik'  => $sdmCacat,
            'tenaga_kerja'            => $sdmTenagaKerja,
            'kualitas_angkatan_kerja' => $sdmAngkatanKerja,

            'lembaga_pemerintahan' => [
                'dasar_hukum_pembentukan_pemerintah_desa_kelurahan' => $lembagaPemerintah['dasar_pembentukan'] ?? 0,
                'dasar_hukum_pembentukan_bpd'                       => $lembagaPemerintah['dasar_pembentukan_bpd'] ?? 0,
                'jumlah_aparat_pemerintahan_desa_kelurahan'         => $lembagaPemerintah['jumlah_aparat_pemerintah'] ?? 0,
                'jumlah_perangkat_desa_kelurahan'                   => $lembagaPemerintah['jumlah_perangkat_desa'] ?? 0,
                'kepala_desa_lurah'                                 => $lembagaPemerintah['kepala_desa'] ?? 0,
                'sekretaris_desa_kelurahan'                         => $lembagaPemerintah['sekretaris_desa'] ?? 0,
                'kepala_urusan_pemerintahan'                        => $lembagaPemerintah['kepala_urusan_seksi_pemerintahan'] ?? 0,
                'kepala_urusan_pembangunan'                         => $lembagaPemerintah['kepala_urusan_seksi_pembangunan'] ?? 0,
                'kepala_urusan_pemberdayaan_masyarakat'             => $lembagaPemerintah['kepala_urusan_seksi_pemberdayaan_masyarakat'] ?? 0,
                'kepala_urusan_kesejahteraan_rakyat'                => $lembagaPemerintah['kepala_urusan_seksi_kesejahteraan_rakyat'] ?? 0,
                'kepala_urusan_umum'                                => $lembagaPemerintah['kepala_urusan_seksi_umum'] ?? 0,
                'kepala_urusan_keuangan'                            => $lembagaPemerintah['kepala_urusan_seksi_keuangan'] ?? 0,
                'kepala_urusan_1'                                   => $lembagaPemerintah['kepala_urusan_seksi_perekonomian'] ?? 0,
                'kepala_urusan_2'                                   => $lembagaPemerintah['kepala_urusan_seksi_data_informasi'] ?? 0,
                'jumlah_staf'                                       => $lembagaPemerintah['jumlah_staff'] ?? 0,
                'jumlah_dusun_di_desa'                              => $lembagaPemerintah['jumlah_dusun'] ?? 0,
                'kepala_dusun_lingkungan_1'                         => $lembagaPemerintah['kepala_dusun_lingkungan_1'] ?? 0,
                'kepala_dusun_lingkungan_2'                         => $lembagaPemerintah['kepala_dusun_lingkungan_2'] ?? 0,
                'kepala_dusun_lingkungan_3'                         => $lembagaPemerintah['kepala_dusun_lingkungan_3'] ?? 0,
                'kepala_dusun_lingkungan_4'                         => $lembagaPemerintah['kepala_dusun_lingkungan_4'] ?? 0,
                'kepala_dusun_lingkungan_5'                         => $lembagaPemerintah['kepala_dusun_lingkungan_5'] ?? 0,
            ],
            'tingkat_pendidikan_aparat_desa_kelurahan' => [
                'kepala_desa_lurah'                     => $lembagaPemerintah['pendidikan_kepala_desa'] ?? 0,
                'sekretaris_desa_kelurahan'             => $lembagaPemerintah['pendidikan_sekretaris_desa'] ?? 0,
                'kepala_urusan_pemerintahan'            => $lembagaPemerintah['pendidikan_kepala_urusan_pemerintahan'] ?? 0,
                'kepala_urusan_pembangunan'             => $lembagaPemerintah['pendidikan_kepala_urusan_pembangunan'] ?? 0,
                'kepala_urusan_pemberdayaan_masyarakat' => $lembagaPemerintah['pendidikan_kepala_urusan_pemberdayaan'] ?? 0,
                'kepala_urusan_kesejahteraan_rakyat'    => $lembagaPemerintah['pendidikan_kepala_urusan_kesejahteraan_rakyat'] ?? 0,
                'kepala_urusan_umum'                    => $lembagaPemerintah['pendidikan_kepala_urusan_umum'] ?? 0,
                'kepala_urusan_keuangan'                => $lembagaPemerintah['pendidikan_kepala_urusan_keuangan'] ?? 0,
                'kepala_urusan_1'                       => $lembagaPemerintah['pendidikan_kepala_urusan_perekonomian'] ?? 0,
                'kepala_urusan_2'                       => $lembagaPemerintah['pendidikan_kepala_urusan_seksi_data_informasi'] ?? 0,
            ],
            'badan_permusyawaratan_desa' => [
                'keberadaan_bpd'     => $lembagaPemerintah['keberadaan_bpd'] ?? 0,
                'jumlah_anggota_bpd' => $lembagaPemerintah['jumlah_anggota_bpd'] ?? 0,
            ],
            'pendidikan_anggota_bpd' => [
                'ketua'       => $lembagaPemerintah['pendidikan_ketua_bpd'] ?? 0,
                'wakil_ketua' => $lembagaPemerintah['pendidikan_wakil_ketua_bpd'] ?? 0,
                'sekretaris'  => $lembagaPemerintah['pendidikan_sekretaris_bpd'] ?? 0,
                'anggota_1'   => $lembagaPemerintah['pendidikan_anggota_bpd_1'] ?? 0,
                'anggota_2'   => $lembagaPemerintah['pendidikan_anggota_bpd_2'] ?? 0,
                'anggota_3'   => $lembagaPemerintah['pendidikan_anggota_bpd_3'] ?? 0,
                'anggota_4'   => $lembagaPemerintah['pendidikan_anggota_bpd_4'] ?? 0,
                'anggota_5'   => $lembagaPemerintah['pendidikan_anggota_bpd_5'] ?? 0,
                'anggota_6'   => $lembagaPemerintah['pendidikan_anggota_bpd_6'] ?? 0,
                'anggota_7'   => $lembagaPemerintah['pendidikan_anggota_bpd_7'] ?? 0,
            ],
            'nama_anggota_bpd' => [
                'anggota_1' => $lembagaPemerintah['nama_anggota_bpd_1'] ?? 0,
                'anggota_2' => $lembagaPemerintah['nama_anggota_bpd_2'] ?? 0,
                'anggota_3' => $lembagaPemerintah['nama_anggota_bpd_3'] ?? 0,
                'anggota_4' => $lembagaPemerintah['nama_anggota_bpd_4'] ?? 0,
                'anggota_5' => $lembagaPemerintah['nama_anggota_bpd_5'] ?? 0,
                'anggota_6' => $lembagaPemerintah['nama_anggota_bpd_6'] ?? 0,
                'anggota_7' => $lembagaPemerintah['nama_anggota_bpd_7'] ?? 0,

            ],
            'lembaga_kemasyarakatan' => $lembagaKemasyarakatan,
            'lembaga_ekonomi'        => $lembagaEkonomi,

            'pendidikan_formal'            => collect($lembagaPendidikan)->filter(static fn ($item, $key) => $key == KomoditasLembagaPendidikanEnum::FORMAL),
            'pendidikan_formal_keagamaan'  => collect($lembagaPendidikan)->filter(static fn ($item, $key) => ! in_array($key, [KomoditasLembagaPendidikanEnum::NONFORMAL, KomoditasLembagaPendidikanEnum::FORMAL])),
            'pendidikan_non_formal_kursus' => collect($lembagaPendidikan)->filter(static fn ($item, $key) => $key == KomoditasLembagaPendidikanEnum::NONFORMAL),
            'lembaga_adat'                 => [
                'pemangku_adat'                                   => $lembagaAdat['pemangku_adat'] ?? 0,
                'kepengurusan_adat'                               => $lembagaAdat['kepengurusan_adat'] ?? 0,
                'rumah_adat'                                      => $lembagaAdat['rumah_adat'] ?? 0,
                'barang_pusaka'                                   => $lembagaAdat['barang_pusaka'] ?? 0,
                'naskah_naskah'                                   => $lembagaAdat['naskah'] ?? 0,
                'lainnya'                                         => $lembagaAdat['lainnya'] ?? 0,
                'musyawarah_adat'                                 => $lembagaAdat['musyawarah_adat'] ?? 0,
                'sanksi_adat'                                     => $lembagaAdat['sanksi_adat'] ?? 0,
                'upacara_adat_perkawinan'                         => $lembagaAdat['upacara_adat_perkawinan'] ?? 0,
                'upacara_adat_kematian'                           => $lembagaAdat['upacara_adat_kematian'] ?? 0,
                'upacara_adat_kelahiran'                          => $lembagaAdat['upacara_adat_kelahiran'] ?? 0,
                'upacara_adat_dalam_bercocok_tanam'               => $lembagaAdat['upacara_adat_cocok_tanam'] ?? 0,
                'upacara_adat_bidang_perikanan_laut'              => $lembagaAdat['upacara_adat_perikanan'] ?? 0,
                'upacara_adat_bidang_kehutanan'                   => $lembagaAdat['upacara_adat_kehutanan'] ?? 0,
                'upacara_adat_dalam_pengelolaan_sumber_daya_alam' => $lembagaAdat['upacara_adat_sda'] ?? 0,
                'upacara_adat_dalam_pembangunan_rumah'            => $lembagaAdat['upacara_adat_pembangunan'] ?? 0,
                'upacara_adat_dalam_penyelesaian_masalah_konflik' => $lembagaAdat['upacara_adat_penyelesaian_masalah'] ?? 0,
            ],
            'hansip_dan_linmas' => [
                'keberadaan_hansip_dan_linmas' => $lembagaKeamanan['keberadaan_hansip_dan_linmas'] ?? 0,
                'jumlah_anggota_hansip'        => $lembagaKeamanan['jumlah_anggota_hansip'] ?? 0,
                'jumlah_anggota_satgas_linmas' => $lembagaKeamanan['jumlah_anggota_satgas_linmas'] ?? 0,
                'pelaksanaan_siskamling'       => $lembagaKeamanan['pelaksanaan_siskamling'] ?? 0,
                'jumlah_pos_kamling'           => $lembagaKeamanan['jumlah_pos_kamling'] ?? 0,
            ],
            'satpam_swakarsa' => [
                'keberadaan_satpam_swakarsa'             => $lembagaKeamanan['keberadaan_satpam_swakarsa'] ?? 0,
                'jumlah_anggota'                         => $lembagaKeamanan['jumlah_anggota_satpam_swakarsa'] ?? 0,
                'nama_organisasi_induk'                  => $lembagaKeamanan['nama_organisasi_induk'] ?? 0,
                'pemilik_organisasi'                     => $lembagaKeamanan['pemilik_organisasi'] ?? 0,
                'keberadaan_organisasi_keamanan_lainnya' => $lembagaKeamanan['keberadaan_organisasi_keamanan_lainnya'] ?? 0,
            ],
            'kerjasama_desa_kelurahan_tni' => [
                'mitra_koramil_tni'     => $lembagaKeamanan['mitra_koramil_tni'] ?? 0,
                'jumlah_anggota_tni'    => $lembagaKeamanan['jumlah_anggota_mitra_koramil_tni'] ?? 0,
                'jumlah_kegiatan_tni'   => $lembagaKeamanan['jumlah_kegiatan_mitra_koramil_tni'] ?? 0,
                'lainnya'               => $lembagaKeamanan['lainnya'] ?? 0,
                'babinkamtibmas_polri'  => $lembagaKeamanan['babinkamtibmas_polri'] ?? 0,
                'jumlah_anggota_polri'  => $lembagaKeamanan['jumlah_anggota_babinkamtibmas_polri'] ?? 0,
                'jumlah_kegiatan_polri' => $lembagaKeamanan['jumlah_kegiatan_babinkamtibmas_polri'] ?? 0,
                'lainnya_polri'         => $lembagaKeamanan['lainnya'] ?? 0,
            ],
            'sarana_transportasi_darat'          => $saranaTransportasiDarat,
            'prasarana_transportasi_laut_sungai' => $saranaAngkutanLain,
            'sarana_komunikasi_informasi'        => $saranaKomunikasiInformasi,
            'prasarana_air_bersih'               => [
                'jumlah_sumur_pompa'                    => $airBersih['air_bersih'] ?? 0,
                'jumlah_sumur_gali'                     => $airBersih['sumur_gali'] ?? 0,
                'jumlah_hidran_umum'                    => $airBersih['hidran_umum'] ?? 0,
                'jumlah_pah'                            => $airBersih['penampung_air'] ?? 0,
                'jumlah_tangki_air_bersih'              => $airBersih['tangki_air'] ?? 0,
                'jumlah_embung'                         => $airBersih['embung'] ?? 0,
                'jumlah_mata_air'                       => $airBersih['mata_air'] ?? 0,
                'jumlah_bangunan_pengolahan_air_bersih' => $airBersih['bangunan'] ?? 0,
            ],
            'sanitasi' => [
                'saluran_drainase_pembuangan_air_limbah'         => $sanitasi['saluran_drainase'] ?? 0,
                'sumur_resapan_air_rumah_tangga'                 => $sanitasi['sumur_resapan'] ?? 0,
                'jumlah_mck_umum'                                => $sanitasi['mck_umum'] ?? 0,
                'pemilik_jumlah_jamban_keluarga'                 => $sanitasi['jamban_keluarga'] ?? 0,
                'kondisi_saluran_drainase_pembuangan_air_limbah' => $sanitasi['kondisi_saluran'] ?? 0,
            ],
            'prasarana_irigasi' => [
                'panjang_saluran_primer'   => $prasaranaIrigasi['panjang_saluran_primer'] ?? 0,
                'panjang_saluran_sekunder' => $prasaranaIrigasi['panjang_saluran_sekunder'] ?? 0,
                'panjang_saluran_tersier'  => $prasaranaIrigasi['panjang_saluran_tersier'] ?? 0,
                'jumlah_pintu_sadap'       => $prasaranaIrigasi['pintu_sadap'] ?? 0,
                'jumlah_pintu_pembagi_air' => $prasaranaIrigasi['pintu_pembagi_air'] ?? 0,
            ],
            'kondisi' => [
                'panjang_saluran_primer_rusak'   => $prasaranaIrigasi['saluran_primer_rusak'] ?? 0,
                'panjang_saluran_sekunder_rusak' => $prasaranaIrigasi['saluran_sekunder_rusak'] ?? 0,
                'panjang_saluran_tersier_rusak'  => $prasaranaIrigasi['saluran_tersier_rusak'] ?? 0,
                'jumlah_pintu_sadap_rusak'       => $prasaranaIrigasi['pintu_sadap_rusak'] ?? 0,
                'jumlah_pintu_pembagi_air_rusak' => $prasaranaIrigasi['pintu_pembagi_air_rusak'] ?? 0,
            ],
            'sarana_desa' => [
                'gedung_kantor'              => $saranaDesa['gedung_kantor'] ?? 0,
                'kondisi'                    => $saranaDesa['kondisi'] ?? 0,
                'jumlah_ruang_kerja'         => $saranaDesa['jumlah_ruang_kerja_ruang'] ?? 0,
                'balai_desa'                 => $saranaDesa['balai_desa_kelurahan_sejenisnya'] ?? 0,
                'listrik'                    => $saranaDesa['listrik'] ?? 0,
                'air_bersih'                 => $saranaDesa['air_bersih'] ?? 0,
                'telepon'                    => $saranaDesa['telepon'] ?? 0,
                'rumah_dinas_kepala_desa'    => $saranaDesa['rumah_dinas_kepala_desa_lurah'] ?? 0,
                'rumah_dinas_perangkat_desa' => $saranaDesa['rumah_dinas_perangkat'] ?? 0,
                'lainnya_1'                  => $saranaDesa['fasilitas_lainnya'] ?? 0,
                'lainnya_2'                  => $saranaDesa['fasilitas_lainnya'] ?? 0,
            ],
            'inventaris_dan_alat_tulis_kantor' => [
                'jumlah_mesin_tik'    => $saranaDesa['mesin_tik_buah'] ?? 0,
                'jumlah_meja'         => $saranaDesa['meja_buah'] ?? 0,
                'jumlah_kursi'        => $saranaDesa['kursi_buah'] ?? 0,
                'jumlah_almari_arsip' => $saranaDesa['lemari_arsip_buah'] ?? 0,
                'komputer'            => $saranaDesa['komputer_unit'] ?? 0,
                'mesin_fax'           => $saranaDesa['mesin_fax_unit'] ?? 0,
                'kendaraan_dinas'     => $saranaDesa['kendaraan_dinas_unit'] ?? 0,
            ],
            'administrasi_pemerintahan_desa' => [
                'buku_data_peraturan_desa'                            => $saranaDesa['buku_data_peraturan_desa'] ?? 0,
                'buku_keputusan_kepala_desa'                          => $saranaDesa['buku_keputusan_kepala_desa_lurah'] ?? 0,
                'buku_administrasi_kependudukan'                      => $saranaDesa['buku_administrasi_kependudukan'] ?? 0,
                'buku_data_inventaris'                                => $saranaDesa['buku_data_inventaris'] ?? 0,
                'buku_data_aparat'                                    => $saranaDesa['buku_data_aparat'] ?? 0,
                'buku_data_tanah_milik_desa'                          => $saranaDesa['buku_data_tanah_kas_desa'] ?? 0,
                'buku_administrasi_pajak_dan_retribusi'               => $saranaDesa['buku_administrasi_pajak_dan_retribusi'] ?? 0,
                'buku_data_tanah'                                     => $saranaDesa['buku_data_tanah'] ?? 0,
                'buku_laporan_pengaduan_masyarakat'                   => $saranaDesa['buku_laporan_pengaduan_masyarakat'] ?? 0,
                'buku_agenda_ekspedisi'                               => $saranaDesa['buku_agenda_ekspedisi'] ?? 0,
                'buku_profil_desa'                                    => $saranaDesa['buku_profil_desa_dan_kelurahan'] ?? 0,
                'buku_data_induk_penduduk'                            => $saranaDesa['buku_data_induk_penduduk'] ?? 0,
                'buku_buku_data_mutasi_penduduk'                      => $saranaDesa['buku_data_mutasi_penduduk'] ?? 0,
                'buku_rekapitulasi_jumlah_penduduk_akhir_bulan'       => $saranaDesa['buku_rekapitulasi_penduduk_akhir_bulan'] ?? 0,
                'buku_registrasi_pelayanan_penduduk'                  => $saranaDesa['buku_registrasi_pelayanan_penduduk'] ?? 0,
                'buku_data_penduduk_sementara'                        => $saranaDesa['buku_data_penduduk_sementara'] ?? 0,
                'buku_anggaran_penerimaan'                            => $saranaDesa['buku_anggaran_penerimaan'] ?? 0,
                'buku_anggaran_pengeluaran_pegawai_dan_pembangunan'   => $saranaDesa['buku_anggaran_pengeluaran_pegawai_pembangunan'] ?? 0,
                'buku_kas_umum'                                       => $saranaDesa['buku_kas_umum'] ?? 0,
                'buku_kas_pembantu_penerimaan'                        => $saranaDesa['buku_kas_pembantu_penerimaan'] ?? 0,
                'buku_kas_pembantu_pengeluaran_rutin_dan_pembangunan' => $saranaDesa['buku_kas_pembantu_pengeluaran_rutin_pembangunan'] ?? 0,
                'buku_data_lembaga_kemasyarakatan'                    => $saranaDesa['buku_data_lembaga_kemasyarakatan'] ?? 0,
            ],
            'sarana_bpd' => [
                'gedung_kantor'       => $saranaBpd['gedung_kantor'] ?? 0,
                'ruangan_kerja'       => $saranaBpd['ruangan_kerja'] ?? 0,
                'balai_bpd'           => $saranaBpd['balai_bpd'] ?? 0,
                'listrik'             => $saranaBpd['listrik'] ?? 0,
                'air_bersih'          => $saranaBpd['air_bersih'] ?? 0,
                'telepon'             => $saranaBpd['telepon'] ?? 0,
                'jumlah_mesin_tik'    => $saranaBpd['mesin_tik'] ?? 0,
                'jumlah_meja'         => $saranaBpd['meja'] ?? 0,
                'jumlah_kursi'        => $saranaBpd['kursi'] ?? 0,
                'jumlah_almari_arsip' => $saranaBpd['lemari_arsip'] ?? 0,
                'komputer'            => $saranaBpd['komputer'] ?? 0,
                'mesin_fax'           => $saranaBpd['mesin_fax'] ?? 0,
                'lainnya'             => $saranaBpd['inventaris_lainnya'] ?? 0,
            ],
            'administrasi_bpd' => [
                'buku_buku_administrasi_keanggotaan_bpd'                           => $saranaBpd['buku_anggota'] ?? 0,
                'buku_administrasi_kegiatan_bpd'                                   => $saranaBpd['buku_administrasi_bpd'] ?? 0,
                'buku_kegiatan_bpd'                                                => $saranaBpd['buku_kegiatan'] ?? 0,
                'buku_himpunan_peraturan_desa_yang_ditetapkan_bpd_dan_kepala_desa' => $saranaBpd['buku_perdes'] ?? 0,
                'lainnya'                                                          => $saranaBpd['buku_lainnya'] ?? 0,
            ],
            'prasarana_dan_sarana_dusun' => [
                'gedung_kantor_atau_balai_pertemuan' => $saranaDusun['gedung_kantor_atau_balai_pertemuan'] ?? 0,
                'alat_tulis_kantor'                  => $saranaDusun['alat_tulis_kantor'] ?? 0,
                'barang_inventaris'                  => $saranaDusun['barang_inventaris'] ?? 0,
                'buku_administrasi'                  => $saranaDusun['buku_administrasi'] ?? 0,
                'jenis_kegiatan'                     => $saranaDusun['jenis_kegiatan'] ?? 0,
                'jumlah_pengurus'                    => $saranaDusun['jumlah_pengurus'] ?? 0,
                'lainnya'                            => $saranaDusun['lainnya'] ?? 0,
            ],

            'prasarana_lkm'       => $prasaranaLembagaKemasyarakatan,
            'sarana_agama'        => $saranaAgama,
            'sarana_olahraga'     => $saranaOlahraga,
            'prasarana_kesehatan' => $prasaranaKesehatan,
            'sarana_kesehatan'    => $saranaKesehatan,
            'sarana_pendidikan'   => $saranaPendidikan,
            'sarana_wisata'       => $saranaWisata,
            'prasarana_energi'    => [
                'listrik_pln'        => $saranaEnergi['sarana_energi'] ?? 0,
                'diesel_umum'        => $saranaEnergi['diesel_umum'] ?? 0,
                'genset_pribadi'     => $saranaEnergi['genset_pribadi'] ?? 0,
                'lampu_minyak_tanah' => $saranaEnergi['lampu_minyak'] ?? 0,
                'kayu_bakar'         => $saranaEnergi['kayu_bakar'] ?? 0,
                'batu_bara'          => $saranaEnergi['batu_bara'] ?? 0,
                'tanpa_penerangan'   => $saranaEnergi['tanpa_penerangan'] ?? 0,
            ],
            'sarana_kebersihan' => [
                'tempat_pembuangan_sementara'      => $saranaKebersihan['tempat_pembungan_sementara'] ?? 0,
                'tempat_pembuangan_akhir'          => $saranaKebersihan['tempat_pembungan_akhir'] ?? 0,
                'alat_penghancur_sampah'           => $saranaKebersihan['alat_penghancur_incenerator'] ?? 0,
                'jumlah_gerobak_sampah'            => $saranaKebersihan['gerobak_sampah'] ?? 0,
                'jumlah_tong_sampah'               => $saranaKebersihan['tong_sampah'] ?? 0,
                'jumlah_truck_pengangkut_sampah'   => $saranaKebersihan['truk_pengangkut_sampah'] ?? 0,
                'jumlah_satgas_kebersihan'         => $saranaKebersihan['satgas_kebersihan'] ?? 0,
                'jumlah_anggota_satgas_kebersihan' => $saranaKebersihan['anggota_satgas_kebersihan'] ?? 0,
                'jumlah_pemulung'                  => $saranaKebersihan['pemulung'] ?? 0,
                'tempat_pengelolaan_sampah'        => $saranaKebersihan['pengelolaan_sampah'] ?? 0,
                'pengelolaan_sampah_lingkungan'    => $saranaKebersihan['sarana_kebersihan'] ?? 0,
                'pengelola_sampah_lainnya'         => $saranaKebersihan['pengelolaan_sampah_dll'] ?? 0,
            ],
        ];
    }
}
