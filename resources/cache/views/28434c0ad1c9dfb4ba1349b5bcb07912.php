<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>
<body>
    <?php if(session()->has('success')): ?>
        <p><?php echo e(session()->get('success')); ?></p>
    <?php endif; ?>
    <form action="<?php echo e(route('form-store')); ?>" method="post">
        <?php csrf_token(); ?>
        <label for="">نام</label>
        <input type="text" name="name"><br><br>
        <input type="submit" value="ثبت اطلاعات">
    </form>
</body>
</html><?php /**PATH C:\xampp\htdocs\wordcool\wp-content\plugins\wordcool-new-master\resources\views/form/form.blade.php ENDPATH**/ ?>