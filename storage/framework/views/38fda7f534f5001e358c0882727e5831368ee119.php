

<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenuto'); ?>
<h1>ACCESSO AL SITO</h1>
    <main class=login>
    <form method="post" action="<?php echo e(route('login')); ?>">
      <?php echo csrf_field(); ?>
      <label>Nome Utente: <input type='text' name='username' value="<?php echo e(old('username')); ?>"></label>
      <label>Password: <input type='password' name='password'></label>
      <label>&nbsp;<input type='submit'value="entra"></label>
     
      <a href="<?php echo e(route('register')); ?>">non hai un accont? crealo!</a>
    </form>
    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\giuse\Desktop\hw2\resources\views/login.blade.php ENDPATH**/ ?>