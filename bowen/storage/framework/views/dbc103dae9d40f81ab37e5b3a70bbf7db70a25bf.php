<?php /* C:\laravel\bowen\resources\views/adminPages/indexAdmin.blade.php */ ?>
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
    <div class="w3-container" style="margin-top:80px;min-height: 530px;" id="showcase">
        <h1>Ip adrese koje se loguju na admin stranu:</h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <ul>
            <?php $__currentLoopData = $ip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <h5>
                        <?php echo e($i->ip); ?>

                    </h5>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <br/>
        <hr/>
        <br/>
        <h1>Zakazani termini</h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <table class="table">
            <tr>
                <th>
                    Ime
                </th>
                <th>
                    Prezime
                </th>
                <th>
                    Datum
                </th>
                <th>
                    Vreme
                </th>
            </tr>
            <?php $__currentLoopData = $termini; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($t->first_name); ?>

                </td>
                <td>
                    <?php echo e($t->last_name); ?>

                </td>
                <td>
                    <?php echo e($t->date); ?>

                </td>
                <td>
                    <?php echo e($t->termin); ?>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>