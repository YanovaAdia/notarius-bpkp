<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Aktivitas Harian</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/logobpkp.png" />
    <link rel="stylesheet" href="./assets/css/styles.min.css" />
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
            color: black;
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

        .btn-cetak {
            background-color: #072ef07d;
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
                    <a href="{{ route('home') }}" class="text-nowrap logo-img">
                        <img src="./assets/images/logos/logobpkp.png" alt="" class="logo-bpkp" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar mt-4" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item mb-3">
                            <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                                <img src="./assets/images/profile/{{ Auth::user()->foto_profil }}" class="gambar-profile">
                                <span class="hide-menu"> {{ Auth::user()->name }} </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                                <i class="bi bi-house fs-5"></i>
                                <span class="hide-menu">HOME</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="{{ route('daftar') }}" aria-expanded="false">
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
                            <h5 class="sub-judulapp"> Welcome back, {{ Auth::user()->name }}!</h5>
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
                            <div class="card" style="background-color: #D3E2EF; margin-bottom: 0px; border-radius: 0%;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <input type="text" class="form-control" id="search-input"
                                                placeholder="Search Activity"
                                                style="border-color: black; color: black; background-color :white;">
                                        </div>
                                        <div class="col-3">
                                            <input type="date" class="form-control" id="date-filter"
                                                style="border-color: black; color: black; background-color :white;">
                                        </div>
                                        <div class="col-2">
                                            <select class="form-select" id="status-filter"
                                                aria-label="Default select example"
                                                style="border-color: black; color: black; background-color :white;">
                                                <option selected style="color: black">Status</option>
                                                <option value="Belum" style="color: black">Belum</option>
                                                <option value="Selesai" style="color: black">Selesai</option>
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <select class="form-select" aria-label="Default select example"
                                                id="data-limit"
                                                style="border-color: black; color: black; background-color :white;">
                                                <option value="5" style="color: black">5</option>
                                                <option value="10" style="color: black">10</option>
                                                <option value="15" style="color: black">15</option>
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-cetak" style="width: 125px; " onClick="window.location='{{ route('aktivitas.cetak') }}?searchInput='+document.querySelector('#search-input').value+'&dateFilter='+document.querySelector('#date-filter').value+'&statusFilter='+document.querySelector('#status-filter').value">
                                                <i class="bi bi-printer"></i> Cetak
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-dark mb-0 custom-table">
                                    <thead>
                                        <tr class="fs-2" style="vertical-align: middle; text-align: center">
                                            <th style="width: 50px; padding: 10px 10px;">No</th>
                                            <th style="width: 400px; padding: 10px 10px;">To Do List Activity</th>
                                            <th style="width: 100px; padding: 10px 10px;">Date</th>
                                            <th style="width: 100px; padding: 10px 10px;">Status</th>
                                            <th style="width: 100px; padding: 10px 10px;">User</th>
                                            <th style="width: 100px; padding: 10px 10px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fs-2">
                                        @foreach ($aktivitas_user as $aktivitas)
                                            <tr>
                                                <td style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $aktivitas->nama_aktivitas }}
                                                    <br>
                                                    {{ $aktivitas->instruksi_aktivitas }}
                                                </td>
                                                <td style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                    {{ \Carbon\Carbon::parse($aktivitas->tanggal)->locale(app()->getLocale())->isoFormat('DD/MM/YYYY') }}
                                                </td>
                                                <td style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                    {{ ucfirst($aktivitas->status) }}
                                                </td>
                                                <td style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                    {{ $aktivitas->name }}
                                                </td>
                                                <td style="text-align: center; width: 30px; padding: 0px 10px; vertical-align: middle;">
                                                    <button class="btn btn-primary btn-detail" data-detail-aktivitas="{{ $aktivitas->detail_aktivitas }}" data-issue="{{ $aktivitas->issue }}" data-solusi="{{ $aktivitas->solusi }}">Detail</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel">Detail Aktivitas</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p id="detail-aktivitas-content"></p>
                                            <p id="issue-content"></p>
                                            <p id="solusi-content"></p>
                                        </div>
                                        </div>
                                    </div>
                                </div>

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
                rowsPerPage = dataLimit;

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

                tableRows.forEach((row, index) => {
                    row.style.display = 'none';
                }); // Sembunyikan semua baris

                filteredRows.slice(start, end).forEach((row, index) => {
                    row.style.display = ''; // Tampilkan baris yang sesuai
                    if (index % 2 === 0) {
                        const tds = row.querySelectorAll('td');
                        tds.forEach(td => {
                            td.style.backgroundColor = '#3e54a0';
                            td.style.color = "white";
                        });
                    } else {
                        const tds = row.querySelectorAll('td');
                        tds.forEach(td => {
                            td.style.backgroundColor = '#e1e7ff';
                            td.style.color = "#0d375b";
                        });
                    }
                });
            }

            function updatePagination(totalPages) {
                pageNumbersContainer.innerHTML = ''; // Kosongkan kontainer

                for (let i = 1; i <= totalPages; i++) {
                    const pageButton = document.createElement('button');
                    pageButton.textContent = i;
                    pageButton.className = 'btn btn-light';
                    if (i === currentPage) {
                        pageButton.classList.add('active');
                    }
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

            searchInput.addEventListener('input', function(){
                currentPage = 1;
                filterTable();
            });
            statusFilter.addEventListener('change', function(){
                currentPage = 1;
                filterTable();
            });
            dateFilter.addEventListener('change', function(){
                currentPage = 1;
                filterTable();
            });
            dataLimitSelect.addEventListener('change', function(){
                currentPage = 1;
                filterTable();
            });

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

            // Penambahan Modal Detail
            const detailButtons = document.querySelectorAll('.btn-detail');

            detailButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const detailAktivitas = button.getAttribute('data-detail-aktivitas');
                    const issue = button.getAttribute('data-issue');
                    const solusi = button.getAttribute('data-solusi');
                    
                    document.getElementById('detail-aktivitas-content').innerText = 'Detail Aktivitas : ' + detailAktivitas;
                    document.getElementById('issue-content').innerText = 'Issue : ' + issue;
                    document.getElementById('solusi-content').innerText = 'Solusi : ' + solusi;

                    const modal = new bootstrap.Modal(document.getElementById('detailModal'));
                    modal.show();
                });
            });
        });
    </script>


    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>