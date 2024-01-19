<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .custom-field{
            padding: 10px;
        }
    </style>
</head>
<body>
    <?= $name; ?>


    <?= 
        do_shortcode(
            '[
                simple_shortcode name="arash" lname="narimani"
            ]'
        ) 
    ?>


    <?=
        form(route('/store', '12'), 'POST')
            ->render('SimpleForm');
    ?>
    <?=
        html()->section('Nav')
    ?>
</body>
</html>