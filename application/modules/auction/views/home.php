<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="m-4">


                <div style="display:flex; margin-top: 0px; width: 100%">
                    <div style="">
                        <img src="<?= base_url(); ?>../frontend/assets/se1.jpg" width="800px" height="600px"
                            style="border-radius: 10px;" alt="Jewellery" />
                    </div>
                    <div>
                        <div class="" style="color: black;margin: 40% 10%;">
                            <h1 style="font-size: 50px;"> Fotheby's</h1>
                            <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 100px;">
                    <section class="page-section" id="services">
                        <div class="container">
                            <div class="text-center">
                                <h2 class="section-heading text-uppercase">Auctions</h2>
                                <a href="<?= base_url() ?>auctions" style="text-decoration: none;">
                                    <p>View All</p>
                                </a>
                            </div>
                            <div id="auctionlist">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <div class="row">
                                            <?php foreach ($auctions as $key => $auction) { ?>
                                                <?php if ($key < 2) { ?>
                                                    <div class="col-md-6">
                                                        <div class="card">
                                                            <img src="<?= base_url(); ?>../frontend/assets/auction/<?= $auction->auction_image; ?>"
                                                                class="card-img-top" alt=<?= $auction->auction_name; ?>
                                                                width="360px" height="265px" />
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    <?= $auction->auction_name; ?>
                                                                </h5>
                                                                <p class="card-text"><b>Start:</b>
                                                                    <?= $auction->auction_start; ?> <b>End:</b>
                                                                    <?= $auction->auction_end; ?>
                                                                </p>
                                                                <div class="d-flex">
                                                                    <a href="<?= base_url(); ?>items?auction=<?= $auction->auction_id; ?>"
                                                                        class="btn btn-secondary">Lot</a>
                                                                    <?php if ($this->session->userdata('userStatus') == 'admin') { ?>
                                                                        <a href="<?= base_url(); ?>addAuction?auctionid=<?= $auction->auction_id; ?>"
                                                                            class="btn btn-primary"
                                                                            style="margin-left: 20px">Edit</a>
                                                                        <a href="<?= base_url(); ?>deleteAuction?auctionid=<?= $auction->auction_id; ?>"
                                                                            class="btn btn-danger" style="margin-left: 20px">X</a>
                                                                        <?php if ($auction->auction_status == 'N')
                                                                            echo '<span style="margin-left: 10px; margin-top: 5px;">Arch.</span>' ?>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div style="margin-top: 100px;">
                    <section class="page-section" id="services">
                        <div class="container">
                            <div class="text-center">
                                <h2 class="section-heading text-uppercase">Items</h2>
                                <a href="<?= base_url() ?>items" style="text-decoration: none;">
                                    <p>View All</p>
                                </a>
                            </div>
                            <div class="m-4" id="auctionlist">
                                <div class="d-flex justify-content-center">
                                    <div style="width: 100%">
                                        <div class="row" style="margin-left: 14%">
                                            <?php foreach ($items as $key => $item) { ?>
                                                <?php if ($key < 2) { ?>
                                                    <div class="col-md-5">
                                                        <div class="card" item="<?= $item->auctionlotid; ?>">
                                                            <img src="<?= base_url(); ?>../frontend/assets/auctionlot/<?= $item->itemimage; ?>"
                                                                class="card-img-top item-img-top" alt=<?= $item->itemname; ?>
                                                                width="360px" height="265px" />
                                                            <div class="card-body">
                                                                <h5 class="card-title item-title">
                                                                    <?= $item->itemname; ?><span class="card-text"
                                                                        style="font-size: 14px !important;"> (Category:
                                                                        <?= ucfirst($item->category) ?>)
                                                                    </span>
                                                                </h5>
                                                                <p class="card-text item-text"><b>Artist: </b>
                                                                    <?= $item->artist; ?>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <b>Price (£): </b>
                                                                    <?= $item->price; ?>
                                                                </p>
                                                                <p class="card-text item-text"><b>Auction: </b>
                                                                    <?= $item->auction_name; ?>
                                                                    <?php if (isset($bids) && $bids == 'bids') { ?>
                                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <b>Bid (£): </b>
                                                                        <?= $item->amount; ?>
                                                                    <?php } ?>
                                                                </p>
                                                                <p class="card-text item-text"><b>Date:</b>
                                                                    <?= $item->auction_start; ?> -
                                                                    <?= $item->auction_end; ?>
                                                                </p>
                                                                <div class="d-flex">
                                                                    <?php if (!isset($approval) || $approval != 'toBeApproved') { ?>
                                                                        <a class="btn btn-secondary" id="makeABid">Add Bid</a>
                                                                        <?php if (($this->session->userdata('userStatus') == 'admin' || $this->client == $item->clientid)) { ?>
                                                                            <a href="<?= base_url(); ?>addItem?itemid=<?= $item->auctionlotid; ?>"
                                                                                class="btn btn-primary"
                                                                                style="margin-left: 10px">Edit</a>
                                                                            <a href="<?= base_url(); ?>deleteItem?itemid=<?= $item->auctionlotid; ?>"
                                                                                class="btn btn-danger" style="margin-left: 10px">X</a>
                                                                            <?php if ($item->status == 'Y') { ?>
                                                                                <a class="btn btn-light" id="viewBids"
                                                                                    item="<?= $item->auctionlotid ?>"
                                                                                    style="margin-left: 10px">Bids</a>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    <?php } else if (isset($approval) && $approval == 'toBeApproved') { ?>
                                                                            <a href="<?= base_url(); ?>approveItem?itemid=<?= $item->auctionlotid; ?>"
                                                                                class="btn btn-primary">Approve</a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>



            </div>
        </div>
    </div>
</body>

</html>