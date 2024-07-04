<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover" />
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

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary scrolled">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            SITA
        </div>
        <div class="right">
            <a href="javascript:;" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline"></ion-icon>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Search...">
                <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="header-large-title-logbook">
            <h1 class="title">LOGBOOK</h1>
        </div>
        <div class="section mt-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <form id="logbookForm">
                        <label for="nama">Tahapan :</label><br>
                        <input type="text" id="tahapan" name="tahapan" placeholder="Planning, Analysis, Design atau Implementasi" required><br>
                        
                        <label for="deskripsi">Deskripsi Pengerjaan:</label><br>
                        <textarea id="deskripsi" name="deskripsi" rows="4" cols="50" placeholder="Masukkan Deskrispi Pengerjaan Anda" required></textarea><br>

                        <label for="output">Outuput Pengerjaan:</label><br>
                        <input type="text" id="output" name="output" placeholder="Output hasil seperti dokumen SRS atau lainnya" required><br>

                        <label for="tanggalmulai">Tanggal Mulai:</label><br>
                        <input type="date" id="tanggalmulai" name="tanggalmulai" required><br>

                        <label for="tanggalselesai">Tanggal Selesai:</label><br>
                        <input type="date" id="tanggalselesai" name="tanggalselesai" required><br>
                        
                        <label for="persentase">Kemajuan Proposal:</label><br>
                        <input type="number" id="persentase" name="persentase" min="0" max="100" placeholder="Masukkan persentase selesai 1-100" required><br>
                        
                        <input type="submit" class="bg-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>

        <!-- app footer -->
        <div class="appFooter">
            <div class="footer-title">
                Sistem Informasi Layanan Tugas Akhir Jurusan Teknik Informatika
            </div>
            <div>Politeknik Negeri Batam.</div>
            Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29461
            <div class="mt-2">
                <a href="javascript:;" class="btn btn-icon btn-sm btn-facebook">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a href="javascript:;" class="btn btn-icon btn-sm btn-twitter">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a>
                <a href="javascript:;" class="btn btn-icon btn-sm btn-linkedin">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                <a href="javascript:;" class="btn btn-icon btn-sm btn-instagram">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
                <a href="javascript:;" class="btn btn-icon btn-sm btn-whatsapp">
                    <ion-icon name="logo-whatsapp"></ion-icon>
                </a>
                <a href="#" class="btn btn-icon btn-sm btn-secondary goTop">
                    <ion-icon name="arrow-up-outline"></ion-icon>
                </a>
            </div>

        </div>
        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->

    <!-- Popup Message -->
    <div id="popupMessage" class="popup-message"></div>
    <!-- * Popup Message -->

    <!-- Load the sidebar -->
    <div id="sidebarContainer"></div>

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="page-beranda.php" class="item active">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->

    <!-- welcome notification  -->
    <div id="notification-welcome" class="notification-box">
        <div class="notification-dialog android-style">
            <div class="notification-header">
                <div class="in">
                    <img src="assets/img/icon/polibatam.png" alt="image" class="imaged w24">
                    <strong>SITA</strong>
                    <span>just now</span>
                </div>
                <a href="#" class="close-button">
                    <ion-icon name="close"></ion-icon>
                </a>
            </div>
            <div class="notification-content">
                <div class="in">
                    <h3 class="subtitle">Selamat Datang di SITA</h3>
                    <div class="text">
                        Sistem Informasi Layanan Tugas Akhir Jurusan Teknik Informatika Berbasis Mobile Politeknik Negeri Batam.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * welcome notification -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>

    <script>
        $(document).ready(function () {
            $('#logbookForm').on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'logbook-api.php',
                    data: $(this).serialize(),
                    success: function (response) {
                        console.log(response); // Debugging line to see the response
                        if (response.success) {
                            showPopup('Logbook entry added successfully!', 'success');
                            // Optionally, clear the form fields
                            $('#logbookForm')[0].reset();
                        } else {
                            showPopup('Failed to add logbook entry: ' + response.message, 'error');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX Error: ' + status + error);
                        console.log(xhr.responseText);
                        showPopup('Failed to add logbook entry: ' + error, 'error');
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

            // Load sidebar content and welcome notification
            $('#sidebarContainer').load('sidebar.php', function () {
                // After sidebar is loaded, fetch session data
                $.ajax({
                    url: 'getSessionData.php',
                    method: 'GET',
                    success: function (response) {
                        if (response.success) {
                            $('#profile-name').text(response.nama);
                            $('#profile-nim').text(response.nim);
                        } else {
                            console.error(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            setTimeout(() => {
                notification('notification-welcome', 5000);
            }, 2000);
        });
    </script>
</body>

</html>