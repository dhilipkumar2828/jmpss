@extends('layouts.admin')
@section('title', isset($award) ? 'Edit Award' : 'Add Award')
@section('page-title', isset($award) ? 'Edit Award' : 'Add Award')
@section('breadcrumb', 'Admin / Awards / ' . (isset($award) ? 'Edit' : 'Add'))
@section('content')
<div>
    <a href="{{ route('admin.awards.index') }}" class="btn btn-outline btn-sm" style="margin-bottom:20px;"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="card">
        <div class="card-header"><h3>🏆 {{ isset($award) ? 'Edit Award' : 'Add New Award' }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ isset($award) ? route('admin.awards.update', $award) : route('admin.awards.store') }}">
                @csrf @if(isset($award)) @method('PUT') @endif
                <div class="form-group">
                    <label class="form-label">Award Title *</label>
                    <input type="text" name="title" class="form-control @error('title') error-field @enderror" value="{{ old('title', $award->title ?? '') }}" required placeholder="e.g. State Mathematics Olympiad Gold">
                    @error('title')<div class="error-msg">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $award->description ?? '') }}</textarea>
                </div>
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Recipient Name</label>
                        <input type="text" name="recipient_name" class="form-control" value="{{ old('recipient_name', $award->recipient_name ?? '') }}" placeholder="Student/School name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Class / Grade</label>
                        <input type="text" name="recipient_class" class="form-control" value="{{ old('recipient_class', $award->recipient_class ?? '') }}" placeholder="e.g. Class X">
                    </div>
                </div>
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Year *</label>
                        <input type="number" name="year" class="form-control @error('year') error-field @enderror" value="{{ old('year', $award->year ?? date('Y')) }}" min="1900" max="2100" required>
                        @error('year')<div class="error-msg">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <input type="text" name="category" class="form-control" value="{{ old('category', $award->category ?? '') }}" placeholder="e.g. Academic, Sports">
                    </div>
                </div>
                <label style="display:flex;align-items:center;gap:10px;cursor:pointer;font-size:14px;font-weight:500;margin-bottom:24px;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" style="width:18px;height:18px;accent-color:var(--success);" {{ old('is_active', $award->is_active ?? true) ? 'checked' : '' }}> Active
                </label>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ isset($award) ? 'Update' : 'Create' }} Award</button>
                    <a href="{{ route('admin.awards.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
