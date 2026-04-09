<footer class="footer">
        <div class="container footer-grid">
            <div class="footer-info">
                <div class="footer-logo">
                    <img src="{{ asset('assets/jmpsss/image/tab.png') }}" alt="JMPSSS Logo">
                </div>
                <p>JEEVA MEMORIAL TRUST, founded by Mr. G.K. Babu, in the memory of his beloved son JEEVAKUMAR is the
                    source of inspiration for a model school in Thirukazhukundram. It is the outcome of inspiration.</p>
            </div>
            <div class="footer-links">
                <h3>Quick Link</h3>
                <ul>
                    <li><a href="{{ route('home') }}"><i class="fa-solid fa-angle-right"></i> Home</a></li>
                    <li><a href="{{ route('about') }}"><i class="fa-solid fa-angle-right"></i> About</a></li>
                    <li><a href="{{ route('curriculum') }}"><i class="fa-solid fa-angle-right"></i> Academics</a></li>
                    <li><a href="{{ route('admissions') }}"><i class="fa-solid fa-angle-right"></i> Admissions</a></li>
                    <li><a href="{{ route('events') }}"><i class="fa-solid fa-angle-right"></i> Events</a></li>
                    <li><a href="{{ route('campus-visit') }}"><i class="fa-solid fa-angle-right"></i> Campus Visit</a></li>
                </ul>
            </div>
            <div class="footer-events">
                <h3>Your Feedback Matters</h3>
                <div class="feedback-qr-wrapper">
                    <div class="feedback-qr-img">
                        <img src="{{ asset('assets/jmpsss/image/feedback-qr.png') }}" alt="Feedback QR Code">
                    </div>
                    <p>Scan the QR code to provide your valuable feedback.</p>
                </div>
            </div>
            <div class="footer-links">
                <h3>Address</h3>
                <p><i class="fa-solid fa-location-dot"></i> No.210, Palla Egai Village, Puliur Post, Thirukazhukundram T.K., Kancheepuram Dist. Pin-603 109</p>
                <p><i class="fa-solid fa-phone"></i> +91-7373418852, +91-8939222122</p>
                <p><i class="fa-solid fa-envelope"></i> jeevamemorialschool@gmail.com</p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/p/Jeeva-Memorial-Public-School-100065720670012/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/jeevamemorialpublicschool/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    {{-- <a href="{{ $settings['linkedin_url'] ?? '#' }}" target="_blank"><i class="fa-brands fa-linkedin"></i></a> --}}
                    <a href="https://www.youtube.com/channel/UCEe4LgSQuNMCqHu8TvQssGA" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container flex-row-between">
                <p>&copy; 2026 Jeeva Memorial Trust. All Rights Reserved.</p>
                <div class="footer-bottom-links">
                    <p>Developed & Maintained by <a href="#">Ocean Softwares</a></p>
                </div>
            </div>
        </div>
    </footer>

