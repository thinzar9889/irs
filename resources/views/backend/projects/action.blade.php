<div class="d-flex">
    @can('project-show')
    <a href="{{ route('projects.show', $id) }}" class="show btn btn-sm btn-outline-primary mr-2">
        <i class="fas fa-eye"></i>
    </a>
    @endcan
     @can('project-edit')
        <a href="{{ route('projects.edit', $id) }}" class="edit btn btn-sm btn-outline-warning mr-2">
            <i class="fas fa-edit"></i>
        </a>
     @endcan
     @can('project-delete')
        <a href="#" data-id="{{ $id }}" class="delete-btn btn btn-sm btn-outline-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
     @endcan
</div>
