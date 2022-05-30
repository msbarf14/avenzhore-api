<div class="nav-left-sidebar sidebar-dark">
  <div class="menu-list">
      <nav class="navbar navbar-expand-lg navbar-light">
          <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav flex-column">
                <li class="nav-item mt-3">
                  <a href="{{route('home')}}" class="nav-link active"><i class="fas fa-fw fa-home"></i>Dashboard</a>
                </li>
                  <li class="nav-divider">
                      Rubrik / berita
                  </li>
                  <li class="nav-item ">
                    <a href="{{route('post')}}" class="nav-link"><i class="fas fa-fw fa-file"></i>Post</a>
                    <a href="{{route('category')}}" class="nav-link"><i class="fas fa-fw fa-file"></i>Post Category</a>
                  </li>
                  
                  <li class="nav-divider">
                      Main Data
                  </li>
                  
                  <li class="nav-item ">
                    <a href="{{route('alumni')}}" class="nav-link"><i class="fas fa-fw fa-address-book"></i>Alumni</a>
                  </li>
                  <li class="nav-item ">
                    <a href="{{route('teacher')}}" class="nav-link"><i class="fas fa-fw fa-user-circle"></i>Masyayikh & Asatidz</a>
                  </li>
                  <li class="nav-item ">
                    <a href="{{route('admin.book')}}" class="nav-link"><i class="fas fa-university"></i>Maktabah</a>
                  </li>
                  <li class="nav-item ">
                    <a href="{{route('admin.galery')}}" class="nav-link"><i class="fas fa-images"></i> Galeri</a>
                  </li>
                  <li class="nav-divider">
                    Credential
                </li>
                <li class="nav-item ">
                  <a href="{{route('user')}}" class="nav-link"><i class="fas fa-fw fa-user"></i>Akun</a>
                </li>
              </ul>
          </div>
      </nav>
  </div>
</div>