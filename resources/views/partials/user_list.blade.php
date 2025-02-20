@if($users->isEmpty())
    <table id="userTable" class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Billing Cycle</th>
                <th>Balance</th>
                <th>Surplus Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" class="text-center text-muted">No users found.</td>
            </tr>
        </tbody>
    </table>
@else
    <table id="userTable" class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Billing Cycle</th>
                <th>Balance</th>
                <th>Surplus Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->billing_cycle_title }}</td>
                    <td>${{ number_format((float) $user->balance, 2, '.', ',') ?? 'N/A' }}</td>
                    <td>${{ number_format((float) $user->surplus_amount, 2, '.', ',') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
