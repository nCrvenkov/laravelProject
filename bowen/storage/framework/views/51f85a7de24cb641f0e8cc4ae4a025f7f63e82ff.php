<?php /* C:\laravel\bowen\resources\views/pages/contact.blade.php */ ?>
<?php $__env->startSection('nav'); ?>
    <div class="w3-bar-block" style="color:#05383b;">
        <a href="/indexUser" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
        <a href="/userComments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Komentari</a>
        <a href="/contact/<?php echo e(session()->get('user')[0]->id); ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Contact</a>
        <hr/>
        <a href="/userPage/<?php echo e(session()->get('user')[0]->id); ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">User Page</a>
        <a href="/appointments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Zakazi termin</a>
        <a href="/logout" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if($data ===0): ?>
        <div class="w3-container" style="margin-top:80px;min-height: 530px;" id="showcase">
            <h1>Posaljite poruku administratoru</h1>
            <br/>
            <br/>
            <div style="position:absolute;bottom:50px;" class="col-md-8">
                <form class="form-group" action="/sendMessage" method="post">
                    <?php echo csrf_field(); ?>
                    <textarea class="form-control" name="message" >

                    </textarea>
                    <br/>
                    <input type="hidden" value="<?php echo e(session()->get('user')[0]->id); ?>" name="acc_id"/>
                    <input type="submit" class="form-control w3-left" style="width:100px;" value="posalji"/>
                </form>
            </div>
        </div>
    <?php else: ?>
        <div class="w3-container" style="margin-top:80px;min-height: 530px;" id="showcase">
            <h1>Prepiska:</h1>
            <br/>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($d->from_account_id): ?>
                    <div id="userMess" class="w3-left">
                        <p><?php echo e($d->message); ?></p>
                    </div>
                    <br/>

                <?php else: ?>
                    <div id="otherUserMess" class="w3-right">
                        <p><?php echo e($d->message); ?></p>
                    </div>
                    <br/>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div style="position:absolute;bottom:50px;" class="col-md-8">
                <form class="form-group" action="/sendMessage" method="post">
                    <?php echo csrf_field(); ?>
                    <textarea class="form-control" name="message" >

                    </textarea>
                    <br/>
                    <input type="hidden" value="<?php echo e(session()->get('user')[0]->id); ?>" name="acc_id"/>
                    <input type="submit" class="form-control w3-left" style="width:100px;" value="posalji"/>
                </form>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>