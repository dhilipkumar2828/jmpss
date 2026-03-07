@extends('layouts.app')
@section('title', 'Who We Are | JMPSSS - Jeeva Memorial Senior Secondary School')

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
            background: url('{{ asset('assets/jmpsss/image/new/slider1.jpg') }}') center/cover no-repeat;
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

        .sc-stats-wrapper {
            margin-top: 40px;
            padding-top: 40px;
            border-top: 1px solid #eee;
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        .sc-stat-item {
            display: flex;
            flex-direction: column;
        }

        .sc-stat-item strong {
            font-size: 38px;
            font-weight: 700;
            color: #004800;
            font-family: 'Outfit', sans-serif;
            line-height: 1;
            margin-bottom: 6px;
        }

        .sc-stat-item span {
            font-size: 14px;
            font-weight: 600;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 1px;
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

        /* ── Combined Purpose & Values ── */
        .pvv-section {
            padding: 50px 0 0;
            background: #fff;
        }

        /* Full-width Mission/Vision banner */
        .mv-banner {
            display: flex;
            margin-top: 50px;
            position: relative;
            min-height: 380px;
            background: url('{{ asset('assets/jmpsss/image/mv-bg.png') }}') center/cover no-repeat;
            background-attachment: fixed;
        }

        /* Dark photo overlay */
        .mv-banner::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 72, 0, 0.7);
            z-index: 0;
        }

        .mv-panel {
            flex: 1;
            padding: 60px 70px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 1;
        }

        .mv-panel.mv-mission {
            border-right: 1px solid rgba(255, 255, 255, 0.08);
            background: transparent;
        }

        .mv-panel.mv-vision {
            background: transparent;
        }

        /* Left accent bar — green for Mission, orange for Vision */
        .mv-panel.mv-mission::before {
            content: '';
            position: absolute;
            top: 40px;
            bottom: 40px;
            left: 0;
            width: 4px;
            background: linear-gradient(180deg, #4caf50, #006400);
            border-radius: 4px;
        }

        .mv-panel.mv-vision::before {
            content: '';
            position: absolute;
            top: 40px;
            bottom: 40px;
            left: 0;
            width: 4px;
            background: linear-gradient(180deg, #ff7043, #b83300);
            border-radius: 4px;
        }

        /* Central floating badge */
        .mv-center-badge {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 76px;
            height: 76px;
            background: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            box-shadow: 0 0 0 6px rgba(255, 255, 255, 0.18), 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .mv-center-badge i {
            font-size: 28px;
            color: #004800;
        }

        .mv-panel-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.9);
            padding: 6px 14px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 18px;
            width: fit-content;
        }

        .mv-panel-tag i {
            font-size: 11px;
        }

        .mv-panel h3 {
            font-size: 30px;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            color: #fff;
            margin-bottom: 14px;
        }

        .mv-panel p {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.82);
            line-height: 1.85;
            margin-bottom: 18px;
            max-width: 440px;
        }

        .mv-panel ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mv-panel ul li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 8px;
        }

        .mv-panel ul li i {
            font-size: 13px;
            opacity: 0.7;
        }

        /* Values strip */
        .vv-strip {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            margin-top: 0;
            border-top: 1px solid #e8f0e8;
        }

        .vv-item {
            padding: 28px 20px;
            border-right: 1px solid #e8f0e8;
            cursor: default;
            transition: background 0.3s;
            position: relative;
            overflow: hidden;
        }

        .vv-item:last-child {
            border-right: none;
        }

        .vv-item:hover {
            background: #f4faf4;
        }

        /* Colored top accent line per item */
        .vv-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: #004800;
            transform: scaleX(0);
            transition: transform 0.3s;
            transform-origin: left;
        }

        .vv-item:hover::before {
            transform: scaleX(1);
        }

        .vv-item:nth-child(1)::before {
            background: #004800;
        }

        .vv-item:nth-child(2)::before {
            background: #e14c1e;
        }

        .vv-item:nth-child(3)::before {
            background: #1a7ad4;
        }

        .vv-item:nth-child(4)::before {
            background: #a030c0;
        }

        .vv-item:nth-child(5)::before {
            background: #c07a00;
        }

        .vv-item:nth-child(6)::before {
            background: #007858;
        }

        .vv-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
            background: #eaf4ea;
            transition: background 0.3s;
        }

        .vv-item:nth-child(1) .vv-icon {
            background: #e8f4e8;
        }

        .vv-item:nth-child(2) .vv-icon {
            background: #fdeee8;
        }

        .vv-item:nth-child(3) .vv-icon {
            background: #e4eef9;
        }

        .vv-item:nth-child(4) .vv-icon {
            background: #f4e8fa;
        }

        .vv-item:nth-child(5) .vv-icon {
            background: #fdf3e0;
        }

        .vv-item:nth-child(6) .vv-icon {
            background: #e0f4ee;
        }

        .vv-item:hover:nth-child(1) .vv-icon {
            background: #004800;
        }

        .vv-item:hover:nth-child(2) .vv-icon {
            background: #e14c1e;
        }

        .vv-item:hover:nth-child(3) .vv-icon {
            background: #1a7ad4;
        }

        .vv-item:hover:nth-child(4) .vv-icon {
            background: #a030c0;
        }

        .vv-item:hover:nth-child(5) .vv-icon {
            background: #c07a00;
        }

        .vv-item:hover:nth-child(6) .vv-icon {
            background: #007858;
        }

        .vv-icon i {
            font-size: 20px;
            color: #004800;
            transition: color 0.3s;
        }

        .vv-item:nth-child(2) .vv-icon i {
            color: #e14c1e;
        }

        .vv-item:nth-child(3) .vv-icon i {
            color: #1a7ad4;
        }

        .vv-item:nth-child(4) .vv-icon i {
            color: #a030c0;
        }

        .vv-item:nth-child(5) .vv-icon i {
            color: #c07a00;
        }

        .vv-item:nth-child(6) .vv-icon i {
            color: #007858;
        }

        .vv-item:hover .vv-icon i {
            color: #fff;
        }

        .vv-num {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: #bbb;
            display: block;
            margin-bottom: 4px;
        }

        .vv-title {
            font-size: 14px;
            font-weight: 700;
            color: #1a1a1a;
            font-family: 'Outfit', sans-serif;
            line-height: 1.3;
        }

        .vv-desc {
            font-size: 12.5px;
            color: #666;
            line-height: 1.6;
            margin-top: 8px;
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition: max-height 0.4s ease, opacity 0.3s ease;
        }

        .vv-item:hover .vv-desc {
            max-height: 120px;
            opacity: 1;
        }

        .mv-card:nth-child(2) {
            background: linear-gradient(145deg, #b83300, #e14c1e);
        }

        /* Giant watermark letter */
        .mv-card::before {
            content: 'M';
            position: absolute;
            bottom: -30px;
            right: -10px;
            font-size: 200px;
            font-weight: 900;
            font-family: 'Outfit', sans-serif;
            color: rgba(255, 255, 255, 0.06);
            line-height: 1;
            pointer-events: none;
            user-select: none;
        }

        .mv-card:nth-child(2)::before {
            content: 'V';
        }

        .mv-card .mv-icon {
            width: 64px;
            height: 64px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .mv-card .mv-icon i {
            font-size: 26px;
            color: #fff;
        }

        .mv-card h3 {
            font-size: 28px;
            color: #fff;
            font-weight: 700;
            margin-bottom: 16px;
            font-family: 'Outfit', sans-serif;
        }

        .mv-card p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 15.5px;
            line-height: 1.85;
        }

        .mv-card ul {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .mv-card ul li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: rgba(255, 255, 255, 0.85);
            font-size: 14.5px;
            margin-bottom: 10px;
        }

        .mv-card ul li i {
            color: rgba(255, 255, 255, 0.7);
            margin-top: 3px;
            flex-shrink: 0;
        }



        /* Different icon gradient per card */
        .value-card:nth-child(2) .v-icon {
            background: linear-gradient(135deg, #b83300, #e14c1e);
        }

        .value-card:nth-child(3) .v-icon {
            background: linear-gradient(135deg, #0056a0, #1a7ad4);
        }

        .value-card:nth-child(4) .v-icon {
            background: linear-gradient(135deg, #6a0080, #a030c0);
        }

        .value-card:nth-child(5) .v-icon {
            background: linear-gradient(135deg, #7a5000, #c07a00);
        }

        .value-card:nth-child(6) .v-icon {
            background: linear-gradient(135deg, #004838, #007858);
        }

        .value-card .v-icon i {
            font-size: 24px;
            color: #fff;
        }

        .value-card h4 {
            font-size: 18px;
            color: #1a1a1a;
            font-weight: 700;
            margin-bottom: 10px;
            font-family: 'Outfit', sans-serif;
        }

        .value-card p {
            font-size: 14px;
            color: #666;
            line-height: 1.7;
        }

        /* ── Our Foundation ── */
        .trust-section {
            padding: 0;
            margin: 0;
            color: #fff;
            position: relative;
        }

        .trust-top {
            background: linear-gradient(135deg, #002800, #004800);
            padding: 90px 0 80px;
            position: relative;
            overflow: hidden;
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 50px), 0 100%);
        }

        /* Subtle corner texture */
        .trust-top::before {
            content: '';
            position: absolute;
            top: -200px;
            left: -200px;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(225, 76, 30, 0.06) 0%, transparent 70%);
            pointer-events: none;
        }

        .trust-top::after {
            content: '';
            position: absolute;
            bottom: -100px;
            right: -100px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.03) 0%, transparent 70%);
            pointer-events: none;
        }

        .trust-label-bar {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 50px;
            position: relative;
            z-index: 1;
        }

        .trust-label-bar .t-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(225, 76, 30, 0.15);
            border: 1px solid rgba(225, 76, 30, 0.4);
            color: #e14c1e;
            padding: 5px 16px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        .trust-label-bar .t-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, rgba(225, 76, 30, 0.3), transparent);
        }

        .trust-3col {
            display: grid;
            grid-template-columns: 1fr 260px;
            gap: 40px;
            align-items: start;
            position: relative;
            z-index: 1;
        }

        /* LEFT: vertical JM watermark */
        .trust-watermark {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .trust-watermark span {
            font-size: 100px;
            font-weight: 900;
            font-family: 'Outfit', sans-serif;
            color: rgba(255, 255, 255, 0.04);
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
            letter-spacing: -6px;
            line-height: 1;
            user-select: none;
        }

        /* CENTER: main content */
        .trust-center-col h2 {
            font-size: 36px;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            color: #fff;
            margin-bottom: 20px;
            line-height: 1.25;
        }

        .trust-center-col h2 span {
            color: #e57349;
        }

        .trust-divider-line {
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #e14c1e, #ff7043);
            border-radius: 2px;
            margin-bottom: 20px;
        }

        .trust-center-col p {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.62);
            line-height: 1.9;
            margin-bottom: 24px;
        }

        .trust-founder-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .trust-founder-avatar {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e14c1e, #ff7043);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            font-family: 'Outfit', sans-serif;
            flex-shrink: 0;
        }

        .trust-founder-meta strong {
            display: block;
            font-size: 14px;
            color: #fff;
            font-family: 'Outfit', sans-serif;
        }

        .trust-founder-meta span {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.45);
        }

        /* RIGHT: pill facts */
        .trust-pills-col {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding-top: 10px;
        }

        .t-pill {
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            padding: 12px 16px;
            transition: background 0.3s, border-color 0.3s;
        }

        .t-pill:hover {
            background: rgba(225, 76, 30, 0.1);
            border-color: rgba(225, 76, 30, 0.3);
        }

        .t-pill-icon {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            border-radius: 8px;
            background: rgba(225, 76, 30, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .t-pill-icon i {
            font-size: 15px;
            color: #e14c1e;
        }

        .t-pill-text strong {
            display: block;
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 600;
        }

        .t-pill-text span {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.4);
        }

        /* BOTTOM: full-width orange quote strip */
        .trust-quote-strip {
            background: linear-gradient(100deg, #b83000 0%, #e14c1e 50%, #d44015 100%);
            padding: 44px 0;
            margin: 0;
            text-align: center;
            position: relative;
        }

        .trust-quote-strip::before {
            content: '\201C';
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 120px;
            font-family: Georgia, serif;
            color: rgba(255, 255, 255, 0.08);
            line-height: 1;
            pointer-events: none;
        }

        .trust-quote-strip p {
            font-size: 21px;
            font-style: italic;
            color: rgba(255, 255, 255, 0.95);
            max-width: 680px;
            margin: 0 auto 12px;
            line-height: 1.65;
            position: relative;
            z-index: 1;
        }

        .trust-quote-strip cite {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.65);
            font-style: normal;
            letter-spacing: 1px;
            position: relative;
            z-index: 1;
        }

        /* Decorative background rings */
        .trust-section::before {
            content: '';
            position: absolute;
            top: -120px;
            right: -120px;
            width: 480px;
            height: 480px;
            border: 60px solid rgba(255, 255, 255, 0.02);
            border-radius: 50%;
            pointer-events: none;
        }

        .trust-main-grid {
            display: grid;
            grid-template-columns: 340px 1fr;
            gap: 60px;
            align-items: start;
            position: relative;
            z-index: 1;
            padding-bottom: 70px;
        }

        /* — Left: Founder Card — */
        .trust-founder-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 44px 30px;
            text-align: center;
        }

        .founder-monogram {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e14c1e 0%, #ff7043 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 22px;
            font-size: 36px;
            font-weight: 900;
            font-family: 'Outfit', sans-serif;
            color: #fff;
            position: relative;
            box-shadow: 0 0 0 10px rgba(225, 76, 30, 0.12), 0 16px 40px rgba(225, 76, 30, 0.25);
        }

        /* Slow-spinning dashed ring */
        .founder-monogram::before {
            content: '';
            position: absolute;
            inset: -14px;
            border-radius: 50%;
            border: 2px dashed rgba(225, 76, 30, 0.45);
            animation: trust-spin 14s linear infinite;
        }

        @keyframes trust-spin {
            to {
                transform: rotate(360deg);
            }
        }

        .founder-name {
            font-size: 19px;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            color: #fff;
            margin-bottom: 4px;
        }

        .founder-role-label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #e14c1e;
            margin-bottom: 22px;
            display: block;
        }

        .founder-dedication {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.5);
            font-style: italic;
            line-height: 1.75;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 18px;
        }

        .founder-dedication strong {
            color: rgba(255, 255, 255, 0.78);
            font-style: normal;
        }

        /* — Right: Content column — */
        .trust-content-col {
            padding-top: 6px;
        }

        .trust-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(225, 76, 30, 0.12);
            border: 1px solid rgba(225, 76, 30, 0.35);
            color: #e14c1e;
            padding: 6px 18px;
            border-radius: 30px;
            font-size: 11.5px;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 16px;
        }

        .trust-content-col h2 {
            font-size: 38px;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            color: #fff;
            margin-bottom: 26px;
            line-height: 1.2;
        }

        .trust-content-col h2 span {
            color: #e14c1e;
        }

        .trust-quote-block {
            border-left: 3px solid #e14c1e;
            padding: 16px 22px;
            background: rgba(225, 76, 30, 0.07);
            border-radius: 0 10px 10px 0;
            margin-bottom: 22px;
        }

        .trust-quote-block p {
            font-size: 17px;
            font-style: italic;
            color: rgba(255, 255, 255, 0.88);
            line-height: 1.75;
            margin: 0 0 8px;
        }

        .trust-quote-block cite {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.45);
            font-style: normal;
            letter-spacing: 0.5px;
        }

        .trust-body-text {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.9;
        }

        /* — Bottom: 3 large fact cards — */
        .trust-fact-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            position: relative;
            z-index: 1;
        }

        .trust-fact-card {
            padding: 34px 32px;
            border-right: 1px solid rgba(255, 255, 255, 0.06);
            display: flex;
            align-items: flex-start;
            gap: 18px;
            background: rgba(0, 0, 0, 0.2);
            transition: background 0.3s;
        }

        .trust-fact-card:last-child {
            border-right: none;
        }

        .trust-fact-card:hover {
            background: rgba(255, 255, 255, 0.04);
        }

        .trust-fact-card-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            border-radius: 14px;
            background: rgba(225, 76, 30, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(225, 76, 30, 0.25);
        }

        .trust-fact-card-icon i {
            color: #e14c1e;
            font-size: 20px;
        }


        .trust-fact-card-body strong {
            display: block;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Outfit', sans-serif;
            color: #fff;
            margin-bottom: 5px;
        }

        .trust-fact-card-body span {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.5);
            line-height: 1.5;
        }
</style>
@endpush

@section('content')
<!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <h1>About Us</h1>
            <nav class="breadcrumb-trail">
                <a href="{{ route('home') }}">Home</a><span>›</span>
                <a href="#">About Us</a>
            </nav>
        </div>
    </section>

    <!-- Our Story -->
    <section class="story-classic">
        <div class="container">
            <div class="story-classic-grid">

                <!-- Left: Content & Stats -->
                <div class="sc-content">
                    <div class="sc-eyebrow">Our Story</div>
                    <h2 class="sc-title">Nurturing Minds, <br><span>Building Futures</span></h2>

                    <p class="sc-text lead">Founded under the Jeeva Memorial Trust by Mr. G.K. Babu &mdash; in loving
                        memory of his son Jeevakumar.</p>

                    <p class="sc-text">Our school stands as a living legacy of love, purpose, and hope in
                        Thirukazhukundram. We are a CBSE-affiliated co-education institution offering classes from
                        Pre.K.G. to XII Std in a modern, safe, and stimulating environment.</p>

                    <div class="sc-stats-wrapper">
                        <div class="sc-stat-item">
                            <strong class="sc-stat-number" data-target="15" data-suffix="+">0+</strong>
                            <span>Years</span>
                        </div>
                        <div class="sc-stat-item">
                            <strong class="sc-stat-number" data-target="1000" data-suffix="+">0+</strong>
                            <span>Students</span>
                        </div>
                        <div class="sc-stat-item">
                            <strong class="sc-stat-number" data-target="60" data-suffix="+">0+</strong>
                            <span>Faculty</span>
                        </div>
                        <div class="sc-stat-item">
                            <strong>CBSE</strong>
                            <span>Affiliated</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Visual -->
                <div class="sc-visual">
                    <img src="{{ asset('assets/jmpsss/image/img01.jpg') }}" alt="JMPSSS Campus" class="sc-img">
                </div>

            </div>
        </div>
    </section>

    <!-- Purpose, Mission, Vision & Values (unified) -->
    <section class="pvv-section">
        <div class="container">
            <div class="text-center">
                <span class="section-subtitle">Our Purpose</span>
                <h2 class="section-title">Mission, Vision &amp; Values</h2>
            </div>
        </div>

        <!-- Full-width Mission / Vision Banner -->
        <div class="mv-banner">

            <!-- Mission Panel -->
            <div class="mv-panel mv-mission">
                <span class="mv-panel-tag"><i class="fa-solid fa-bullseye"></i> Mission</span>
                <h3>Our Mission</h3>
                <p>To provide a stimulating, inclusive, and values-driven education that empowers every student to
                    realise their full potential — academically, socially, and morally.</p>
                <ul>
                    <li><i class="fa-solid fa-circle-check"></i> Building responsible citizens of tomorrow</li>
                    <li><i class="fa-solid fa-circle-check"></i> Nurturing confidence, integrity &amp; compassion</li>
                    <li><i class="fa-solid fa-circle-check"></i> CBSE curriculum from Pre.K.G. to XII Std.</li>
                </ul>
            </div>

            <!-- Center school badge -->
            <div class="mv-center-badge">
                <i class="fa-solid fa-school"></i>
            </div>

            <!-- Vision Panel -->
            <div class="mv-panel mv-vision">
                <span class="mv-panel-tag"><i class="fa-solid fa-eye"></i> Vision</span>
                <h3>Our Vision</h3>
                <p>To be a centre of educational excellence in Tamil Nadu — where tradition meets innovation, and every
                    child is inspired to dream big and lead with purpose.</p>
                <ul>
                    <li><i class="fa-solid fa-circle-check"></i> Celebrating diversity &amp; fostering curiosity</li>
                    <li><i class="fa-solid fa-circle-check"></i> Shaping leaders, thinkers &amp; changemakers</li>
                    <li><i class="fa-solid fa-circle-check"></i> A school community rooted in love &amp; service</li>
                </ul>
            </div>

        </div>

        <!-- Values Strip (hover to reveal description) -->
        <div class="vv-strip">
            <div class="vv-item">
                <div class="vv-icon"><i class="fa-solid fa-book-open"></i></div>
                <span class="vv-num">01</span>
                <div class="vv-title">Academic Excellence</div>
                <div class="vv-desc">Rigorous CBSE curriculum delivered with passion — building strong foundations from
                    kindergarten through Grade XII.</div>
            </div>
            <div class="vv-item">
                <div class="vv-icon"><i class="fa-solid fa-hands-holding-child"></i></div>
                <span class="vv-num">02</span>
                <div class="vv-title">Holistic Development</div>
                <div class="vv-desc">Intellectual, physical, creative, and moral growth through co-curricular programmes
                    and sports.</div>
            </div>
            <div class="vv-item">
                <div class="vv-icon"><i class="fa-solid fa-shield-halved"></i></div>
                <span class="vv-num">03</span>
                <div class="vv-title">Safe Environment</div>
                <div class="vv-desc">A nurturing campus with trained staff ensuring the comfort and safety of every
                    child every day.</div>
            </div>
            <div class="vv-item">
                <div class="vv-icon"><i class="fa-solid fa-people-group"></i></div>
                <span class="vv-num">04</span>
                <div class="vv-title">Community &amp; Belonging</div>
                <div class="vv-desc">Love, sharing, and caring are the core notes of all relationships within our school
                    family.</div>
            </div>
            <div class="vv-item">
                <div class="vv-icon"><i class="fa-solid fa-lightbulb"></i></div>
                <span class="vv-num">05</span>
                <div class="vv-title">Innovation in Learning</div>
                <div class="vv-desc">Activity-based and Montessori methods encourage self-discovery and experiential
                    learning at every stage.</div>
            </div>
            <div class="vv-item">
                <div class="vv-icon"><i class="fa-solid fa-star"></i></div>
                <span class="vv-num">06</span>
                <div class="vv-title">Integrity &amp; Ethics</div>
                <div class="vv-desc">Strong values, social responsibility, and a sense of purpose instilled in every
                    student from the very first day.</div>
            </div>
        </div>

    </section>

    <!-- Our Foundation -->
    <section class="trust-section">

        <!-- Top dark charcoal area -->
        <div class="trust-top">
            <div class="container">

                <!-- Label bar -->
                <div class="trust-label-bar">
                    <span class="t-tag"><i class="fa-solid fa-heart"></i> Our Foundation</span>
                    <div class="t-line"></div>
                </div>

                <!-- 3-column layout -->
                <div class="trust-3col">

                    <!-- Center: heading + body + founder row -->
                    <div class="trust-center-col">
                        <h2>Founded on <span>Love &amp; Inspiration</span></h2>
                        <div class="trust-divider-line"></div>
                        <p>JEEVA MEMORIAL TRUST was established by <strong style="color:rgba(255,255,255,0.9)">Mr. G.K.
                                Babu</strong> in the cherished memory of his beloved son <strong
                                style="color:rgba(255,255,255,0.9)">Jeevakumar</strong>. That profound act of love
                            became the seed from which our school grew &mdash; a place where thousands of children now
                            find light, learning, and a future.</p>
                        <div class="trust-founder-row">
                            <div class="trust-founder-avatar">GKB</div>
                            <div class="trust-founder-meta">
                                <strong>Mr. G.K. Babu</strong>
                                <span>Correspondent &amp; Founder, Jeeva Memorial Trust</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: pill facts -->
                    <div class="trust-pills-col">
                        <div class="t-pill">
                            <div class="t-pill-icon"><i class="fa-solid fa-child-reaching"></i></div>
                            <div class="t-pill-text">
                                <strong>Pre.K.G. to XII Std.</strong>
                                <span>Full-stream co-education</span>
                            </div>
                        </div>
                        <div class="t-pill">
                            <div class="t-pill-icon"><i class="fa-solid fa-location-dot"></i></div>
                            <div class="t-pill-text">
                                <strong>Thirukazhukundram</strong>
                                <span>Kancheepuram District</span>
                            </div>
                        </div>
                        <div class="t-pill">
                            <div class="t-pill-icon"><i class="fa-solid fa-computer"></i></div>
                            <div class="t-pill-text">
                                <strong>Computer &amp; Language Labs</strong>
                                <span>Modern facilities</span>
                            </div>
                        </div>
                        <div class="t-pill">
                            <div class="t-pill-icon"><i class="fa-solid fa-palette"></i></div>
                            <div class="t-pill-text">
                                <strong>Dance, Art &amp; AV Room</strong>
                                <span>Montessori classrooms</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Full-width orange quote strip -->
        <div class="trust-quote-strip">
            <div class="container">
                <p>&ldquo;From love and loss came the greatest gift &mdash; a school where thousands of children now
                    find their future.&rdquo;</p>
                <cite>&mdash; Mr. G.K. Babu, Correspondent, Jeeva Memorial Trust</cite>
            </div>
        </div>

    </section>

    <!-- Footer -->
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const counters = document.querySelectorAll('.sc-stat-number[data-target]');

        if (!counters.length) {
            return;
        }

        const animateCounter = function (counter) {
            if (counter.dataset.counted === 'true') {
                return;
            }
            counter.dataset.counted = 'true';

            const target = parseInt(counter.dataset.target, 10);
            if (Number.isNaN(target)) {
                return;
            }

            const suffix = counter.dataset.suffix || '';
            const duration = parseInt(counter.dataset.duration || '1600', 10);
            const startTime = performance.now();

            const updateCounter = function (currentTime) {
                const progress = Math.min((currentTime - startTime) / duration, 1);
                const currentValue = Math.floor(progress * target);

                counter.textContent = currentValue + suffix;

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                    return;
                }

                counter.textContent = target + suffix;
            };

            counter.textContent = '0' + suffix;
            requestAnimationFrame(updateCounter);
        };

        if (!('IntersectionObserver' in window)) {
            counters.forEach(animateCounter);
            return;
        }

        const observer = new IntersectionObserver(function (entries, instance) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }
                animateCounter(entry.target);
                instance.unobserve(entry.target);
            });
        }, {
            threshold: 0.45
        });

        counters.forEach(function (counter) {
            counter.textContent = '0' + (counter.dataset.suffix || '');
            observer.observe(counter);
        });
    });
</script>
@endpush

