<div>
        {{-- Summary Cards --}}
    <div class="row text-center m-4 justify-content-center gx-3">
        <div class="col-6 col-md-2">
            <div class="card bg-primary text-white p-3 mb-3">
                <h5>Total Working Days</h5>
                <h3>{{ $summary['working_days'] }}</h3>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card bg-success text-white p-3 mb-3">
                <h5>Present Days</h5>
                <h3>{{ $summary['present_days'] }}</h3>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card bg-info text-white p-3 mb-3">
                <h5>Work From Home</h5>
                <h3>{{ $summary['wfh_days'] }}</h3>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card bg-warning text-white p-3 mb-3">
                <h5>Leaves Taken</h5>
                <h3>{{ $summary['leave_days'] }}</h3>
            </div>
        </div>
        <div class="col-6 col-md-2">
            <div class="card bg-danger text-white p-3 mb-3">
                <h5>Absent Days</h5>
                <h3>{{ $summary['absent_days'] }}</h3>
            </div>
        </div>
    </div>

    {{-- Attendance Marking Form --}}
    <div class="row m-4">
        <div class="col-md-6">
            <div class="mb-5 p-4 border rounded shadow-sm bg-white">
                <h4 class="mb-3 text-center">Mark Today's Attendance</h4>
                <form wire:submit.prevent="markTodayAttendance">
                    <div class="form-group mb-3">
                        <label for="status" class="fw-semibold">Select Status:</label>
                        <select wire:model="status" id="status" class="form-select form-select-lg @error('status') is-invalid @enderror">
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                            <option value="wfh">Work From Home</option>
                            <option value="leave">Leave</option>
                        </select>
                        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100 btn-lg">Mark Attendance</button>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            {{-- FullCalendar --}}
            <div class="mb-5 p-4 border rounded shadow-sm bg-white">
                <h4 class="mb-3">Attendance Calendar</h4>
                <div wire:ignore id="calendar" style="max-width: 900px; margin: auto;"></div>
            </div>
        </div>
    </div>

    <div class="row m-4 gx-4">
        {{-- Attendance Table --}}
        <div class="col-md-6 mb-4">
            <h4>Last Attendances</h4>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $attendance)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d M, Y') }}</td>
                            <td>
                                <span class="badge 
                                    {{ $attendance->status === 'present' ? 'bg-success' : '' }}
                                    {{ $attendance->status === 'absent' ? 'bg-danger' : '' }}
                                    {{ $attendance->status === 'wfh' ? 'bg-info' : '' }}
                                    {{ $attendance->status === 'leave' ? 'bg-warning text-dark' : '' }}
                                ">
                                    {{ ucfirst($attendance->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $attendances->links() }}
        </div>

        {{-- Leave Requests Table --}}
        <div class="col-md-6 mb-4">
            <h4>Last 5 Leave Requests</h4>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($leaveRequests as $leave)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($leave->start_date)->format('d M, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($leave->end_date)->format('d M, Y') }}</td>
                            <td>{{ $leave->reason }}</td>
                            <td>
                                <span class="badge 
                                    {{ $leave->status === 'approved' ? 'bg-success' : '' }}
                                    {{ $leave->status === 'pending' ? 'bg-warning text-dark' : '' }}
                                    {{ $leave->status === 'rejected' ? 'bg-danger' : '' }}
                                ">
                                    {{ ucfirst($leave->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $leaveRequests->links() }}
        </div>
    </div>

    @push('styles')
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css' rel='stylesheet' />
    @endpush

    @push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>
        document.addEventListener('livewire:load', function () {
            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 450,
                events: @json($calendarEvents), // ✅ initial events
            });

            calendar.render();

            Livewire.on('calendarUpdated', data => {
                calendar.removeAllEvents();
                calendar.addEventSource(data.events);
            });
        });
    </script>
    @endpush
</div>
