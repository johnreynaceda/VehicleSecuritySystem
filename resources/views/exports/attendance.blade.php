<div>
    <table>
        <thead>
            <tr>
                <th>FULLNAME</th>
                <th>USER TYPE</th>
                <th>TIME IN</th>
                <th>TIME OUT</th>
                <th>DATE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $item)
                <tr>
                    <td class="">{{ $item->fullname }}</td>
                    <td class="">{{ $item->user_type }}</td>
                    <td class="">{{ \Carbon\Carbon::parse($item->time_in)->format('F d, Y') }}</td>
                    <td class="">
                        {{ $item->time_out == null ? '--' : \Carbon\Carbon::parse($item->time_out)->format('F d, Y') }}
                    </td>
                    <td class="">{{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
