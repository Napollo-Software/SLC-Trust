@if($users->isEmpty())
    <table id="userTable" class="table table-hover  mb-0">
        <thead>
            <tr>
                <th class="">Name</th>
                <th class="">Email</th>
                <th class="">Phone</th>
                <th class="">Billing Cycle</th>
                <th class="">Balance</th>
                <th class="">Surplus Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" ><div class="text-center text-muted d-flex align-items-center w-100 justify-content-center" style="height:127px">
                No record found.
                </div></td>
            </tr>
        </tbody>
    </table>
@else
    <table id="userTable" class="table table-hover">
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
                    <td>{{ $user->full_name() }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-nowrap">{{ $user->phone }}</td>
                    <td class="text-nowrap">{{ $user->billing_cycle_title }}</td>
                    <td>${{ number_format((float) $user->balance, 2, '.', ',') ?? 'N/A' }}</td>
                    <td>${{ number_format((float) $user->surplus_amount, 2, '.', ',') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
