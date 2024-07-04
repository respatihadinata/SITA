<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>SITA</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/polibatam.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/polibatam.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
    <style>
        /* CSS for Popup Message */
        .popup-message {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            border-radius: 5px;
            z-index: 1000;
        }

        .popup-message.success {
            background-color: #4caf50;
            color: #fff;
        }

        .popup-message.error {
            background-color: #f44336;
            color: #fff;
        }
    </style>
</head>
<body class="bg-white">
    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">
        <div class="login-form mt-1">
            <div class="section">
                <img src="assets/img/sample/photo/INFORMATIKA.jpeg" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>SITA</h1>
                <h4>Sistem Informasi Tugas Akhir Teknik Informatika</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form id="loginForm">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="ID Learning">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->

    <!-- Popup Message -->
    <div id="popupMessage" class="popup-message"></div>
    <!-- * Popup Message -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>

    <script>
        $(document).ready(function () {
            $('#loginForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'login-api.php',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log(response); // Debugging line to see the response
                        if (response.success) {
                            showPopup('Login successful!', 'success');
                            setTimeout(function () {
                                window.location.href = 'page-beranda.php'; // Redirect after showing message
                            }, 2000);
                        } else {
                            showPopup('Login failed: ' + response.message, 'error');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error: ' + status + error);
                        showPopup('Login failed: ' + error, 'error');
                    }
                });
            });

            // Function to show popup
            function showPopup(message, type) {
                var popup = $('#popupMessage');
                popup.removeClass('success error').addClass(type).text(message).fadeIn();

                // Hide popup after 3 seconds
                setTimeout(function () {
                    popup.fadeOut();
                }, 3000);
            }
        });
    </script>
</body>
</html>