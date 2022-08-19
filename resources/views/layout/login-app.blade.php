<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @livewireStyles

</head>

<body>
    <!-- partial:index.partial.html -->
    {{-- <div class="app-container"> --}}
    {{ $slot }}
    {{-- </div> --}}
    <!-- partial -->
    <script src="{{ asset('script.js') }}"></script>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.livewire.on('addStudent', () => {
            $("#addStudent").modal('hide')
        })
    </script>
    @livewireScripts
</body>

</html>
