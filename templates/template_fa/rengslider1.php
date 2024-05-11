<style>
    h1 { margin: 150px auto 30px auto; text-align: center; }
    table {
        width: 100%;
        border-collapse: collapse;
    }


    td {
        border: 1px solid #aaa;
        position: relative;
    }

    .result {
        width: 80px;
        text-align: center;
        font-size: 12px;
        color: #888;
    }

    .code {
        width: 200px;
    }
    strong {
        background: #eee;
    }
    .container {
        width:200px;
    }


    .switch {
        width: 40px;
        height: 10px;
        position: absolute;
        left: calc(50% - 20px);
        top: calc(50% - 5px);
        border: 1px solid #aaa;
        border-radius: 20px;
    }

    .r-slider-button {
        background: #2196f3;
        border-radius: 100%;
        text-align: center;
    }

    .r-slider-line {
        background: #ccc;
    }

    .r-slider-fill {
        background: #2196f3;
    }

    .r-slider-number {
        position: absolute;
        background: #000;
        color: #fff;
        width: 28px;
        left: calc(50% - 14px);
        top: -16px;
        font-size: 12px;
        border-radius: 3px;
    }

    .r-slider-text {
        font-size: 10px;
        text-align: center;
    }

    .r-slider-pin {
        background: #ccc;
    }

    .r-slider-label {
        font-size: 10px;
        top: 16px;
    }


</style>

<body>

<table >
    <tbody>
    <tr>
        <td id="c11" class="container">
            <div class="r-slider-container" style="position:absolute;left:5px;top:calc(50% - 5px);width:calc(100% - 10px);height:10px;">
            </div>
        </td>
        <td class="result"></td>
    </tr>

    </tbody>
</table>

<script>
    var a11 = new slider({
        container: "#c11",
        start: -100,
        end: 100,
        step: 10,
        value: 0,
        showValue: true,
        ondrag: change,
        pinStep: 20,
        labelStep: 40
    });


    function change(obj) {
        $(obj.container).next("td").html(obj.values.toString())
    }
    function Switch(obj) {
        $(obj.container).parent().next("td").html(obj.values.toString())
    }
</script>


