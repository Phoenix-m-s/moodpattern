<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    var dataSet = [
        [ "Tiger Nixon", "System Architect", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ],
        [ "Garrett Winters", "Accountant", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ],
        [ "Ashton Cox", "Junior Technical Author", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ],
        [ "Cedric Kelly", "Senior Javascript Developer", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ],
        [ "Airi Satou", "Accountant", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ],
        [ "Brielle Williamson", "Integration Specialist", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ],
        [ "Herrod Chandler", "Sales Assistant", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ],
        [ "Rhona Davidson", "Integration Specialist", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ],
        [ "Colleen Hurst", "Javascript Developer", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ],
        [ "Sonya Frost", "Software Engineer", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ],
        [ "Jena Gaines", "Office Manager", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ],
        [ "Quinn Flynn", "Support Lead", "<a class='mr-2' href='/questionrange/?topicId=5' title='تکمیل امتیازدهی'> <i class='fa fa-edit'></i> </a>" ]
    ];

    $(document).ready(function() {
        $('#example').DataTable( {
            data: dataSet,
            columns: [
                { title: "عنوان" },
                { title: "نوع موضوع" },
                { title: "عملگر" }
            ]
        } );
    } );
</script>
<main>
    <?php
    //echo 'list=<pre>';print_r($list['list']);
    ?>
    <div id="form_container"  style="text-align: center;direction: rtl;height: auto;">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center text-white mb-3 bg-primary" style="height: 50px;line-height:50px;">
                    لیست گراف‌های حسی:
                </h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <hr>
            <!-- /row -->
            <div class="col-md-12 mt-4 ">
                <table id="example" class="display" width="100%"></table>
            </div>
                <!-- /Wizard container -->
            </div>
        </div><!-- /Row -->
    </div><!-- /Form_container -->
</main>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
