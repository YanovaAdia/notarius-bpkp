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
                            <h5 class="card-title fw-semibold mb-4">Form To Do List Activity</h5>
                            <form action="{{ route('aktivitas.store') }}" method="POST">
                                @csrf
                                <div class="col-12 mb-3">
                                    <label for="nama_aktivitas" class="form-label">Judul Aktivitas</label>
                                    <input type="text" class="form-control" name="nama_aktivitas" placeholder="Input Judul Aktivitas">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="instruksi_aktivitas" class="form-label">Instruksi Aktivitas</label>
                                    <textarea class="form-control" rows="4" name="instruksi_aktivitas" placeholder="Input Instruksi Aktivitas"></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="nip" class="form-label">Pegawai</label>
                                    <select type="text" class="form-control" name="nip" placeholder="Input ID Pegawai">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->nip }}">NIP: {{ $user->nip }} - Nama : {{ $user->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success mb-3">Simpan</button>
                            </form>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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


    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>