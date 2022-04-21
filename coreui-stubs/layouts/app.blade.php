<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="c-app">
@include('layouts.sidebar')

<div class="c-wrapper">
    <header class="c-header c-header-light c-header-fixed">
        @include('layouts.header')
    </header>

    <div class="c-body">
        <main class="c-main">
            @yield('content')
        </main>
    </div>

    <footer class="c-footer">
        <div><a href="https://hublink.az">HubCraft</a> © 2020 Hublink.</div>
        <div class="mfs-auto">Powered by&nbsp;<a href="https://hublink.az">Hublink</a></div>
    </footer>
</div>

<script src="{{ mix('js/app.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success ml-1',
                        cancelButton: 'btn btn-danger mr-1'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Əminsən ?',
                    text: "Sildikən sonra geri qaytarılamaz",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Bəli, Sil !',
                    cancelButtonText: 'Xeyr, Silmə !',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        swalWithBootstrapButtons.fire(
                            'Silindi!',
                            'Uğurla Silindi',
                            'success'
                        )
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Ləğv Edildi!',
                            'Məlumatlar Güvəndədir! ;)',
                            'error'
                        )
                    }
                })
            })
        })
    </script>
@yield('third_party_scripts')

@stack('page_scripts')
</body>
</html>
