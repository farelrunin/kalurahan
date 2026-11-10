<section class="relative overflow-hidden shadow-lg rounded-lg @php $is_home and print('my-5') @endphp">
  <div class="product-header">
    <h3 class="text-heading product-ribbon">Aparatur</h3>
  </div>
  @php
    $kepalaDesa = null;
    if (isset($aparatur_desa['daftar_perangkat']) && is_array($aparatur_desa['daftar_perangkat'])) {
      $perangkatCollection = new \Illuminate\Support\Collection($aparatur_desa['daftar_perangkat']);
      $kepalaDesa = $perangkatCollection->firstWhere('jabatan', setting('sebutan_kepala_desa'));
    }
  @endphp
  <div class="grid grid-cols-2 @php $is_home and print('lg:grid-cols-5') @endphp bg-primary dark:bg-primary-secondary p-4 gap-4">
    @if ($kepalaDesa)
      <div class="card w-full p-4 flex flex-col justify-between space-y-4 product-item">
        <div class="space-y-3">
          <img loading="lazy" src="{{ $kepalaDesa['foto'] }}" alt="{{ $kepalaDesa['nama'] }}" class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg" style="@php !$is_home and print('width: 65%') @endphp">
          <div class="space-y-1 text-sm text-center">
            <span class="text-heading">{{ $kepalaDesa['nama'] }}</span>
            <span class="block">{{ $kepalaDesa['jabatan'] }}</span>
            @if($kepalaDesa['pamong_niap']) 
              <span class="block">{{ setting('sebutan_nip_desa') }} : {{ $kepalaDesa['pamong_niap'] }}</span>
            @endif
            @if($kepalaDesa['kehadiran'] == 1) 
              @if(setting('tampilkan_kehadiran') && $kepalaDesa['status_kehadiran'] == 'hadir') 
                  <span class="bg-emerald-500 text-white py-1 px-3 rounded inline-block text-xs">Hadir</span>
                  @elseif (setting('tampilkan_kehadiran') && $kepalaDesa['tanggal'] == date('Y-m-d') && $kepalaDesa['status_kehadiran'] != 'hadir') 
                      <span class="bg-red-500 text-white py-1 px-3 rounded inline-block text-xs">{{ ucwords($kepalaDesa['status_kehadiran']) }}</span>
                  @elseif (setting('tampilkan_kehadiran') && $kepalaDesa['tanggal'] != date('Y-m-d')) 
                      <span class="bg-red-500 text-white py-1 px-3 rounded inline-block text-xs">Belum Rekam Kehadiran</span>
              @endif
            @endif
          </div>
        </div>
      </div>
    @endif
    <div class="owl-carousel w-full flex relative {{ $is_home ? 'main-carousel' :'one-carousel' }} @php $is_home and print('lg:col-span-4') @endphp">
      @foreach($aparatur_desa['daftar_perangkat'] as $data)
        @if($data['jabatan'] === setting('sebutan_kepala_desa')) @php continue @endphp @endif
        <div class="card p-4 flex flex-col justify-between space-y-4 product-item">
          <div class="space-y-3">
            <img loading="lazy" src="{{ $data['foto'] }}" alt="{{ $data['nama'] }}" class="w-full object-cover object-center bg-slate-300 dark:bg-slate-600 mx-auto rounded-lg" style="@php !$is_home and print('width: 65%') @endphp">
            <div class="space-y-1 text-sm text-center">
              <span class="text-heading">{{ $data['nama'] }}</span>
              <span class="block">{{ $data['jabatan'] }}</span>
              @if($data['pamong_niap']) 
                <span class="block">{{ setting('sebutan_nip_desa') }} : {{ $data['pamong_niap'] }}</span>
              @endif
              @if($data['kehadiran'] == 1) 
                @if(setting('tampilkan_kehadiran') && $data['status_kehadiran'] == 'hadir') 
                    <span class="bg-emerald-500 text-white py-1 px-3 rounded inline-block text-xs">Hadir</span>
                    @elseif (setting('tampilkan_kehadiran') && $data['tanggal'] == date('Y-m-d') && $data['status_kehadiran'] != 'hadir') 
                        <span class="bg-red-500 text-white py-1 px-3 rounded inline-block text-xs">{{ ucwords($data['status_kehadiran']) }}</span>
                    @elseif (setting('tampilkan_kehadiran') && $data['tanggal'] != date('Y-m-d')) 
                        <span class="bg-red-500 text-white py-1 px-3 rounded inline-block text-xs">Belum Rekam Kehadiran</span>
                @endif
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@push('styles')
  <style>
    @media (min-width: 1024px) {
      .lg\:col-span-4 {
        grid-column: span 4 / span 4;
      }
    }
  </style>
@endpush