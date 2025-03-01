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

        .table td,
        .table th {
            word-break: break-word;
            white-space: normal;
        }

        .custom-table {
            width: 100%;
            table-layout: fixed;
        }

        #search-input::placeholder {
            color: white;
            opacity: 1;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination button {
            margin: 0 5px;
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
                                <span class="hide-menu"> ARIS A.Md </span>
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
                            <h5 class="sub-judulapp"> Welcome back, Aris!</h5>
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
                            <div class="card" style="background-color: #3e54a0;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="text" class="form-control" id="search-input"
                                                placeholder="Search Activity" style="border-color: white; color: white">
                                        </div>
                                        <div class="col-3">
                                            <input type="date" class="form-control" id="date-filter"
                                                style="border-color: white; color: white">
                                        </div>
                                        <div class="col-3">
                                            <select class="form-select" id="status-filter"
                                                aria-label="Default select example"
                                                style="border-color: white; color: white">
                                                <option selected style="color: black">Status</option>
                                                <option value="Progress" style="color: black">Progress</option>
                                                <option value="Selesai" style="color: black">Selesai</option>
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <select class="form-select" aria-label="Default select example"
                                                id="data-limit" style="border-color: white; color: white">
                                                <option value="5" style="color: black">5</option>
                                                <option value="10" style="color: black">10</option>
                                                <option value="15" style="color: black">15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-dark mb-0 custom-table">
                                    <thead>
                                        <tr class="fs-2" style="vertical-align: middle; text-align: center">
                                            <th style="width: 30px; padding: 10px 10px;">No</th>
                                            <th style="width: 200px; padding: 10px 10px;">To Do List Activity</th>
                                            <th style="width: 70px; padding: 10px 10px;">Date</th>
                                            <th style="width: 50px; padding: 10px 10px;">Status</th>
                                            <th style="width: 50px; padding: 10px 10px;">User</th>
                                            <th style="width: 50px; padding: 10px 10px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fs-2">
                                        <tr>
                                            <th
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                1
                                            </th>
                                            <th>Reviu Dokumen <br> Tugas reviu dokumen dinas Kelautan dan Perikanan
                                                Provinsi Jawa Timur</th>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                26/02/2025
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Selesai
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Aris A.Md
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pen"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                2
                                            </th>
                                            <th>Rapat dengan SDM <br> Rapat dengan SDM untuk membahas aturan berlaku
                                            </th>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                26/02/2025
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Selesai
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Mark Lee
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pen"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                3
                                            </th>
                                            <th>Diskusi Internal <br> Rapat dengan SDM untuk membahas aturan berlaku
                                            </th>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                26/02/2025
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Selesai
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Aris A.Md
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pen"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                4
                                            </th>
                                            <th>Reviu Dokumen <br> Tugas reviu dokumen dinas Kelautan dan Perikanan
                                                Provinsi Jawa Timur</th>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                26/02/2025
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Selesai
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Aris A.Md
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pen"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                5
                                            </th>
                                            <th>Reviu Dokumen <br> Tugas reviu dokumen dinas Kelautan dan Perikanan
                                                Provinsi Jawa Timur</th>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                26/02/2025
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Progress
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Aris A.Md
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pen"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                6
                                            </th>
                                            <th>Reviu Dokumen <br> Tugas reviu dokumen dinas Kelautan dan Perikanan
                                                Provinsi Jawa Timur</th>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                26/02/2025
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Progress
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Aris A.Md
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pen"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                7
                                            </th>
                                            <th>Reviu Dokumen <br> Tugas reviu dokumen dinas Kelautan dan Perikanan
                                                Provinsi Jawa Timur</th>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                28/02/2025
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Progress
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                Aris A.Md
                                            </td>
                                            <td
                                                style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pen"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div id="pagination" class="pagination mt-5 justify-content-center">
                                    <button id="prev" class="btn btn-primary" disabled>Prev</button>
                                    <span id="page-numbers"></span>
                                    <button id="next" class="btn btn-primary">Next</button>
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
            const formattedDate = today.toLocaleDateString('id-ID', options);
            document.getElementById('current-date').textContent = `Hari ini tanggal ${formattedDate}`;

            const searchInput = document.getElementById('search-input');
            const statusFilter = document.getElementById('status-filter');
            const dateFilter = document.getElementById('date-filter');
            const dataLimitSelect = document.getElementById('data-limit');
            const tableRows = document.querySelectorAll('.table tbody tr');
            const paginationContainer = document.getElementById('pagination');
            const pageNumbersContainer = document.getElementById('page-numbers');
            const prevButton = document.getElementById('prev');
            const nextButton = document.getElementById('next');

            let currentPage = 1;
            let rowsPerPage = 5;

            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedStatus = statusFilter.value;
                const selectedDate = dateFilter.value;
                const dataLimit = parseInt(dataLimitSelect.value);

                let displayedCount = 0;
                let filteredRows = [];

                tableRows.forEach(row => {
                    const rowText = row.textContent.toLowerCase();
                    const rowStatus = row.cells[3].textContent.trim();
                    const rowDate = row.cells[2].textContent.trim();

                    const formattedRowDate = rowDate.includes('/')
                        ? rowDate.split('/').reverse().join('-')
                        : new Date(rowDate).toISOString().split('T')[0];

                    const matchesSearch = rowText.includes(searchTerm);
                    const matchesStatus = selectedStatus === 'Status' || rowStatus === selectedStatus;
                    const matchesDate = selectedDate === '' || formattedRowDate === selectedDate;

                    if (matchesSearch && matchesStatus && matchesDate) {
                        filteredRows.push(row);
                    }
                });

                const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
                updatePagination(totalPages);
                displayRows(filteredRows);
            }

            function displayRows(filteredRows) {
                const start = (currentPage - 1) * rowsPerPage;
                const end = start + rowsPerPage;

                tableRows.forEach(row => row.style.display = 'none'); // Sembunyikan semua baris

                filteredRows.slice(start, end).forEach(row => {
                    row.style.display = ''; // Tampilkan baris yang sesuai
                });
            }

            function updatePagination(totalPages) {
                pageNumbersContainer.innerHTML = ''; // Kosongkan kontainer

                for (let i = 1; i <= totalPages; i++) {
                    const pageButton = document.createElement('button');
                    pageButton.textContent = i;
                    pageButton.className = 'btn btn-light';
                    pageButton.onclick = function () {
                        currentPage = i;
                        filterTable(); // Panggil filterTable untuk menampilkan baris yang sesuai
                    };
                    pageNumbersContainer.appendChild(pageButton);
                }

                prevButton.disabled = currentPage === 1;
                nextButton.disabled = currentPage === totalPages;

                prevButton.onclick = function () {
                    if (currentPage > 1) {
                        currentPage--;
                        filterTable();
                    }
                };

                nextButton.onclick = function () {
                    if (currentPage < totalPages) {
                        currentPage++;
                        filterTable();
                    }
                };
            }

            function setDefaultDisplay() {
                dataLimitSelect.value = '5';
                filterTable();
            }

            searchInput.addEventListener('input', filterTable);
            statusFilter.addEventListener('change', filterTable);
            dateFilter.addEventListener('change', filterTable);
            dataLimitSelect.addEventListener('change', filterTable);

            setDefaultDisplay();

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