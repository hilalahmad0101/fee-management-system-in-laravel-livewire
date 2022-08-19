<!-- Modal -->
<div class="modal fade" wire:ignore.self id="updatePayment" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" wire:submit.prevent='update({{ $edit_id }})'>
                    <div class="my-3">
                        <select name="" class="form-control" wire:model='selectStudentFee'>
                            <option value="">Select Couse Name</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <input class="form-control" placeholder="Total Amount" readonly
                            wire:model.lazy='edit_remain_amount' type="text">
                        @error('edit_remain_amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <input class="form-control" placeholder="Amount" wire:model.lazy='edit_amount' type="text">
                        @error('edit_amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Enter remark"
                            wire:model.lazy='edit_remark'></textarea>
                        @error('edit_remark')
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
