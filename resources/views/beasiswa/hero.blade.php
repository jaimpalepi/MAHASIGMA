<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Edit Hero</title>
</head>

<body>
    <form action="{{ route('hero.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="heroImage">Hero Image</label>
        <input type="file" name="heroImage" id="heroImage" value="{{$hero->heroImage}}">

        <label for="bigText">Big Text</label>
        <input type="text" name="bigText" id="bigText" value="{{$hero->bigText}}">

        <label for="smallText">Small Text</label>
        <input type="text" name="smallText" id="smallText" value="{{$hero->bigText}}">

        <button>Submit</button>
    </form>
</body>

</html>
