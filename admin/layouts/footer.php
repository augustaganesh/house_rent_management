
<footer>
	
</footer>
<script>

    function showMe(){
        var x = document.getElementById('Visible');
        var y = document.getElementById('Visible1');
        if (x.type === "password" ) {
            x.type = "text";
        }else{
            x.type = "password";
        }
        if (y.type === "password" ) {
            y.type = "text";
        }else{
            y.type = "password";
        }
    }
</script>
<!-- Jquery JS-->
    <script src="<?=base_url('layouts/vendor/jquery-3.2.1.min.js')?>"></script>
    <!-- Bootstrap JS-->
    <script src="<?=base_url('layouts/vendor/bootstrap-4.1/popper.min.js')?>"></script>
    <script src="<?=base_url('layouts/vendor/bootstrap-4.1/bootstrap.min.js')?>"></script>
    <!-- Vendor JS       -->
    <script src="<?=base_url('layouts/vendor/slick/slick.min.js')?>">
    </script>
    <script src="<?=base_url('layouts/vendor/wow/wow.min.js')?>"></script>
    <script src="<?=base_url('layouts/vendor/animsition/animsition.min.js')?>"></script>
    <script src="<?=base_url('layouts/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')?>">
    </script>
    <script src="<?=base_url('layouts/vendor/counter-up/jquery.waypoints.min.js')?>"></script>
    <script src="<?=base_url('layouts/vendor/counter-up/jquery.counterup.min.js')?>">
    </script>
    <script src="<?=base_url('layouts/vendor/circle-progress/circle-progress.min.js')?>"></script>
    <script src="<?=base_url('layouts/vendor/perfect-scrollbar/perfect-scrollbar.js')?>"></script>
    <script src="<?=base_url('layouts/vendor/chartjs/Chart.bundle.min.js')?>"></script>
    <script src="<?=base_url('layouts/vendor/select2/select2.min.js')?>">
    </script>

    <!-- Main JS-->
    <script src="<?=base_url('layouts/js/main.js')?>"></script>
<script
  src="<?=base_url('layouts/js/jquery-3.4.1.min.js')?>"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous')?>"></script>
</body>
</html>
