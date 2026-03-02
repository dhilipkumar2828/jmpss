@extends('layouts.app')
@section('title', 'Institutional Interaction – JMPSS')

@section('content')
    <!-- Page Header -->
    <section class="page-header reveal reveal-scale" data-reveal-once>
        <div class="container">
            <h1>Scholarly Interaction</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="content-section">
        <div class="container">
            <div class="about-grid">
                <!-- Contact Info -->
                <div class="about-content reveal reveal-left" data-reveal-once>
                    <small
                        style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 2px;">Reach
                        Out</small>
                    <h2 style="margin-top: 10px;">Connect with Our <br>Academic Community</h2>
                    <p>We invite you to reach out for scholarly enquiries, admission guidance, or general administrative
                        support. Our dedicated team is committed to providing efficient and professional institutional
                        assistance.</p>

                    <div style="margin-top: 50px;">
                        <div style="display: flex; gap: 20px; margin-bottom: 30px;">
                            <div
                                style="width: 50px; height: 50px; background: rgba(20, 90, 50, 0.05); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 20px;">
                                <i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h4 style="margin-bottom: 5px; color: var(--primary); font-size: 18px;">Institutional
                                    Address</h4>
                                <p style="font-size: 15px; margin-bottom: 0;">123, School Road, Academic
                                    District,<br>Chennai, Tamil Nadu - 600001</p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 20px; margin-bottom: 30px;">
                            <div
                                style="width: 50px; height: 50px; background: rgba(20, 90, 50, 0.05); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 20px;">
                                <i class="fas fa-phone"></i></div>
                            <div>
                                <h4 style="margin-bottom: 5px; color: var(--primary); font-size: 18px;">Admission Enquiries
                                </h4>
                                <p style="font-size: 15px; margin-bottom: 0;">+91 44 2345 6789 | +91 44 2345 6790</p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 20px;">
                            <div
                                style="width: 50px; height: 50px; background: rgba(20, 90, 50, 0.05); color: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 20px;">
                                <i class="fas fa-envelope"></i></div>
                            <div>
                                <h4 style="margin-bottom: 5px; color: var(--primary); font-size: 18px;">General Support</h4>
                                <p style="font-size: 15px; margin-bottom: 0;">info@jmpss.edu.in | admissions@jmpss.edu.in
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="reveal reveal-right" data-reveal-once>
                    <div class="info-card" style="padding: 50px;">
                        <h3 style="margin-top: 0; font-size: 24px; color: var(--primary); margin-bottom: 30px;">Scholarly
                            Enquiry Form</h3>
                        <form action="#">
                            <div style="margin-bottom: 25px;">
                                <label
                                    style="display: block; font-size: 13px; text-transform: uppercase; font-weight: 700; color: var(--text-muted); margin-bottom: 10px; letter-spacing: 0.5px;">Parent/Guardian
                                    Name</label>
                                <input type="text" placeholder="Dr./Mr./Ms. John Doe"
                                    style="width: 100%; padding: 14px 18px; border: 2px solid var(--border); border-radius: var(--radius); font-family: 'Inter', sans-serif; outline: none; transition: border-color 0.3s ease;">
                            </div>
                            <div style="margin-bottom: 25px;">
                                <label
                                    style="display: block; font-size: 13px; text-transform: uppercase; font-weight: 700; color: var(--text-muted); margin-bottom: 10px; letter-spacing: 0.5px;">Institutional
                                    Email</label>
                                <input type="email" placeholder="example@scholarly.edu"
                                    style="width: 100%; padding: 14px 18px; border: 2px solid var(--border); border-radius: var(--radius); font-family: 'Inter', sans-serif; outline: none; transition: border-color 0.3s ease;">
                            </div>
                            <div style="margin-bottom: 25px;">
                                <label
                                    style="display: block; font-size: 13px; text-transform: uppercase; font-weight: 700; color: var(--text-muted); margin-bottom: 10px; letter-spacing: 0.5px;">Message/Enquiry</label>
                                <textarea rows="4" placeholder="Briefly describe your scholarly enquiry..."
                                    style="width: 100%; padding: 14px 18px; border: 2px solid var(--border); border-radius: var(--radius); font-family: 'Inter', sans-serif; outline: none; resize: none; transition: border-color 0.3s ease;"></textarea>
                            </div>
                            <button type="submit" class="btn-outline-accent"
                                style="width: 100%; text-align: center; cursor: pointer;">Submit Scholarly Enquiry</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="section section-light reveal reveal-scale" data-reveal-once>
        <div class="container">
            <div class="info-card"
                style="height: 450px; background: #eee; padding: 0; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                <p style="font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 2px;">
                    Integrated Scholarly Map Placeholder</p>
                <!-- In production, replace with Google Maps iFrame -->
            </div>
        </div>
    </section>
@endsection
