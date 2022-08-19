<!-- Modal -->
<div class="modal fade" wire:ignore.self id="updateStudentFee" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Fee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" wire:submit.prevent='update({{ $edit_id }})'>
                    <div class="my-3">
                        <input class="form-control" placeholder="Fee Id" wire:model.lazy='edit_fee_id' type="text">
                        @error('edit_fee_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <select name="" class="form-control" wire:model='selectStudentFee'>
                            <option value="">Select Couse Name</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                            @endforeach
                        </select>
                        @error('course_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <select name="" class="form-control" wire:model='edit_student_id'>
                            <option value="">Select Couse Name</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                        @error('edit_student_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <input class="form-control" placeholder="Amount" readonly wire:model.lazy='edit_amount'
                            type="text">
                        @error('edit_amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="my-3">
                        <button type="submit" class="app-content-headerButton">Save
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
