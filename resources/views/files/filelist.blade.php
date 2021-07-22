<!DOCTYPE html>
<html lang="en">
<head>
    <title>File Management</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="max-w-lg mx-auto py-8">
    <form action="/internfile" method="post" class="flex items-center justify-between border border-gray-300 p-4 rounded" enctype="multipart/form-data">
        @csrf
        <input type="file" name="internfile" id="internfile">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Upload File</button>
    </form>
</div>
</body>
</html>