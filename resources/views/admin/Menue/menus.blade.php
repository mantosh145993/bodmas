@foreach ($menus as $menu)
    <li id="item-{{ $menu->id }}" data-id="{{ $menu->id }}">
        {{ $menu->title }}
        <button class="delete-menu btn btn-danger btn-sm" data-id="{{ $menu->id }}">Delete</button>
        
        @if($menu->children->isNotEmpty())
            <ul>
                @include('admin.menue.menus', ['menus' => $menu->children]) <!-- Recursive include -->
            </ul>
        @endif
    </li>
@endforeach
