<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auctions</title>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="m-4">
                <div class="m-4">

                    <div class="d-flex justify-content-between">
                        <p class="h3">Auctions</p>
                        <?php if ($this->session->userdata('userStatus') == 'admin') { ?>
                            <div class="d-flex">
                                <a href="<?= base_url(); ?>addAuction" type="button" class="btn btn-primary" id="insertAuction"
                                    style="margin-left: 20px">Add</a>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="m-4" id="auctionlist">
                        <div class="d-flex justify-content-center">
                            <div>
                                <div class="row" style="margin-left: 10%;">
                                    <?php foreach ($auctions as $auction) { ?>
                                        <div class="col-md-5" style="margin-top: 10px">
                                            <div class="card">
                                                <img src="<?= base_url(); ?>../frontend/assets/auction/<?= $auction->auction_image; ?>"
                                                    class="card-img-top" alt=<?= $auction->auction_name; ?> width="360px"
                                                    height="265px" />
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        <?= $auction->auction_name; ?>
                                                    </h5>
                                                    <p class="card-text"><b>Start:</b>
                                                        <?= $auction->auction_start; ?> <b>End:</b>
                                                        <?= $auction->auction_end; ?>
                                                    </p>
                                                    <div class="d-flex">
                                                        <a href="<?= base_url(); ?>items?auction=<?= $auction->auction_id; ?>" class="btn btn-secondary">Lot</a>
                                                        <?php if($this->session->userdata('userStatus') == 'admin') { ?>
                                                            <a href="<?= base_url(); ?>addAuction?auctionid=<?= $auction->auction_id; ?>" class="btn btn-primary" style="margin-left: 20px">Edit</a>
                                                            <a href="<?= base_url(); ?>deleteAuction?auctionid=<?= $auction->auction_id; ?>" class="btn btn-danger" style="margin-left: 20px">X</a>
                                                            <?php if($auction->auction_status == 'N') echo '<span style="margin-left: 10px; margin-top: 5px;">Arch.</span>' ?>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
