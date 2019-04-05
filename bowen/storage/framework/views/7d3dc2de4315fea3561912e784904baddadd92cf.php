<?php /* C:\laravel\bowen\resources\views/pages/userComments.blade.php */ ?>
<?php $__env->startSection('nav'); ?>
    <div class="w3-bar-block" style="color:#05383b;">
        <a href="/indexUser" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
        <a href="/userComments/<?php echo e(session()->get('user')[0]->id); ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Komentari</a>
        <a href="/galleryUser" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Galerija</a>
        <hr/>
        <a href="/userPage/<?php echo e(session()->get('user')[0]->id); ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">User Page</a>
        <a href="/appointments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Zakazi termin</a>
        <a href="/logout" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="w3-container"  style="margin-top:80px;min-height: 530px;" id="showcase">
        <h1><b>Komentari</b></h1>
        <br/>
        <span class="w3-right"><?php echo e($comments->links()); ?></span>
        <br/>
        <br/>
        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <a href="/userPage/<?php echo e($c->acc_id); ?>"><h3><?php echo e($c->first_name); ?> <?php echo e($c->last_name); ?> </h3></a>
                <?php if($c->acc_id == session()->get('user')[0]->id): ?>
                    <i class="material-icons w3-right w3-xxlarge" id="deleteComment" data-id="<?php echo e($c->id); ?>" style="cursor:pointer;">close</i>
                <?php endif; ?>
                <h5><?php echo e($c->date); ?></h5>
                <p> <?php echo e($c->comment); ?> </p>
            </div>
            <hr/>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <?php if($allow_comment === 0): ?>
        <br/>
        <h5>Već ste postavili komentar</h5>
        <?php else: ?>
            <hr/>
            <h3>Postavite svoj komentar</h3>
            <form class="form-group" action="/postComment" method="post">
                <?php echo csrf_field(); ?>
                <textarea class="form-control" name="userComment">

            </textarea>
                <br/>
                <input type="submit" class="form-control w3-right" style="width:100px;" value="objavi"/>
                <input type="hidden" value="<?php echo e(session()->get('user')[0]->id); ?>" name="user_id"/>
            </form>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>