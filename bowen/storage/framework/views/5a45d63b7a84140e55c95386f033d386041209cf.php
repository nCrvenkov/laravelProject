<?php /* C:\laravel\bowen\resources\views/pages/galleryUser.blade.php */ ?>
<?php $__env->startSection('nav'); ?>
    <div class="w3-bar-block" style="color:#05383b;">
        <a href="/indexUser" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
        <a href="/userComments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Komentari</a>
        <a href="/galleryUser" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Galerija</a>
        <hr/>
        <a href="/userPage/<?php echo e(session()->get('user')[0]->id); ?>" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">User strana</a>
        <a href="/appointments" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Zakazi termin</a>
        <a href="/logout" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Logout</a>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>