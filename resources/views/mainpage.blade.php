@extends('layouts.blankLayout')

@section('title', 'UPICON Dashboard')

@section('style')
    <style>
        /* Custom CSS for hover effect */
        .hoverable-div {
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .hoverable-div:hover {
            transform: scale(1.05);
            background-color: rgba(0, 72, 255, 0.61);
            color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            /* Add any other styles you want for the hover state */
            /* For example: box-shadow, etc. */
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .vertical-box {
            height: 80px;
            width: auto;
            margin: 0.5rem 0 0.5rem 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .upicon-logo {
            height: 60px;
            width: auto;
        }

        @media only screen and (max-width: 767px) {
            .upicon-logo {
                height: 40px;
                /* Adjust the height as needed for mobile devices */
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endsection

@section('content')

    @include('layouts.sections.navbar.mainpage-navbar')

    <main id="main" class="container-fluid p-2">
        <div class="container">
            <div class="row d-lg-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-4">
                    <div class="row m-2">
                        <div class="col-12 text-center mb-3">
                            <span class="fw-bold h3 text-uppercase text-muted">Verticals</span>
                        </div>
                        @foreach (['Training', 'Consultancy', 'Retail', 'Finance', 'Human Resource'] as $item)
                            <a class="nav-link active" href="/login" aria-current="page">
                                <div class="col-12 border rounded hoverable-div vertical-box">
                                    <span class="">{{ $item }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="swiper mySwiper m-2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide rounded">
                                <img class="rounded"
                                    src="https://images.unsplash.com/photo-1565598469107-2bd14ae7e7e4?q=80&w=1846&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
                            </div>
                            <div class="swiper-slide rounded">
                                <img class="rounded"
                                    src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
                            </div>
                            <div class="swiper-slide rounded">
                                <img class="rounded"
                                    src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    @include('layouts.sections.footer.mainpage-footer')

@endsection

@section('script')
    @include('layouts.sections.scripts.themechange')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            direction: "horizontal",
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

@endsection
