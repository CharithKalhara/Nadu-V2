<!DOCTYPE html>
<html>

<head>
    <style>
        body {
        font-family: iskoola;
        font-size: 12pt;
        line-height: 1.4;
    }

    .title {
        text-align: center;
        font-size: 18pt;
        font-weight: bold;
        margin-bottom: 12px;
    }

    .subtitle {
        text-align: left;
        font-size: 11pt;
        margin-bottom: 15px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        border: 1px solid #000;
        background: #E5E7EB;
        padding: 8px;
        text-align: center;
        font-size: 12pt;
        font-weight: bold;
    }

    td {
        border: 1px solid #000;
        padding: 8px;
        font-size: 12pt;
    }

    .center {
        text-align: center;
    }

    .page-break {
        page-break-after: always;
    }
    </style>
</head>

<body>

<h2 class="title">උසාවි ගත කිරීමට ඇති නඩු වාර්තාව</h2>

<div class="subtitle">
    Generated on {{ now()->format('Y-m-d H:i') }}
</div>

@foreach($data->chunk(50) as $chunk)

<table>
    <thead>
        <tr>
            <th width="10%">වර්ෂය</th>
            <th width="14%">තිරක අංකය</th>
            <th width="40%">සමිතිය</th>
            <th width="15%">ලැබුණු දිනය</th>
            <th width="15%">නඩු අංකය</th>
        </tr>
    </thead>

    <tbody>
        @foreach($chunk as $row)
        <tr>
            <td class="center">{{ $row->year }}</td>
            <td class="center">{{ $row->thiraka_no }}</td>
            <td>{{ $row->samithiya }}</td>
            <td class="center">{{ $row->recieved_date }}</td>
            <td class="center">{{ $row->nadu_no }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@if(!$loop->last)
<div class="page-break"></div>
@endif

@endforeach

</body>
</html>