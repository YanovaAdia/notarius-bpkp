<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Aktivitas Harian</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/logos/logobpkp.png" />
    <link rel="stylesheet" href="assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .logo-bpkp {
            width: 60%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .gambar-profile {
            width: 20%;
            height: auto;
            border-radius: 30%;
        }

        .judul-app {
            margin-top: 10%;
            margin-left: 10%;
            width: 100%;
        }

        .sub-judulapp {
            margin-left: 10%;
            color: gray;
            font-size: 15px;
        }

        .judul-isi {
            font-size: 20px;
        }

        .subjudul-isi {
            font-size: 15px;
            color: gray;
        }

        .bi-check-circle-fill {
            font-size: 30px !important;
            color: gray;
            margin-right: 5%;
            cursor: pointer;
        }

        .active {
            color: #16B364;
        }

        .bi-arrow-down-short {
            font-size: 23px !important;
            color: #16B364;
            margin-right: -5%;
            margin-bottom: 10%;
            cursor: pointer;
        }

        .bi-arrow-up-short {
            font-size: 23px !important;
            color: #16B364;
            margin-right: -5%;
            margin-bottom: 10%;
            cursor: pointer;
        }

        .detail {
            color: #16B364;
            font-size: 15px;
            margin-bottom: 13%;
            cursor: pointer;
        }

        .show-more {
            color: blue;
            font-size: 15px;
            margin-top: 30px;
            cursor: pointer;
        }

        .btn-success {
            background-color: #16B364 !important;
            color: white;
        }

        .detail-content {
            display: none;
        }

        .left-sidebar {
            position: relative;
            height: 100vh;
        }

        .sidebar-logout {
            position: absolute;
            bottom: 5px;
            width: 100%;
            text-align: center;
        }

        .sidebar-logout a {
            display: block;
            padding: 10px 20px;
        }
        
        .foto-profil {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #16B364;
        }

        .card-title {
            font-size: 24px !important;
            font-weight: bold;
        }

        .judul-isi {
            font-size: 20px !important;
            font-weight: 600;
        }

        .subjudul-isi {
            font-size: 16px !important;
            color: gray;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="/home" class="text-nowrap logo-img">
                        <img src="assets/images/logos/logobpkp.png" alt="" class="logo-bpkp" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar mt-4" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item mb-3">
                            <a class="sidebar-link" href="/profil">
                                <img src="assets/images/profile/user-1.jpg" class="gambar-profile">
                                <span class="hide-menu"> {{ Auth::user() !== null ? Auth::user()->name : 'user' }} </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/home" aria-expanded="false">
                                <i class="bi bi-house fs-5"></i>
                                <span class="hide-menu">HOME</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="/daftar" aria-expanded="false">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="bi bi-list-task fs-5"></i>
                                    <span class="hide-menu">DAFTAR AKTIVITAS</span>
                                </div>
                            </a>
                        </li>
                        <div class="sidebar-logout">
                            <a class="sidebar-link justify-content-between" href="{{ route('logout') }}" aria-expanded="false">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="bi bi-box-arrow-right fs-5"></i>
                                    <span class="hide-menu">LOGOUT</span>
                                </div>
                            </a>
                        </div>
                    </ul>
                </nav>
            </div>
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <h3 class="judul-app"> Aplikasi Aktivitas Harian </h3>
                            <h5 class="sub-judulapp"> Welcome back, {{ Auth::user() !== null ? Auth::user()->name : 'user' }}!</h5>
                            <h5 id="current-date" class="sub-judulapp"> Hari ini tanggal </h5>
                        </li>
                    </ul>
                </nav>
            </header>
            <!--  Header End -->
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="card-title fw-semibold mb-4">To Do List Activity</h5>
                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="judul-isi"> Reviu Dokumen </h3>
                                            <h5 class="subjudul-isi"> Tugas reviu dokumen dinas Kelautan dan Perikanan
                                                Provinsi Jawa Timur
                                            </h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <i class="bi bi-arrow-down-short detail-toggle"></i>
                                            <span class="detail"> Detail </span>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="judul-isi"> Rapat dengan SDM </h3>
                                            <h5 class="subjudul-isi"> Rapat dengan SDM untuk membahas aturan berlaku
                                            </h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <i class="bi bi-arrow-down-short detail-toggle"></i>
                                            <span class="detail"> Detail </span>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="judul-isi"> Diskusi Internal </h3>
                                            <h5 class="subjudul-isi"> Diskusi Internal kelanjutan dari rapat dengan SDM
                                            </h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <i class="bi bi-arrow-down-short detail-toggle"></i>
                                            <span class="detail"> Detail </span>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="judul-isi"> Helpdesk </h3>
                                            <h5 class="subjudul-isi"> Melakukan layanan dukungan teknis yang berperan
                                                penting dalam menjaga
                                                kelancaran operasional </h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <i class="bi bi-arrow-down-short detail-toggle"></i>
                                            <span class="detail"> Detail </span>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="judul-isi"> Inspeksi </h3>
                                            <h5 class="subjudul-isi"> Inspeksi di Dinas DPMPTSP </h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <i class="bi bi-arrow-down-short detail-toggle"></i>
                                            <span class="detail"> Detail </span>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="judul-isi"> Laporan pertanggung jawaban </h3>
                                            <h5 class="subjudul-isi"> Mengerjakan laporan pertanggung jawaban ditunggu
                                                sampai tanggal 3 Maret
                                                2025 </h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <i class="bi bi-arrow-down-short detail-toggle"></i>
                                            <span class="detail"> Detail </span>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <div>
                                            <h3 class="judul-isi"> Audit </h3>
                                            <h5 class="subjudul-isi"> Melakukan audit investigasi </h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-check-circle-fill"></i>
                                            <i class="bi bi-arrow-down-short detail-toggle"></i>
                                            <span class="detail"> Detail </span>
                                        </div>
                                    </div>

                                    <hr>

                                    <div id="global-detail" class="detail-content" style="display: none;">
                                        <hr>
                                        <div class="mb-4">
                                            <label class="form-label">Isu atau permasalahan yang ditemukan</label>
                                            <textarea class="form-control" rows="3"
                                                placeholder="Isilan isu atau permasalahan yang ditemukan"></textarea>
                                            <label class="form-label">Solusi dari permasalahan yang ditemukan</label>
                                            <textarea class="form-control" rows="3"
                                                placeholder="Isilan solusi dari permasalahan yang ditemukan"></textarea>
                                            <button type="button" class="btn btn-success mt-3">Simpan</button>
                                        </div>
                                    </div>
                                    <h5 class="show-more"> Show More </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const today = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDate = today.toLocaleDateString('id-ID', options); // Format tanggal sesuai dengan lokal Indonesia
            document.getElementById('current-date').textContent = `Hari ini tanggal ${formattedDate}`;


            const checkIcons = document.querySelectorAll('.bi-check-circle-fill');
            checkIcons.forEach(function (checkIcon) {
                checkIcon.addEventListener('click', function () {
                    this.classList.toggle('active');
                });
            });

            const detailToggles = document.querySelectorAll('.detail-toggle');
            const globalDetail = document.getElementById('global-detail');
            let activeToggle = null;

            detailToggles.forEach(function (toggle) {
                toggle.addEventListener('click', function () {
                    const parentRow = this.closest('.col-12');
                    const isDetailVisible = globalDetail.style.display === 'block';
                    if (isDetailVisible && activeToggle === this) {
                        globalDetail.style.display = 'none';
                        this.classList.replace('bi-arrow-up-short', 'bi-arrow-down-short');
                        activeToggle = null;
                        return;
                    }
                    parentRow.after(globalDetail);
                    globalDetail.style.display = 'block';
                    document.querySelectorAll('.detail-toggle').forEach(icon => {
                        icon.classList.replace('bi-arrow-up-short', 'bi-arrow-down-short');
                    });
                    this.classList.replace('bi-arrow-down-short', 'bi-arrow-up-short');
                    activeToggle = this;
                });
            });
        });
    </script>


    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>