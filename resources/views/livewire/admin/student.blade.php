<div>
    @include('components.add-student')
    @include('components.update-student')
    @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <div class="app-content-actions">
        <input class="search-bar" wire:model='search' placeholder="Search..." type="text">
        <div class="app-content-actions-wrapper">
            <button class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#addStudent">Add
                Product</button>
        </div>
    </div>
    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell image">
                #
            </div>
            <div class="product-cell image">
                Name
            </div>
            <div class="product-cell image">
                Email
            </div>
            <div class="product-cell image">
                Address
            </div>
            <div class="product-cell image">
                Contact
            </div>
            <div class="product-cell image">
                Action
            </div>

        </div>

        @forelse ($students as $student)
            <div class="products-row">

                <div class="product-cell image">
                    {{ $student->id }}
                </div>
                <div class="product-cell image">
                    {{ $student->name }}

                </div>
                <div class="product-cell image">
                    {{ $student->email }}

                </div>
                <div class="product-cell image">
                    {{ $student->address }}

                </div>
                <div class="product-cell image">
                    {{ $student->contact }}

                </div>
                <div class="product-cell image">

                    <button class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#updateStudent"
                        wire:click='edit({{ $student->id }})'>Edit</button>
                    <button class="app-content-headerButton bg-danger mx-3"
                        wire:click='delete({{ $student->id }})'>Delete</button>
                </div>
            </div>
        @empty
            <h4 class="text-white">Recoard not found</h4>
        @endforelse
    </div>
</div>
