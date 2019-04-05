<?php /* C:\laravel\bowen\resources\views/pages/registration.blade.php */ ?>
<?php $__env->startSection('nav'); ?>
    <div class="w3-bar-block" style="color:#05383b;">
        <a href="/index" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
        <a href="/comments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Komentari</a>
        <a href="/gallery" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Galerija</a>
        <a href="/reg" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Registracija</a>
        <a href="/about" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">O autoru</a>
        <hr/>
        <form action="/login" method="post">
            <?php echo csrf_field(); ?>
            <input type="text" name="login_email" placeholder="email" class="form-control" />
            <br/>
            <input type="password" name="login_pass" placeholder="password" class="form-control"/>
            <br/>
            <input type="submit" value="login" class="form-control" style="width:70px;"/>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1><b>Registration</b></h1>
        <br/>
        <br/>
        <br/>
        <form class="form-group" action="/registration" method="post">
            <?php echo csrf_field(); ?>
            <label>First Name:</label>
            <input type="text" class="form-control" name="first_name"/>
            <br/>
            <label>Last Name:</label>
            <input type="text" class="form-control" name="last_name"/>
            <br/>
            <label>E-mail:</label>
            <input type="text" class="form-control" name="email"/>
            <br/>
            <label>Password:</label>
            <input type="password" class="form-control" name="password"/>
            <br/>
            <input type="submit" value="submit" class="form-control w3-right" style="width:100px;"/>
        </form>
        <br/>
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>