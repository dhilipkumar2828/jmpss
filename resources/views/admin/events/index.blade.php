@extends('layouts.admin')
@section('title', 'Events')
@section('page-title', 'Events')
@section('breadcrumb', 'Admin / Events')
@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
    <div class="page-title" style="margin:0">
        <h2>📅 Events</h2>
        <p>Manage all school events</p>
    </div>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add Event</a>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #edf2f7; padding-bottom: 1rem;">
        <div>
             <span id="selected-count" class="badge badge-info">0 selected</span>
        </div>
        <div>
            <button type="button" id="bulk-mail-btn" class="btn btn-info" onclick="openBulkMail()" disabled>
                <i class="fas fa-envelope"></i> Send Event Update via Mail
            </button>
        </div>
    </div>
    <div class="card-body" style="padding:0">
        <form id="bulk-action-form" action="{{ route('admin.events.send-bulk-mail') }}" method="POST">
            @csrf
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>S.No</th>
                            <th>Event</th>
                            <th>Date</th>
                            <th>Venue</th>
                            <th>Category</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($events as $event)
                        <tr>
                            <td><input type="checkbox" name="event_ids[]" value="{{ $event->id }}" class="event-checkbox"></td>
                            <td style="color:var(--text-muted);font-size:13px;">{{ ($events->currentPage() - 1) * $events->perPage() + $loop->iteration }}</td>
                            <td>
                                <div style="display:flex;align-items:center;gap:12px;">
                                    @if($event->image)
                                        <div style="width:40px;height:40px;border-radius:6px;overflow:hidden;background:#f8fafc;flex-shrink:0;">
                                            <img src="{{ asset($event->image) }}" style="width:100%;height:100%;object-fit:cover;">
                                        </div>
                                    @else
                                        <div style="width:40px;height:40px;border-radius:6px;background:#f1f5f9;display:grid;place-items:center;color:#94a3b8;flex-shrink:0;">
                                            <i class="fas fa-image" style="font-size:14px;"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div style="font-weight:700;font-size:14px;">{{ $event->title }}</div>
                                        <div style="font-size:12px;color:var(--text-muted);">{{ Str::limit($event->description, 60) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="white-space:nowrap;font-size:13px;">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                            <td style="font-size:13px;color:var(--text-muted);">{{ $event->venue ?? '—' }}</td>
                            <td>@if($event->category)<span class="badge badge-info">{{ $event->category }}</span>@else <span style="color:var(--text-muted)">—</span>@endif</td>
                            <td>@if($event->is_featured)<span class="badge badge-warning">⭐ Yes</span>@else<span class="badge badge-gray">No</span>@endif</td>
                            <td><span class="badge {{ $event->is_active ? 'badge-success' : 'badge-gray' }}">{{ $event->is_active ? 'Active' : 'Draft' }}</span></td>
                            <td>
                                <div style="display:flex;gap:6px;">
                                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-outline btn-sm"><i class="fas fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event, {{ $event->id }})"><i class="fas fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="9" style="text-align:center;padding:48px;color:var(--text-muted);">
                            <div style="font-size:40px;margin-bottom:12px;">📅</div>
                            No events yet. <a href="{{ route('admin.events.create') }}" style="color:var(--primary);font-weight:600;">Add one now</a>
                        </td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
<div style="margin-top:20px;">{{ $events->links() }}</div>

{{-- Bulk Mail Modal --}}
<div id="bulkMailModal" style="display:none; position:fixed; z-index: 9999; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">
    <div style="background:white; max-width:600px; margin: 50px auto; padding:30px; border-radius:12px; position:relative; max-height: 90vh; overflow-y: auto;">
        <span style="position:absolute; right:20px; top:20px; cursor:pointer; font-size: 24px; font-weight: bold; color: #555;" onclick="closeBulkMail()">&times;</span>
        <h3 style="margin-bottom: 25px; color: var(--primary);">Email Event Updates </h3>
        
        <form id="modal-mail-form" action="{{ route('admin.events.send-bulk-mail') }}" method="POST">
            @csrf
            {{-- Hidden fields for selection --}}
            <div id="hidden-inputs"></div>
            
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Target Standard</label>
                        <select name="standards[]" id="standard-select2" class="form-control select2" multiple data-placeholder="Choose Standards...">
                            @foreach($standards as $std)
                                <option value="{{ $std }}">{{ $std }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Target Section</label>
                        <select name="sections[]" id="section-select2" class="form-control select2" multiple data-placeholder="Select Standard First">
                            {{-- Dynamically loaded --}}
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label class="form-label" style="display: flex; justify-content: space-between; align-items: center;">
                    Select Events
                    <span id="event-count" class="badge badge-info shadow-sm" style="font-size: 11px; padding: 4px 10px;">0 selected</span>
                </label>
                <div class="events-selector" style="border: 1.5px solid var(--border); border-radius: 12px; background: #fff; overflow: hidden; box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);">
                    <div style="padding: 10px 14px; border-bottom: 1px solid var(--border); background: #f8fafc; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-search" style="color: var(--text-muted); font-size: 13px;"></i>
                        <input type="text" id="event-search-box" placeholder="Quick search events..." class="form-control" style="border: none; padding: 0; background: transparent; font-size: 13px; height: auto; box-shadow: none;">
                    </div>
                    <div id="events-list-container" style="max-height: 180px; overflow-y: auto; padding: 6px;">
                        @foreach($allEvents as $e)
                            <div class="event-item-row" style="padding: 10px 12px; border-radius: 8px; display: flex; align-items: center; gap: 12px; cursor: pointer; transition: all 0.2s; margin-bottom: 2px;" onclick="toggleEvCheck(this)">
                                <div class="custom-chk-box" style="width: 18px; height: 18px; border: 2px solid var(--border); border-radius: 5px; display: grid; place-items: center; transition: all 0.2s; flex-shrink: 0;">
                                    <i class="fas fa-check" style="font-size: 10px; color: white; display: none;"></i>
                                </div>
                                <input type="checkbox" name="event_ids_dropdown[]" value="{{ $e->id }}" id="ev-{{ $e->id }}" style="display: none;" onchange="updateEvCount()">
                                <label for="ev-{{ $e->id }}" style="font-size: 13px; cursor: pointer; flex: 1; margin: 0; font-weight: 500; color: var(--text);">
                                    {{ $e->title }}
                                    <small style="display: block; color: var(--text-muted); font-size: 11px; font-weight: 400;">{{ \Carbon\Carbon::parse($e->event_date)->format('d M Y') }}</small>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="subject" value="">
            
            <div class="form-group" style="margin-bottom: 25px;">
                <label>Message Content</label>
                <textarea name="message" rows="5" class="form-control" required placeholder="Type your message to parents here. The selected event details will automatically be appended below your message."></textarea>
                <small class="text-muted" style="display: block; margin-top: 5px;">* The selected event details (title, date, description) will be appended to the bottom of the email.</small>
            </div>
            
            <div style="text-align: right;">
                <button type="submit" class="btn btn-info" style="padding: 10px 30px;">
                    <i class="fas fa-paper-plane"></i> Dispatch Email
                </button>
            </div>
        </form>
    </div>
</div>

<form id="delete-form" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

@endsection

@push('scripts')
<script>
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.event-checkbox');
    const bulkMailBtn = document.getElementById('bulk-mail-btn');
    const selectedCount = document.getElementById('selected-count');

    selectAll.addEventListener('change', () => {
        checkboxes.forEach(cb => cb.checked = selectAll.checked);
        updateUI();
    });

    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateUI);
    });

    function updateUI() {
        const checkedCount = document.querySelectorAll('.event-checkbox:checked').length;
        selectedCount.innerText = checkedCount + ' selected';
        bulkMailBtn.disabled = checkedCount === 0;
    }

    // Premium Event Selector Logic
    $(document).ready(function() {
        $('#event-search-box').on('keyup', function() {
            let value = $(this).val().toLowerCase();
            $('#events-list-container .event-item-row').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    function toggleEvCheck(div) {
        if (event.target.tagName !== 'INPUT' && event.target.tagName !== 'LABEL') {
            const checkbox = div.querySelector('input[type="checkbox"]');
            checkbox.checked = !checkbox.checked;
            updateEvCount();
        }
    }

    function updateEvCount() {
        const rows = document.querySelectorAll('.event-item-row');
        let selectedCount = 0;

        rows.forEach(row => {
            const cb = row.querySelector('input[type="checkbox"]');
            const chkBox = row.querySelector('.custom-chk-box');
            const icon = chkBox.querySelector('i');
            
            if(cb.checked) {
                selectedCount++;
                row.style.background = '#eef2ff';
                row.style.borderLeft = '4px solid var(--primary)';
                chkBox.style.background = 'var(--primary)';
                chkBox.style.borderColor = 'var(--primary)';
                icon.style.display = 'block';
            } else {
                row.style.background = 'transparent';
                row.style.borderLeft = 'none';
                chkBox.style.background = 'white';
                chkBox.style.borderColor = 'var(--border)';
                icon.style.display = 'none';
            }
        });
        
        document.getElementById('event-count').innerText = selectedCount + ' selected';
    }
    // Initialize Select2 and Premium Filter Logic
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%',
            dropdownParent: $('#bulkMailModal'),
            placeholder: function() {
                return $(this).data('placeholder');
            },
            allowClear: true
        });

        $('#standard-select2').on('change', function() {
            let selectedStandards = $(this).val();
            let sectionSelect = $('#section-select2');
            
            if (selectedStandards && selectedStandards.length > 0) {
                let standardsList = selectedStandards.join(',');
                $.ajax({
                    url: '/admin/get-sections/' + standardsList,
                    type: 'GET',
                    success: function(data) {
                        let currentSelections = sectionSelect.val() || [];
                        sectionSelect.empty();
                        data.forEach(item => {
                            if (item.section) {
                                let isSelected = currentSelections.includes(item.section) ? 'selected' : '';
                                sectionSelect.append(`<option value="${item.section}" ${isSelected}>${item.section}</option>`);
                            }
                        });
                        sectionSelect.trigger('change');
                    }
                });
            } else {
                sectionSelect.empty().trigger('change');
            }
        });
    });

    function openBulkMail() {
        const hiddenInputs = document.getElementById('hidden-inputs');
        hiddenInputs.innerHTML = '';
        
        // This function now primarily handles student selection if we went that route, 
        // but since the form is about sending TO certain students based on filters OR 
        // specific selections, we keep the hidden inputs for the specific checkbox selections.
        document.querySelectorAll('.event-checkbox:checked').forEach(cb => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'event_ids[]';
            input.value = cb.value;
            hiddenInputs.appendChild(input);
        });

        document.getElementById('bulkMailModal').style.display = 'block';
    }    function closeBulkMail() {
        document.getElementById('bulkMailModal').style.display = 'none';
    }


    function confirmDelete(event, id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                let deleteForm = document.getElementById('delete-form');
                deleteForm.action = '/admin/events/' + id;
                deleteForm.submit();
            }
        });
    }
</script>
@endpush
