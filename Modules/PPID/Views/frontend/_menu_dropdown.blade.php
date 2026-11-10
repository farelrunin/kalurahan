@php
    $hasDropdown = count($child['childrens'] ?? []) > 0;
    $subMenu = $child['parrent'] != 0 ? true : false;
@endphp
@if ($hasDropdown)
    <li class="nav-item {{ $hasDropdown ? 'dropdown' : '' }}">
        <a {{ $child['parrent'] }} class="{{ $subMenu ? 'dropdown-item' : 'nav-link' }} {{ $hasDropdown ? 'dropdown-toggle' : '' }}" href="{{ $hasDropdown ? '#' : ci_route($child['link_url']) }}" role="button" data-bs-toggle="{{ $hasDropdown ? 'dropdown' : '' }}" aria-expanded="false">
            {{ $child['nama'] }}
            @if ($hasDropdown)
                <span class="caret"></span>
            @endif
        </a>

        <ul class="{{ $subMenu ? 'submenu submenu-left' : '' }} dropdown-menu" aria-labelledby="navbarDropdown{{ $child['nama'] }}">
            @foreach ($child['childrens'] as $children)
                @include('ppid::frontend._menu_dropdown', ['child' => $children])
            @endforeach
        </ul>
    </li>
@else
    @include('ppid::frontend._menu_dropdown_item', ['item' => $children])
@endif
