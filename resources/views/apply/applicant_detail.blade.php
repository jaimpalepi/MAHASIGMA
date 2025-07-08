<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>{{ $applicant->applicant_name }}</h1>
    <h3>{{ $applicant->beasiswa?->title }}</h3>
    <p>{!! nl2br(e($applicant->essay)) !!}</p>
    @foreach ($applicant->documents['requirements'] ?? [] as $reqId => $path)
        <p>
            {{ $requirementNames[$reqId] ?? "Requirement $reqId" }}:
            <a href="{{ asset('storage/' . $path) }}" download="{{ basename($path) }}"
                class="text-blue-600 underline hover:text-blue-800">
                Download File
            </a>
        </p>
    @endforeach


</body>

</html>
