<!-- Modal -->
<div class="modal fade" wire:ignore.self id="addStudent" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" wire:submit.prevent='store'>
                    <div class="my-3">
                        <input class="form-control" placeholder="Name" wire:model='name' type="text">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <input class="form-control" placeholder="Email" wire:model='email' type="text">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <input class="form-control" placeholder="Contact" wire:model='contact' type="text">
                        @error('contact')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="my-3">
                        <input class="form-control" placeholder="Address" wire:model='address' type="text">
                        @error('address')
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
