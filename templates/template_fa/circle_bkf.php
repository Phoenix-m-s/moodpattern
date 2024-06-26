<?php
$title = array(
    0 => "محبت",
    1 => "عشق",
    2 => "دوستی",
    3 => "آرامش",
    4 => "آرزو",
    5 => "شوق",
    6 => "غم",
    7 => "شادی",
    8 => "احساس",
    9 => "احترام",
    10 => "زیبایی",
    11 => "آسایش",
    12 => "همدلی",
    13 => "رمانتیسم",
    14 => "حنان",
    15 => "الفت",
    16 => "همنشینی",
    17 => "سعادت",
    18 => "اراده",
    19 => "اشتیاق",
    20 => "تعلق",
    21 => "سیرت",
    22 => "رفاقت",
    23 => "همبستگی",
    24 => "معنویت",
    25 => "یاری",
    26 => "آشتی",
    27 => "خواب",
    28 => "وصال",
    29 => "تفریح",
    30 => "شیفتگی",
    31 => "یگانگی",
    32 => "عاشقی",
    33 => "تمایل",
    34 => "همدلانه",
    35 => "صمیمیت",
    36 => "شادمانی",
    37 => "معصومیت",
    38 => "هوس",
    39 => "هیجان",
    40 => "وابستگی",
    41 => "منفعت",
    42 => "التفات",
    43 => "دلبستگی",
    44 => "پایبندی",
    45 => "عاطفت",
    46 => "پیمان",
    47 => "محبوبیت",
    48 => "غرامت",
    49 => "مدد"
);
$title_json = json_encode($title);
?>
<style>
    .tooltip {
        position: absolute;
        text-align: center;
        width: 80px;
        height: 28px;
        padding: 2px;
        font: 12px sans-serif;
        background: lightsteelblue;
        border: 0;
        border-radius: 8px;
        pointer-events: none;
        opacity: 0;
    }

    .oval-shape {
        width: 240px;
        height: 240px;
        margin: 65px auto 0;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden; /* جلوگیری از نمایش ات لاین بیرون از دایره */
        background-color: #FFFFFF; /* بک‌گراند سفید */
        box-shadow: 0 0 0 10px #77deae; /* ات لاین */
        direction: rtl;
        text-align: center;
    }
    #centerCircle {
        width: 200px; /* اندازه دلخواه */
        height: 200px; /* اندازه دلخواه */
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index:9999;
    }

    #my_dataviz svg {
        opacity: 0.9; /* برای مثال، تنظیم شفافیت به 0.7 */
    }

    .selected circle {
        stroke: red; /* رنگ حاشیه دایره */
        stroke-width: 3; /* عرض حاشیه دایره */
    }
    body {
        overflow-x: hidden;
    }



</style>
</head>
<body>
<header class="header mb-5">
    <nav class="navbar navbar-expand-lg bg-body-tertiary " dir="rtl">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/images/logoSVG.svg" alt="moodpattern" title="moodpattern">
            </a>
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">صفحه اصلی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">فلسفه گراف حسی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">لیست گراف حسی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">تماس با ما</a>
                </li>
            </ul>
            <div class="col-md-3">
                <form>
                    <div class="search-container">
                        <div class="search-input">
                            <input class="form-control rounded-4" data-size="sm" data-color="background"
                                   data-has-icon="" data-arrow-focusable="" tabindex="0" placeholder="جست&zwnj;وجو "
                                   value="">
                            <svg width="25" height="25" class="SearchInput__icon" viewBox="0 0 30 20" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g id="search">
                                    <path id="magnifying-glass(1) 1 (Traced)" fill-rule="evenodd" clip-rule="evenodd"
                                          d="M7.08808 2.0311C5.74216 2.21561 4.61114 2.62715 3.58646 3.3052C1.74838 4.52148 0.559377 6.2871 0.122062 8.44975C-0.0406873 9.25444 -0.0406873 10.574 0.122062 11.3787C0.282272 12.171 0.490063 12.7724 0.843998 13.4684C2.38328 16.495 5.68402 18.2207 9.08098 17.775C10.3511 17.6083 11.6835 17.0968 12.64 16.4086L12.8856 16.2319L14.6966 18.0138C16.5743 19.8612 16.7417 19.9975 17.1366 20C17.7543 20.0039 18.2625 19.5029 18.2585 18.894C18.256 18.5048 18.1175 18.3395 16.2471 16.492L14.443 14.71L14.7567 14.2394C16.1953 12.0815 16.4716 9.34475 15.4923 6.95063C14.4612 4.43007 12.1574 2.588 9.42461 2.09918C8.90955 2.00707 7.55205 1.96747 7.08808 2.0311ZM9.04584 4.20936C10.259 4.4179 11.2797 4.94678 12.1705 5.82826C12.699 6.35128 12.9848 6.73613 13.2855 7.32948C14.0829 8.90298 14.1006 10.8307 13.3322 12.4204C12.7816 13.5595 11.6971 14.6161 10.5073 15.1727C9.06387 15.8479 7.20939 15.871 5.68549 15.2327C4.47693 14.7265 3.29534 13.6049 2.7228 12.4204C1.9544 10.8307 1.97212 8.90298 2.76946 7.32948C3.06998 6.73648 3.35587 6.35148 3.88454 5.82771C4.80842 4.91249 5.89409 4.3748 7.24042 4.16576C7.57526 4.1138 8.63925 4.13948 9.04584 4.20936Z"
                                          fill="#D2D2D2"/>
                                    <line id="Line 58" y1="-0.5" x2="20" y2="-0.5" transform="matrix(0 1 1 0 29.4165 0)"
                                          stroke="#D2D2D2"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                </form>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <img class="text-success" src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/images/user.svg" alt="moodpattern"
                                 title="moodpattern">
                            ورود</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ثبت نام</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-success rounded-5 " type="submit">تماس با مشاوران</button>
                </form>
            </div>
        </div>
    </nav>
</header>
<div class="row">

    <div class="oval-shape" id="centerCircle">
        <!-- Your content goes here -->
        <p>رابطه ما با همه از نظر من احساسات برای من یعنی</p>
    </div>


    <div id="my_dataviz">

    </div>


    <div class="col-md-4 col-xl-4 center-mobile mx-auto my-auto mt-5">
        <div class="card bg-body-tertiary">
            <div class="card-header text-center">
                <h6>اطلاعات دایره‌های انتخاب شده:</h6>
            </div>
            <div class="card-body" dir="rtl">
                <ul class="list-group">
                    <div id="selectedCirclesInfo">

                        <ul id="selectedCirclesList">
                            <div id="data"></div>
                        </ul>
                    </div>
                </ul>
            </div>
            <div class="card-footer float-end">
                <button class="btn btn-success rounded-5 " id="submit-btn" onclick="submitData()">ارسال</button>
            </div>
            <input type="hidden" name="action" id="action" value="store">
        </div>
    </div>
</div>
<!-- Script -->
<script type="text/javascript">
    // تنظیم ابعاد SVG
    const width = window.innerWidth;
    const height = window.innerHeight;
    // SVG را به بدنه صفحه اضافه کنید
    const svg = d3.select("#my_dataviz")
        .append("svg")
        .attr("width", width)
        .attr("height", height);

    // داده‌های دایره‌ها
    const data = Array.from({ length: 50 }, (_, i) => ({
        region: "Region " + (i + 1),
        value: Math.floor(Math.random() * 1000000000)
    }));

    // تبدیل رشته JSON به داده‌های قابل استفاده در جاوااسکریپت
    const titles = JSON.parse('<?php echo $title_json; ?>');

    // ایجاد مقیاس رنگ
    const color = d3.scaleOrdinal()
        .range(d3.schemeCategory10);

    // مقیاس اندازه برای دایره‌ها
    const initialSize = 45; // اندازه اولیه دایره‌ها
    const size = d3.scaleLinear()
        .range([initialSize, initialSize]);

    // ایجاد ابزار مشاهده
    const Tooltip = d3.select("#my_dataviz")
        .append("div")
        .style("opacity", 0)
        .attr("class", "tooltip");

    // شمارنده کلیک
    let clickCount = 0;

    // آرایه داده برای کلیک‌ها را مقداردهی اولیه کنید
    let circleData = [];

    // ایجاد دایره‌ها
    const node = svg.selectAll(".node")
        .data(data)
        .enter()
        .append("g")
        .attr("class", "node")
        .attr("transform", (d, i) => "translate(" + (50 + i * 20) + "," + height / 2 + ")")
        .on("click", clicked)
        .call(d3.drag()
            .on("start", dragstarted)
            .on("drag", dragged)
            .on("end", dragended));

    // افزودن دایره به هر گروه
    node.append("circle")
        .attr("r", initialSize)
        .style("fill", (d, i) => color(titles[i]))
        .attr("stroke", "black")
        .style("stroke-width", 1);

    node.append("text")
        .attr("text-anchor", "middle")
        .attr("dominant-baseline", "middle")
        .text((d, i) => `${i + 1}: ${titles[i]}`) // اضافه کردن شمارهٔ اندیس به عنوان متن دایره
        .style("fill", "white");


    // ویژگی‌های نیروهای اعمال شده بر روی گره‌ها:
    const simulation = d3.forceSimulation()
        .force("center", d3.forceCenter().x(width / 2).y(height / 2)) // جذب به مرکز ناحیه svg
        .force("charge", d3.forceManyBody().strength(.1)) // گره‌ها به یکدیگر جذب می‌شوند اگر مقدار > 0 باشد
        .force("collide", d3.forceCollide().strength(.2).radius(function (d) {
            return (size(d.value) + 3);
        }).iterations(1)); // نیرویی که از همپوشانی دایره‌ها جلوگیری می‌کند

    // اعمال این نیروها به گره‌ها و به روزرسانی موقعیت آنها.
    simulation
        .nodes(data)
        .on("tick", function (d) {
            node.attr("transform", d => "translate(" + d.x + "," + d.y + ")");
        });

    // تابع clicked
    function clicked(event, d, index) {
        event.preventDefault();
        const clickedNode = d3.select(this);
        const circle = clickedNode.select("circle");
        const text = clickedNode.select("text");

        let circleSize = parseFloat(circle.attr("r"));

        if (clickCount % 8 < 4) {
            circleSize += 10; // افزایش اندازه
        } else {
            circleSize -= 10; // کاهش اندازه
        }

        circleSize = Math.max(initialSize, circleSize);

        if (circleSize === initialSize && clickCount % 8 !== 0) {
            circleSize = initialSize + 10;
        }

        circle.transition()
            .duration(500)
            .attr("r", circleSize);

        text.attr("transform", "translate(0," + (-initialSize) + ")");

        // چک کردن اینکه آیا دایره مورد نظر در circleData وجود دارد یا خیر
        const dataIndex = circleData.findIndex(item => item.title === text.text());
        const key = dataIndex !== -1 ? circleData[dataIndex].key : null;
        if (dataIndex !== -1) {
            // اگر دایره در circleData وجود دارد، تعداد کلیک‌ها آن را افزایش می‌دهیم
            circleData[dataIndex].clicks++;
        } else {
            // اگر دایره در circleData وجود ندارد، آن را به circleData اضافه می‌کنیم
            circleData.push({title: text.text(), clicks: 1});
        }

        // اگر تعداد کلیک‌ها بیشتر از 8 بار شود، مقدار کلیک‌ها را برابر 8 می‌کنیم
        if (circleData[dataIndex].clicks > 8) {
            circleData[dataIndex].clicks = 8;
        }

        clickCount++;
    }
    function removeLetters(inputString) {
        return inputString.replace(/[^0-9]/g, '');
    }
    // تابع برای ارسال و نمایش داده
    function submitData() {
        // تعریف متغیر formData
        const formData = new FormData();

        // یافتن div که داده‌ها در آن نمایش داده می‌شود
        const dataDiv = document.getElementById("data");
        dataDiv.innerHTML = ""; // پاک کردن داده‌های قبلی

        // حلقه از طریق آرایه circleData
        circleData.forEach((item, index) => {
            const title = removeLetters(item.title);
            const clicks = item.clicks;

            // ایجاد رشته شامل اطلاعات شماره، عنوان و تعداد کلیک‌ها
            const dataString = `${removeLetters(title)} (${clicks})<br>`;

            // افزودن dataString به dataDiv
            dataDiv.innerHTML += dataString;

            // افزودن اطلاعات به formData
            formData.append(`circleData[${index}][title]`, title);
            formData.append(`circleData[${index}][clicks]`, clicks);
        });

        // ارسال درخواست fetch با استفاده از formData و ارسال به فایل PHP
        fetch('formIndex.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text(); // یا response.json() اگر می‌خواهید داده‌های JSON را بخوانید
            })
            .then(data => {
                console.log(data); // دریافت پاسخ از سرور
                // انجام هر عملیاتی که نیاز به اطلاعات دریافتی از سرور دارد
            })
            .catch(error => {
                console.error('There was an error!', error);
            });
    }


    // فراخوانی اولیه تابع submitData برای نمایش داده هنگام بارگذاری صفحه
    submitData();

    // زمانی که دکمه ارسال کلیک می‌شود
    document.getElementById("submit-btn").addEventListener("click", function(event) {
        // جلوگیری از ارسال فرم به صورت پیش‌فرض
        event.preventDefault();

        // یافتن دایره‌ای که کاربر روی آن کلیک کرده است
        const selectedCircle = d3.select(".selected circle");

        // بررسی اینکه آیا دایره‌ای کلیک شده است یا خیر
        if (!selectedCircle.empty()) {
            // گرفتن عنوان و تعداد کلیک دایره‌ای که کاربر روی آن کلیک کرده است
            const title = selectedCircle.node().parentNode.querySelector("text").textContent;
            const clicks = parseInt(selectedCircle.attr("data-clicks"));

            // افزودن اطلاعات دایره‌ای که کاربر روی آن کلیک کرده است به محتوای صفحه
            const infoDiv = document.getElementById("selectedCirclesList");
            infoDiv.innerHTML = "<li>" + title + ": " + clicks + "</li>";

            // ارسال فرم
            const form = document.getElementById("myForm");
            form.querySelector("#dataInput").value = title + ": " + clicks;
            form.submit();
        }
    });

    // وقتی یک دایره کشیده می‌شود چه اتفاقی می‌افتد؟
    function dragstarted(event, d) {
        if (!event.active) simulation.alphaTarget(.03).restart();
        d.fx = d.x;
        d.fy = d.y;
    }


    function dragged(event, d) {
        d.fx = event.x;
        d.fy = event.y;
    }

    function dragended(event, d) {
        if (!event.active) simulation.alphaTarget(.03);
        d.fx = null;
        d.fy = null;
    }
</script>
