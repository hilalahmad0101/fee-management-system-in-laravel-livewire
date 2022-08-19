<!-- Modal -->
<div class="modal fade" wire:ignore.self id="updateFee" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Fee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" wire:submit.prevent='update({{ $edit_id }})'>
                    <div class="my-3">
                        <select name="" class="form-control" id="" wire:model.lazy='edit_course_name'>
                            <option value="">Select Couse Name</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                            @endforeach
                        </select>
                        @error('edit_course_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <input class="form-control" placeholder="Fee Type" wire:model.lazy='edit_fee_type'
                            type="text">
                        @error('edit_fee_type')
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
                        <button type="submit" class="app-content-headerButton">Save
                        </button>
                        <button type="button" wire:click='addList' class="app-content-headerButton">Add To List
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <table class="table table-bordered">
                @foreach ($fees as $fee)
                    <tr>
                        <td>{{ $fee['fee_type'] }}</td>
                        <td>{{ $fee['amount'] }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td>Total</td>
                    <td>{{ $total_amount }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
