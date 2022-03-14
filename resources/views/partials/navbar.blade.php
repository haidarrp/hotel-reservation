<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{$title}}</li>
        </ol>
        <h6 class="font-weight-bolder mb-0">{{$title}}</h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          <li class="nav-item px-2 d-flex align-items-center">
            <a href="register" class="nav-link text-body font-weight-bold px-0">
              <i class="fas fa-plus text-gradient text-primary"></i>
              <span class="d-sm-inline d-none">Add Admin</span>
            </a>
          </li>
          <li class="nav-item dropdown px-2 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user me-sm-1 text-gradient text-primary"></i>
              <span class="d-sm-inline d-none">Hi, <span class="font-weight-bold text-primary">{{ auth()->user()->username }}</span></span>
            </a>
            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto mx-1">
                      <i class="fas fa-user-edit text-primary"></i>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">profile</span>
                      </h6>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mb-2">
                <form action="/logout" method="post">
                  @csrf
                <button type="submit" class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex py-1">
                    <div class="my-auto mx-1">
                      <i class="fas fa-sign-out-alt text-primary"></i>
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="text-sm font-weight-normal mb-1">
                        <span class="font-weight-bold">Logout</span>
                      </h6>
                    </div>
                  </div>
                </button>
              </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>