@extends('layouts.app')
@section('title', 'Awards – JMPSS School')

@section('content')
<div class="page-header">
    <h1>🏆 Awards & Achievements</h1>
    <p>Celebrating excellence across academics, sports, and extra-curricular activities</p>
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span class="sep">/</span>
        <span>Awards</span>
    </div>
</div>

<section class="section">
    <div class="container">
        @if($years->count() > 0)
        <div style="display:flex;gap:10px;justify-content:center;flex-wrap:wrap;margin-bottom:40px;">
            <button class="tab-btn active" onclick="filterYear('all',this)" style="padding:8px 20px;border-radius:50px;border:2px solid var(--border);background:white;font-weight:600;cursor:pointer;">All Years</button>
            @foreach($years as $yr)
            <button class="tab-btn" onclick="filterYear('{{ $yr }}',this)" style="padding:8px 20px;border-radius:50px;border:2px solid var(--border);background:white;font-weight:600;cursor:pointer;">{{ $yr }}</button>
            @endforeach
        </div>
        @endif

        @if($awards->count() > 0)
        <div class="grid-3" id="awards-grid">
            @foreach($awards as $award)
            <div class="card award-item" data-year="{{ $award->year }}">
                <div style="background:linear-gradient(135deg,#fbbf24,#f59e0b);padding:32px;text-align:center;">
                    <div style="font-size:48px;margin-bottom:8px;">🏆</div>
                    <div style="font-size:24px;font-weight:800;color:var(--primary);">{{ $award->year }}</div>
                </div>
                <div class="card-body">
                    @if($award->category)<span class="card-badge">{{ $award->category }}</span>@endif
                    <div class="card-title">{{ $award->title }}</div>
                    <p class="card-text">{{ Str::limit($award->description, 120) }}</p>
                    @if($award->recipient_name)
                    <div style="margin-top:16px;padding:12px;background:#f8fafc;border-radius:8px;">
                        <div style="font-size:13px;color:var(--text-muted);">Recipient</div>
                        <div style="font-weight:700;color:var(--primary);">{{ $award->recipient_name }}</div>
                        @if($award->recipient_class)<div style="font-size:13px;color:var(--text-muted);">{{ $award->recipient_class }}</div>@endif
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination">
            @for($i=1; $i<=$awards->lastPage(); $i++)
            <a href="{{ $awards->url($i) }}" class="page-link {{ $awards->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
            @endfor
        </div>
        @else
        <div style="text-align:center;padding:100px 20px;color:var(--text-muted);">
            <div style="font-size:64px;margin-bottom:16px;">🏅</div>
            <h3 style="font-size:22px;margin-bottom:10px;color:var(--text);">No Awards Listed Yet</h3>
            <p>Awards will be added by the admin soon.</p>
        </div>
        @endif
    </div>
</section>

<style>
.tab-btn.active,.tab-btn:hover{background:var(--primary)!important;color:white!important;border-color:var(--primary)!important;}
</style>
@push('scripts')
<script>
function filterYear(year, btn) {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    document.querySelectorAll('.award-item').forEach(item => {
        if (year === 'all' || item.dataset.year === year) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
}
</script>
@endpush
@endsection
