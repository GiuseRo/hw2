

<?php $__env->startSection('title', 'il SITOO'); ?>

<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href="<?php echo e(asset('css/home.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('js/home.js')); ?>" defer></script>
<script type="text/javascript">
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('one'); ?>
<div class="s_nav">                    
                   <button id="condividi">condividi squadra</button>
                </div > 
                <div class='hidden'>
                <form  autocomplete="off">
                <label>ANNO: <select id='anno' name='anno'>
                        <option value="2021">2021-2022</option>
                        <option value="2020">2020-2021</option>
                        <option value="2019">2019-2020</option>
                        <option value="2018">2018-2019</option>
                        <option value="2017">2017-2018</option>
                        <option value="2016">2016-2017</option>
                        <option value="2015">2015-2016</option>
                        <option value="2014">2014-2015</option>
                        <option value="2013">2013-2014</option>
                        <option value="2012">2012-2013</option>
                        <option value="2011">2011-2012</option>
                        <option value="2010">2010-2011</option>
                        </select>
                    </label>       
                <label ><h3 >cerca la squadra da condividere </h3></label>
                        <label>Campionato: <select id='campionato' name='campionato'>
                        <option value="ita.1">Serie A</option>
                        <option value="eng.1">Premier League</option>
                        <option value="esp.1">Liga spagnola</option>
                        <option value="fra.1">Ligue</option>
                        <option value="ger.1">Bundesliga</option>
                        </select>
                    </label>

                    <label >Squadra:<input id="squadra" type="text" name=squadra></label>
                    <label id='invio'>&nbsp;<input class='submit' type='submit'value="cerca"></label>
                    
                </form>
                <div ><button id='nascondi'>nascondi ricerca</button></div>
            </div>
<?php $__env->stopSection(); ?>
<!--
<?php $__env->startSection('two'); ?>
<div id='nuovo'></div>
<?php $__env->stopSection(); ?>-->
<?php echo $__env->make('layouts.pri', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\giuse\Desktop\hw2\resources\views/home.blade.php ENDPATH**/ ?>