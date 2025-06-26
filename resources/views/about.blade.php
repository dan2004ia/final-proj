<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello,,{{$name}}</h1>
    <form action="about" method="post">
        @csrf
        <input type="text" name="name" id="name"><br><hr>

        <select name="department" id="department">
            @foreach ($departments as $key=> $department)
            <option value="{{$key}}">{{$department}}</option>
            @endforeach
        </select><br><hr>
        <input type="submit" value="Send">
    </form>
</body>
</html>
   