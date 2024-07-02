<div class="d-flex">
    {{-- @can('application-show') --}}
    <a href="{{ route('application.show', $id) }}" class="show btn btn-sm btn-outline-primary mr-2">
        <i class="fas fa-eye"></i>
    </a>
    {{-- @endcan --}}
     {{-- @can('application-edit') --}}
        <a href="{{ route('application.edit', $id) }}" class="edit btn btn-sm btn-outline-warning mr-2">
            <i class="fas fa-edit"></i>
        </a>
     {{-- @endcan --}}
     {{-- @can('application-delete') --}}
        <a href="#" data-id="{{ $id }}" class="delete-btn btn btn-sm btn-outline-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
     {{-- @endcan --}}
</div>
