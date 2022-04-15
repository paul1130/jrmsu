<!-- Page Loader -->
<footer>
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-cyan">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
</footer>
    
<!--js-->
    <?php foreach ($js as $data){ ?>
        <script src="<?= base_url($data);?>"></script>
    <?php  } ?>
