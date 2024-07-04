<!-- sidebar.html -->
<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">

                <!-- profile box -->
                <div class="profileBox">
                    <div class="image-wrapper">
                        <img src="assets/img/sample/avatar/profile.png" alt="image" class="imaged rounded">
                    </div>
                    <div class="in">
                        <strong id="profile-name">User Name</strong>
                        <div class="text-muted">
                            <span id="profile-nim">NIM</span>
                        </div>
                    </div>
                    <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                        <ion-icon name="close"></ion-icon>
                    </a>
                </div>
                <!-- * profile box -->

                <ul class="listview flush transparent no-line image-listview mt-2">
                    <li>
                        <a href="page-beranda.php" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="home-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Beranda
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="page-tugas-akhir.php" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="albums-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Tugas Akhir
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="page-jadwal-sidang.php" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="layers-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Jadwal Sidang
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="page-daftar-dosen.php" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="list-outline"></ion-icon>
                            </div>
                            <div class="in">
                                <div>Daftar Dosen</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="page-logbook.php" class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="book-outline"></ion-icon>
                            </div>
                            <div class="in">
                                <div>Logbook</div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="item">
                            <div class="icon-box bg-primary">
                                <ion-icon name="moon-outline"></ion-icon>
                            </div>
                            <div class="in">
                                <div>Dark Mode</div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input dark-mode-switch"
                                        id="darkmodesidebar">
                                    <label class="custom-control-label" for="darkmodesidebar"></label>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <!-- sidebar buttons -->
                <div class="sidebar-buttons">
                    <a href="javascript:;" class="button">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>
                    <a href="javascript:;" class="button">
                        <ion-icon name="settings-outline"></ion-icon>
                    </a>
                    <a href="javascript:;" class="button" id="logout-button">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </div>
                <!-- * sidebar buttons -->
            </div>
        </div>
    </div>
</div>

<!-- Add jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- AJAX script to handle logout -->
<script>
    $(document).ready(function() {
        $('#logout-button').on('click', function() {
            $.ajax({
                url: 'logout-api.php',
                type: 'POST',
                success: function(response) {
                    if (response.success) {
                        // Redirect to login page or show a message
                        window.location.href = 'page-login.php';
                    } else {
                        alert('Logout failed: ' + response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while logging out.');
                }
            });
        });
    });
</script>
