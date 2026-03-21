@extends('layouts.app')
@section('title', 'Campus Infrastructure – JMPSSSS')

@section('content')
    <!-- Page Header -->
    <style>
        .page-header {
            position: relative;
            height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            overflow: hidden;
            margin-bottom: 0px;
        }
        .page-header-bg {
            position: absolute;
            inset: 0;
            background: url('{{ $pageBanner ? asset($pageBanner->image_path) : asset('assets/JMPSSS/image/new/slider2.jpg') }}') center/cover no-repeat;
            z-index: 0;
        }
        .page-header-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 72, 0, 0.55);
        }
        .page-header-content {
            position: relative;
            z-index: 1;
        }
        .page-header-content h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 16px;
            font-family: 'Outfit', sans-serif;
            color: #fff;
            text-transform: uppercase;
        }
        .breadcrumb { margin-top: 10px; display: flex; justify-content: center; gap: 8px; font-size: 14px; list-style: none; padding: 0; }
        .breadcrumb a { color: #fff; text-decoration: none; opacity: 0.8; }
        .breadcrumb li { color: #fff; opacity: 0.8; }
        .breadcrumb li + li::before { content: "›"; margin-right: 8px; margin-left: -4px; opacity: 0.6; }
    </style>

    <!-- Page Header -->
    <section class="page-header reveal reveal-scale" data-reveal-once>
        <div class="page-header-bg"></div>
        <div class="page-header-content">
            <h1>{{ $pageBanner->title ?? 'Scholarly Infrastructure' }}</h1>
            @if($pageBanner && $pageBanner->subtitle)
                <p style="font-size: 18px; opacity: 0.9; margin-top: -10px; color: white;">{{ $pageBanner->subtitle }}</p>
            @endif
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Infrastructure</li>
            </ul>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="section-title reveal" data-reveal-once>
                <h2>A World-Class Learning Environment</h2>
                <div class="divider-center"></div>
            </div>

            <div class="grid"
                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px; margin-top: 60px;">
                <!-- Lab -->
                <div class="reveal reveal-left" data-reveal-once>
                    <img src="{{ asset('home/gallery_2.jpg') }}" alt="Labs" class="about-img"
                        style="height: 300px; margin-bottom: 20px;">
                    <h3 style="color: var(--primary); margin-bottom: 15px; font-size: 24px;">Advanced Science Laboratories
                    </h3>
                    <p style="font-size: 15px;">Our Physics, Chemistry, and Biology laboratories are equipped with modern
                        apparatus and high-end tools to facilitate hands-on scientific inquiry and research experiments. We
                        maintain a strict focus on scholarly precision and safety across all scientific tiers.</p>
                </div>
                <!-- Library -->
                <div class="reveal reveal-scale" data-reveal-once data-reveal-delay="150">
                    <img src="{{ asset('home/gallery_3.jpg') }}" alt="Library" class="about-img"
                        style="height: 300px; margin-bottom: 20px;">
                    <h3 style="color: var(--primary); margin-bottom: 15px; font-size: 24px;">Central Scholarly Library</h3>
                    <p style="font-size: 15px;">A vast repository of knowledge, our library houses over 10,000 scholarly
                        volumes, research papers, and periodicals. Designed as a sanctuary for quiet thought and discovery,
                        it also features digital workstations for modern informational research.</p>
                </div>
                <!-- Sports -->
                <div class="reveal reveal-right" data-reveal-once data-reveal-delay="300">
                    <img src="{{ asset('home/gallery_4.jpg') }}" alt="Arena" class="about-img"
                        style="height: 300px; margin-bottom: 20px;">
                    <h3 style="color: var(--primary); margin-bottom: 15px; font-size: 24px;">Elite Sports & Training Arena
                    </h3>
                    <p style="font-size: 15px;">Committed to physical excellence alongside academic rigor, our sports arena
                        includes professional-grade basketball courts, an athletic track, and dedicated spaces for indoor
                        scholarly sports like Chess and Table Tennis.</p>
                </div>
            </div>

            <!-- Additional Facilities -->
            <div class="info-card reveal reveal-scale" data-reveal-once style="margin-top: 60px;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px;">
                    <div style="text-align: center;">
                        <i class="fas fa-wifi" style="font-size: 32px; color: var(--accent); margin-bottom: 15px;"></i>
                        <h4 style="color: var(--primary); margin-bottom: 10px;">Smart Campas</h4>
                        <p style="font-size: 13px; margin-bottom: 0;">Fully Wi-Fi enabled campus with high-speed scholarly
                            connectivity.</p>
                    </div>
                    <div style="text-align: center;">
                        <i class="fas fa-bus" style="font-size: 32px; color: var(--accent); margin-bottom: 15px;"></i>
                        <h4 style="color: var(--primary); margin-bottom: 10px;">Safe Transit</h4>
                        <p style="font-size: 13px; margin-bottom: 0;">GPRS-enabled transport fleet covering all major
                            institutional zones.</p>
                    </div>
                    <div style="text-align: center;">
                        <i class="fas fa-shield-alt"
                            style="font-size: 32px; color: var(--accent); margin-bottom: 15px;"></i>
                        <h4 style="color: var(--primary); margin-bottom: 10px;">CCTV Security</h4>
                        <p style="font-size: 13px; margin-bottom: 0;">24/7 high-fidelity surveillance for maximum student
                            safety.</p>
                    </div>
                    <div style="text-align: center;">
                        <i class="fas fa-utensils" style="font-size: 32px; color: var(--accent); margin-bottom: 15px;"></i>
                        <h4 style="color: var(--primary); margin-bottom: 10px;">Nutrition Cafe</h4>
                        <p style="font-size: 13px; margin-bottom: 0;">Hygienic cafeteria serving balanced meals focused on
                            scholarly health.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
