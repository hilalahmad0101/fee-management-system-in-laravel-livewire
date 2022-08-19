<div>
    @include('components.add-payment')
    @include('components.update-payment')
    @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <div class="app-content-actions">
        <input class="search-bar" wire:model='search' placeholder="Search..." type="text">
        <div class="app-content-actions-wrapper">
            <button class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#addPayment">Add
                Payment</button>
        </div>
    </div>
    <div class="products-area-wrapper tableView">
        <div class="products-header">
            <div class="product-cell image">
                #
            </div>
            <div class="product-cell image">
                Student Name
            </div>
            <div class="product-cell image">
                Amount
            </div>
            <div class="product-cell image">
                Remain Amount
            </div>
            <div class="product-cell image">
                Remark
            </div>
            <div class="product-cell image">
                Action
            </div>

        </div>

        @forelse ($payments as $payment)
            <div class="products-row">

                <div class="product-cell image">
                    {{ $payment->id }}
                </div>
                <div class="product-cell image">
                    {{ $payment->students->name }}

                </div>
                <div class="product-cell image">
                    {{ $payment->amount }}

                </div>
                <div class="product-cell image">
                    {{ $payment->remain_amount }}

                </div>
                <div class="product-cell image">
                    {{ $payment->remark }}

                </div>
                <div class="product-cell image">

                    <button class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#updatePayment"
                        wire:click='edit({{ $payment->id }})'>Edit</button>
                    <button class="app-content-headerButton bg-danger mx-3"
                        wire:click='delete({{ $payment->id }})'>Delete</button>
                </div>
            </div>
        @empty
            <h4 class="text-white">Recoard not found</h4>
        @endforelse
    </div>
</div>
