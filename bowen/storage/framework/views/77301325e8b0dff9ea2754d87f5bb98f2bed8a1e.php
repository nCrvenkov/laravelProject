<?php /* C:\laravel\bowen\resources\views/pages/userPage.blade.php */ ?>
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
<?php if($user[0]->id == session()->get('user')[0]->id): ?>
    <?php $__env->startSection('content'); ?>
        <div class="w3-container" style="margin-top:80px" id="showcase">
            <h1><b><?php echo e($user[0]->first_name); ?> <?php echo e($user[0]->last_name); ?></b></h1>
            <h4>Registrovan: <?php echo e($user[0]->registration_date); ?></h4>
            <hr/>
            <br/>
            <?php if($bookings === 0): ?>
                <h3>Nemate zakazanih termina za bowen tretmane</h3>
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <?php else: ?>
                <h3>Vaši zakazani termini za bowen tretmane</h3>
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
                <table class="table">
                    <tr>
                        <th>
                            Datum
                        </th>
                        <th>
                            Vreme
                        </th>
                    </tr>
                    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($b->date); ?>

                            </td>
                            <td>
                                <?php echo e($b->termin); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php endif; ?>

            <br/>
            <hr/>
            <h3>Vaš komentar</h3>
            <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <br/>
            <?php if($comment === 0): ?>
                <b>Niste postavili komentar</b>
                <br/>
            <?php else: ?>
                <div>
                    <i class="material-icons w3-right w3-xxlarge" id="deleteComment" data-id="<?php echo e($comment[0]->id); ?>" style="cursor:pointer;">close</i>
                    <h5><?php echo e($comment[0]->date); ?></h5>
                    <p> <?php echo e($comment[0]->comment); ?> </p>
                </div>
            <?php endif; ?>
            <br/>
            <hr/>
            <h3>Izmenite Vaše podatke</h3>
            <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <br/>
            <form class="form-group" method="post" action="/changeUserData">
                <?php echo csrf_field(); ?>
                <label>First name</label>
                <input type="text" name="updateFirstName" value=<?php echo e($user[0]->first_name); ?> class="form-control"/>
                <br/>
                <label>Last name</label>
                <input type="text" name="updateLastName" value=<?php echo e($user[0]->last_name); ?> class="form-control"/>
                <br/>
                <label>E-mail</label>
                <input type="text" name="updateEmail" value=<?php echo e($user[0]->email); ?> class="form-control"/>
                <br/>
                <input type="hidden" value="<?php echo e($user[0]->id); ?>" name="dataUserId"/>
                <input type="submit" value="izmeni" class="form-control w3-right" name="btnChangeData" style="width:100px;"/>
                <br/>
            </form>
            <br/>
            <hr/>
            <h3>Izmenite Vašu lozinku</h3>
            <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <br/>
            <form class="form-group" action="/changePassword" method="post">
                <?php echo csrf_field(); ?>
                <label>Stara lozinka</label>
                <input type="hidden" id="oldPass" value="<?php echo e($user[0]->password); ?>" />
                <input type="password" id="oldPassConfirm" class="form-control"/>
                <br/>
                <label>Nova lozinka</label>
                <input type="password" name="newPass" id="newPass" disabled class="form-control"/>
                <br/>
                <input type="hidden" value="<?php echo e($user[0]->id); ?>" name="passUserId"/>
                <input type="submit" value="izmeni" class="form-control w3-right" style="width:100px;"/>
            </form>
            <br/>
            <br/>
            <hr/>
            <br/>
            <h3>Poruke:
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <br/>
            <?php if(!empty($adminAnswer)): ?>
                <h4>Odgovor admina:</h4>
                <?php $__currentLoopData = $adminAnswer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label><?php echo e($a->date); ?></label><p><?php echo e($a->message); ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <br/>
            <h4>Pošaljite poruku administratoru</h4>
            <br/>
            <div>
                <form class="form-group" action="/sendMessage" method="post">
                    <?php echo csrf_field(); ?>
                    <textarea class="form-control" name="message" >

                    </textarea>
                    <br/>
                    <input type="hidden" value="<?php echo e(session()->get('user')[0]->id); ?>" name="acc_id"/>
                    <input type="submit" class="form-control w3-right" style="width:100px;" value="posalji"/>
                </form>
            </div>
        </div>
    <?php $__env->stopSection(); ?>
<?php else: ?>
    <?php $__env->startSection('content'); ?>
        <div class="w3-container" style="margin-top:80px;min-height: 530px;" id="showcase">
            <h1><b><?php echo e($user[0]->first_name); ?> <?php echo e($user[0]->last_name); ?></b></h1>
            <h4>Registrovan: <?php echo e($user[0]->registration_date); ?></h4>
            <hr/>
            <br/>
            <?php if($bookings === 0): ?>
                <h3>Korisnik nema zakazanih termina za bowen tretmane</h3>
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <?php else: ?>
                <h3>Korisnikovi zakazani termini za bowen tretmane</h3>
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
                <table class="table">
                    <tr>
                        <th>
                            Datum
                        </th>
                        <th>
                            Vreme
                        </th>
                    </tr>
                    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($b->date); ?>

                            </td>
                            <td>
                                <?php echo e($b->termin); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php endif; ?>
            <br/>
            <hr/>
            <h3>Komentar</h3>
            <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
            <br/>
            <?php if($comment === 0): ?>
                <b>Korisnik nije postavio komentar</b>
                <hr style="width:50px;border:5px solid #AAEEAA" class="w3-round">
                <br/>
            <?php else: ?>
                <div>
                    <h5><?php echo e($comment[0]->date); ?></h5>
                    <p> <?php echo e($comment[0]->comment); ?> </p>
                </div>
            <?php endif; ?>
        </div>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>