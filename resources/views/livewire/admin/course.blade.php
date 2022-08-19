<div>
    @include('components.add-course')
    @include('components.update-course')
    @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <div class="app-content-actions">
        <input class="search-bar" wire:model='search' placeholder="Search..." type="text">
        <div class="app-content-actions-wrapper">
            <button class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#addCourse">Add
                Course</button>
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
                Level
            </div>
            <div class="product-cell image">
                Action
            </div>

        </div>

        @forelse ($courses as $course)
            <div class="products-row">
                <div class="product-cell image">
                    {{ $course->id }}
                </div>
                <div class="product-cell image">
                    {{ $course->course_name }}

                </div>
                <div class="product-cell image">
                    {{ $course->level }}

                </div>
                <div class="product-cell image">
                    <button class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#updateCourse"
                        wire:click='edit({{ $course->id }})'>Edit</button>
                    <button class="app-content-headerButton bg-danger mx-3"
                        wire:click='delete({{ $course->id }})'>Delete</button>
                </div>
            </div>
        @empty
            <h4 class="text-white">Recoard not found</h4>
        @endforelse
    </div>
</div>
