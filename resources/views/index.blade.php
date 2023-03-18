<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($reviews as $item)
    <div style="background-color: gray; padding: 5px; border-radius: 5px; margin-bottom: 15px;">
        <p>{{ $item['user']['name'] }}</p>
        <p>{{ $item['text'] }}</p>
    </div>
    @endforeach
</body>

</html>