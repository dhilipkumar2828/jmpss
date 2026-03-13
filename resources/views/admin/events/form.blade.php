@extends('layouts.admin')
@section('title', isset($event) ? 'Edit Event' : 'Add Event')
@section('page-title', isset($event) ? 'Edit Event' : 'Add New Event')
@section('breadcrumb', 'Admin / Events / ' . (isset($event) ? 'Edit' : 'Add'))
@section('content')

<div>
    <a href="{{ route('admin.events.index') }}" class="btn btn-outline btn-sm" style="margin-bottom:20px;"><i class="fas fa-arrow-left"></i> Back to Events</a>

    <div class="card">
        <div class="card-header">
            <h3>📅 {{ isset($event) ? 'Edit Event' : 'Add New Event' }}</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ isset($event) ? route('admin.events.update', $event) : route('admin.events.store') }}">
                @csrf
                @if(isset($event)) @method('PUT') @endif

                <div class="form-group">
                    <label class="form-label">Event Title *</label>
                    <input type="text" name="title" class="form-control @error('title') error-field @enderror" placeholder="e.g. Annual Sports Day 2025" value="{{ old('title', $event->title ?? '') }}" required>
                    @error('title') <div class="error-msg">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Describe the event...">{{ old('description', $event->description ?? '') }}</textarea>
                </div>

                <div class="form-grid-3">
                    <div class="form-group">
                        <label class="form-label">Event Date *</label>
                        <input type="date" name="event_date" class="form-control @error('event_date') error-field @enderror" value="{{ old('event_date', isset($event) ? \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') : '') }}" required>
                        @error('event_date') <div class="error-msg">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Event Time</label>
                        <input type="time" name="event_time" class="form-control" value="{{ old('event_time', isset($event) ? \Carbon\Carbon::parse($event->event_time)->format('H:i') : '') }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" placeholder="e.g. Sports, Academic" value="{{ old('category', $event->category ?? '') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Venue</label>
                    <input type="text" name="venue" class="form-control" placeholder="e.g. School Auditorium" value="{{ old('venue', $event->venue ?? '') }}">
                </div>

                <div style="display:flex;gap:32px;margin-bottom:24px;">
                    <label style="display:flex;align-items:center;gap:10px;cursor:pointer;font-size:14px;font-weight:500;">
                        <input type="hidden" name="is_featured" value="0">
                        <input type="checkbox" name="is_featured" value="1" style="width:18px;height:18px;accent-color:var(--accent);" {{ old('is_featured', $event->is_featured ?? false) ? 'checked' : '' }}>
                        Mark as Featured Event
                    </label>
                    <label style="display:flex;align-items:center;gap:10px;cursor:pointer;font-size:14px;font-weight:500;">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" style="width:18px;height:18px;accent-color:var(--success);" {{ old('is_active', $event->is_active ?? true) ? 'checked' : '' }}>
                        Set as Active
                    </label>
                </div>

                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ isset($event) ? 'Update Event' : 'Create Event' }}</button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
