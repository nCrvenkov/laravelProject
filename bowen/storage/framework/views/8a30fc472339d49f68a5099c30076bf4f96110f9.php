<?php /* C:\laravel\bowen\resources\views/pages/bookAppointment.blade.php */ ?>
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
        <h1>Zakažite svoj termin</h1>
        <br/>
        <br/>
        <br/>
        <div align="center">

                <h5>Možete zakazati svoj termin svakim radnim danom u narednih mesec dana.
                    U svakom terminu je dostupno 3 mesta.
                    Dostupne termine mozete proveriti odabirom željenog datuma. <br/>
                    Možete zakazati 3 termina, ali ne u istom danu.
                </h5>
                <br/>
                <form class="form-group" action="/bookAppointmentBowen" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="date" id="bookDate" name="bookDate" class="form-control" style="width:300px;"/>
                    <br/>
                    <select class="form-control" style="width:300px;" name="bookTermin">
                        <option>Izaberite termin</option>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($d->id); ?>.<?php echo e($d->termin); ?>"><?php echo e($d->termin); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <br/>
                    <input type="hidden" name="accId" value="<?php echo e(session()->get('user')[0]->id); ?>"/>
                    <input type="submit" class="form-control w3-right" value="zakaži" style="width:100px;"/>
                </form>
                <br/>
                <br/>
                <?php if(session()->has('error')): ?>
                    <h3><?php echo e(session('error')); ?></h3>
                <?php endif; ?>


        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>