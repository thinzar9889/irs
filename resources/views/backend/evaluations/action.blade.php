<div class="d-flex">
    <a href="{{ route('evaluations.exportEvaluation-pdf', $id) }}" class="btn btn-sm btn-outline-danger mr-2">
        <i class="fas fa-file-pdf"></i>
    </a>
    @can('evaluation-show')
        <a href="{{ route('evaluations.show', $id) }}" class="show btn btn-sm btn-outline-primary mr-2">
            <i class="fas fa-eye"></i>
        </a>
     @endcan
     @can('evaluation-edit')
        <a href="{{ route('evaluations.edit', $id) }}" class="edit btn btn-sm btn-outline-warning mr-2">
            <i class="fas fa-edit"></i>
        </a>
     @endcan
     @can('evaluation-delete')
        <a href="#" data-id="{{ $id }}" class="delete-btn btn btn-sm btn-outline-danger">
            <i class="fas fa-trash-alt"></i>
        </a>
     @endcan
</div>
