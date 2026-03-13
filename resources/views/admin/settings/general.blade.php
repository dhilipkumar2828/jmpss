@extends('layouts.admin')

@section('title', 'General Settings')
@section('page-title', 'General Settings')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>School Contact & Social Media Information</h3>
        <p style="color: var(--text-muted); font-size: 14px;">Update information that appears in the footer and contact sections.</p>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.settings.general.update') }}" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                <!-- Contact Information -->
                <div>
                    <h4 style="margin-bottom: 20px; color: var(--primary-color); border-bottom: 1px solid var(--border); padding-bottom: 10px;">
                        <i class="fas fa-address-book"></i> Contact Information
                    </h4>
                    
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="school_address" style="display: block; margin-bottom: 8px; font-weight: 600;">School Address</label>
                        <textarea name="school_address" id="school_address" class="form-control" rows="3" required>{{ old('school_address', $settings['school_address'] ?? '') }}</textarea>
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="school_phone_1" style="display: block; margin-bottom: 8px; font-weight: 600;">Primary Phone</label>
                        <input type="text" name="school_phone_1" id="school_phone_1" class="form-control" value="{{ old('school_phone_1', $settings['school_phone_1'] ?? '') }}" required>
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="school_phone_2" style="display: block; margin-bottom: 8px; font-weight: 600;">Secondary Phone (Optional)</label>
                        <input type="text" name="school_phone_2" id="school_phone_2" class="form-control" value="{{ old('school_phone_2', $settings['school_phone_2'] ?? '') }}">
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="school_email" style="display: block; margin-bottom: 8px; font-weight: 600;">Contact Email</label>
                        <input type="email" name="school_email" id="school_email" class="form-control" value="{{ old('school_email', $settings['school_email'] ?? '') }}" required>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div>
                    <h4 style="margin-bottom: 20px; color: var(--primary-color); border-bottom: 1px solid var(--border); padding-bottom: 10px;">
                        <i class="fas fa-share-alt"></i> Social Media Links
                    </h4>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="facebook_url" style="display: block; margin-bottom: 8px; font-weight: 600;">
                            <i class="fab fa-facebook" style="color: #1877F2;"></i> Facebook URL
                        </label>
                        <input type="url" name="facebook_url" id="facebook_url" class="form-control" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}">
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="instagram_url" style="display: block; margin-bottom: 8px; font-weight: 600;">
                            <i class="fab fa-instagram" style="color: #E4405F;"></i> Instagram URL
                        </label>
                        <input type="url" name="instagram_url" id="instagram_url" class="form-control" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}">
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="linkedin_url" style="display: block; margin-bottom: 8px; font-weight: 600;">
                            <i class="fab fa-linkedin" style="color: #0A66C2;"></i> LinkedIn URL
                        </label>
                        <input type="url" name="linkedin_url" id="linkedin_url" class="form-control" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}">
                    </div>

                    <div class="form-group" style="margin-bottom: 20px;">
                        <label for="youtube_url" style="display: block; margin-bottom: 8px; font-weight: 600;">
                            <i class="fab fa-youtube" style="color: #FF0000;"></i> YouTube URL
                        </label>
                        <input type="url" name="youtube_url" id="youtube_url" class="form-control" value="{{ old('youtube_url', $settings['youtube_url'] ?? '') }}">
                    </div>
                </div>
            </div>

            <div style="margin-top: 30px; border-top: 1px solid var(--border); padding-top: 20px;">
                <button type="submit" class="btn btn-primary" style="padding: 10px 30px;">
                    <i class="fas fa-save"></i> Save General Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
