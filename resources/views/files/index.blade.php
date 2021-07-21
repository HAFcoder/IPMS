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
        <h3>Upload File</h3>
        <div class="card col-sm-12">
            <form action="{{ url('/store') }}" method="POST" enctype="multipart/form-data" class="form-inline">         
                @csrf
                <div class="form-group">
                    <label for="file">Select File</label>
                    <input class="form-control-file" type="file" name="file" id="file">
                </div>
                    <button type="submit" class="btn btn-primary mb-2">Upload</button>
 
            </form>
        </div>
    </div>
               
    <div class="row">
        <h3>Files</h3>
        <div class="card col-sm-12">
            @if (count($files) > 0)
                @foreach ($files as $file)
                    <a href="{{ url($file['downloadUrl']) }}">{{ $file->name }}</a>
                    <form action="{{ url($file['removeUrl']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-default">Remove</button>
                    </form>
                @endforeach
            @else
                <p>Nothing found</p>
            @endif
        </div>
    </div>
    
</body>
</html>