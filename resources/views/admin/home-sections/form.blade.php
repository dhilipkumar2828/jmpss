@extends('layouts.admin')
@section('title', isset($section) ? 'Edit Section' : 'Add Section')
@section('page-title', isset($section) ? 'Edit Home Section' : 'Add Home Section')
@section('breadcrumb', 'Admin / Home Sections / ' . (isset($section) ? 'Edit' : 'Add'))
@section('content')
<div>
    <a href="{{ route('admin.home-sections.index') }}" class="btn btn-outline btn-sm" style="margin-bottom:20px;"><i class="fas fa-arrow-left"></i> Back</a>
    <div class="card">
        <div class="card-header"><h3>🏠 {{ isset($section) ? 'Edit' : 'Add' }} Home Section</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ isset($section) ? route('admin.home-sections.update', $section) : route('admin.home-sections.store') }}">
                @csrf @if(isset($section)) @method('PUT') @endif
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Section Type *</label>
                        <select name="section_type" class="form-control" required>
                            <option value="principal" {{ old('section_type', $section->section_type ?? '') == 'principal' ? 'selected' : '' }}>👨‍💼 Principal's Desk</option>
                            <option value="correspondent" {{ old('section_type', $section->section_type ?? '') == 'correspondent' ? 'selected' : '' }}>👔 Correspondent's Desk</option>
                            <option value="hero" {{ old('section_type', $section->section_type ?? '') == 'hero' ? 'selected' : '' }}>🎯 Hero Section</option>
                            <option value="about" {{ old('section_type', $section->section_type ?? '') == 'about' ? 'selected' : '' }}>📋 About Section</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Section Title *</label>
                        <input type="text" name="title" class="form-control @error('title') error-field @enderror" value="{{ old('title', $section->title ?? '') }}" required placeholder="e.g. Principal's Desk">
                        @error('title')<div class="error-msg">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Person's Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $section->name ?? '') }}" placeholder="e.g. Dr. R. Krishnamurthy">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Designation</label>
                        <input type="text" name="designation" class="form-control" value="{{ old('designation', $section->designation ?? '') }}" placeholder="e.g. Principal, JMPSS">
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Content *</label>
                    <textarea name="content" class="form-control @error('content') error-field @enderror" rows="6" required>{{ old('content', $section->content ?? '') }}</textarea>
                    @error('content')<div class="error-msg">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Quote / Tagline</label>
                    <input type="text" name="quote" class="form-control" value="{{ old('quote', $section->quote ?? '') }}" placeholder="e.g. Education is life itself.">
                </div>
                <div class="form-grid-2">
                    <div class="form-group">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $section->sort_order ?? 0) }}" min="0">
                    </div>
                    <div class="form-group" style="display:flex;align-items:flex-end;">
                        <label style="display:flex;align-items:center;gap:10px;cursor:pointer;font-size:14px;font-weight:500;padding-bottom:12px;">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" style="width:18px;height:18px;accent-color:var(--success);" {{ old('is_active', $section->is_active ?? true) ? 'checked' : '' }}> Active
                        </label>
                    </div>
                </div>
                <div style="display:flex;gap:12px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ isset($section) ? 'Update' : 'Create' }} Section</button>
                    <a href="{{ route('admin.home-sections.index') }}" class="btn btn-outline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
