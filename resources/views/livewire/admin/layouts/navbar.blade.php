<nav class="app-header navbar navbar-expand bg-body">
  <div class="container-fluid">

    <!-- Sidebar toggle -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
          <i class="bi bi-list"></i>
        </a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-md-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right-side menu -->
    <ul class="navbar-nav ms-auto">

      <!-- Notifications -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#">
          <i class="bi bi-bell-fill"></i>
          <span class="navbar-badge badge text-bg-warning">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="bi bi-envelope me-2"></i> 4 new messages
            <span class="float-end text-secondary fs-7">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">
            See All Notifications
          </a>
        </div>
      </li>

      <!-- User Menu -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <img
            src="{{ asset('build/assets/images/user2-160x160.jpg') }}"
            class="user-image rounded-circle shadow"
            alt="User Image" />
          <span class="d-none d-md-inline">
            {{ auth()->user()->name ?? 'Guest' }}
          </span>
        </a>

        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
          <li class="user-header text-bg-primary">
            <img
              src="{{ asset('build/assets/images/user2-160x160.jpg') }}"
              class="rounded-circle shadow"
              alt="User Image" />
            <p>
              {{ auth()->user()->name ?? 'Alexander Pierce' }}
              <small>Member since {{ auth()->user()->created_at?->format('M. Y') }}</small>
            </p>
          </li>

          <li class="user-footer">
            <a href="{{ route('profile') }}" class="btn btn-default btn-flat">
              Profile
            </a>
            <!-- Replace default link with Livewire logout -->


            <button wire:click="logout" class="btn btn-default btn-flat float-end">
              Sign out
            </button>
          </li>
        </ul>
      </li>
    </ul>

  </div>
</nav>