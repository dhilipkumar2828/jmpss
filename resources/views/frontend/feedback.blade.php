@extends('layouts.app')
@section('title', 'Feedback | Jeeva Memorial Senior Secondary School')
@section('hide_nav', '1')

@push('styles')
    <style>
        .feedback-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 90vh;
            display: flex;
            align-items: center;
            padding: 60px 0;
        }

        .premium-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(225, 76, 30, 0.1);
            border-radius: 30px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            margin: 0 auto;
            max-width: 700px;
        }

        .premium-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.12);
        }

        .card-header-prime {
            background: var(--logo-green-900);
            padding: 35px;
            text-align: center;
            color: white;
            position: relative;
        }

        .card-header-prime h2 {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            margin: 0;
            font-size: 2.2rem;
            letter-spacing: -0.5px;
        }

        .card-header-prime p {
            opacity: 0.85;
            margin-top: 8px;
            font-weight: 300;
            margin-bottom: 0;
            font-size: 1.1rem;
        }

        .card-body-prime {
            padding: 45px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group-prime {
            margin-bottom: 25px;
            position: relative;
        }

        .full-width {
            grid-column: span 2;
        }

        .form-group-prime label {
            display: block;
            font-weight: 600;
            color: var(--logo-green-900);
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            transition: color 0.3s ease;
            font-size: 1rem;
        }

        .form-control-prime {
            width: 100%;
            padding: 14px 15px 14px 50px;
            border: 2.5px solid #f0f0f0 !important;
            border-radius: 14px !important;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fff !important;
            height: auto !important;
        }

        .form-control-prime:focus {
            border-color: var(--logo-orange) !important;
            outline: none;
            box-shadow: 0 0 0 5px rgba(225, 76, 30, 0.1) !important;
        }

        .form-control-prime:focus+i {
            color: var(--logo-orange);
        }

        /* Star Rating Styling */
        .rating-container {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
            gap: 5px;
            margin-top: 5px;
        }

        .rating-container input {
            display: none;
        }

        .rating-container label {
            cursor: pointer;
            width: 35px;
            height: 35px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23ccc'%3E%3Cpath d='M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            transition: all 0.2s ease;
            margin-bottom: 0;
        }

        .rating-container input:checked~label,
        .rating-container label:hover,
        .rating-container label:hover~label {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23e14c1e'%3E%3Cpath d='M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z'/%3E%3C/svg%3E");
            transform: scale(1.1);
        }

        .textarea-prime {
            padding-left: 15px !important;
            resize: none;
        }

        .btn-prime {
            background: var(--logo-orange);
            color: white;
            border: none;
            padding: 18px 30px;
            border-radius: 15px;
            font-weight: 700;
            width: 100%;
            font-family: 'Outfit', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin-top: 10px;
            font-size: 1.1rem;
        }

        .btn-prime:hover {
            background: var(--logo-green-900);
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 40, 0, 0.25);
            color: white;
        }

        @media (max-width: 991px) {
            .premium-card {
                max-width: 90%;
            }
            .card-body-prime {
                padding: 30px;
            }
            .card-header-prime h2 {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 768px) {
            .feedback-section {
                padding: 30px 15px;
            }
            .form-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            .premium-card {
                border-radius: 20px;
                max-width: 100%;
            }
            .card-header-prime {
                padding: 25px 20px;
            }
            .card-body-prime {
                padding: 25px 20px;
            }
            .btn-prime {
                padding: 15px;
                font-size: 1rem;
            }
            .rating-container label {
                width: 30px;
                height: 30px;
            }
        }

        /* Error Text Styling */
        .text-danger {
            color: #ef4444 !important;
            font-weight: 500;
        }

        /* Invalid Input Styling */
        .form-control-prime.is-invalid {
            border-color: #ef4444 !important;
            background-color: #fffafb !important;
        }

        /* Valid Input Styling (Optional) */
        .form-control-prime.is-valid {
            border-color: #10b981 !important;
        }
    </style>
@endpush

@section('content')
    <section class="feedback-section">
        <div class="container">
            <div class="premium-card">
                <div class="card-header-prime">
                    <h2>Feedback Portal</h2>
                    <p>Help us elevate our educational excellence.</p>
                </div>
                <div class="card-body-prime">
                    <form id="feedbackForm" action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-grid">
                            <!-- Name Field -->
                            <div class="form-group-prime">
                                <label for="name">Full Name <span style="color:red">*</span></label>
                                <div class="input-wrapper">
                                    <input type="text" class="form-control-prime" id="name" name="name"
                                        placeholder="Enter the name" value="{{ old('name') }}" 
                                        oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')" required>
                                    <i class="fa-solid fa-user-graduate"></i>
                                </div>
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="form-group-prime">
                                <label for="email">Email Address <span style="color:red">*</span></label>
                                <div class="input-wrapper">
                                    <input type="email" class="form-control-prime" id="email" name="email"
                                        placeholder="Enter the Email id" value="{{ old('email') }}" required>
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                </div>
                                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Mobile Field -->
                            <div class="form-group-prime">
                                <label for="mobile">Mobile Number <span style="color:red">*</span></label>
                                <div class="input-wrapper">
                                    <input type="tel" class="form-control-prime" id="mobile" name="mobile"
                                        placeholder="Enter mobile Number" value="{{ old('mobile') }}" 
                                        maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required>
                                    <i class="fa-solid fa-phone-volume"></i>
                                </div>
                                @error('mobile') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Profile Field - NOT MANDATORY -->
                            <div class="form-group-prime">
                                <label for="profile_photo">Profile Photo <span style="color:#777; font-weight:400; font-size:0.8rem">(Optional)</span></label>
                                <div class="input-wrapper">
                                    <input type="file" class="form-control-prime" id="profile_photo" name="profile_photo"
                                        accept="image/*" style="padding-left: 50px; padding-top: 10px;">
                                    <i class="fa-solid fa-camera-retro"></i>
                                </div>
                                @error('profile_photo') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Rating Field -->
                            <div class="form-group-prime">
                                <label>Overall Experience Rating <span style="color:red">*</span></label>
                                <div class="rating-container" style="justify-content: flex-end; flex-direction: row-reverse; margin-left: -5px;">
                                    <input type="radio" id="star5" name="rating" value="5" {{ old('rating') == 5 ? 'checked' : '' }} required/><label for="star5"
                                        title="5 stars"></label>
                                    <input type="radio" id="star4" name="rating" value="4" {{ old('rating') == 4 ? 'checked' : '' }} /><label for="star4"
                                        title="4 stars"></label>
                                    <input type="radio" id="star3" name="rating" value="3" {{ old('rating') == 3 ? 'checked' : '' }} /><label for="star3"
                                        title="3 stars"></label>
                                    <input type="radio" id="star2" name="rating" value="2" {{ old('rating') == 2 ? 'checked' : '' }} /><label for="star2"
                                        title="2 stars"></label>
                                    <input type="radio" id="star1" name="rating" value="1" {{ old('rating') == 1 ? 'checked' : '' }} /><label for="star1"
                                        title="1 star"></label>
                                </div>
                                @error('rating') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Message Field -->
                            <div class="form-group-prime full-width">
                                <label for="feedback">Detailed Message <span style="color:red">*</span></label>
                                <textarea class="form-control-prime textarea-prime" id="feedback" name="feedback" rows="4"
                                    placeholder="Enter your message..." minlength="20" required>{{ old('feedback') }}</textarea>
                                @error('feedback') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn-prime">
                            <span>Send Feedback</span>
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#feedbackForm").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                    pattern: /^[A-Za-z\s]+$/
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
                rating: {
                    required: true
                },
                feedback: {
                    required: true,
                    minlength: 20
                },
                profile_photo: {
                    extension: "jpg|jpeg|png|gif|webp",
                    filesize: 2097152 // 2MB
                }
            },
            messages: {
                name: {
                    required: "Please enter your full name",
                    pattern: "Name can only contain letters and spaces"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                mobile: {
                    required: "Please enter your mobile number",
                    digits: "Please enter only numbers",
                    minlength: "Mobile number must be 10 digits",
                    maxlength: "Mobile number must be 10 digits"
                },
                rating: {
                    required: "Please select a rating"
                },
                feedback: {
                    required: "Please enter your feedback message",
                    minlength: "Your feedback must be at least 20 characters"
                },
                profile_photo: {
                    extension: "Only image files (JPG, PNG, GIF, WEBP) are allowed",
                    filesize: "File size must be less than 2MB"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('text-danger small d-block mt-1');
                if (element.attr("name") == "rating") {
                    error.appendTo(element.closest(".form-group-prime"));
                } else if (element.parent('.input-wrapper').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element) {
                $(element).removeClass('is-invalid');
            }
        });

        // Custom methods
        $.validator.addMethod("pattern", function(value, element, param) {
            return this.optional(element) || param.test(value);
        }, "Invalid format.");

        $.validator.addMethod("extension", function(value, element, param) {
            param = typeof param === "string" ? param.replace(/,/g, "|") : "png|jpe?g|gif";
            return this.optional(element) || value.match(new RegExp("\\.(" + param + ")$", "i"));
        }, "Please enter a value with a valid extension.");

        $.validator.addMethod('filesize', function (value, element, param) {
            return this.optional(element) || (element.files[0].size <= param)
        }, 'File size must be less than {0}');
    });
</script>
@endpush