<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO | Home</title>
</head>
<body>
    <h1>All your FORMsss...</h1>
    <h1>Form Upload PDF File</h1>

    <form action="/internform" method="post" enctype="multipart/form-data">
        @csrf
        <br>
        <input type="text" name="form_name">
        <br>
        <input type="text" name="mime">
        <br>
        <input type="file" name="intern_form">
        <br> <br>
        <input type="submit" value="Upload">
    </form>

    <h1>All of FORMsss...</h1>
    @foreach($data as $row)
        <li>
            {{$row->form_name}} 
            <embed src='{{$row->intern_form}}' width="300px" height="300px" /> 
        </li>
    @endforeach
    
</body>
</html>