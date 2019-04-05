<?php /* C:\laravel\bowen\resources\views/pages/about.blade.php */ ?>
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
        <br/>
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
    <div class="w3-container" id="services" style="margin-top:75px;min-height: 530px;">
        <h1>O autoru</h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo e('images/me.png'); ?>" alt="slika"/>
            </div>
            <div class="col-md-8">
                <p>
                    Moje ime je Nikola Crvenkov. Rodjen u Pančevu 1997 godine u kojem i dan danas živim.
                    Pohađam Visoku ICT školu, smer Internet Tehnologije i trenutno sam na trećoj i završnoj godini.
                    Ovo je moj sajt za potrebe predmeta Web Programiranje PHP2. Nadam se da Vam se svideo.

                </p>
                <br/>
                <b>Kontakt email:</b>  nikolacrvenkov@gmail.com
                <br/>
                <br/>
                <b>Dokumentacija:</b>  <a href="<?php echo e(asset('DokumentacijaBowen.pdf')); ?>">Dokumentacija</a>
            </div>
        </div>



    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>