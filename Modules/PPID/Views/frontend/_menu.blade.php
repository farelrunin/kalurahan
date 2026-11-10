@if ($menuPPID)
    @foreach ($menuPPID as $menu)
        @php $hasDropdown = count($menu['childrens'] ?? []) > 0 @endphp
        @if ($hasDropdown)
            @include('ppid::frontend._menu_dropdown', ['child' => $menu])
        @else
            @include('ppid::frontend._menu_item', ['item' => $menu])
        @endif
    @endforeach
@endif
