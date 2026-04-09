@extends('layouts.app')
@section('title', 'Admissions - JMPSSS | JEEVA MEMORIAL PUBLIC SCHOOL')

@push('styles')
<style>
/* ── Page Hero ── */
        .page-hero {
            position: relative;
            height: 380px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            overflow: hidden;
        }

        .page-hero-bg {
            position: absolute;
            inset: 0;
            background: url('{{ $pageBanner ? asset($pageBanner->image_path) : asset('assets/jmpsss/image/new/slider2.jpg') }}') center/cover no-repeat;
            z-index: 0;
        }

        .page-hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 72, 0, 0.5);
        }

        .page-hero-content {
            position: relative;
            z-index: 1;
        }

        .page-hero-content .page-label {
            display: inline-block;
            background: rgba(225, 76, 30, 0.9);
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 6px 20px;
            border-radius: 30px;
            margin-bottom: 18px;
        }

        .page-hero-content h1 {
            font-size: 48px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 16px;
            font-family: 'Outfit', sans-serif;
        }

        .breadcrumb-trail {
            font-size: 14px;
            opacity: 0.85;
        }

        .breadcrumb-trail a {
            color: #fff;
            text-decoration: none;
        }

        .breadcrumb-trail a:hover {
            color: #e14c1e;
        }

        .breadcrumb-trail span {
            margin: 0 8px;
            opacity: 0.6;
        }

        /* ── Our Story (Classic Overlap) ── */
        .story-classic {
            padding: 100px 0 60px;
            background: #fff;
            position: relative;
        }

        .story-classic-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 70px;
            align-items: center;
        }

        .sc-content {
            padding-right: 20px;
        }

        .sc-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 700;
            color: #e14c1e;
            margin-bottom: 20px;
        }

        .sc-eyebrow::before {
            content: '';
            width: 40px;
            height: 2px;
            background: #e14c1e;
        }

        .sc-title {
            font-size: 48px;
            font-weight: 700;
            color: #111;
            font-family: 'Outfit', sans-serif;
            line-height: 1.15;
            margin-bottom: 28px;
        }

        .sc-title span {
            color: #004800;
            position: relative;
        }

        .sc-text {
            font-size: 16px;
            color: #555;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .sc-text.lead {
            font-size: 18px;
            color: #333;
            font-weight: 500;
            border-left: 3px solid #e14c1e;
            padding-left: 18px;
        }

        .sc-visual {
            position: relative;
            padding-right: 30px;
            padding-bottom: 30px;
        }

        .sc-visual::before {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 80%;
            height: 90%;
            background: #e6f0e6;
            border-radius: 24px;
            z-index: 0;
        }

        .sc-img {
            width: 100%;
            border-radius: 20px;
            position: relative;
            z-index: 1;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            display: block;
        }

        /* Validation Styles */
        .invalid-feedback {
            color: #e14c1e;
            font-size: 13px;
            margin-top: 5px;
            display: block;
            font-family: 'Inter', sans-serif;
        }
        .form-group input.is-invalid,
        .form-group select.is-invalid,
        .form-group textarea.is-invalid {
            border-color: #e14c1e;
            box-shadow: 0 0 0 3px rgba(225, 76, 30, 0.1);
            background: #fff;
        }
        .required-asterisk {
            color: #e14c1e;
            margin-left: 3px;
        }
        @media (max-width: 780px) {
             .story-classic-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 20px;
            align-items: center;
        }
        }

        .row-flex-mobile {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        @media (max-width: 600px) {
            .row-flex-mobile {
                flex-direction: column;
                gap: 0;
            }
            .row-flex-mobile > div {
                margin-bottom: 20px;
            }
            .row-flex-mobile > div:last-child {
                margin-bottom: 0;
            }
        }
</style>
@endpush

@section('content')
<!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <span class="page-label">Academics</span>
            <h1>{{ $pageBanner->title ?? 'Admissions' }}</h1>
            @if($pageBanner && $pageBanner->subtitle)
                <p style="font-size: 18px; opacity: 0.9; margin-top: -10px; color: white;">{{ $pageBanner->subtitle }}</p>
            @endif
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <a href="#">Academics</a><span>›</span>
                Admissions
            </nav>
        </div>
    </section>

    <!-- Intro Content (New Main Section Shape) -->
    <section class="story-classic">
        <div class="container">
            <div class="story-classic-grid">
                <div class="sc-content">
                    <div class="sc-eyebrow">Join Our Community</div>
                    <h2 class="sc-title">Your Child's <span>Future</span> Starts Here</h2>
                    <p class="sc-text lead">Application for admission shall be obtained on payment of tprescribed registration fee towards the cost of prospectus and Application form.</p>
                    <p class="sc-text lead">Pupils coming from other schools and states must produce the following documents.</p>
                    <p class="sc-text">Transfer the certificate duly signed by the principal/Head Master of the previous school attended, and counter signed by educational officer.</p>
                    <p class="sc-text">Mark sheet and conduct certificate from the institution last attended.</p>
                    <p class="sc-text">Birth certificate from the following (for KG children) extract from the Register of Birth or from a Magistrate's office (signed by magistrate) or municipal office. No other Birth certificates will be accepted.</p>
                    <p class="sc-text">Community certificate in the case of SC, ST, BC and MBC from Thasildar. No pupil will be admitted without the above documents</p>
                    <p class="sc-text">Once the candidate gets selected for the admission, she/he has to immediately pay the term fees.</p>
                    <p class="sc-text">Full tution fees should be paid for the term even if the child leaves before the end of the term.</p>
                </div>
                <div class="sc-visual">
                    <img src="{{ asset('assets/jmpsss/image/new/school22.jpg') }}" alt="Students" class="sc-img">
                </div>
            </div>
        </div>
    </section>

    <!-- Admissions Process Steps -->
    <section class="admissions-details section-padding bg-light" style="padding-top: 60px;">
        <div class="container">
            <div class="text-center mb-50">
                <span class="section-subtitle">The Journey</span>
                <h2 class="section-title">Admission Process 2026-27</h2>
            </div>

            <div class="grid-2 admissions-grid mt-50">
                <div class="admission-steps">

                    <h3 style="position: relative; bottom: 25px;">How to Apply</h3>
                    <div class="step-card">
                        <div class="step-num">1</div>
                        <div class="step-info">
                            <h4>Apply Online</h4>
                            <p>Fill out our comprehensive online registration form to begin the admission process.</p>
                        </div>
                    </div>
                    <div class="step-card">
                        <div class="step-num">2</div>
                        <div class="step-info">
                            <h4>Visit School Campus</h4>
                            <p>Take a tour of our state-of-the-art facilities and meet with our academic counselors.</p>
                        </div>
                    </div>
                    <div class="step-card">
                        <div class="step-num">3</div>
                        <div class="step-info">
                            <h4>Physical Form & Fees</h4>
                            <p>Submit the signed physical application form along with the required admission fees to
                                secure the seat.</p>
                        </div>
                    </div>
                </div> <!-- Close admission-steps -->

                <div class="admission-form-wrapper">
                    <div class="admission-form-card">
                        <h3>Admission Enquiry</h3>
                        <form method="POST" action="{{ route('admission.submit') }}">
                            @csrf
                            <div class="form-group">
                                <label style="display:none;">Student Name <span class="required-asterisk">*</span></label>
                                <input type="text" name="student_name" placeholder="Child's Name *" required>
                            </div>
                            <div class="form-group row-flex-mobile">
                                <div style="flex: 1; width: 100%;">
                                    <label style="display:none;">Date of Birth <span class="required-asterisk">*</span></label>
                                    <input type="text" name="dob" placeholder="Date of Birth (DD/MM/YYYY) *" 
                                        onfocus="(this.type='date')" 
                                        onblur="if(!this.value)this.type='text'"
                                        style="width: 100% !important; min-width: 100% !important;"
                                        required>
                                </div>
                                <div style="flex: 1; width: 100%;">
                                    <label style="display:none;">Grade Applying For <span class="required-asterisk">*</span></label>
                                    <select name="grade_applying" required style="width: 100% !important;">
                                        <option value="" disabled selected>Applying For *</option>
                                        <option value="kg">Kindergarten (KG)</option>
                                        <option value="primary">Primary (1-5)</option>
                                        <option value="middle">Middle (6-8)</option>
                                        <option value="secondary">Secondary (9-10)</option>
                                        <option value="senior">Senior Secondary (11-12)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label style="display:none;">Parent's/Guardian's Name <span class="required-asterisk">*</span></label>
                                <input type="text" name="parent_name" placeholder="Parent's/Guardian's Name *" required>
                            </div>
                            <div class="form-group">
                                <label style="display:none;">Email <span class="required-asterisk">*</span></label>
                                <input type="email" name="email" placeholder="Parent's Email Address *" required>
                            </div>
                            <div class="form-group grid-2" style="gap: 15px;">
                                <div>
                                    <label style="display:none;">Phone Number <span class="required-asterisk">*</span></label>
                                    <input type="tel" name="mobile" placeholder="Phone Number *" required>
                                </div>
                                <input type="tel" name="whatsapp" placeholder="WhatsApp Number">
                            </div>
                            <div class="form-group">
                                <textarea name="address" placeholder="Parent's Note / Full Address" rows="3"
                                    style="width: 100%; padding: 15px; border: 1px solid #e0e6ed; border-radius: 10px; font-family: inherit; font-size: 15px;"></textarea>
                            </div>
                            <button type="submit" class="btn-primary w-100">Apply Now <i class="fa-solid fa-paper-plane"
                                    style="margin-left: 8px;"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose JMPSSS -->
    <section class="why-choose-us section-padding">
        <div class="container">
            <div class="text-center mb-50">
                <span class="section-subtitle"
                    style="display: block; color: var(--secondary-color); font-weight: 600; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 10px;">Discover
                    the Difference</span>
                <h2 class="section-title" style="margin-bottom: 0;">Why Choose JMPSSS?</h2>
            </div>

            <div class="why-slider-wrapper">
                <button class="why-slider-btn prev"><i class="fa-solid fa-chevron-left"></i></button>
                <div class="why-slider">

                    <div class="why-slide-card text-center">
                        <div
                            style="width: 70px; height: 70px; margin: 0 auto 20px; font-size: 36px; color: var(--primary-color);">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <h3 style="font-size: 22px; margin-bottom: 10px; color: #333;">Academic Excellence</h3>
                        <p style="color: #666; font-size: 15px; line-height: 1.6;">A rigorous CBSE curriculum designed
                            to foster critical thinking, problem-solving, and a lifelong love of learning.</p>
                    </div>

                    <div class="why-slide-card text-center">
                        <div
                            style="width: 70px; height: 70px; margin: 0 auto 20px; font-size: 36px; color: var(--secondary-color);">
                            <i class="fa-solid fa-microscope"></i>
                        </div>
                        <h3 style="font-size: 22px; margin-bottom: 10px; color: #333;">Modern Facilities</h3>
                        <p style="color: #666; font-size: 15px; line-height: 1.6;">State-of-the-art science labs,
                            computer centers, and smartly equipped classrooms for interactive learning.</p>
                    </div>

                    <div class="why-slide-card text-center">
                        <div
                            style="width: 70px; height: 70px; margin: 0 auto 20px; font-size: 36px; color: var(--primary-color);">
                            <i class="fa-solid fa-palette"></i>
                        </div>
                        <h3 style="font-size: 22px; margin-bottom: 10px; color: #333;">Holistic Development</h3>
                        <p style="color: #666; font-size: 15px; line-height: 1.6;">Emphasis on sports, arts, and
                            extracurricular activities to nurture physical, mental, and emotional growth.</p>
                    </div>

                    <div class="why-slide-card text-center">
                        <div
                            style="width: 70px; height: 70px; margin: 0 auto 20px; font-size: 36px; color: var(--secondary-color);">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <h3 style="font-size: 22px; margin-bottom: 10px; color: #333;">Safe & Secure Campus</h3>
                        <p style="color: #666; font-size: 15px; line-height: 1.6;">24/7 CCTV surveillance and dedicated
                            security personnel ensuring complete safety for your child.</p>
                    </div>

                    <div class="why-slide-card text-center">
                        <div
                            style="width: 70px; height: 70px; margin: 0 auto 20px; font-size: 36px; color: var(--primary-color);">
                            <i class="fa-solid fa-bus"></i>
                        </div>
                        <h3 style="font-size: 22px; margin-bottom: 10px; color: #333;">Extensive Transport</h3>
                        <p style="color: #666; font-size: 15px; line-height: 1.6;">A well-maintained fleet of buses
                            covering 40+ routes with trained drivers and attendants.</p>
                    </div>

                </div>
                <button class="why-slider-btn next"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script>
        $(document).ready(function () {
            // Restrict input to alphabets only for Full Name
            $('input[name="student_name"], input[name="parent_name"]').on('input', function () {
                let value = $(this).val();
                value = value.replace(/[^a-zA-Z\s]/g, '');
                $(this).val(value);
            });

            // Restrict input to numbers only & max 10 digits for Mobile
            $('input[name="mobile"], input[name="whatsapp"]').on('input', function () {
                let value = $(this).val();
                value = value.replace(/[^0-9]/g, '');
                if (value.length > 10) {
                    value = value.slice(0, 10);
                }
                $(this).val(value);
            });

            // Add custom validation methods
            $.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
            }, "Please enter only alphabets.");

            $.validator.addMethod("exactlength", function(value, element, param) {
                return this.optional(element) || value.length == param;
            }, $.validator.format("Please enter exactly {0} characters."));

            // Initialize jQuery Validation
            $('form[action="{{ route('admission.submit') }}"]').validate({
                rules: {
                    student_name: { required: true, lettersonly: true, minlength: 2 },
                    dob: { required: true },
                    grade_applying: { required: true },
                    parent_name: { required: true, lettersonly: true, minlength: 2 },
                    email: { required: true, email: true },
                    mobile: { required: true, digits: true, minlength: 10, maxlength: 10 },
                    whatsapp: { digits: true, minlength: 10, maxlength: 10 }
                },
                messages: {
                    student_name: { required: "Please enter child's name", minlength: "Name must be at least 2 characters" },
                    dob: { required: "Please enter date of birth" },
                    grade_applying: { required: "Please select a grade" },
                    parent_name: { required: "Please enter parent's name", minlength: "Name must be at least 2 characters" },
                    email: { required: "Please enter a valid email address" },
                    mobile: { 
                        required: "Please enter a phone number", 
                        digits: "Please enter only numbers", 
                        minlength: "Mobile Number must be exactly 10 digits",
                        maxlength: "Mobile Number must be exactly 10 digits"
                    },
                    whatsapp: {
                        digits: "Please enter only numbers",
                        minlength: "WhatsApp Number must be exactly 10 digits",
                        maxlength: "WhatsApp Number must be exactly 10 digits"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    if(element.parent('div').length) {
                        element.parent('div').append(error);
                    } else {
                        element.closest('.form-group').append(error);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            // Why Choose Us Slider Javascript
            const whySlider = document.querySelector('.why-slider');
            const whyPrevBtn = document.querySelector('.why-slider-btn.prev');
            const whyNextBtn = document.querySelector('.why-slider-btn.next');

            if (whySlider && whyPrevBtn && whyNextBtn) {
                const getScrollAmount = () => {
                    const card = whySlider.querySelector('.why-slide-card');
                    return card ? card.offsetWidth + 30 : 300; // 30 is the gap
                };

                whyNextBtn.addEventListener('click', () => {
                    whySlider.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
                });

                whyPrevBtn.addEventListener('click', () => {
                    whySlider.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
                });
            }
        });
    </script>
@endpush
