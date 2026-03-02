@extends('layouts.app')
@section('title', 'Admissions Policy – JMPSS')

@section('content')
    <!-- Page Header -->
    <section class="page-header reveal reveal-scale" data-reveal-once>
        <div class="container">
            <h1>Scholar Admissions</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Admissions</li>
            </ul>
        </div>
    </section>

    <!-- Admission Process -->
    <section class="content-section">
        <div class="container">
            <div class="about-grid">
                <div class="about-content reveal reveal-left" data-reveal-once>
                    <small
                        style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 2px;">Enrollment
                        2026-27</small>
                    <h2 style="margin-top: 10px;">Entry into a <br>Heritage of Excellence</h2>
                    <p>We welcome students who demonstrate a commitment to academic rigor and strong ethical values. Our
                        admission process is designed to identify inquisitive minds that will thrive in our structured
                        scholarly environment.</p>

                    <div style="margin-top: 40px;">
                        <h3 style="color: var(--primary); margin-bottom: 20px;">The Admission Journey</h3>
                        <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                            <div
                                style="width: 40px; height: 40px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-weight: 700;">
                                1</div>
                            <div>
                                <h4 style="margin-bottom: 5px; color: var(--text);">Expression of Interest</h4>
                                <p style="font-size: 14px; margin-bottom: 0;">Submit the online enquiry form or visit the
                                    school office for a prospectus and application kit.</p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                            <div
                                style="width: 40px; height: 40px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-weight: 700;">
                                2</div>
                            <div>
                                <h4 style="margin-bottom: 5px; color: var(--text);">Interaction & Assessment</h4>
                                <p style="font-size: 14px; margin-bottom: 0;">A scholarly interaction with the student and
                                    parents to understand academic baseline and alignment with school values.</p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 20px;">
                            <div
                                style="width: 40px; height: 40px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-weight: 700;">
                                3</div>
                            <div>
                                <h4 style="margin-bottom: 5px; color: var(--text);">Formal Enrollment</h4>
                                <p style="font-size: 14px; margin-bottom: 0;">Finalization of required documentation and
                                    structured fee submission upon confirmation of entry.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-visuals reveal reveal-right" data-reveal-once>
                    <div class="info-card" style="padding: 50px;">
                        <h3 style="margin-top: 0; text-align: center; margin-bottom: 30px;">Required Documents</h3>
                        <ul class="footer-links" style="color: var(--text); padding-left: 0;">
                            <li style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px;">
                                <i class="fas fa-file-alt" style="color:var(--accent); margin-right: 12px;"></i> Birth
                                Certificate (Original)</li>
                            <li style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px;">
                                <i class="fas fa-file-invoice" style="color:var(--accent); margin-right: 12px;"></i>
                                Transfer Certificate from previous school</li>
                            <li style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px;">
                                <i class="fas fa-id-card" style="color:var(--accent); margin-right: 12px;"></i> Aadhar Card
                                of Student & Parents</li>
                            <li style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px;">
                                <i class="fas fa-image" style="color:var(--accent); margin-right: 12px;"></i> 4 Recent
                                Passport Size Photographs</li>
                            <li style="margin-bottom: 0; padding-bottom: 0;"><i class="fas fa-clipboard-check"
                                    style="color:var(--accent); margin-right: 12px;"></i> Previous Academic Transcripts</li>
                        </ul>
                        <div style="margin-top: 40px; text-align: center;">
                            <a href="#" class="btn-outline-accent" style="width: 100%; text-align: center;">Download
                                Application Form</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
