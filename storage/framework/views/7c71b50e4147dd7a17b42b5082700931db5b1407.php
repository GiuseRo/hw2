<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->yieldContent('style'); ?>
    <?php echo $__env->yieldContent('script'); ?>
    
</head>
<body>
    <?php echo $__env->yieldContent('contenuto'); ?>
</body>
</html><?php /**PATH C:\Users\giuse\Desktop\hw1\resources\views/layouts/guest.blade.php ENDPATH**/ ?>