<div>

    <div class="app-content-actions">
        <input class="search-bar" placeholder="Search..." type="text">
        <div class="app-content-actions-wrapper">

            <button class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#addStudent">Add
                Product</button>

        </div>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <div class="products-area-wrapper tableView">
        <form action="" wire:submit.prevent='change'>
            <div class="my-3">
                <input class="form-control" placeholder="Name" readonly wire:model='username' type="text">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="my-3">
                <input class="form-control" placeholder="Password" wire:model='password' type="password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="my-3">
                <button type="submit" class="app-content-headerButton">Save
                </button>
            </div>
        </form>
    </div>


</div>
