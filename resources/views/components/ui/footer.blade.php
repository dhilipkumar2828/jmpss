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
                    <li><a href="{{ route('academics') }}"><i class="fa-solid fa-angle-right"></i> Academics</a></li>
                    <li><a href="{{ route('admissions') }}"><i class="fa-solid fa-angle-right"></i> Admissions</a></li>
                    <li><a href="{{ route('events') }}"><i class="fa-solid fa-angle-right"></i> Events</a></li>
                </ul>
            </div>
            <div class="footer-events">
                <h3>Recent Events</h3>
                @forelse($recentEvents ?? [] as $event)
                <div class="footer-event-item">
                    <div class="event-thumb">
                        <img src="{{ Str::startsWith($event->image, 'assets/') ? asset($event->image) : asset('storage/' . $event->image) }}" alt="{{ $event->title }}">
                    </div>
                    <div class="event-info-footer">
                        <a href="{{ route('events') }}">{{ $event->title }}</a>
                        <small style="display: block; color: #ccc;">{{ $event->event_date->format('d M Y') }}</small>
                    </div>
                </div>
                @empty
                <p style="color: #ccc; font-size: 14px;">No recent events.</p>
                @endforelse
            </div>
            <div class="footer-links">
                <h3>Address</h3>
                <p><i class="fa-solid fa-location-dot"></i> {{ $settings['school_address'] ?? 'No.210, Palla Egai Village, Puliur Post, Thirukazhukundram T.K., Kancheepuram Dist. Pin-603 109' }}</p>
                <p><i class="fa-solid fa-phone"></i> {{ $settings['school_phone_1'] ?? '+91-7373418852' }}{{ isset($settings['school_phone_2']) ? ', ' . $settings['school_phone_2'] : '' }}</p>
                <p><i class="fa-solid fa-envelope"></i> {{ $settings['school_email'] ?? 'jeevamemorialschool@gmail.com' }}</p>
                <div class="social-icons">
                    <a href="{{ $settings['facebook_url'] ?? '#' }}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="{{ $settings['instagram_url'] ?? '#' }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="{{ $settings['linkedin_url'] ?? '#' }}" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="{{ $settings['youtube_url'] ?? '#' }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
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

