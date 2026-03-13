@extends('layouts.admin')

@section('title', 'Visit Requests')
@section('page-title', 'Visit Requests')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Campus Visit Requests</h3>
    </div>
    <div class="card-body">
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Visit Date</th>
                        <th>Time</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Purpose</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                    <tr>
                        <td>{{ ($requests->currentPage() - 1) * $requests->perPage() + $loop->iteration }}</td>
                        <td><strong>{{ \Carbon\Carbon::parse($request->visit_date)->format('d M Y') }}</strong></td>
                        <td>{{ $request->visit_time }}</td>
                        <td>{{ $request->name }}</td>
                        <td>{{ $request->email }}</td>
                        <td>{{ $request->mobile }}</td>
                        <td title="{{ $request->purpose }}">{{ Str::limit($request->purpose, 30) }}</td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <form action="{{ route('admin.visit-requests.destroy', $request->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $requests->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@endpush
