<div>
    @include('components.add-student-fee')
    @include('components.update-student-fee')
    @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <div class="app-content-actions">
        <input class="search-bar" wire:model='search' placeholder="Search..." type="text">
        <div class="app-content-actions-wrapper">
            <button class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#addStudentFee">Add
                Student Fee</button>
        </div>
    </div>
    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell image">
                #
            </div>
            <div class="product-cell image">
                Course Name
            </div>
            <div class="product-cell image">
                Student Name
            </div>
            <div class="product-cell image">
                Total Fee
            </div>
            <div class="product-cell image">
                Action
            </div>

        </div>

        @forelse ($student_fees as $fees)
            <div class="products-row">
                <div class="product-cell image">
                    {{ $fees->fee_id }}
                </div>
                <div class="product-cell image">
                    {{ $fees->courses->course_name }}
                </div>
                <div class="product-cell image">
                    {{ $fees->students->name }}
                </div>
                <div class="product-cell image">
                    {{ $fees->amount }}

                </div>
                <div class="product-cell image">
                    <button class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#updateStudentFee"
                        wire:click='edit({{ $fees->id }})'>Edit</button>
                    <button class="app-content-headerButton bg-danger mx-3"
                        wire:click='delete({{ $fees->id }})'>Delete</button>
                </div>
            </div>
        @empty
            <h4 class="text-white">Recoard not found</h4>
        @endforelse
    </div>
</div>
