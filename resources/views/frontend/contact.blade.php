@extends('layouts.app')
@section('title', 'Contact Us | JMPSSS | Jaypee Model Senior Secondary School')

@section('content')
<!-- Hero Section -->
    <section class="hero contact-hero">
        <div class="hero-overlay"></div>
        <img src="{{ asset('assets/jmpsss/image/new/slider3.jpg') }}" alt="Contact Us" class="hero-bg">
        <div class="hero-content">
            <h1>CONTACT US</h1>
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Home</a> <span>›</span> <a href="{{ route('contact') }}" class="active">Contact Us</a>
            </div>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="contact-cards-section section-padding">
        <div class="container">
            <div class="text-center mb-50">
                <span class="section-subtitle">Get In Touch</span>
                <h2 class="section-title">We're Here to Help You</h2>
            </div>
            <div class="contact-cards-grid">
                <div class="contact-card">
                    <div class="icon-circle"><i class="fa-solid fa-location-dot"></i></div>
                    <h3>Our Address</h3>
                    <p>No.210, Palla Egai Village, Puliur Post,<br>Thirukazhukundram T.K.,<br>Kancheepuram Dist. Pin-603
                        109</p>
                </div>
                <div class="contact-card">
                    <div class="icon-circle"><i class="fa-solid fa-phone"></i></div>
                    <h3>Phone Number</h3>
                    <p><a href="tel:+917373418852">+91-7373418852</a><br><a href="tel:+918939222122">+91-8939222122</a>
                    </p>
                </div>
                <div class="contact-card">
                    <div class="icon-circle"><i class="fa-solid fa-envelope"></i></div>
                    <h3>Email Address</h3>
                    <p><a href="mailto:jeevamemorialschool@gmail.com">jeevamemorialschool@gmail.com</a><br><a
                            href="mailto:info@jmpsss.com">info@jmpsss.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form and Map -->
    <section class="contact-main-section section-padding bg-light">
        <div class="container">
            <div class="contact-grid">
                <!-- Form -->
                <div class="contact-form-wrapper">
                    <h3 class="form-title">Send Us a Message</h3>
                    <form action="#" class="contact-form">
                        <div class="input-group">
                            <input type="text" placeholder="Your Name" required>
                        </div>
                        <div class="input-group">
                            <input type="email" placeholder="Email Address" required>
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="Subject" required>
                        </div>
                        <div class="input-group">
                            <textarea placeholder="Write your message here..." rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn-primary" style="width: 100%; justify-content: center;">Submit
                            Feedback <i class="fa-solid fa-paper-plane"></i></button>
                    </form>
                </div>
                <!-- Map -->
                <div class="contact-map-wrapper">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3893.7062054290996!2d80.08578117454118!3d12.601604222883248!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a530208f47b37fb%3A0x646b6c0a409a1f14!2sJeeva%20Memorial%20Public%20School!5e0!3m2!1sen!2sin!4v1772795521641!5m2!1sen!2sin"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
@endsection


