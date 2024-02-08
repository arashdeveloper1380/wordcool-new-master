<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>
<body>
    @if (session()->has('success'))
        <p>{{ session()->get('success') }}</p>
    @endif
    <form action="{{ route('form-store') }}" method="post">
        <?php csrf_token(); ?>
        <label for="">نام</label>
        <input type="text" name="name"><br><br>
        <input type="submit" value="ثبت اطلاعات">
    </form>
</body>
</html>