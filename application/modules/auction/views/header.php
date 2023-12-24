<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<div class="container">
    <div class="container-fluid">
        <div class="m-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid"  style="background-color:yellowgreen; border-radius: 10px">
                    <a href="#" class="navbar-brand">
                        <img src="<?= base_url(); ?>../frontend/assets/logo.jpg" height="28" alt="Fotheby">
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav">
                            <a href="<?php echo base_url(); ?>" class="nav-item nav-link <?php if ($title == 'home') {
                                   echo 'active';
                               } ?>">About</a>
                            <a href="<?php echo base_url(); ?>auctions" class="nav-item nav-link <?php if ($title == 'auctions') {
                                   echo 'active';
                               } ?>">Auctions</a>
                            <a href="<?php echo base_url(); ?>items" class="nav-item nav-link <?php if ($title == 'items') {
                                   echo 'active';
                               } ?>">Items</a>
                            <?php if ($this->session->userdata('userStatus') == 'seller' || $this->session->userdata('userStatus') == 'joint') { ?>
                                <a href="<?php echo base_url(); ?>userSales?clientid=<?= $this->session->userdata('userId') ?>" class="nav-item nav-link <?php if ($title == 'sales') {
                                    echo 'active';
                                } ?>">Sales</a>
                            <?php } ?>
                            <?php if ($this->session->userdata('userStatus') == 'buyer' || $this->session->userdata('userStatus') == 'joint') { ?>
                                <a href="<?php echo base_url(); ?>userBids?clientid=<?= $this->session->userdata('userId') ?>" class="nav-item nav-link <?php if ($title == 'bids') {
                                    echo 'active';
                                } ?>">Bids</a>
                            <?php } ?>
                            <?php if ($this->session->userdata('userStatus') == 'admin') { ?>
                                <a href="<?php echo base_url(); ?>users" class="nav-item nav-link  <?php if ($title == 'clients') {
                                       echo 'active';
                                   } ?>">Clients</a>
                                <a href="<?php echo base_url(); ?>toBeApproved" class="nav-item nav-link  <?php if ($title == 'approval') {
                                       echo 'active';
                                   } ?>">Accept</a>
                            <?php } ?>
                        </div>
                        <div class="navbar-nav ms-auto">
                            <?php if ($this->session->has_userdata('userStatus')) { ?>
                                <a href="<?= base_url() ?>userDetails?clientid=<?= $this->session->userdata('userId') ?>">
                                    <div class="rounded-circle border d-flex justify-content-center align-items-center"
                                        style="width:40px;height:40px" alt="Avatar">
                                        <i class="bi bi-file-person-fill"></i>
                                    </div>
                                </a>
                                <a href="<?php echo base_url(); ?>logout" class="nav-item nav-link">Logout</a>
                            <?php } else { ?>
                                <a href="<?php echo base_url(); ?>login" class="nav-item nav-link">Login</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>