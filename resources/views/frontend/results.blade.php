@extends('layouts.app')
@section('title', 'Academic Performance – JMPSS')

@section('content')
    <!-- Page Header -->
    <section class="page-header reveal reveal-scale" data-reveal-once>
        <div class="container">
            <h1>Scholarly Results</h1>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Results</li>
            </ul>
        </div>
    </section>

    <!-- Results Overview -->
    <section class="content-section">
        <div class="container">
            <div class="section-title reveal" data-reveal-once>
                <h2>A Legacy of Academic Distinction</h2>
                <div class="divider-center"></div>
            </div>

            <div class="grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 80px; margin-top: 60px;">
                <!-- Class X -->
                <div class="info-card reveal reveal-left" data-reveal-once>
                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 30px;">
                        <h3 style="margin-top: 0; color: var(--primary);">Class X Results 2024</h3>
                        <span
                            style="background: var(--primary); color: white; padding: 5px 15px; border-radius: 20px; font-size: 13px; font-weight: 700;">100%
                            PASS</span>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                        <div>
                            <small
                                style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">Distinctions</small>
                            <p style="font-size: 24px; color: var(--text); font-weight: 700; margin-bottom: 0;">82% Students
                            </p>
                        </div>
                        <div>
                            <small
                                style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">Highest
                                Score</small>
                            <p style="font-size: 24px; color: var(--text); font-weight: 700; margin-bottom: 0;">496 / 500
                            </p>
                        </div>
                    </div>
                    <div style="margin-top: 30px; border-top: 1px solid var(--border); padding-top: 20px;">
                        <ul class="footer-links" style="color: var(--text-muted); padding-left: 0;">
                            <li style="margin-bottom: 10px;"><i class="fas fa-award"
                                    style="color:var(--accent); margin-right: 12px;"></i> School Average: 425/500</li>
                            <li style="margin-bottom: 0;"><i class="fas fa-star"
                                    style="color:var(--accent); margin-right: 12px;"></i> 15 Top Performers above 475</li>
                        </ul>
                    </div>
                </div>

                <!-- Class XII -->
                <div class="info-card reveal reveal-right" data-reveal-once data-reveal-delay="200">
                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 30px;">
                        <h3 style="margin-top: 0; color: var(--primary);">Class XII Results 2024</h3>
                        <span
                            style="background: var(--primary); color: white; padding: 5px 15px; border-radius: 20px; font-size: 13px; font-weight: 700;">100%
                            PASS</span>
                    </div>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                        <div>
                            <small
                                style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">Distinctions</small>
                            <p style="font-size: 24px; color: var(--text); font-weight: 700; margin-bottom: 0;">76% Students
                            </p>
                        </div>
                        <div>
                            <small
                                style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">Highest
                                Score</small>
                            <p style="font-size: 24px; color: var(--text); font-weight: 700; margin-bottom: 0;">488 / 500
                            </p>
                        </div>
                    </div>
                    <div style="margin-top: 30px; border-top: 1px solid var(--border); padding-top: 20px;">
                        <ul class="footer-links" style="color: var(--text-muted); padding-left: 0;">
                            <li style="margin-bottom: 10px;"><i class="fas fa-university"
                                    style="color:var(--accent); margin-right: 12px;"></i> Science Stream: 488 (Highest)</li>
                            <li style="margin-bottom: 0;"><i class="fas fa-chart-line"
                                    style="color:var(--accent); margin-right: 12px;"></i> Commerce Stream: 482 (Highest)
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Subject Performance -->
            <div class="info-card reveal reveal-scale" data-reveal-once style="margin-top: 60px;">
                <h3 style="color: var(--primary); text-align: center; margin-bottom: 40px; font-size: 24px;">Scholarly
                    Subject Mastery</h3>
                <div
                    style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 40px; text-align: center;">
                    <div>
                        <small
                            style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">Mathematics</small>
                        <p style="font-size: 20px; color: var(--text); font-weight: 700;">98.5% Avg</p>
                    </div>
                    <div>
                        <small
                            style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">Science</small>
                        <p style="font-size: 20px; color: var(--text); font-weight: 700;">94.2% Avg</p>
                    </div>
                    <div>
                        <small
                            style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">English</small>
                        <p style="font-size: 20px; color: var(--text); font-weight: 700;">92.8% Avg</p>
                    </div>
                    <div>
                        <small
                            style="text-transform: uppercase; color: var(--accent); font-weight: 700; letter-spacing: 1px;">Computer
                            Sci.</small>
                        <p style="font-size: 20px; color: var(--text); font-weight: 700;">96.5% Avg</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
