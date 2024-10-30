@foreach ($menus as $menu)
    <li id="item-{{ $menu->id }}" data-id="{{ $menu->id }}">
        {{ $menu->title }}
        <div class="menu-actions">
            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-info btn-sm fa fa-edit"></a>
            <button class="delete-menu fa fa-remove btn btn-danger btn-sm" data-id="{{ $menu->id }}"></button>
        </div>
        
        @if($menu->childrenForAdmin->isNotEmpty())
            <ul>
                @include('admin.menue.menus', ['menus' => $menu->childrenForAdmin]) <!-- Recursive include -->
            </ul>
        @endif
    </li>
@endforeach

<style>
    .menu-actions {
    display: inline-flex;
    gap: 5px; /* Adjusts the space between the Edit and Delete buttons */
}

</style>
