@extends('layouts.admin')

@section('title', 'Add Student')
@section('page-title', 'New Student Registration')

@push('styles')
<style>
    .error { color: #ef4444; font-size: 13px!important; margin-top: 5px; font-weight: 500; display: block; }
    input.error, select.error, textarea.error { border-color: #ef4444 !important; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.students.store') }}" method="POST" id="student-form">
            @csrf
            
            <h4 style="margin-bottom: 20px; color: var(--primary);">Student & Class</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Child Name</label>
                        <input type="text" name="child_name" id="child_name" class="form-control" placeholder="Full name of student">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Standard</label>
                        <select name="standard" id="standard-select" class="form-control" required>
                            <option value="">Choose Standard...</option>
                            @foreach($standards as $std)
                                <option value="{{ $std }}">{{ $std }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Section</label>
                        <select name="category_id" id="section-select" class="form-control" required disabled>
                            <option value="">Choose Standard First...</option>
                        </select>
                    </div>
                </div>
            </div>

            <h4 style="margin-top: 30px; margin-bottom: 20px; color: var(--primary);">Parent Details</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Father / Guardian Name</label>
                        <input type="text" name="father_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Father Mobile Number</label>
                        <input type="text" name="father_mobile" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mother Name</label>
                        <input type="text" name="mother_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mother Mobile Number</label>
                        <input type="text" name="mother_mobile" class="form-control">
                    </div>
                </div>
            </div>

            <h4 style="margin-top: 30px; margin-bottom: 20px; color: var(--primary);">Contact & Address</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="parent@email.com">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>WhatsApp Number</label>
                        <input type="text" name="whatsapp_number" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group" style="margin-top: 15px;">
                <label>Residential Address</label>
                <textarea name="address" rows="3" class="form-control" placeholder="Flat No, Street, Area, City..."></textarea>
            </div>

            <div class="form-actions mt-4" style="text-align: right;">
                <a href="{{ route('admin.students.index') }}" class="btn btn-secondary" style="padding: 10px 25px;">Back</a>
                <button type="submit" class="btn btn-primary" style="padding: 10px 40px; border-radius: 30px;">Save Record</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script>
    $(document).ready(function() {
        // Dependent Dropdown for Sections
        $('#standard-select').on('change', function() {
            let standard = $(this).val();
            let sectionSelect = $('#section-select');
            
            sectionSelect.empty().append('<option value="">Loading...</option>');
            
            if(standard) {
                $.ajax({
                    url: '/admin/get-sections/' + standard,
                    type: 'GET',
                    success: function(data) {
                        sectionSelect.empty().append('<option value="">Choose Section...</option>');
                        data.forEach(item => {
                            sectionSelect.append(`<option value="${item.id}">${item.section}</option>`);
                        });
                        sectionSelect.prop('disabled', false);
                    }
                });
            } else {
                sectionSelect.empty().append('<option value="">Choose Standard First...</option>').prop('disabled', true);
            }
        });

        // Custom method for alphabets only
        $.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
        }, "Please enter letters only");

        $("#student-form").validate({
            rules: {
                child_name: {
                    required: true,
                    lettersonly: true,
                    minlength: 3
                },
                standard: {
                    required: true
                },
                category_id: {
                    required: true
                },
                father_name: {
                    required: true,
                    lettersonly: true
                },
                father_mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                mother_name: {
                    required: true,
                    lettersonly: true
                },
                mother_mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                email: {
                    email: true
                },
                whatsapp_number: {
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                }
            },
            messages: {
                child_name: {
                    required: "Please enter child name",
                    lettersonly: "Child name should contain only letters"
                },
                category_id: {
                    required: "Please select a section"
                },
                father_mobile: {
                    minlength: "10 digits required",
                    maxlength: "10 digits required",
                    digits: "Numbers only"
                },
                mother_mobile: {
                    minlength: "10 digits required",
                    maxlength: "10 digits required",
                    digits: "Numbers only"
                }
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                error.addClass('error');
                element.closest('.form-group').append(error);
            },
            highlight: function(element) {
                $(element).addClass('error');
            },
            unhighlight: function(element) {
                $(element).removeClass('error');
            }
        });
    });
</script>
@endpush
