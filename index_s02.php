<!-- 資料庫連結 -->
<?php require_once('Connections/conn_db.php'); ?>
<!-- session啟動 -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <!-- 連結css -->
    <link rel="stylesheet" href="css/website_s01.css" />
    <title>Kyanpu</title>
</head>

<body>
    <section id="header">
        <?php
        //列出產品類別第一層
        $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
        $pyclass01 = mysqli_query($link, $SQLstring);
        ?>
        <!-- navbar主選單列 
                 .navbar配色方案類的包裝
                 .navbar-expand-(sm,md,lg,xl) 響應式摺疊選單
                 .navbar-brand 您的公司、產品、項目名稱-->
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#"><img src="images/logo_01.png" class="img-fluid rounded-circle logo" alt="露營商店"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- .collapse 隱藏內容
                 .nav 使用flexbox建構
                 .nav-link 連結字體設定
                 .navbar-nav 全高度 以列排列 選單
                 .mx-auto  margin-x:auto; 水平置中
                 .dropdown 下拉
                 .dropdown-toggle 下拉符號-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle">服務項目</a>
                        <ul class="dropdown-menu">
                            <?php while ($pyclass01_Rows = mysqli_fetch_array($pyclass01)) { ?>
                                <li class="dropdown-item dropdown-submenu">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fas <?php echo $pyclass01_Rows['fonticon']; ?> fa-lg fa-fw"></i><?php echo $pyclass01_Rows['cname']; ?></a>
                                    <?php
                                    //列印產品類別第二層
                                    $SQLstring = "SELECT * FROM pyclass WHERE level=2 and uplink= " . $pyclass01_Rows['classid'] . " ORDER BY sort";
                                    $pyclass02 = mysqli_query($link, $SQLstring);
                                    ?>
                                    <ul class="dropdown-menu">
                                        <?php while ($pyclass02_Rows = mysqli_fetch_array($pyclass02)) { ?>
                                            <li class="dropdown-item"><em class="fa <?php echo $pyclass02_Rows['fonticon']; ?> fa-fw"></em><a href="#"><?php echo $pyclass02_Rows['cname']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">會員註冊</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">會員登入</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">會員中心</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">最新活動</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">查訂單</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">折價券</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">購物車</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">企業專區</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">認識企業文化</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">全台門市資訊</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">供應商報價服務</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">供加盟專區</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">供投資人專區</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav><!--   fixed-top -->
        <!-- carousel輪播 -->
        <!-- <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/carousel01.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/carousel02.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/carousel03.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div> -->


    </section>

    <section id="content">
        <!-- .container，它max-width在每個響應斷點處設置 a
             .container-fluid，width: 100%在所有斷點處
             .container-{breakpoint},width: 100%直到指定斷點 
                 .row，列  .col，欄
                     .col-1~12 手機             width < 576px
                     .col-sm-1~12 平板          width >= 576px
                     .col-md-1~12 電腦          width >= 768px
                     .col-lg-1~12 電視          width >= 992px
                     .col-xl-1~12 大型螢幕      width >= 1200px
                     .col-xxl-1~12 超大型螢幕    -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-12">
                    <!-- 導覽列
                         .accordion 手風琴導覽列 
                             .card-header 導覽列第一層
                             .card-body   導覽列內容-->
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        露營預約
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    北部
                                </div>
                                <div class="card-body">
                                    中部
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        露營商品
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <i class="fa-solid fa-campground">帳篷</i>
                                </div>
                                <div class="card-body">
                                    睡袋
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        熱銷商品
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <i class="fa-solid fa-campground">帳篷</i>
                                </div>
                                <div class="card-body">
                                    睡袋
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- 露營推廣片 youtube自訂css-->
                        <div class="row youtube_card">
                            <div class="youtube_title">露營推廣</div>
                            <div class="video-background col-md-12 ">
                                <iframe width="100%" height="100%" class="youtube_mv" src="https://www.youtube.com/embed/V96aqND_F8w" title="ゆるキャン△聖地巡礼 第一弾！#浩庵キャンプ場　以动漫的方式打开露营 第一弹.--【摇曳露营】圣地巡礼" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-md-9 col-12">
                    <!-- .breadcrumb麵包屑 -->
                    <!-- 麵包屑第一層 -->
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav> -->
                    <!-- 麵包屑第二層 -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">熱銷商品</li>
                        </ol>
                    </nav>
                    <!-- carousel_hot熱銷商品輪播 -->
                    <div id="carousel_hot" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel_hot" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel_hot" data-slide-to="1"></li>
                            <li data-target="#carousel_hot" data-slide-to="2"></li>
                        </ol>
                        <!-- 熱銷產品列 -->
                        <div class="carousel-inner">
                            <!-- 第一頁熱銷產品 -->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="card col-md-6 col-6" style="width: 18rem;">
                                        <img src="./images/m_tent1_1.webp" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">【TAS極限運動】戶外露營專用速開式帳蓬(戶外露營篷 3-4人 露營 家庭旅遊 野餐 帳篷 防水防風 防蚊蟲)</h5>
                                            <p class="card-text">
                                                3秒 速開搭建 輕巧便攜<br>
                                                高密度防蟲紗窗，通風透氣<br>
                                                雙門附有天窗蓋 通風性能好<br>
                                            </p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                    <div class="card col-md-6 col-6" style="width: 18rem;">
                                        <img src="./images/m_clight1_1.webp" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">【aibo】USB充電式 360°照明 復古LED露營燈(長效續航)</h5>
                                            <p class="card-text">
                                                超亮COB LED燈，大功率照<br>
                                                勾環設計，方便手提/吊掛/平放<br>
                                                可充電式設計，環保節能<br>
                                            </p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 第二頁熱銷產品 -->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="card col-md-6 col-6" style="width: 18rem;">
                                        <img src="./images/m_sbag1_1.webp" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">【LONEPINE】加大款 全開式保暖睡袋 防水極地PRO/睡袋/冬季/保暖/露營(兩色任選)</h5>
                                            <p class="card-text">
                                                ▲高強度防撕裂防潑水格紋布<br>
                                                ▲極限溫度可達-10度<br>
                                                ▲收納輕巧,方便攜帶<br>
                                            </p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                    <div class="card col-md-6 col-6" style="width: 18rem;">
                                        <img src="./images/m_tent1_1.webp" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">【TAS極限運動】戶外露營專用速開式帳蓬(戶外露營篷 3-4人 露營 家庭旅遊 野餐 帳篷 防水防風 防蚊蟲)</h5>
                                            <p class="card-text">
                                                3秒 速開搭建 輕巧便攜<br>
                                                高密度防蟲紗窗，通風透氣<br>
                                                雙門附有天窗蓋 通風性能好<br>
                                            </p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 第三頁熱銷產品 不要顯示 -->
                            <!-- <div class="carousel-item">
                                <img src="..." class="d-block w-100" alt="...">
                            </div> -->
                        </div>
                        <!-- 輪播按鍵"上一頁" -->
                        <button class="carousel-control-prev hand-button" type="button" data-target="#carousel_hot" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <!-- 輪播按鍵"下一頁 -->
                        <button class="carousel-control-next hand-button" type="button" data-target="#carousel_hot" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="news">
        <div class="col">
            最近消息
        </div>
        <div class="col">
            近期活動
        </div>
    </section>

    <section id="footer">
        <div class="container-fluid">
            <div id="last-data" class="row text-center">
                <div class="col-md-12">
                    <h6>中彰投分署科技股份有限公司 40767台中市西屯區工業區一路100號 電話：04-23592181 免付費電話：0800-777888</h6>
                    <h6>企業通過ISO/IEC27001認證，食品業者登錄字號：A-127360000-00000-0</h6>
                    <h6>版權所有 copyright © 2017 WDA.com Inc. All Rights Reserved.</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>