<?php
if(isset($_POST)){
    print_r($_POST);
}
?>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('.range').each(function() {
            var $this = $(this),
                dataValue = $this.data('value');

            $this.sliderRange({
                ticks: [0, 30, 50, 80, 100],
                ticks_labels: ['خیلی خوب', 'اندکی', 'نه در این حد', 'نمیدونم', 'خیلی زیاد'],
                ticks_snap_bounds: 5
            });

            $this.sliderRange('setValue', dataValue);
        });

    });
</script>
<form action="" method="post">
<div style="position: absolute; width: 1000px; height: 300px; left: 0;right: 0;top: 0;bottom: 0;display: block;margin: auto;">
    <input class="range" type="text" data-value="5" dir="rtl" name="R1">
    <br>
    <br>
    <br>
    <input class="range" type="text" data-value="25" name="R2">
    <br>
    <br>
    <br>
    <input class="range" type="text" data-value="95" name="R3">
    <br>
    <br>
    <br>

</div>
    <input type="submit" name="submit">
</form>