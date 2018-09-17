<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Markdown编辑器</title>
    {!! editor_css() !!}
</head>
<body>
    <div class="container" style="margin:0 auto;">
        <textarea name="" id="meditor"></textarea>
    </div>
    {!! editor_js() !!}
    {!! editor_config('meditor','meditor-1') !!}
</body>
</html>