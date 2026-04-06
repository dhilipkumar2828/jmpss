@extends('layouts.admin')

@section('title', 'Manage Students')
@section('page-title', 'Students Database')

@section('content')
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('admin.students.index') }}" method="GET" class="filter-form" id="filter-form">
            <div class="grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 15px;">
                <div class="form-group">
                    <label>Filter by Standard</label>
                    <select name="standard" id="filter-standard" class="form-control" onchange="this.form.submit()">
                        <option value="">All Standards</option>
                        @foreach($standards as $std)
                        <option value="{{ $std->standard }}" {{ request('standard') == $std->standard ? 'selected' : '' }}>{{ $std->standard }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Filter by Section</label>
                    <select name="section" id="filter-section" class="form-control" onchange="this.form.submit()">
                        <option value="">All Sections</option>
                        @foreach($sections as $sec)
                        <option value="{{ $sec->section }}" {{ request('section') == $sec->section ? 'selected' : '' }}>{{ $sec->section }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Search Student</label>
                    <div style="display: flex; gap: 8px;">
                        <input type="text" name="search" class="form-control" placeholder="Name..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div class="form-group" style="display: flex; align-items: flex-end; gap: 10px;">
                    <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Reset</a>
                    <a href="{{ route('admin.students.create') }}" class="btn btn-dark"><i class="fas fa-user-plus"></i> Add Student</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h3>Student List</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Child Name</th>
                        <th>Standard & Section</th>
                        <th>Parents Details</th>
                        <th>Contact Info</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr>
                        <td>{{ ($students->currentPage() - 1) * $students->perPage() + $loop->iteration }}</td>
                        <td><strong>{{ $student->child_name }}</strong></td>
                        <td>{{ $student->category->standard }} - {{ $student->category->section }}</td>
                        <td style="font-size: 13px;">
                            F: {{ $student->father_name }} <br>
                            M: {{ $student->mother_name }}
                        </td>
                        <td style="font-size: 13px;">
                            <i class="fas fa-envelope"></i> {{ $student->email ?? 'N/A' }} <br>
                            <i class="fab fa-whatsapp"></i> {{ $student->whatsapp_number ?? 'N/A' }}
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteStudent({{ $student->id }})"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: #666;">No students found matching your search.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
    function deleteStudent(id) {
        Swal.fire({
            title: 'Delete Student?',
            text: "This record will be permanently removed.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.createElement('form');
                form.action = `/admin/students/${id}`;
                form.method = 'POST';
                form.innerHTML = `<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="DELETE">`;
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>
@endpush
@endsection
