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
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets as $ticket)
                    <tr wire:key="ticket-{{ $ticket->id }}">
                        <td>{{ $ticket->user->name }}</td>
                        <td>{{ $ticket->user->email }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->message }}</td>
                        <td>{{$ticket->status}}</td>
                        {{-- Display created_at in a readable format --}}
                        <td>{{ $ticket->created_at->format('Y-m-d H:i:s') }}</td>

                        {{-- Dropdown --}}
                        <td>
                            <select class="form-select form-select-sm" wire:change="updateStatus({{ $ticket->id }}, $event.target.value)">
                                <option value="open" @selected($ticket->status === 'open')>Open</option>
                                <option value="pending" @selected($ticket->status === 'pending')>Pending</option>
                                <option value="closed" @selected($ticket->status === 'closed')>Closed</option>
                            </select>
                        </td>

                    </tr>
                @empty

                    <tr>
                        <td colspan="7" class="text-center">No tickets found.</td>
                    </tr>
                @endforelse
            </tbody>
           
        </table>
    </div>
    <div class="mt-3">
        {{ $tickets->links('pagination::bootstrap-4') }}
    </div>

</div>
