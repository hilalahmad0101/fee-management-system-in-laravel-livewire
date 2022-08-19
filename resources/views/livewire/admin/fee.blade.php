<div>
    @include('components.add-fee')
    @include('components.update-fee')
    @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <div class="app-content-actions">
        <input class="search-bar" wire:model='search' placeholder="Search..." type="text">
        <div class="app-content-actions-wrapper">
            <button class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#addFee">Add
                Fee</button>
        </div>
    </div>
    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell image">
                #
            </div>
            <div class="product-cell image">
                Fee Types
            </div>
            <div class="product-cell image">
                Course Name
            </div>
            <div class="product-cell image">
                Total Count
            </div>
            <div class="product-cell image">
                Action
            </div>

        </div>

        @forelse ($get_fees as $fee)
            <div class="products-row">
                <div class="product-cell image" style="text-align: center !important">
                    {{ $fee->id }}
                </div>
                <div class="product-cell image" style="text-align: center !important">
                    @foreach (json_decode($fee->fee_type) as $item)
                        {{ $item }}
                    @endforeach

                </div>
                <div class="product-cell image" style="text-align: center !important">
                    {{ $fee->courses->course_name }}

                </div>
                <div class="product-cell image" style="text-align: center !important">
                    {{ $fee->total_amount }}

                </div>
                <div class="product-cell image" style="text-align: center !important">
                    <button class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#updateFee"
                        wire:click='edit({{ $fee->id }})'>Edit</button>
                    <button class="app-content-headerButton bg-danger mx-3"
                        wire:click='delete({{ $fee->id }})'>Delete</button>
                </div>
            </div>
        @empty
            <h4 class="text-white">Recoard not found</h4>
        @endforelse
    </div>
</div>
