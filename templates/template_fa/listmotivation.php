<link rel="stylesheet" type="text/css" href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/DataTables/datatables.css"/>
<script type="text/javascript" src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/DataTables/datatables.js"></script>
<?php
//echo 'list=<pre>';print_r($list['list']);
$jsList = '' ;
foreach($list['list'] as $k=>$v){
    $phrase = substr($v['phrase_fa'],30).' ...' ;
    $link1 = ("<a class='mr-2' href='/motivation/?action=edit&id=".$v['id']."' title='ویرایش'> <i class='fa fa-edit'></i> </a>") ;
    $link2 = ("<a class='mr-2' href='javascript:delFunction(".$v['id'].");'  title='حذف عبارت'> <i class='fa fa-trash'></i> </a>") ;
    //$jsList .= '["'.$v['title'].'","'.$phrase.'","'.$v['author'].'","'.$link1.'","'.$link2.'"],' ;
    $jsList .= '["'.$v['title'].'","'.$v['author'].'","'.$link1.'","'.$link2.'"],' ;
}
$jsList = substr($jsList,0,strlen($jsList)-1) ;
//echo $jsList ;
?>
<style type="text/css" >
    .btn-primary{
        color: #fff !important;
        background-color: #84c2bb !important;
    }
    /* Set a style for all buttons */
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity:1;
    }

    /* Float cancel and delete buttons and add an equal width */
    .cancelbtn, .deletebtn {
        float: left;
        width: 50%;
    }

    /* Add a color to the cancel button */
    .cancelbtn {
        background-color: #ccc;
        color: black;
    }

    /* Add a color to the delete button */
    .deletebtn {
        background-color: #f44336;
    }

    /* Add padding and center-align text to the container */
    .container {
        padding: 12px;
        text-align: center;
    }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: #474e5d;
        padding-top: 50px;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 50%; /* Could be more or less, depending on screen size */
    }

    /* Style the horizontal ruler */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* The Modal Close Button (x) */
    .close {
        position: absolute;
        right: 35px;
        top: 15px;
        font-size: 20px;
        font-weight: bold;
        color: #f1f1f1;
    }

    .close:hover,
    .close:focus {
        color: #f44336;
        cursor: pointer;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and delete button on extra small screens */
    @media screen and (max-width: 300px) {
        .cancelbtn, .deletebtn {
            width: 100%;
        }
    }
</style>
<script>
    var dataSet = [
        <?php echo $jsList ; ?>
    ];

    $(document).ready(function() {
        $('#example').DataTable( {
            data: dataSet,
            columns: [
                { title: "عنوان" },
//                { title: "عبارت فارسی" },
                { title: "نویسنده" },
                { title: "ویرایش" },
                { title: "حذف" }
            ],
            "oLanguage": {
                "sSearch": "جستجو: " ,
                //"sLengthMenu": "Display _MENU_ records"
                "sLengthMenu": "نمایش _MENU_ عبارت"
            },
            "language": {
                "paginate": {
                    "previous": "قبلی",
                    "next": "بعدی",
                    "Search": "جستجو: "
                }
            }
        } );
    } );
</script>
<main>
    <div id="form_container"  style="text-align: center;direction: rtl;height: auto;">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h4 class="text-center text-white mb-3" style="height: 40px;line-height:40px;background-color: #68a4a0 !important;margin: 3px">
لیست عبارات انگیزشی
                </h4>
            </div>
        </div>
        <!-- /row -->
            <div class="row">
                <div class="col-md-12 mt-4">
                    <a href="/motivation/?action=add" class="btn btn-primary" role="button"style="float: right;margin-right: 5px; background-color: #007bff;" >جدید</a>
                    <?php if($_SESSION['user_privileges'] ==1){?>
                        <a href="/motivation/?action=export"  style="float: left;margin-left: 5px;"><i class="fa fa-file-excel-o fa-2x" aria-hidden="true"></i></a>
                    <?php }?>
                </div>
            </div>
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 mt-4">
                <table id="example" class="display" width="100%" style="padding-left: 1px;padding-right: 1px;padding-top: 15px;"></table>
            </div>
        </div>
        <!-- /row -->
    </div><!-- /Form_container -->
    <!--  DELETE MODAL -->
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
        <form class="modal-content">
            <div class="container">
                <h3>حذف عبارت</h3>
                <p>آیا از حذف این عبارت مطمئن هستید؟</p>

                <div class="clearfix">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">لغو</button>
                    <button type="submit"  class="deletebtn">حذف</button>
                </div>
            </div>
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="del_id" id="del_id" value="">
        </form>
    </div>

    <script>
        function delFunction(id){
            document.getElementById("del_id").value = id ;
            document.getElementById('id01').style.display='block' ;
        }
        // Get the modal
        var modal = document.getElementById('id01');
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
