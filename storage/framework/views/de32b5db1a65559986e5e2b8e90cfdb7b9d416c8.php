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

<header class='ben'data-user="<?php echo e($user['username']); ?>"> 
        <h1>Benvenuto  <!-- farsi tornare username dell'utente connesso --><?php echo e($user['username']); ?> </h1>
        <h2>Social-Ball</h1>
    </header>

<body>
    <header>
            <nav>
                <div id="nav">
                </div>

                <div class="l_nav">
                    <a href="<?php echo e(route('home')); ?>" >Home</a>
                    
                    <a href="<?php echo e(route('logout')); ?>">Logout</a><br><br>
                </div>
                <?php echo $__env->yieldContent('one'); ?>
            </nav>
    </header>   
                <main class="fixed">
            <section id="profile" >
                <div class="name">
                    Profilo Loggato: <br>
                    nome: <?php echo e($user['name']); ?> <br>
                   cognome:  <?php echo e($user['surname']); ?> 
                </div>
                <div class="username">
                    username:  <?php echo e('@'.$user['username']); ?> 
                </div>
                    <div class="stats" >
                        <br>
                        <a href="<?php echo e(route('preferito')); ?>"><span class="count">Preferiti:
                        <?php echo e($user['npreferiti']); ?></span></a>
                        
                    </div>
                     
                    <p><a  href="<?php echo e(route('logout')); ?>">esci dal sito</a></p>
                   

            </section> 
    </main>
    
    
        <section id="center">   
           <!-- <?php echo $__env->yieldContent('two'); ?>-->
         </section>
        
    
</body>
</html><?php /**PATH C:\Users\giuse\Desktop\hw2\resources\views/layouts/pri.blade.php ENDPATH**/ ?>