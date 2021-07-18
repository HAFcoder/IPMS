<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Demo Upload</title>
</head>

<body>
    <h1>Form Upload PDF File</h1>

    <form action="/createinternform" method="post" enctype="multipart/form-data">
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
</body>