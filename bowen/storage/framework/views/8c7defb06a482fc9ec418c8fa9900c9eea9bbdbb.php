<?php /* C:\laravel\bowen\resources\views/adminPages/messagesAdmin.blade.php */ ?>
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
    <div style="margin-top:80px;min-height: 530px;" id="showcase">
        <h1>Poruke za administratora</h1>
        <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
        <br/>
        <table class="table">
            <tr>
                <th>
                    Ime
                </th>
                <th>
                    Prezime
                </th>
                <th>
                    Poruka
                </th>
                <th>
                    Datum
                </th>
                <th>
                </th>
                <th>

                </th>
            </tr>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php echo e($d->first_name); ?>

                </td>
                <td>
                    <?php echo e($d->last_name); ?>

                </td>
                <td>
                    <?php echo e($d->message); ?>

                </td>
                <td>
                    <?php echo e($d->date); ?>

                </td>
                <td>
                    <input type="button" class="form-control answerMessage" value="odgovori" data-id="<?php echo e($d->acc_id); ?>"/>
                </td>
                <td>
                    <input type="button" class="form-control answerMessage" value="obrisi" data-id="<?php echo e($d->id); ?>"/>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <br/>
        <br/>
        <div style="visibility:hidden" id="answerDiv">
            <form action="/answer" method="post">
                <?php echo csrf_field(); ?>
                <textarea class="form-control" name="answerMessage">

                </textarea>
                <br/>
                <input type="hidden" name="acc_id" id="acc_id" />
                <input type="submit" value="odgovori" class="form-control w3-right" style="width:100px;"/>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>