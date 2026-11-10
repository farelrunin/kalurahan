<div class="lg:hidden bg-black/50 fixed left-0 top-0 bottom-0 right-0 w-full h-full z-30" @click="drawer = !drawer" x-show="drawer"></div>
<nav class="bottom-0 bg-slate-50 dark:bg-dark-secondary fixed top-0 w-10/12 z-40 shadow-lg transition-all duration-500 transform pb-16 h-auto overflow-y-auto lg:w-96 lg:overflow-visible lg:bottom-0 -translate-x-full"
  :class="{'-translate-x-full': !drawer, 'translate-x-0': drawer}" id="sidenav">
  <div class="bg-primary text-white px-3 py-5 items-center flex gap-3">
    <img loading="lazy" src="{{ gambar_desa($desa['logo']) }}" alt="Logo {{ ucwords(setting('sebutan_desa')).' '.ucwords($desa['nama_desa']) }}" style="width: 10%" class="h-auto flex-shrink-0 object-fit">
    <div>
      <p class="font-bold text-sm font-heading">{{ strtoupper($nama_desa) }}</p>
      <p class="text-xs">{{ ucwords(setting('sebutan_kecamatan_singkat')) }}
          {{ ucwords(identitas('nama_kecamatan')) }},
          {{ ucwords(setting('sebutan_kabupaten_singkat')) }}
          {{ ucwords(identitas('nama_kabupaten')) }}</p>
    </div>
  </div>
  <ul class="relative block divide-y dark:divide-dark-primary">
    @if(menu_tema()) 
      @php 
      function generateMenu($menuItems, $idPrefix = '') {
        $html = '<ul class="ml-2 relative accordion-collapse collapse" id="collapsemenu' . $idPrefix . '" aria-labelledby="nav-' . $idPrefix . '">';
        foreach ($menuItems as $id => $menu) {
            $has_dropdown = isset($menu['childrens']) && count($menu['childrens']) > 0;
            $html .= '<li class="relative" id="nav-' . $idPrefix . '-' . $id . '">';
            $html .= '<a href="' . $menu['link_url'] . '" class="flex items-center justify-between text-sm py-3 px-4 h-12 overflow-hidden text-gray-700 dark:text-white text-ellipsis whitespace-nowrap rounded transition duration-300 ease-in-out cursor-pointer"';
            if ($has_dropdown) {
                $html .= ' data-bs-toggle="collapse" data-bs-target="#collapsemenu' . $idPrefix . '-' . $id . '" aria-controls="collapsemenu' . $idPrefix . '-' . $id . '"';
            }
            $html .= '>';
            $html .= '<span><i class="ti ti-menu mr-1"></i>' . $menu['nama'] . '</span>';
            if ($has_dropdown) {
                $html .= '<span class="ti ti-chevron-down text-lg inline-block font-bold"></span>';
            }
            $html .= '</a>';
            if ($has_dropdown) {
                $html .= generateMenu($menu['childrens'], $idPrefix . '-' . $id);
            }
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
      }
      @endphp

      @foreach(menu_tema() as $id => $menu) 
        @php $has_dropdown = isset($menu['childrens']) && count($menu['childrens']) > 0; @endphp
        <li class="relative" id="nav-{{ $id }}">
          <a href="{{ $menu['link_url'] }}" class="flex items-center justify-between text-sm py-3 px-4 h-12 overflow-hidden text-gray-700 dark:text-white text-ellipsis whitespace-nowrap rounded transition duration-300 ease-in-out cursor-pointer" data-mdb-ripple="true" data-mdb-ripple-color="dark" data-bs-parent="#sidenav"
          @if($has_dropdown) 
            data-bs-toggle="collapse" data-bs-target="#collapsemenu{{ $id }}" aria-controls="collapsemenu{{ $id }}"
          @endif
          >
            <span><i class="ti ti-menu mr-1"></i>
            {{ $menu['nama'] }}</span>
            @if($has_dropdown) 
              <span class="ti ti-chevron-down text-lg inline-block font-bold"></span>
            @endif
          </a>
          @if($has_dropdown) 
            {!! generateMenu($menu['childrens'], $id) !!}
          @endif
        </li>
      @endforeach
    @endif
  </ul>
</nav>