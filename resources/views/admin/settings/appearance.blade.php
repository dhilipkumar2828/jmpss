@extends('layouts.admin')

@section('title', 'Appearance Settings')
@section('page-title', 'Appearance Settings')
@section('breadcrumb', 'Admin / Settings / Appearance')

@section('content')
<div class="card">
    <div class="card-header">
        <h3><i class="fas fa-palette" style="color:var(--primary);margin-right:8px;"></i> Website Color Palette</h3>
        <p style="font-size: 13px; color: var(--text-muted); font-weight: normal;">Change the primary and accent colors of your website.</p>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.settings.appearance.update') }}" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 32px;">
                <!-- Primary Greens -->
                <div>
                    <h4 style="margin-bottom: 20px; font-size: 15px; border-bottom: 1px solid var(--border); padding-bottom: 8px;">Primary Brand Colors (New Design)</h4>
                    
                    <div class="form-group">
                        <label class="form-label">Primary Deep Green (900)</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="color" name="logo_green_900" value="{{ $settings['logo_green_900'] }}" class="form-control" style="width: 60px; padding: 4px; height: 45px;">
                            <input type="text" value="{{ $settings['logo_green_900'] }}" class="form-control" readonly style="flex: 1; background: #f8fafc;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Primary Medium Green (700)</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="color" name="logo_green_700" value="{{ $settings['logo_green_700'] }}" class="form-control" style="width: 60px; padding: 4px; height: 45px;">
                            <input type="text" value="{{ $settings['logo_green_700'] }}" class="form-control" readonly style="flex: 1; background: #f8fafc;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Primary Light Green (500)</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="color" name="logo_green_500" value="{{ $settings['logo_green_500'] }}" class="form-control" style="width: 60px; padding: 4px; height: 45px;">
                            <input type="text" value="{{ $settings['logo_green_500'] }}" class="form-control" readonly style="flex: 1; background: #f8fafc;">
                        </div>
                    </div>

                    <h4 style="margin: 30px 0 20px 0; font-size: 15px; border-bottom: 1px solid var(--border); padding-bottom: 8px;">Legacy Design Colors</h4>
                    
                    <div class="form-group">
                        <label class="form-label">Legacy Primary Green</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="color" name="primary_color" value="{{ $settings['primary_color'] }}" class="form-control" style="width: 60px; padding: 4px; height: 45px;">
                            <input type="text" value="{{ $settings['primary_color'] }}" class="form-control" readonly style="flex: 1; background: #f8fafc;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Legacy Secondary (Orange)</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="color" name="secondary_color" value="{{ $settings['secondary_color'] }}" class="form-control" style="width: 60px; padding: 4px; height: 45px;">
                            <input type="text" value="{{ $settings['secondary_color'] }}" class="form-control" readonly style="flex: 1; background: #f8fafc;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Legacy Dark Background</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="color" name="bg_dark" value="{{ $settings['bg_dark'] }}" class="form-control" style="width: 60px; padding: 4px; height: 45px;">
                            <input type="text" value="{{ $settings['bg_dark'] }}" class="form-control" readonly style="flex: 1; background: #f8fafc;">
                        </div>
                    </div>
                </div>

                <!-- Accent Colors -->
                <div>
                    <h4 style="margin-bottom: 20px; font-size: 15px; border-bottom: 1px solid var(--border); padding-bottom: 8px;">Accent & Contrast Colors</h4>

                    <div class="form-group">
                        <label class="form-label">Gold Accent (Primary Gold)</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="color" name="logo_gold" value="{{ $settings['logo_gold'] }}" class="form-control" style="width: 60px; padding: 4px; height: 45px;">
                            <input type="text" value="{{ $settings['logo_gold'] }}" class="form-control" readonly style="flex: 1; background: #f8fafc;">
                        </div>
                        <small class="form-text">Used for gold accents and secondary highlights.</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Light Gold</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="color" name="logo_gold_light" value="{{ $settings['logo_gold_light'] }}" class="form-control" style="width: 60px; padding: 4px; height: 45px;">
                            <input type="text" value="{{ $settings['logo_gold_light'] }}" class="form-control" readonly style="flex: 1; background: #f8fafc;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Orange Accent</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="color" name="logo_orange" value="{{ $settings['logo_orange'] }}" class="form-control" style="width: 60px; padding: 4px; height: 45px;">
                            <input type="text" value="{{ $settings['logo_orange'] }}" class="form-control" readonly style="flex: 1; background: #f8fafc;">
                        </div>
                        <small class="form-text">Used for urgency and specific highlight elements.</small>
                    </div>
                </div>
            </div>

            <div style="margin-top: 32px; padding-top: 24px; border-top: 1px solid var(--border); display: flex; justify-content: flex-end;">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Update text input when color input changes
    document.querySelectorAll('input[type="color"]').forEach(input => {
        input.addEventListener('input', (e) => {
            e.target.nextElementSibling.value = e.target.value.toUpperCase();
        });
    });
</script>
@endpush
@endsection
