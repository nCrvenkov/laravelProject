<?php /* C:\laravel\bowen\resources\views/adminPages/adminComments.blade.php */ ?>
<?php $__env->startSection('nav'); ?>
    <div class="w3-bar-block" style="color:#05383b;">
        <a href="/indexAdmin" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
        <a href="/adminComments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Komentari</a>
        <a href="/manageUsers" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Upravljanje Korisnicima</a>
        <a href="/manageAppointments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Upravljanje Terminima</a>
        <a href="/adminMessages" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Poruke</a>
        <a href="/logout" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="w3-container"  style="margin-top:80px;min-height: 530px;" id="showcase">
        <h1><b>Komentari</b></h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <br/>
        <span class="w3-right"><?php echo e($data->links()); ?></span>
        <br/>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <h3><?php echo e($c->first_name); ?> <?php echo e($c->last_name); ?> </h3>
                <i class="material-icons w3-right w3-xxlarge" id="deleteCommentAdmin" data-id="<?php echo e($c->id); ?>" style="cursor:pointer;">close</i>
                <h5><?php echo e($c->date); ?></h5>
                <p> <?php echo e($c->comment); ?> </p>
            </div>
            <hr/>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>