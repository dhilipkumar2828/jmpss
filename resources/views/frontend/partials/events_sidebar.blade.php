<div class="sidebar-widget search-widget">
    <h3>Search Events</h3>
    <form action="{{ route('events') }}" method="GET" class="search-box">
        <input type="text" name="search" placeholder="keywords..." value="{{ request('search') }}">
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>

<div class="sidebar-widget recent-events-widget">
    <h3>Recent Events</h3>
    <div class="recent-event-list">
        @foreach($recentEvents as $re)
        <div class="recent-item" onclick="showEventDetails(event, '{{ $re->id }}')" style="cursor: pointer;">
            <img src="{{ $re->image ? asset($re->image) : asset('assets/jmpsss/image/new/slider1.jpg') }}" alt="{{ $re->title }}">
            <div class="recent-info">
                <h4>{{ $re->title }}</h4>
                <span>{{ $re->event_date->format('M d, Y') }}</span>
            </div>
            {{-- Hidden data for JS --}}
            <div class="event-full-data" style="display:none;" data-id="{{ $re->id }}"
                data-title="{{ $re->title }}" data-date="{{ $re->event_date->format('d F Y') }}"
                data-venue="{{ $re->venue ?? 'School Campus' }}" data-desc="{{ $re->description }}"
                data-img="{{ $re->image ? asset($re->image) : asset('assets/jmpsss/image/new/slider1.jpg') }}"
                data-cat="{{ $re->category ?? 'School Event' }}"
                data-highlight-category="{{ $re->category ?? 'General' }}"
                data-highlights="{{ $re->highlights }}">
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="sidebar-widget category-widget">
    <h3>Categories</h3>
    <ul>
        @foreach($categories as $cat)
        <li style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0; border-bottom: 1px solid #eee; color: #555;">
            <span>{{ $cat->category }}</span> <span>({{ $cat->count }})</span>
        </li>
        @endforeach
    </ul>
</div>

<a href="{{ route('admissions') }}" class="sidebar-simple-btn">Enroll Now In JMPSSS <i
        class="fa-solid fa-arrow-right"></i></a>
