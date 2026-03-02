@extends('layouts.app')
@section('title', 'CBSE Mandatory Disclosure – JMPSS')

@section('content')
    <!-- Page Header -->
    <section class="page-header reveal reveal-scale" data-reveal-once>
        <div class="container">
            <h1>Mandatory Public Disclosure</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>CBSE Disclosure</li>
            </ul>
        </div>
    </section>

    <!-- Info Section -->
    <section class="content-section">
        <div class="container">
            <div class="section-title reveal" data-reveal-once>
                <h2>Statutory Information</h2>
                <div class="divider-center"></div>
            </div>

            <div class="grid"
                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                <!-- Table A: Documents and Information -->
                <div class="info-card reveal reveal-left" data-reveal-once>
                    <h3 style="color:var(--primary); margin-bottom: 20px; font-size: 22px;">A: Documents and Information
                    </h3>
                    <ul class="footer-links" style="color:var(--text); padding-left: 0;">
                        <li
                            style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px; display: flex; justify-content: space-between;">
                            <span>Affiliation Certificate</span>
                            <a href="#" style="color:var(--accent); font-weight: 600;">VIEW PDF</a>
                        </li>
                        <li
                            style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px; display: flex; justify-content: space-between;">
                            <span>Recognition Certificate</span>
                            <a href="#" style="color:var(--accent); font-weight: 600;">VIEW PDF</a>
                        </li>
                        <li
                            style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px; display: flex; justify-content: space-between;">
                            <span>Land Certificate</span>
                            <a href="#" style="color:var(--accent); font-weight: 600;">VIEW PDF</a>
                        </li>
                        <li
                            style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px; display: flex; justify-content: space-between;">
                            <span>Fire Safety Certificate</span>
                            <a href="#" style="color:var(--accent); font-weight: 600;">VIEW PDF</a>
                        </li>
                    </ul>
                </div>

                <!-- Table B: Result and Academics -->
                <div class="info-card reveal reveal-right" data-reveal-once>
                    <h3 style="color:var(--primary); margin-bottom: 20px; font-size: 22px;">B: Result and Academics</h3>
                    <ul class="footer-links" style="color:var(--text); padding-left: 0;">
                        <li
                            style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px; display: flex; justify-content: space-between;">
                            <span>Fee Structure</span>
                            <a href="#" style="color:var(--accent); font-weight: 600;">VIEW PDF</a>
                        </li>
                        <li
                            style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px; display: flex; justify-content: space-between;">
                            <span>Academic Calendar</span>
                            <a href="#" style="color:var(--accent); font-weight: 600;">VIEW PDF</a>
                        </li>
                        <li
                            style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px; display: flex; justify-content: space-between;">
                            <span>Last 3 Year Result</span>
                            <a href="#" style="color:var(--accent); font-weight: 600;">VIEW PDF</a>
                        </li>
                        <li
                            style="margin-bottom: 15px; border-bottom: 1px solid var(--border); padding-bottom: 10px; display: flex; justify-content: space-between;">
                            <span>Parent Teacher Association</span>
                            <a href="#" style="color:var(--accent); font-weight: 600;">VIEW PDF</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Table C: Infrastructure -->
            <div class="info-card reveal reveal-scale" data-reveal-once style="margin-top: 40px;">
                <h3 style="color:var(--primary); margin-bottom: 25px; font-size: 22px;">C: Infrastructure Details</h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                    <div>
                        <small
                            style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">Campus
                            Area</small>
                        <p style="font-size: 18px; color: var(--text); font-weight: 500;">4.5 Acres (18,210 sq.mt)</p>
                    </div>
                    <div>
                        <small
                            style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">Classrooms</small>
                        <p style="font-size: 18px; color: var(--text); font-weight: 500;">42 (500 sq.ft each)</p>
                    </div>
                    <div>
                        <small
                            style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">Laboratories</small>
                        <p style="font-size: 18px; color: var(--text); font-weight: 500;">6 (Physics, Chem, Bio, CS, Math,
                            Composite)</p>
                    </div>
                    <div>
                        <small
                            style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">Library</small>
                        <p style="font-size: 18px; color: var(--text); font-weight: 500;">1 (1,200 sq.ft, 10,000+ Books)</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
