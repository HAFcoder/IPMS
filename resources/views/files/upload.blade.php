<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Management</title>
</head>
<body>
             
    <div class="row">
        <h3>Files</h3>
        <div class="card col-sm-12">
            @if (count($files) > 0)
                @foreach ($files as $file)
                    <a href="{{ url($file['downloadUrl']) }}">{{ $file['filename'] }}</a><br>
                @endforeach
            @else
                <p>Nothing found</p>
            @endif
        </div>
    </div>
    
</body>
</html>