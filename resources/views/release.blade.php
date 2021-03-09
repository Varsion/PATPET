<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <title>PAT PET</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
   ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
   ================================================== -->
    <link rel="stylesheet" href="css/mfb.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/component.css" />


    <!-- script
   ================================================== -->
    <script src="js/modernizr.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <script src="js/mfb.js"></script>


    <!-- favicons
	================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- header
   ================================================== -->
    <header class="short-header">

        <div class="gradient-block"></div>

        <div class="row header-content">

            <div class="logo">
                <a href="index.html">
                    <h1>PAT PET</h1>
                </a>
            </div>

            <nav id="main-nav-wrap">
                <ul class="main-navigation sf-menu">
                    <li>
                        <a href="index.html" title=""> HOME </a>
                    </li>
                    <li>
                        <a href="main.html" title=""> FEATURED </a>
                    </li>
                    <li>
                        <a href="contact.html" title=""> CONTACT </a>
                    </li>
                    <li class="current">
                        <a href="/userPage.html" title="">USER</a>
                    </li>
                </ul>
            </nav> <!-- end main-nav-wrap -->




        </div>

    </header> <!-- end header -->

        <ul id="menu" class="mfb-component--bl mfb-zoomin" data-mfb-toggle="hover" style="display: block;">
            <li class="mfb-component__wrap">
                <a href="#" class="mfb-component__button--main">
                    <i class="mfb-component__child-icon dr-icon dr-icon-menu"></i>
                </a>
                <ul class="mfb-component__list">
                    <li>
                        <a data-mfb-label="User's" class="mfb-component__button--child" href="userPage.html">
                            <i class="mfb-component__child-icon dr-icon dr-icon-user"></i>
                        </a>
                    </li>
                    <li>
                        <a data-mfb-label="Likes" class="mfb-component__button--child" href="userstar.html">
                            <i class="mfb-component__child-icon dr-icon dr-icon-heart"></i>
                        </a>
                    </li>
                    <li>
                        <a data-mfb-label="Release New Post" class="mfb-component__button--child" href="release.html">
                            <i class="mfb-component__child-icon dr-icon dr-icon-bullhorn"></i>
                        </a>
                    </li>
                    <li>
                        <a data-mfb-label="Setting" class="mfb-component__button--child" href="userInfo.html">
                            <i class="mfb-component__child-icon dr-icon dr-icon-settings"></i>
                        </a>
                    </li>

                </ul>
            </li>
        </ul>

        <div class="row">
            <div class="col-twelve">
                <section id="bricks">

                    <form name="cForm" id="cForm" style="width: 80%;">
                        <fieldset>

                            <div class="form-field" style="width: 300px;">
                                <h3>Title:</h3>
                                <input name="art_title" type="text" id="art_title" class="full-width" placeholder="Title" value="">
                            </div>

                            <div class="form-field" style="width: 300px;">
                                <h3>Tag:</h3>
                                <select name="art_tag" id="art_tag">
                                </select>
                            </div>

                            <div class="form-field">
                                <h3>Hero image:</h3>
                                <input name="pic" type="file" id="pic">
                            </div>

                            <div class="message form-field">
                                <h3>Content:</h3>
                                {{-- <textarea name="desc"" id="desc" class="full-width" placeholder="Content..."></textarea> --}}
                                <script id="ue-container" name="content" id="content" type="text/plain" style="height:300px;"></script>

                            </div>

                            <button type="button" class="submit button-primary full-width-on-mobile" onclick="release();">Release Now</button>

                        </fieldset>
                    </form> <!-- end form -->

                    <hr width="80%">
                </section> <!-- end bricks -->
            </div>
        </div>





    <!-- footer
   ================================================== -->
    <footer>

        <div class="footer-main">

            <div class="row">

                <div class="col-four tab-full mob-full footer-info">

                    <h4>About Our Site</h4>

                    <p>
                        Lorem ipsum Ut velit dolor Ut labore id fugiat in ut fugiat nostrud qui in dolore commodo eu
                        magna Duis cillum dolor officia esse mollit proident Excepteur exercitation nulla. Lorem ipsum
                        In reprehenderit commodo aliqua irure labore.
                    </p>

                </div> <!-- end footer-info -->


                <div class="col-two tab-1-3 mob-1-2 social-links">

                    <h4>Social</h4>

                    <ul>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Google+</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>

                </div> <!-- end social links -->

            </div> <!-- end row -->

        </div> <!-- end footer-main -->

        <div class="footer-bottom">
            <div class="row">

                <div class="col-twelve">
                    <div id="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon icon-arrow-up"></i></a>
                    </div>
                </div>

            </div>
        </div> <!-- end footer-bottom -->

    </footer>

    <!-- <div id="preloader">
        <div id="loader"></div>
    </div> -->

    <!-- Java Script
   ================================================== -->
    <script src="js/jquery.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/main.js"></script>
    <script src="js/cookie.js"></script>
    <script src="js/verify.js"></script>

</body>
<script src="js/ytmenu.js"></script>

<!-- ueditor-mz 配置文件 -->
<script type="text/javascript" src="{{asset('ueditor/ueditor.config.js')}}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{asset('ueditor/ueditor.all.js')}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/en/en.js')}}"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('ue-container');
    ue.ready(function(){
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });
</script>
<script src="js/page_js/release.js"></script>
</html>
