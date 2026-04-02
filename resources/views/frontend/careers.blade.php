@extends('layouts.app')
@section('title', 'Careers | JMPSSS | Jaypee Model Senior Secondary School')

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
            background: rgba(0, 72, 0, 0.55);
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

        @media (max-width: 600px) {
            .page-hero {
                height: 280px;
            }

            .page-hero-content h1 {
                font-size: 34px;
            }
        }

        /* ── Careers Main Section ── */
        .careers-intro-section {
            padding: 80px 0 50px;
            background: #fdfaf5;
        }

        .careers-intro-section .intro-text {
            max-width: 720px;
            margin: 0 auto;
            text-align: center;
            color: #555;
            font-size: 16px;
            line-height: 1.85;
        }

        /* ── Why Join Us Strip ── */
        .why-join-strip {
            padding: 60px 0;
            background: #fff;
        }

        .why-join-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 28px;
            margin-top: 50px;
        }

        .why-card {
            background: #f8faf8;
            border-radius: 18px;
            padding: 36px 28px;
            text-align: center;
            border: 1px solid #eee;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .why-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(0, 72, 0, 0.1);
        }

        .why-card-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #004800, #006600);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 24px;
            color: #fff;
        }

        .why-card h3 {
            font-size: 17px;
            font-weight: 700;
            color: #004800;
            margin-bottom: 10px;
            font-family: 'Outfit', sans-serif;
        }

        .why-card p {
            font-size: 13px;
            color: #777;
            line-height: 1.6;
            margin: 0;
        }

        @media (max-width: 991px) {
            .why-join-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 580px) {
            .why-join-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ── Application Form Section ── */
        .apply-section {
            padding: 80px 0 100px;
            background: #f7faf7;
        }

        .application-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.35fr;
            gap: 60px;
            align-items: start;
        }

        .apply-info h2 {
            font-size: 36px;
            font-weight: 700;
            color: #004800;
            font-family: 'Outfit', sans-serif;
            margin-bottom: 18px;
            line-height: 1.3;
        }

        .apply-info p {
            color: #666;
            font-size: 15px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .contact-info-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-bottom: 30px;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 15px;
            color: #444;
            font-weight: 500;
        }

        .contact-info-item i {
            width: 40px;
            height: 40px;
            background: #004800;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .apply-decor-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        /* ── Form Card ── */
        .apply-form-card {
            background: #fff;
            border-radius: 24px;
            padding: 48px 44px;
            box-shadow: 0 16px 50px rgba(0, 0, 0, 0.06);
            border: 1px solid #eee;
        }

        .apply-form-card h3 {
            font-size: 24px;
            font-weight: 700;
            color: #004800;
            font-family: 'Outfit', sans-serif;
            margin-bottom: 28px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-field {
            margin-bottom: 20px;
        }

        .form-field label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-field input,
        .form-field select,
        .form-field textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', sans-serif;
            color: #333;
            background: #fafafa;
            transition: border-color 0.3s, box-shadow 0.3s;
            outline: none;
            box-sizing: border-box;
        }

        .form-field input:focus,
        .form-field select:focus,
        .form-field textarea:focus {
            border-color: #004800;
            box-shadow: 0 0 0 3px rgba(0, 72, 0, 0.08);
            background: #fff;
        }

        .file-upload-wrapper {
            position: relative;
            width: 100%;
        }

        .file-upload-wrapper input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 2;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            gap: 15px;
            background: #fafafa;
            border: 1.5px solid #e0e0e0;
            border-radius: 12px;
            padding: 8px 10px;
            transition: all 0.3s;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
        }

        .file-upload-wrapper:hover .file-upload-label {
            border-color: #004800;
            background: #fff;
        }

        .file-upload-btn {
            background: #004800;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            flex-shrink: 0;
        }

        .file-upload-wrapper:hover .file-upload-btn {
            background: #e14c1e;
        }

        .file-name {
            font-size: 14px;
            color: #666;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
        }

        .file-upload-wrapper input.is-invalid + .file-upload-label {
            border-color: #e14c1e;
            background: rgba(225, 76, 30, 0.02);
        }

        .form-field select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%23004800' d='M1 1l5 5 5-5'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 36px;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #004800, #006600);
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-family: 'Outfit', sans-serif;
            letter-spacing: 0.5px;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-top: 8px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 72, 0, 0.25);
        }

        /* Validation Styles */
        .invalid-feedback {
            color: #e14c1e;
            font-size: 13px;
            margin-top: 5px;
            display: block;
            font-family: 'Inter', sans-serif;
        }
        .form-field input.is-invalid,
        .form-field select.is-invalid,
        .form-field textarea.is-invalid {
            border-color: #e14c1e;
            box-shadow: 0 0 0 3px rgba(225, 76, 30, 0.1);
            background: #fff;
        }
        .required-asterisk {
            color: #e14c1e;
            margin-left: 3px;
        }

        @media (max-width: 900px) {
            .application-wrapper {
                grid-template-columns: 1fr;
            }

            .apply-form-card {
                padding: 36px 28px;
            }
        }

        @media (max-width: 580px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <span class="page-label">Opportunities</span>
            <h1>{{ $pageBanner->title ?? 'Careers at JMPSSS' }}</h1>
            @if($pageBanner && $pageBanner->subtitle)
                <p style="font-size: 18px; opacity: 0.9; margin-top: -10px;">{{ $pageBanner->subtitle }}</p>
            @endif
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <span class="active">Careers</span>
            </nav>
        </div>
    </section>

    <!-- ── Intro Section ── -->
    <section class="careers-intro-section">
        <div class="container">
            <div class="text-center">
                <span class="section-subtitle">Join Our Team</span>
                <h2 class="section-title">Join Our Academic Family</h2>
            </div>
            <p class="intro-text" style="margin-top: 24px;">
                We are looking for passionate, talented, and dedicated educators to join our team. At JMPSSS, we believe
                teachers are the cornerstones of our students' success. If you are committed to shaping young minds and
                fostering excellence in education, we invite you to explore our open positions.
            </p>
        </div>
    </section>

    <!-- ── Why Join Us ── -->
    <section class="why-join-strip">
        <div class="container">
            <div class="text-center">
                <span class="section-subtitle">Our Culture</span>
                <h2 class="section-title">Why Work With Us</h2>
            </div>
            <div class="why-join-grid">
                <div class="why-card">
                    <div class="why-card-icon"><i class="fa-solid fa-heart"></i></div>
                    <h3>Passionate Community</h3>
                    <p>Work alongside educators who are deeply committed to student success and holistic growth.</p>
                </div>
                <div class="why-card">
                    <div class="why-card-icon"><i class="fa-solid fa-chart-line"></i></div>
                    <h3>Career Growth</h3>
                    <p>Regular training, workshops and opportunities to advance your professional journey.</p>
                </div>
                <div class="why-card">
                    <div class="why-card-icon"><i class="fa-solid fa-leaf"></i></div>
                    <h3>Green Campus</h3>
                    <p>Enjoy a beautiful, lush campus environment that inspires creativity and well-being.</p>
                </div>
                <div class="why-card">
                    <div class="why-card-icon"><i class="fa-solid fa-shield-halved"></i></div>
                    <h3>Stable & Rewarding</h3>
                    <p>Competitive compensation, job security, and a supportive institutional framework.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Application Form ── -->
    <section class="apply-section" id="apply">
        <div class="container">
            <div class="text-center" style="margin-bottom: 60px;">
                <span class="section-subtitle">Recruitment</span>
                <h2 class="section-title">Apply Today</h2>
            </div>
            <div class="application-wrapper">
                <!-- Left Info -->
                <div class="apply-info">
                    <h2>Ready to Make<br>a Difference?</h2>
                    <p>Fill out the form and upload your CV. Our recruitment team will carefully review your application
                        and reach out to you shortly to discuss the next steps.</p>

                    <div class="contact-info-list">
                        <div class="contact-info-item">
                            <i class="fa-solid fa-phone"></i>
                            <span>+91-7373418852</span>
                        </div>
                        <div class="contact-info-item">
                            <i class="fa-solid fa-phone"></i>
                            <span>+91-8939222122</span>
                        </div>
                        <div class="contact-info-item">
                            <i class="fa-solid fa-envelope"></i>
                            <span>jeevamemorialschool@gmail.com</span>
                        </div>
                        <div class="contact-info-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>No.210, Palla Egai Village, Puliur Post, Thirukazhukundram T.K.
                                Kancheepuram Dist. Pin-603 109.</span>
                        </div>
                    </div>

                    <img src="{{ asset('assets/jmpsss/image/new/school22.jpg') }}" alt="School Campus"
                        class="apply-decor-img">
                </div>

                <!-- Right Form -->
                <div class="apply-form-card">
                    <h3><i class="fa-solid fa-paper-plane" style="color:#e14c1e; margin-right:10px;"></i>Submit Your
                        Application</h3>
                    <form id="careerForm" method="POST" action="{{ route('career.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-field">
                                <label>Full Name <span class="required-asterisk">*</span></label>
                                <input type="text" name="name" placeholder="Your name" required>
                            </div>
                            <div class="form-field">
                                <label>Mobile Number <span class="required-asterisk">*</span></label>
                                <input type="tel" name="mobile" placeholder="+91 XXXXX XXXXX" required>
                            </div>
                        </div>

                        <div class="form-field">
                            <label>Email Address <span class="required-asterisk">*</span></label>
                            <input type="email" name="email" placeholder="example@gmail.com" required>
                        </div>

                        <div class="form-row">
                            <div class="form-field">
                                <label>Applying For <span class="required-asterisk">*</span></label>
                                <select name="position_applied" required>
                                    <option value="">Select Role</option>
                                    <option value="english">English Teacher</option>
                                    <option value="maths">Mathematics Teacher</option>
                                    <option value="science">Science Teacher</option>
                                    <option value="tamil">Tamil Teacher</option>
                                    <option value="social">Social Studies Teacher</option>
                                    <option value="sports">Physical Education</option>
                                    <option value="other">Other Position</option>
                                </select>
                            </div>
                            <div class="form-field">
                                <label>Experience (Years)</label>
                                <input type="number" name="experience" placeholder="e.g. 3" min="0" max="50">
                            </div>
                        </div>

                        <div class="form-field">
                            <label>Upload CV (PDF / DOC) (Max 2MB) <span class="required-asterisk">*</span></label>
                            <div class="file-upload-wrapper">
                                <input type="file" name="resume" id="resume" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
                                <div class="file-upload-label">
                                    <span class="file-upload-btn"><i class="fa-solid fa-cloud-arrow-up"></i> Choose File</span>
                                    <span class="file-name" id="fileNameDisplay">No file chosen</span>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="submit-btn" id="careerSubmitBtn">
                            <i class="fa-solid fa-paper-plane" style="margin-right:8px;"></i>Submit Application
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script>
        $(document).ready(function () {
            // Restrict input to alphabets only for Full Name
            $('input[name="name"]').on('input', function () {
                let value = $(this).val();
                value = value.replace(/[^a-zA-Z\s]/g, '');
                $(this).val(value);
            });

            // Restrict input to numbers only & max 10 digits for Mobile
            $('input[name="mobile"]').on('input', function () {
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

            $.validator.addMethod("filesize", function (value, element, param) {
                return this.optional(element) || (element.files[0].size <= param);
            }, "File size must be less than {0}");

            // Initialize jQuery Validation
            $('#careerForm').validate({
                rules: {
                    name: {
                        required: true,
                        lettersonly: true,
                        minlength: 2
                    },
                    mobile: {
                        required: true,
                        digits: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    position_applied: {
                        required: true
                    },
                    resume: {
                        required: true,
                        extension: "pdf|doc|docx",
                        filesize: 2097152 // 2MB
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your full name",
                        minlength: "Name must be at least 2 characters"
                    },
                    mobile: {
                        required: "Please enter your mobile number",
                        digits: "Please enter only numbers",
                        minlength: "Mobile Number must be exactly 10 digits",
                        maxlength: "Mobile Number must be exactly 10 digits"
                    },
                    email: {
                        required: "Please enter a valid email address",
                        email: "Please enter a valid email format"
                    },
                    position_applied: {
                        required: "Please select the position you are applying for"
                    },
                    resume: {
                        required: "Please upload your CV",
                        extension: "Only PDF, DOC, or DOCX files are allowed",
                        filesize: "File Size Should be less than 2MB"
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-field').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });

            // Update file name display
            $('#resume').on('change', function() {
                const fileName = this.files[0] ? this.files[0].name : 'No file chosen';
                $('#fileNameDisplay').text(fileName);
                
                // Trigger validation on change
                $(this).valid();
            });
        });
    </script>
@endpush
