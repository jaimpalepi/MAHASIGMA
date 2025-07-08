<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>APPLICANT NAME</th>
            <th>SCHOLARSHIP</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
        @foreach ($applicants as $a)
            <tr>
                <td>{{ $a->applicant_name }}</td>
                <td>{{ $a->beasiswa?->title }}</td>
                <td>{{ $a->status }}</td>
                <td>
                    <a href="{{route('applicant.detail', ['id' => $a->id])}}">Detail</a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>