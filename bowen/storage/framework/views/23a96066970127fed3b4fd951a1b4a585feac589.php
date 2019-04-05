<?php /* C:\laravel\bowen\resources\views/pages/gallery.blade.php */ ?>
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
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php if(session('poruka')): ?>
            <?php echo e(session('poruka')); ?>

        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="w3-container" style="margin-top:80px;min-height: 530px;" id="showcase">
        <h1><b>Galerija</b></h1>
        <br/>
        <div class="row">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($d->position === 'horizontally'): ?>
                    <div class="column">
                        <img src="<?php echo e(asset('images/' . $d->path)); ?>" width="150px" alt="slika" onclick="myFunction(this);">
                    </div>
                <?php else: ?>
                    <div class="column">
                        <img src="<?php echo e(asset('images/' . $d->path)); ?>" height="150px" alt="slika" onclick="myFunction(this);">
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

        <!-- The expanding image container -->
        <div class="container">
            <!-- Close the image -->
            <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

            <!-- Expanded image -->
            <img id="expandedImg" style="width:100%">

        </div>
        <script>
            function myFunction(imgs) {
                // Get the expanded image
                var expandImg = document.getElementById("expandedImg");
                // Use the same src in the expanded image as the image being clicked on from the grid
                expandImg.src = imgs.src;
                // Show the container element (hidden with CSS)
                expandImg.parentElement.style.display = "block";
            }
        </script>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>