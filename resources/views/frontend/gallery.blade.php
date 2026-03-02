@extends('layouts.app')
@section('title', 'Campus Gallery – JMPSS')

@section('content')
    <!-- Page Header -->
    <section class="page-header reveal reveal-scale" data-reveal-once>
        <div class="container">
            <h1>Scholarly Imagery</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Gallery</li>
            </ul>
        </div>
    </section>

    <!-- Gallery Categories -->
    <section class="content-section">
        <div class="container">
            <div class="section-title reveal" data-reveal-once>
                <h2>Glimpses of Excellence</h2>
                <div class="divider-center"></div>
            </div>

            <!-- Photos Grid -->
            <div class="gallery-2x2" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
                <div class="gallery-box reveal reveal-scale" data-reveal-once data-reveal-delay="0">
                    <img src="{{ asset('home/gallery_1.jpg') }}" alt="Academic">
                    <div class="gallery-overlay">
                        <h4>Scholarly Classrooms</h4>
                    </div>
                </div>
                <div class="gallery-box reveal reveal-scale" data-reveal-once data-reveal-delay="100">
                    <img src="{{ asset('home/gallery_2.jpg') }}" alt="Labs">
                    <div class="gallery-overlay">
                        <h4>Scientific Research</h4>
                    </div>
                </div>
                <div class="gallery-box reveal reveal-scale" data-reveal-once data-reveal-delay="200">
                    <img src="{{ asset('home/gallery_3.jpg') }}" alt="Library">
                    <div class="gallery-overlay">
                        <h4>Institutional Library</h4>
                    </div>
                </div>
                <div class="gallery-box reveal reveal-scale" data-reveal-once data-reveal-delay="300">
                    <img src="{{ asset('home/gallery_4.jpg') }}" alt="Sports">
                    <div class="gallery-overlay">
                        <h4>Physical Excellence</h4>
                    </div>
                </div>
                <div class="gallery-box reveal reveal-scale" data-reveal-once data-reveal-delay="400">
                    <img src="{{ asset('home/about_campus.jpg') }}" alt="Culture">
                    <div class="gallery-overlay">
                        <h4>Cultural Heritage</h4>
                    </div>
                </div>
                <div class="gallery-box reveal reveal-scale" data-reveal-once data-reveal-delay="500">
                    <img src="{{ asset('home/hero_primary.jpg') }}" alt="Leadership">
                    <div class="gallery-overlay">
                        <h4>Scholarly Events</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
