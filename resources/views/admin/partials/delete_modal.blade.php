<div class="modal" id="delete_modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold ">Project cancellation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fw-bold">Are you sure you want to delete the '<span id='project_name'></span>' project?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="my-red-btn" data-bs-dismiss="modal">Close</button>
                <form id="delete_form" action="{{ route('admin.projects.destroy', ['project' => $project['slug']]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="my-red-btn">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
