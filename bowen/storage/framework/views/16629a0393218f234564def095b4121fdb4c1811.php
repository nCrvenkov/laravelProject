<?php /* C:\laravel\bowen\resources\views/adminPages/manageAppointments.blade.php */ ?>
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
        <h1>Upravljanje terminima</h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <br/>
        <h3>Ubacite novi bowen termin</h3>
        <form action="/insertAppointment" method="post">
            <?php echo csrf_field(); ?>
            <input type="text" style="width:300px;" class="form-control" placeholder="14:00 - 15:30" name="termin"/>
            <br/>
            <input type="submit" value="ubaci" class="form-control w3-left" style="width:100px;" />
        </form>
        <br/>
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($e); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <br/>
        <hr/>
        <h3>Izbrišite termin</h3>
        <br/>
        <form action="/deleteTermin" method="get">
            <select class="form-control" name="deleteTerminId" style="width:300px;">
                <option>Izaberite termin...</option>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($d->id); ?>"><?php echo e($d->termin); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <br/>
            <input type="submit" value="izbriši" class="form-control w3-left" style="width:100px;" />
        </form>
        <br/>
        <br/>
        <hr/>
        <h3>Izmenite termin</h3>
        <br/>
        <form action="/updateAppointment" method="post">
            <?php echo csrf_field(); ?>
            <select class="form-control" name="updateAppId" id="updateAppId" style="width:300px;">
                <option>Izaberite termin...</option>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($d->id); ?>"><?php echo e($d->termin); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <br/>
            <div id="hiddenDivUpdate" style="visibility:hidden">
                <input type="text" style="width:300px;" placeholder="format -> 14:00 - 15:30" name="termin_update" class="form-control" />
                <br/>
                <input type="submit" value="izmeni" class="form-control w3-left" style="width:100px;" />
            </div>
        </form>
        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($e); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>