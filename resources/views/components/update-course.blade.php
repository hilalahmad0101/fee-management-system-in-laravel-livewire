<!-- Modal -->
<div class="modal fade" wire:ignore.self id="updateCourse" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" wire:submit.prevent='update({{ $edit_id }})'>
                    <div class="my-3">
                        <input class="form-control" placeholder="Course Name" wire:model.lazy='edit_course_name'
                            type="text">
                        @error('edit_course_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <input class="form-control" placeholder="Level" wire:model.lazy='edit_level' type="text">
                        @error('edit_level')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <textarea wire:model.lazy='edit_content' cols="30" rows="10" class="form-control"></textarea>
                        @error('edit_content')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <button type="submit" class="app-content-headerButton">Update
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
