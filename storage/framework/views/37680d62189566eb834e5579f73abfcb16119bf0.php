

<?php $__env->startSection('title', 'Preferiti'); ?>

<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href="<?php echo e(asset('css/favorite.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/favorite.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('one'); ?>
<div >
  <h1>I TUOI PREFERITI: </h1>
 </div> 
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.pri', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\giuse\Desktop\hw1\resources\views/favorite.blade.php ENDPATH**/ ?>