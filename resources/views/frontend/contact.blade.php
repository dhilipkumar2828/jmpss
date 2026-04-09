@extends('layouts.app')
@section('title', 'English medium school in Thirukazhukundram | JMPSS')
@section('meta_keywords', 'English medium school in Thirukazhukundram, CBSE school listing in Thirukazhukundram')
@section('meta_description', 'Looking for an English medium school in Thirukazhukundram? JMPSS provides a high standard of education, focus on student development, and excellent faculty.')

@section('content')
    <!-- Hero Section -->
    <section class="hero contact-hero">
        <div class="hero-overlay"></div>
        <img src="{{ $pageBanner ? asset($pageBanner->image_path) : asset('assets/jmpsss/image/new/slider3.jpg') }}" alt="Contact Us" class="hero-bg">
        <div class="hero-content">
            <h1>{{ $pageBanner->title ?? 'CONTACT US' }}</h1>
            @if($pageBanner && $pageBanner->subtitle)
                <p style="font-size: 18px; opacity: 0.9; margin-top: -10px; color: white;">{{ $pageBanner->subtitle }}</p>
            @endif
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Home</a> <span>›</span> <a href="{{ route('contact') }}"
                    class="active">Contact Us</a>
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
                    <p><a href="mailto:jeevamemorialschool@gmail.com">jeevamemorialschool@gmail.com</a></p>
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
                    <form action="{{ route('contact.submit') }}" method="POST" id="contactForm" class="contact-form">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" id="name" placeholder="Your Name" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" required>
                        </div>
                        <div class="input-group">
                            <input type="email" name="email" id="email" placeholder="Email Address" required>
                        </div>
                        <div class="input-group">
                            <input type="tel" name="mobile" id="mobile" placeholder="Mobile Number" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                        </div>
                        <div class="input-group">
                            <input type="text" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="input-group">
                            <textarea name="message" id="message" placeholder="Write your message here..." rows="5"
                                required></textarea>
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

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            // Custom method for alphabets only
            $.validator.addMethod("lettersonly", function (value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
            }, "Letters and spaces only please");

            // Initialize Validation
            $("#contactForm").validate({
                rules: {
                    name: {
                        required: true,
                        lettersonly: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    mobile: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    subject: {
                        required: true
                    },
                    message: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name",
                        lettersonly: "Your name must contain only alphabets"
                    },
                    email: {
                        required: "Please enter a valid email address",
                        email: "Please enter a valid email address"
                    },
                    mobile: {
                        required: "Please enter your mobile number",
                        digits: "Please enter a valid 10-digit mobile number",
                        minlength: "Mobile number must be exactly 10 digits",
                        maxlength: "Mobile number must be exactly 10 digits"
                    },
                    subject: {
                        required: "Please enter a subject"
                    },
                    message: {
                        required: "Please write your message"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
    <style>
        .invalid-feedback {
            color: #dc3545;
            font-size: 80%;
            margin-top: 0.25rem;
            display: block;
            text-align: left;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }
    </style>
@endpush
