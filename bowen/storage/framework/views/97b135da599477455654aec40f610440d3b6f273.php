<?php /* C:\laravel\bowen\resources\views/partials/nav.blade.php */ ?>
<nav class="w3-sidebar w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:250px;font-weight:bold;background-color:#AAEEAA;" id="mySidebar"><br>
    <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
    <div class="w3-container">
        <h1 class="w3-padding-64"><b>Bowen</b></h1>
    </div>
    <?php echo $__env->yieldContent('nav'); ?>


</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-xlarge w3-padding" style="background-color:#AAEEAA;">
    <a href="javascript:void(0)" class="w3-button w3-margin-right" style="background-color:#AAEEAA;" onclick="w3_open()">☰</a>
    <span>Bowen</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
