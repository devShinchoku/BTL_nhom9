<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập | Hahalolo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <script></script>
</head>

<body>
    <main class="container">
        <div class="row mt-5 si-row">
            <div class="col-md-6">
                <div class="su-logos">
                    <a href="../../" class="su-logo">
                        <svg viewBox="0 0 24 24" focusable="false" aria-hidden="true">
                            <path fill="#24a8d8"
                                d="M22 11.5c0-1-.2-1.9-.6-2.8-1.4-4.2-5.6-7-10-6.8h-.1c-1.7.2-3.4.7-4.9 1.8-4.6 3-5.8 9.2-2.8 13.9v.1c.2.2.3.6.6.8l.1.1c1.9 2.2 4.7 3.6 7.7 3.6h8.7c.8 0 1.3-.6 1.3-1.3v-9.4z">
                            </path>
                            <path fill="#FFF"
                                d="M16.9 16.8c-.7.9-1.7 1.4-2.8 1.5-.5 0-1-.1-1.4-.5-.3-.3-.5-.8-.4-1.2 0-.2 0-.4.1-.6 0-.2.1-.5.2-.8l1-3.8c-.2.3-.4.5-.6.8-.9 1.8-1.7 3.7-2.4 5.6 0 .1-.1.3-.2.4h-.1c-.1.1-.3.2-.5.2s-.4-.1-.5-.2c-.3-.2-.4-.4-.5-.6-.1-.3-.2-.5-.2-.8s0-.5.1-.8l2.5-9.9c0-.1.1-.2.2-.2l1.7-.5h.1c.1 0 .1.1.1.2l-3.1 12v.2c0-.1.1-.2.2-.5l.3-.9c.2-.7.5-1.4.7-2s.5-1.3.8-1.9c.3-.6.6-1.1 1.1-1.6.1-.1.2-.2.3-.2v-.1s0-.1.1-.1v-.1h.2c.3 0 .5.1.7.3.2.3.2.6.2.9 0 .4-.1.8-.2 1.2l-.3 3.2c-.1.4-.1.8-.1 1.2.1.2.3.3.8.2.7-.2 1.3-.5 1.8-.9.1 0 .2.2.1.3z">
                            </path>
                        </svg>
                    </a>
                    <span class="su-logo-font">
                        Hahalolo
                    </span>
                </div>
                <div style="font-size: 26px;">
                    <div class="mt-3">
                        <span>
                            <b>
                                Bạn thích
                            </b>
                        </span>
                    </div>
                    <div style="font-size: 40px;">
                        <span>
                            <b>
                                đi du lịch?
                            </b>
                        </span>
                    </div>
                    <div class="mt-2">
                        <span>
                            <b>
                                Bạn muốn tìm hiểu thông tin về những điểm đến?
                            </b>
                        </span>
                    </div>
                    <div class="su-youlike2 mt-3" style="  height: 57px; width: 595px;">
                        <span>
                            <h6 class="su-youlike2-1" style="font-size: 24px; font-weight: 400;">
                                Chỉ với vài thao tác, hãy nhanh chóng đăng nhập để trải nghiệm và cảm nhận các tiện ích
                                tuyệt vời của chúng tôi.
                            </h6>
                        </span>
                    </div>
                </div>
            </div>

            <form class="col-md-6" action="sign-in.php" method="post" role="form" >
                <div class="su-signup-form" style=" height: 452px; width: 448px;border: 1px solid rgb(227, 252, 252) ;">
                    <div class="su-signup-formsu">
                        <span>
                            <b>
                                Đăng Nhập
                            </b>
                        </span>
                    </div>
                    <div>                  
                       
                        <div class="btn-login mt-5 mb-5">
                            <input type="text" name="email" autocomplete="off" required />
                            <label for="name" class="lable-name"> 
                                <span class="content-name">
                                    Email hoặc số điện thoại
                                </span>
                            </label>
                            <small id="emailHelp"></small> 
                        </div>

                        
                        <!-- test -->
                        <div class="btn-login mt-3">
                            <input id="password" type="password" name="password" autocomplete="off" required/>
                            
                            <label for="name" class="lable-name"> 
                                <span class="content-name" style="display: flex;">
                                    <div>
                                        Mật Khẩu
                                    </div>
                                </span>
                            </label>
                            <div id="eye" style="text-align: right; margin-top: -39px; padding-left: 336px;font-size: 24px; ">
                                <i class="bi bi-eye-slash"></i>
                            </div>
                        </div>

                        <!-- test -->


                    </div>
                    <div class="mt-5 ">
                        <button class="su-signup-dk" name ="ok">
                            Đăng Nhập
                        </button>
                    </div>
                    <div class="su-rules mt-5">
                        <span>                       
                            <a href="" class="su-rules-iteam">
                                <span>
                                    Quên mật khẩu?
                                </span>
                            </a>                          
                        </span>
                    </div>
                    <div class="su-rules mt-5 mb-5">
                        <span>
                            Bạn chưa có tài khoản? 
                            <a href="" class="su-rules-iteam">
                                <span>
                                    Đăng ký tại đây!
                                </span>
                            </a>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <footer>
        <div class="su-footer mt-5">
            <div class="" style="width: 1248px; height: 52px;">
                <div class="su-footer-btn">
                    <div>
                        <button class="su-footer-btn-iteam">
                            <i class="bi bi-google"></i>
                            Google Play
                        </button>
                        <button class="su-footer-btn-iteam">
                            <i class="bi bi-apple"></i>
                            App Store
                        </button>
                    </div>
                    <div>
                        <button class="su-footer-btn-icon">
                            Deutsch
                        </button>
                        |
                        <button class="su-footer-btn-icon">
                            English
                        </button>
                        |
                        <button class="su-footer-btn-icon">
                            Tiếng Việt
                        </button>
                        |
                        <button class="su-footer-btn-icon">
                            中文 (简体)
                        </button>
                        <button class="su-footer-btn-icon1">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="su-footer-left1">
            <div class="su-footer-left" style="width: 1248px; height: 52px;">
                <p>©2017 Hahalolo. Đã đăng ký bản quyền.</p>
            </div>
        </div>
    </footer>







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="sign-in.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html> 