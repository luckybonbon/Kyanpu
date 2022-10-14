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
        <!-- navbar主選單列 -->
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="#"><img src="images/logo_01.png" class="img-fluid rounded-circle logo" alt="露營商店"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle">測試中心</a>
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
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
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
        </div>
        <!-- <div class="video-background container-fluid">
        <iframe width="1239" height="697" src="https://www.youtube.com/embed/V96aqND_F8w" title="ゆるキャン△聖地巡礼 第一弾！#浩庵キャンプ場　以动漫的方式打开露营 第一弹.--【摇曳露营】圣地巡礼" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                <div class="card col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div id="carouselExampleControlsNoTouching1" class="carousel slide" data-touch="false" data-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/tent01.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">圓頂型帳篷</h5>
                                        <p class="card-text content_f">只要使用兩至三根杆子就能夠組合合成，規模比較小的帳篷類型。由於天花板的造型就像圓球一般，因此被稱之為圓頂型帳篷，亦稱蒙古包式帳篷。圓頂型帳篷的優點如下：
                                        <ul>
                                            <li>比較容易設置</li>
                                            <li>就算只有一個人也能夠組合完成</li>
                                            <li>搬運上相當輕鬆</li>
                                        </ul>
                                        </p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="images/tent02.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">家庭帳篷</h5>
                                        <p class="card-text content_f">
                                            與圓頂型帳篷相比，家庭用帳篷在尺寸上屬於比較大的帳篷類型。能夠同時擁有客廳以及寢室，非常適合長期露營，亦稱別墅式帳篷。家庭用帳篷優點如下：
                                        <ul>
                                            <li>內部空間寬廣，頂端高度也高，具有高舒適性</li>
                                            <li>能夠同時容納多人居住</li>
                                        </ul>
                                        </p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="images/tent03.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">圓屋型帳篷</h5>
                                        <p class="card-text content_f">
                                            圓屋型的帳篷是將圓頂型帳篷（蒙古包式帳篷）以及家庭帳篷（別墅式帳篷）兩者特徵進行合併的結果，亦稱圓頂別墅帳篷，圓屋型帳篷具有以下特性：
                                        <ul>
                                            <li>如同圓頂型帳篷一般容易設置</li>
                                            <li>有著家庭別墅型帳篷的舒適感</li>
                                        </ul>
                                        </p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControlsNoTouching1" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#carouselExampleControlsNoTouching1" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card col-md-4">
                    <div class="card" style="width: 18rem;">
                        <div id="carouselExampleControlsNoTouching2" class="carousel slide" data-touch="false" data-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/40723005.webp" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">【黑鹿 BLACKDEER 】超輕量羽絨睡袋</h5>
                                        <p class="card-text content_f">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="images/45367434.webp" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text content_f">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControlsNoTouching2" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#carouselExampleControlsNoTouching2" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card col-md-4">
                    <div class="card">
                        <div id="carouselExampleControlsNoTouching3" class="carousel slide" data-touch="false" data-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/70000.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text content_f">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControlsNoTouching3" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#carouselExampleControlsNoTouching3" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        </div>
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