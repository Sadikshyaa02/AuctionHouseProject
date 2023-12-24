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
                    </div>

                    <div class="m-4" id="insertAuctionForm">
                        <div class="container px-5 my-5">
                            <form id="auctionForm" action="<?= base_url(); ?>insertAuction" method="POST"
                                enctype="multipart/form-data">
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="name" id="name" type="text"
                                        placeholder="Auction Name" value="<?= isset($auctions[0]->auction_name) ? $auctions[0]->auction_name : '' ?>" required/>
                                    <label for="newField1">Auction Name</label>
                                    <div class="invalid-feedback" data-sb-feedback="newField1:required">Auction Name
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="start" id="start" type="date"
                                        placeholder="Aution Start On" value="<?= isset($auctions[0]->auction_start) ? $auctions[0]->auction_start : '' ?>" required />
                                    <label for="newField2">Aution Start On</label>
                                    <div class="invalid-feedback" data-sb-feedback="newField2:required">Aution Start On
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="end" id="end" type="date"
                                        placeholder="Auction End On" value="<?= isset($auctions[0]->auction_end) ? $auctions[0]->auction_end : '' ?>" required />
                                    <label for="newField">Auction End On</label>
                                    <div class="invalid-feedback" data-sb-feedback="newField:required">Auction End On
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="file" name="image" id="image" />
                                    <label for="newField">Auction Image</label>
                                    <div class="invalid-feedback" data-sb-feedback="newField:required">Auction Image
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="status" id="status" type="checkbox"
                                            name="Auction Archive" <?= isset($auctions[0]->auction_status) && $auctions[0]->auction_status == 'N' ? 'checked' : '' ?> />
                                        <label class="form-check-label" for="newField5">Auction Archive</label>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <input type="number" name="auction_id" value="<?= isset($auctions[0]->auction_id) ? $auctions[0]->auction_id : '' ?>" hidden>
                                    <button class="btn btn-primary btn-lg" id="auctionSubmit" type="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
