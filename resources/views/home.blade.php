<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Aktivitas Harian</title>
  <link rel="shortcut icon" type="image/png" href="./assets/images/logos/logobpkp.png" />
  <link rel="stylesheet" href="./assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
      margin-right: -4%;
      margin-bottom: 11%;
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
              <a class="sidebar-link" href="{{ route('profil') }}">
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

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Penghapusan</h5>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus data aktivitas?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


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
          @if(Auth::user()->role=="MANAGER")
            <div class="row mb-3 d-flex justify-content-between">
                <div class="col-lg-6 d-flex justify-content-start">
                <button type="button" class="btn btn-success" style="border-radius: 10px;" onclick="window.location='{{ route("form") }}'">Tambah Aktivitas</button>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                <input type="date" class="form-control" id="date-filter"
                    style="border-color: black; color: black; background-color: white; width: 200px;">
                </div>
            </div>
          @endif
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <h5 class="card-title fw-semibold mb-4">To Do List Activity</h5>

                    @foreach ($aktivitass as $aktivitas)
                    <div class="activity-item">
                      <div class="col-12 d-flex justify-content-between align-items-center">
                        <div>
                          <h3 class="judul-isi"> {{ $aktivitas->nama_aktivitas }}</h3>
                          <span class="tanggal-only" style="display:none"> {{ $aktivitas->tanggal }}</span>
                          <h3 class="subjudul-isi"
                          @if($aktivitas->tanggal == '')
                            style='display:none'
                          @endif
                          > {{ \Carbon\Carbon::parse($aktivitas->tanggal)->locale(app()->getLocale())->isoFormat('dddd, D MMMM YYYY') }} </h3>
                          <h3 class="subjudul-isi"
                          @if($aktivitas->instruksi_aktivitas == '')
                            style='display:none'
                          @endif
                          > {{ $aktivitas->instruksi_aktivitas }} </h3>
                        </div>
                        <div class="d-flex align-items-center">
                          @if(Auth::user()->role=="USER")
                          <span id="updated-label-{{ $aktivitas->id }}" class="detail mx-1" style="display: none; margin-top:20px;">Updated!</span>
                          <i class="bi bi-check-circle-fill {{ $aktivitas->status == 'selesai' ? 'active' : '' }}" onClick="window.location='{{ route('aktivitas.toggle') }}?id={{ $aktivitas->id }}'; document.querySelector('#updated-label-{{ $aktivitas->id }}').style.display = 'block';"></i>                      @else
                          <span class="btn detail me-2" onClick="window.location='{{ route('aktivitas.edit', $aktivitas->id) }}'"> <i class="bi bi-pen"></i> Edit </span>
                          <button class="btn detail me-1" data-toggle="modal" data-target="#deleteModal" data-id="{{ $aktivitas->id }}">
                            <i class="bi bi-trash"></i> Hapus
                          </button>
                          @endif
                          @if(Auth::user()->role=="USER")
                          <i class="bi bi-arrow-down-short detail-toggle"></i>
                          <span class="detail mx-1"> Detail </span>
                          @endif
                        </div>
                      </div>

                      <hr>
                      
                      <div class="global-detail" class="detail-content" style="display: none;">
                        <hr>
                        <div class="mb-4">
                          <form action="{{ route('aktivitas.update', $aktivitas->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="detail_aktivitas" class="form-label">Detail Aktivitas</label>
                            <textarea class="form-control" rows="3" name="detail_aktivitas" placeholder="Isilah detail aktivitas">{{ $aktivitas->detail_aktivitas }}</textarea>
                            <label for="issue" class="form-label">Isu atau permasalahan yang ditemukan</label>
                            <textarea class="form-control" rows="3" name="issue" placeholder="Isilah isu atau permasalahan yang ditemukan">{{ $aktivitas->issue }}</textarea>
                            <label for="solusi" class="form-label">Solusi dari permasalahan yang ditemukan</label>
                            <textarea class="form-control" rows="3" name="solusi" placeholder="Isilah solusi dari permasalahan yang ditemukan">{{ $aktivitas->solusi }}</textarea>
                            <button type="submit" class="btn btn-success mt-3">Simpan</button>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
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
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const today = new Date();
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      const formattedDate = today.toLocaleDateString('id-ID', options); // Format tanggal sesuai dengan lokal Indonesia
      document.getElementById('current-date').textContent = `Hari ini tanggal ${formattedDate}`;

      const tableRows = document.querySelectorAll('.card-body .row .activity-item'); // Ambil semua baris aktivitas
      const paginationContainer = document.getElementById('pagination');
      const pageNumbersContainer = document.getElementById('page-numbers');
      const prevButton = document.getElementById('prev');
      const nextButton = document.getElementById('next');
      const dateFilter = document.getElementById('date-filter');

      let currentPage = 1;
      let rowsPerPage = 5;

      function filterTable() {
          const selectedDate = dateFilter.value;

          let displayedCount = 0;
          let filteredRows = [];

          tableRows.forEach(row => {
              const rowDate = row.querySelector('.tanggal-only').innerHTML.trim();

              const formattedRowDate = rowDate.includes('/')
                  ? rowDate.split('/').reverse().join('-')
                  : new Date(rowDate).toISOString().split('T')[0];

              const matchesDate = selectedDate === '' || formattedRowDate === selectedDate;

              if (matchesDate) {
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
          if (index >= start && index < end) {
            row.style.setProperty('display', '', 'important');
          } else {
            row.style.setProperty('display', 'none', 'important');
          }
        });

        if (typeof(filteredRows) !== 'undefined') {
          tableRows.forEach((row, index) => {
            row.style.display = 'none';
          });
          filteredRows.slice(start, end).forEach((row, index) => {
              row.style.display = '';
          });
          let totalPages = Math.ceil(filteredRows.length / rowsPerPage);
          updatePagination(totalPages);
        }else{
          updatePagination();
        }

      }

      function updatePagination(totalPages) {
        
        if (typeof(totalPages) == 'undefined') {
          totalPages = Math.ceil(tableRows.length / rowsPerPage);
        }

        // console.log(tableRows.length);
        pageNumbersContainer.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
          const pageButton = document.createElement('button');
          pageButton.textContent = i;
          pageButton.className = 'btn btn-light';
          if (i === currentPage) {
            pageButton.classList.add('active');
          }
          pageButton.onclick = function () {
            currentPage = i;
            if (dateFilter !== null) {
              filterTable();
            } else {
              displayRows();
            }
          };
          pageNumbersContainer.appendChild(pageButton);
        }

        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPages;

        prevButton.onclick = function () {
          if (currentPage > 1) {
            currentPage--;
            displayRows();
          }
        };

        nextButton.onclick = function () {
          if (currentPage < totalPages) {
            currentPage++;
            displayRows();
          }
        };
      }

      displayRows();

      if (dateFilter !== null) {
        dateFilter.addEventListener('change', function(){
            currentPage = 1;
            filterTable();
        });
      }

      const checkIcons = document.querySelectorAll('.bi-check-circle-fill');
      checkIcons.forEach(function (checkIcon) {
        checkIcon.addEventListener('click', function () {
          this.classList.toggle('active');
        });
      });

      const detailToggles = document.querySelectorAll('.detail-toggle');
      const globalDetail = document.querySelectorAll('.global-detail');
      let activeToggle = null;

      detailToggles.forEach(function (toggle, index) {
        toggle.addEventListener('click', function () {
          const parentRow = this.closest('.col-12');
          const isDetailVisible = globalDetail[index].style.display === 'block';
          if (isDetailVisible && activeToggle === this) {
            globalDetail[index].style.display = 'none';
            this.classList.replace('bi-arrow-up-short', 'bi-arrow-down-short');
            activeToggle = null;
            return;
          }
          parentRow.after(globalDetail[index]);
          globalDetail[index].style.display = 'block';
          document.querySelectorAll('.detail-toggle').forEach(icon => {
            icon.classList.replace('bi-arrow-up-short', 'bi-arrow-down-short');
          });
          this.classList.replace('bi-arrow-down-short', 'bi-arrow-up-short');
          activeToggle = this;
        });
      });
    });
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var itemId = button.data('id'); // Extract info from data-* attributes
        var actionUrl = '/aktivitas/' + itemId; // URL to send the delete request

        // Set the form action to the appropriate URL
        $('#deleteForm').attr('action', actionUrl);
    });
  </script>


  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>