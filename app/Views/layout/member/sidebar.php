<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="" height="50px">
        </div>
        <div class="sidebar-brand-text mx-2">Futsal</div>
    </a>
    <hr class="sidebar-divider mb-3">
    <div class="sidebar-heading">
        Account
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('profile') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Your Profile</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('edit-profile') ?>">
            <i class="fas fa-fw fa-edit"></i>
            <span>Edit Profile</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('change-password') ?>">
            <i class="fas fa-fw fa-lock"></i>
            <span>Change Password</span></a>
    </li>
    <hr class="sidebar-divider mb-3">
    <div class="sidebar-heading">
        Team
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('team') ?>">
            <i class="fas fa-fw fa-lock"></i>
            <span>Team</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('history') ?>">
            <i class="fas fa-fw fa-lock"></i>
            <span>History</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('owner-request') ?>">
            <i class="fas fa-fw fa-lock"></i>
            <span>Be an Owner</span></a>
    </li>
</ul>