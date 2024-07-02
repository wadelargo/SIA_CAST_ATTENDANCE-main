<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <h1>Students</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Qr Code</th>
                <th>ID</th>
                <th>Full Name</th>
                <th>Year Level</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @php $count = 0; @endphp
            @foreach($students as $student)
                @if($count++ >= 10)
                <tr class="page-break"></tr>
                @php $count = 1; @endphp
                @endif
                <tr>
                    <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(80)->generate($student->id . ' - ' . $student->full_name)) }}" alt="QR Code"></td>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->full_name }}</td>
                    <td>{{ $student->year_level }}</td>
                    <td>{{ $student->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
