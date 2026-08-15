<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 10px; color: #222; }
        h1 { font-size: 16px; margin: 0 0 4px; }
        .meta { color: #666; margin-bottom: 10px; font-size: 9px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #1F4E79; color: #fff; text-align: left; padding: 4px; font-size: 9px; }
        td { border: 1px solid #ccc; padding: 3px; font-size: 8px; vertical-align: top; }
        .note { margin-top: 8px; color: #a00; font-size: 9px; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <div class="meta">Generated: {{ $generated }} · Rows shown: {{ $rows->count() }}{{ $truncated ? " of {$total}" : '' }}</div>
    <table>
        <thead>
            <tr>
                @foreach ($headings as $heading)
                    <th>{{ $heading }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $row)
                <tr>
                    @foreach ($headings as $heading)
                        <td>
                            @if (is_array($row) && array_key_exists($heading, $row))
                                {{ $row[$heading] }}
                            @elseif (is_array($row))
                                {{ array_values($row)[$loop->index] ?? '' }}
                            @else
                                {{ $row }}
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    @if ($truncated)
        <p class="note">PDF capped at {{ $limit }} rows. Full dataset is in the Excel/CSV export.</p>
    @endif
</body>
</html>
