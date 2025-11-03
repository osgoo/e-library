<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'eLibrary') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
{{-- Өөрчлөлт: bg-gray-100 -> bg-yellow-50, text-gray-900 -> text-yellow-900 --}}
<body class="h-screen bg-yellow-50 dark:bg-gray-900 text-yellow-900 dark:text-gray-100 font-sans flex flex-col">

    <div class="flex flex-1 overflow-hidden">

        <div class="flex flex-col flex-1 overflow-hidden">

            @include('layouts.inc.app.header')

            {{-- Өөрчлөлт: bg-gray-100 -> bg-yellow-50 --}}
            <main class="flex-1 overflow-y-auto bg-yellow-50 dark:bg-gray-800 p-6">
                @yield('content')
            </main>

        </div>

    </div>

    @include('layouts.inc.app.footer')

    @stack('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.book-slider', {
                slidesPerView: 2,
                spaceBetween: 16,
                pagination: {
                    el: '.book-slider-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.book-slider-next',
                    prevEl: '.book-slider-prev',
                },
                breakpoints: {
                    640: {
                      slidesPerView: 3,
                      spaceBetween: 16,
                    },
                    768: {
                      slidesPerView: 4,
                      spaceBetween: 16,
                    },
                    1024: {
                      slidesPerView: 5,
                      spaceBetween: 16,
                    },
                    1280: {
                        slidesPerView: 6,
                        spaceBetween: 16,
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bookSwiper = new Swiper('.book-slider', {
                slidesPerView: 2,
                spaceBetween: 16,
                pagination: { el: '.book-slider-pagination', clickable: true, },
                navigation: { nextEl: '.book-slider-next', prevEl: '.book-slider-prev', },
                breakpoints: {
                    640: { slidesPerView: 3, spaceBetween: 16, },
                    768: { slidesPerView: 4, spaceBetween: 16, },
                    1024: { slidesPerView: 5, spaceBetween: 16, },
                    1280: { slidesPerView: 6, spaceBetween: 16, }
                }
            });

            const categorySwiper = new Swiper('.category-slider', {
                slidesPerView: 2,
                spaceBetween: 16,
                pagination: {
                    el: '.category-slider-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.category-slider-next',
                    prevEl: '.category-slider-prev',
                },
                breakpoints: {
                    640: {
                    slidesPerView: 3,
                    spaceBetween: 16,
                    },
                    768: {
                    slidesPerView: 4,
                    spaceBetween: 16,
                    },
                    1024: {
                    slidesPerView: 5,
                    spaceBetween: 16,
                    },
                }
            });
        });
    </script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Амжилттай!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Хаах',
            });
        </script>
    @endif
</body>
</html>
