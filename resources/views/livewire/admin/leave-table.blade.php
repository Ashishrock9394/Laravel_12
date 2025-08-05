<div class="container mt-4">
    <div class="mb-3">
        <input type="text" wire:model.debounce.300ms="search" class="form-control" placeholder="Search by name or email...">
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Reason</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leaves as $leave)
                    <tr>
                        <td>{{ $leave->user->name }}</td>
                        <td>{{ $leave->user->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($leave->start_date)->format('Y-m-d') }}</td>
                        <td>{{ \Carbon\Carbon::parse($leave->end_date)->format('Y-m-d') }}</td>
                        <td>{{ $leave->reason }}</td>
                        <td>{{ \Carbon\Carbon::parse($leave->created_at)->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <select class="form-select form-select-sm" wire:change="updateStatus({{ $leave->id }}, $event.target.value)">
                                <option value="pending" @selected($leave->status === 'pending')>Pending</option>
                                <option value="approved" @selected($leave->status === 'approved')>Approved</option>
                                <option value="rejected" @selected($leave->status === 'rejected')>Rejected</option>
                            </select>
                        </td>
                    </tr>                       
                @empty

                    <tr>
                        <td colspan="7" class="text-center">No LeaveRequest found.</td>
                    </tr>
                @endforelse
            </tbody>
           
        </table>
    </div>
    <div class="mt-3">
        {{ $leaves->links('pagination::bootstrap-4') }}
    </div>

</div>
