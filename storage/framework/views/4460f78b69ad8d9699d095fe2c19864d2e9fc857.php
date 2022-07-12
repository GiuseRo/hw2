

<?php $__env->startSection('title', 'Registrazione in corso'); ?>

<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href="<?php echo e(asset('css/register.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/register.js')); ?>" defer></script>
<script type="text/javascript">
    const REGISTER_ROUTE = "<?php echo e(route('register')); ?>";
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contenuto'); ?>
<h1>REGISTRATI AL SITO</h1>
    <main class=registrazione>
    <form method="post" enctype="multipart/form-data" autocomplete="off" action="<?php echo e(route('register')); ?>">
      <?php echo csrf_field(); ?>
      <label class='email'>E-mail: <input type='text' name='email'value="<?php echo e(old('email' )); ?>"autocomplete="email"></label>
      <label class='name'>Nome : <input type='text' name='name'value="<?php echo e(old('name')); ?>"></label>
      <label class='surname'>Cognome: <input type='text' name='surname'value="<?php echo e(old('surname')); ?>"></label>
      <label class='username'>Nome Utente: <input type='text' name='username'value="<?php echo e(old('username')); ?>"></label>
      <label class='password'>Password: <input type='password' name='password'></label>
      <label class='confirm_password'>Conferma Password: <input type='password' name='confirm_password'></label>
      <label>&nbsp;<input type='submit'value="registrati" id='submit'></label>
      <a href="<?php echo e(route('login')); ?>"> hai un accont? accedi!</a>
    </form> 
    </main>
     
         <div class="errorec">
    <div><span class="erroreemail"></span></div>
    <div><span class="errorename"></span> </div>
    <div><span class="erroresurname" ></span></div>
    <div><span class="erroreusername"></span></div>
    <div><span class="errorepassword"></span></div>
    <div><span class="erroreconfirm"></span></div>
        </div>
        <div class="errore"> 
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\giuse\Desktop\hw1\resources\views/register.blade.php ENDPATH**/ ?>