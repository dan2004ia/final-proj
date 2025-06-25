<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
</head>
<body>
    <h1> Hello ,,, {{$name}} </h1>

     <form action="about" method="post">
       @csrf
       <input type="text" name= "name" id="name"><br><br>
       <select name="Department" id ="Department">
        @foreach ($departments as $key => $department )
         <option value = "{{$key}}">{{$department}}</option>
         <!-- <option value="2"> Financial</option>
         <option value="3"> Sales</option> -->
         @endforeach
       </select><br><br>
       <input type="submit" value= "Send">

    
    </form>
</body>
</html>
