<?php /* C:\laravel\bowen\resources\views/partials/footer.blade.php */ ?>

<!-- W3.CSS Container -->
<div class="w3-light-grey w3-container w3-padding-32" style="margin-top:75px;padding-right:58px">
    <p class="w3-right">
        Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a>
    </p>
</div>

<script>
    // Script to open and close sidebar
    function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }

    // Modal Image Gallery
    function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
    }
</script>


<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="<?php echo e(asset('/js/jquery.md5.js')); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo e(asset('/js/myjs.js')); ?>"></script>
</body>
</html>
