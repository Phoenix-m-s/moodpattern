<style>
    .navbar-nav > li a {
        margin-right: 20px;
        margin-left: 10px;

    }

    .navbar-nav > li {
        border-left: 2px solid snow;
        margin-top: 5px;
    }

    .navbar-nav > li:last-child {
        border: none;
    }

    ul.dropdown-menu li a {
        margin-right: 10px;
        padding-right: 10px;
    }

    /*.nav.nav-tabs li a {*/

    /*padding-right: 20px;*/
    /*padding-left: 20px;*/
    /*}*/

    .navbar-nav > li > .dropdown-menu li {
        display: inline-table;

    }
</style>


<div class="navbar-header">
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

</div>
<script>
    $("document").ready(function () {
        $('.collapse').collapse('hide');
    });
</script>
<div class="collapse navbar-collapse js-navbar-collapse">
    <ul class="nav navbar-nav">


        <!---->
        <!--        <li class="dropdown">-->
        <!--            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">سامانه ها  <span class="caret"></span></a>-->
        <!--            <ul class="dropdown-menu" role="menu">-->
        <!--                <li><a href="http://www2.tavanir.org.ir/pmis/sitew/" target="_blank">بودجه فاوا صنعت برق</a></li>-->
        <!--                <li><a href="http://itsm.tavanir.net/NewMSD/main.aspx" target="_blank">درخواستهای IT</a></li>-->
        <!---->
        <!--            </ul>-->
        <!--        </li>-->
        <!---->


        <li>
            <a href="<?php echo base; ?>index.php">
                صفحه اصلی معاونت
            </a></li>

        <li>
            <!--            ====-->
            <a href="<?php echo base;?>workgroup/index.php">
                امور کارگروههای تخصصی
            </a></li>


        <li>
            <a href="<?php echo base; ?>mali/index.php">
                اداره کل امور مالی و ذیحسابی
            </a></li>


        <li>
            <a href="<?php echo base; ?>bazargani/index.php">

                دفتر بررسی های مالی و بازرگانی
            </a></li>


        <li>
            <a href="<?php echo edari; ?>index.php">
                اداره کل امور اداری و پشتیبانی </a></li>


        <li>
            <a href="<?php echo base; ?>talfigh/index.php">
                دفتر تلفیق و اطلاعات مالی </a></li>


</div>





