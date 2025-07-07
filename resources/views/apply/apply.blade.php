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
            <th>TITLE</th>
            <th>DESCRIPTION</th>
            <th>PROVIDER</th>
            <th>AMOUNT</th>
            <th>QUOTA</th>
            <th>DEADLINE</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
        @foreach ($beasiswas as $b)
            <tr>
                <td>{{ $b->title }}</td>
                <td>{{ $b->description }}</td>
                <td>{{ $b->provider }}</td>
                <td>{{ $b->amount }}</td>
                <td>{{ $b->quota }}</td>
                <td>{{ $b->deadline }}</td>
                <td>{{ $b->status }}</td>
                <td>
                    <a href="{{ route('apply_scholarship', ['id' => $b->id]) }}"></a>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>