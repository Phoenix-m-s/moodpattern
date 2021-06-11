<!--caret change position by css added end line-->

<div class="nav-side-menu">
    <div class="brand hidden-lg hidden-md"></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

    <div class="menu-list">

        <ul id="menu-content" class="menu-content collapse out">

            <li data-toggle="collapse" data-target="#products" class="collapsed active"
                style="text-align: center;    background:#D3D3D3">
                <a href="#" style="color: black">
دسته بندی مطالب

                </a>
            </li>



            <li>
                <a href="<?php echo base;?>pages/vazife.php">
                    <i class="fa fa-check fa-md"></i>

                    اهداف و شرح وظایف </a>
            </li>

            <li>
                <a href="<?php echo base;?>pages/chart.php">
                    <i class="fa fa-check fa-md"></i>
                    نمودار سازمانی </a>
            </li>

            <li>
                <a href="<?php echo workgroup;?>index.php">
                    <i class="fa fa-check fa-md"></i>
                    امور کارگروههای تخصصی </a>
            </li>

  			 <li>
                <a href="<?php echo base;?>pages/mantaghei.php">
                    <i class="fa fa-check fa-md"></i>
                    شرکتهای برق منطقه ای </a>
            </li>

			<li>
                <a href="<?php echo base;?>pages/tozi.php">
                    <i class="fa fa-check fa-md"></i>
                    شرکتهای توزیع نیروی برق </a>
            </li>

			<li>
                <a href="<?php echo base;?>pages/connect-us.php">
                    <i class="fa fa-check fa-md"></i>
                    تماس با ما </a>
            </li>





        </ul>


    </div>


</div>





<script>
    $(document).ready(function () {
        $('.collapse').collapse('hide');
    });
</script>