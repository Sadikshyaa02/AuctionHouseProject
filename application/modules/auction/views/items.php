<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($approval)) {
            echo 'To be Approved';
        } else {
            echo 'Items';
        } ?>
    </title>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="m-4">
                <div class="m-4">

                    <div class="d-flex justify-content-between">
                        <p class="h3">Items</p>
                        <div class="d-flex">
                            <!-- <input type="search" id="searchPrice" placeholder="Price less than" id="form1"
                                class="form-control" /> -->
                            <input class="form-control" type="date" name="searchDate" id="searchDate">
                            <select name="selectArtist" id="selectArtist" class="form-select">
                            </select>
                            <select name="selectCategory" id="selectCategory" class="form-select">
                                <option value="none">Category</option>
                                <option value="images">Photographic Images</option>
                                <option value="sculptures">Sculptures</option>
                                <option value="cravings">Cravings</option>
                                <option value="drawings">Drawings</option>
                                <option value="paintings">Paintings</option>
                            </select>
                            <button type="button" class="btn btn-light" id="searchItem">
                                <i class="bi bi-search"></i>
                            </button>
                            <?php if ($this->session->userdata('userStatus') == 'admin' || $this->session->userdata('userStatus') == 'seller' || $this->session->userdata('userStatus') == 'joint') { ?>
                                <a type="button" class="btn btn-primary" id="insertItem" style="margin-left: 20px">+</a>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="m-4" id="auctionlist">
                        <div class="d-flex justify-content-center">
                            <div style="width: 100%">
                                <div class="row" style="margin-left: 10%;">
                                    <?php foreach ($items as $item) { ?>
                                        <div class="col-md-5" style="margin-top: 10px">
                                            <div class="card" style="display: flex !important" item="<?= $item->auctionlotid; ?>">
                                                <img src="<?= base_url(); ?>../frontend/assets/auctionlot/<?= $item->itemimage; ?>"
                                                    class="card-img-top item-img-top" alt=<?= $item->itemname; ?>
                                                    width="360px" height="265px" />
                                                <div class="card-body">
                                                    <h5 class="card-title item-title">
                                                        <?= $item->itemname; ?><span class="card-text"
                                                            style="font-size: 14px !important;"> (
                                                            <?= ucfirst($item->category) ?>)
                                                        </span>
                                                    </h5>
                                                    <p class="card-text item-text">
                                                        <b>Price (£): </b>
                                                        <?= $item->price; ?>
                                                    </p>
                                                    <p class="card-text item-text"><b>Start:</b>
                                                        <?= $item->auction_start; ?> <b>End:</b>
                                                        <?= $item->auction_end; ?>
                                                    </p>
                                                    <div class="d-flex">
                                                        <?php if (!isset($approval) || $approval != 'toBeApproved') { ?>
                                                            <a class="btn btn-secondary" id="makeABid">Add Bid</a>
                                                            <?php if (($this->session->userdata('userStatus') == 'admin' || $this->client == $item->clientid)) { ?>
                                                                <a href="<?= base_url(); ?>addItem?itemid=<?= $item->auctionlotid; ?>"
                                                                    class="btn btn-primary" style="margin-left: 10px">Edit</a>
                                                                <a href="<?= base_url(); ?>deleteItem?itemid=<?= $item->auctionlotid; ?>"
                                                                    class="btn btn-danger" style="margin-left: 10px">X</a>
                                                                <?php if ($item->status == 'Y') { ?>
                                                                    <a class="btn btn-light viewBids"
                                                                        item="<?= $item->auctionlotid ?>"
                                                                        style="margin-left: 10px">Bids</a>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        <?php } else if (isset($approval) && $approval == 'toBeApproved') { ?>
                                                                <a href="<?= base_url(); ?>approveItem?itemid=<?= $item->auctionlotid; ?>"
                                                                    class="btn btn-primary">Accept</a>
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

                <div class="modal" tabindex="-1" id="itemDetails">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Item Details</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4 mb-4">

                                        <img src="" id="itemimage"
                                            class="card-img-top" alt="ffd" width="360px" height="265px" />

                                    </div>
                                    <div class="col-md-8 mb-4">

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="card">
                                                    <h5 class="card-header">Title</h5>
                                                    <div class="card-body">
                                                        <!-- <h5 class="card-title">Title</h5> -->
                                                        <p class="card-text" id="itemname">Item Title</p><span
                                                            id="auctionlotid"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="card">
                                                    <h5 class="card-header">Artist</h5>
                                                    <div class="card-body">
                                                        <p class="card-text" id="artist"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="card">
                                                    <h5 class="card-header">Produced Date</h5>
                                                    <div class="card-body">
                                                        <p class="card-text" id="produceddate"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="card">
                                                    <h5 class="card-header">Classification</h5>
                                                    <div class="card-body">
                                                        <p class="card-text" id="classification"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12 mb-4">

                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <div class="card">
                                                    <h5 class="card-header">Category</h5>
                                                    <div class="card-body">
                                                        <p class="card-text" id="category"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="card">
                                                    <h5 class="card-header">Auction</h5>
                                                    <div class="card-body">
                                                        <p class="card-text" id="auction_name"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <div class="card">
                                                    <h5 class="card-header">Auction Date</h5>
                                                    <div class="card-body">
                                                        <span class="card-text" id="auction_start"></span> -
                                                        <span class="card-text" id="auction_end"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12 mb-4">

                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="card">
                                                    <h5 class="card-header">Description</h5>
                                                    <div class="card-body">
                                                        <p class="card-text" id="description"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12 mb-4">

                                        <div class="row">
                                            <div class="col-md-4 mb-4">
                                                <div class="card">
                                                    <h5 class="card-header">Dimension (length * breadth cm)</h5>
                                                    <div class="card-body">
                                                        <p class="card-text" id="dimension"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4 medium" style="display: none">
                                                <div class="card">
                                                    <h5 class="card-header">Material/Medium</h5>
                                                    <div class="card-body">
                                                        <p class="card-text" id="medium"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4 framed" style="display: none">
                                                <div class="card">
                                                    <h5 class="card-header">Framed</h5>
                                                    <div class="card-body">
                                                        <p class="card-text" id="framed"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4 imagetype" style="display: none">
                                                <div class="card">
                                                    <h5 class="card-header">Image Type</h5>
                                                    <div class="card-body">
                                                        <p class="card-text" id="imagetype"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-4 weight" style="display: none">
                                                <div class="card">
                                                    <h5 class="card-header">Weight</h5>
                                                    <div class="card-body">
                                                        <p class="card-text" id="weight"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div id="auctionid" style="display: none"></div>
                                <div id="clientid" style="display: none"></div>
                                <div class="modal-footer">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-text">Price (£): <span id="price">20000</span></h5>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="number" id="bidPrice" name="bidPrice" placeholder="Bid Amount (£)"
                                            class="form-control form-control-lg" required />
                                    </div>
                                    <button type="button" class="btn btn-secondary" id="itemBid">Bid</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal" tabindex="-1" id="bidsList">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Bids</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">SN</th>
                                                <th scope="col">Item Title</th>
                                                <th scope="col">Lot Number</th>
                                                <th scope="col">Auction</th>
                                                <th scope="col">Client</th>
                                                <th scope="col">Amount (£)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bidsTableBody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</body>

</html>

<script>
    let userCheck = '<?php echo ($this->session->userdata('userStatus') == 'joint' || $this->session->userdata('userStatus') == 'buyer' || $this->session->userdata('userStatus') == 'admin') ? true : false ?>';

    let itemDetailModal = new bootstrap.Modal(document.getElementById('itemDetails'));

    let bidsListModal = new bootstrap.Modal(document.getElementById('bidsList'));

    artists();

    function artists() {
        $.ajax({
            type: 'GET',
            url: '<?= base_url() ?>artists',
            data: { 'category': $('#selectCategory').val() },
            success: function (response) {
                response = JSON.parse(response);
                artists = response.artists;

                let options = '<option value="none">Artist</option>';
                for (let i = 0; i < artists.length; i++) {
                    options += '<option value="' + artists[i].artist + '">' + artists[i].artist.charAt(0).toUpperCase() + artists[i].artist.slice(1) + '</option>';
                }
                $('#selectArtist').html(options);
            }
        })
    }

    $(document).on('click', '#insertItem', function (e) {
        if ($('#selectCategory').val() == 'none') {
            alert('Select Category');
            return;
        }
        window.location.href = '<?= base_url(); ?>addItem?category=' + $('#selectCategory').val();
    })

    $(document).on('click', '.item-img-top, .item-title, .item-text, #makeABid', function (e) {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url() ?>itemDetails?itemid=' + $(this).closest('.card').attr('item'),
            success: function (response) {
                response = JSON.parse(response);

                details = response.details[0];

                $.each(details, function (index, value) {
                    if (value.length > 0) {
                        $('#' + index).text(value);
                        $('.' + index).show();
                        if(index == 'itemimage'){
                            $('#' + index).attr('src', '<?= base_url() ?>../frontend/assets/auctionlot/' + value);
                        }
                    }
                });

                if('<?= $this->session->userdata('userStatus') ?>' == 'seller'){
                    alert('Seller can not bid');
                }
                else{
                    itemDetailModal.show();
                }
            }
        })
        if ($(this).attr('id') == 'makeABid') {
            setTimeout(() => {
                $("#price").get(0).scrollIntoView();
            }, 250)
        }

    })

    $(document).on('click', '#insertItem', function (e) {
        if ($('#selectCategory').val() == 'none') {
            alert('Select Category');
            return;
        }
        window.location.href = '<?= base_url(); ?>addItem?category=' + $('#selectCategory').val();
    })

    $(document).on('click', '#itemBid', function () {
        if (!userCheck) {
            location.href = '<?= base_url(); ?>login';
            return;
        }

        if ($('#bidPrice').val() == '') {
            alert('Insert Bid Amount');
            return;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url() ?>makeABid',
            data: {
                'auctionid': $('#auctionid').text(),
                'auctionlotid': $('#auctionlotid').text(),
                'bidderid': '<?= $this->session->userdata('userId') ?>',
                'amount': $('#bidPrice').val()
            },
            success: function (response) {
                response = JSON.parse(response);

                if (response.status == 'success') {
                    alert('Bid added');
                }
                else if (response.status == 'bidExists') {
                    alert('Bid can be placed only once');
                }
                else {
                    alert('Bid add failed');
                }
                itemDetailModal.hide();
            }
        })

    })

    $(document).on('click', '.btn-close', function (e) {
        itemDetailModal.hide();
        bidsListModal.hide();
    })

    $(document).on('input', '#searchPrice', function (e) {
        let searchInput = $(this).val();
        $(this).val(searchInput.replace(/\D/g, ''));
    })

    $(document).on('click', '#searchItem', function (e) {
        let searchLink = '<?= base_url(); ?>items?'

        if ($('#selectCategory').val() != 'none') {
            searchLink += `category=${$('#selectCategory').val()}&`;
        }

        if ($('#selectArtist').val() != 'none') {
            let artistName = $('#selectArtist').val().replace(' ', '_');
            searchLink += `artist=${artistName}&`;
        }

        if ($('#searchDate').val()) {
            searchLink += `date=${$('#searchDate').val()}&`;
        }

        if ($('#searchPrice').val()) {
            searchLink += `price=${$('#searchPrice').val()}`;
        }

        location.href = searchLink;

    })

    $(document).on('change', '#selectCategory', function () {
        $.ajax({
            type: 'GET',
            url: '<?= base_url() ?>artists',
            data: { 'category': $('#selectCategory').val() },
            success: function (response) {
                response = JSON.parse(response);
                artists = response.artists;

                let options = '<option value="none">Artist</option>';
                for (let i = 0; i < artists.length; i++) {
                    options += '<option value="' + artists[i].artist + '">' + artists[i].artist.charAt(0).toUpperCase() + artists[i].artist.slice(1) + '</option>';
                }
                $('#selectArtist').html(options);
            }
        })
    })

    $(document).on('click', '.viewBids', function () {
        $.ajax({
            type: 'GET',
            url: '<?= base_url() ?>bids',
            data: { 'itemid': $(this).attr('item') },
            success: function (response) {
                response = JSON.parse(response);
                bids = response.bids;

                let rowTable = '';

                for (let z = 0; z < bids.length; z++) {
                    rowTable += '<tr>';
                    rowTable += '<td>' + (z + 1) + '</td>';
                    rowTable += '<td>' + bids[z].itemname + '</td>';
                    rowTable += '<td>' + bids[z].auctionlotid + '</td>';
                    rowTable += '<td>' + bids[z].auction_name + '</td>';
                    rowTable += '<td>' + bids[z].firstname + ' ' + bids[z].surname + '</td>';
                    rowTable += '<td>' + bids[z].amount + '</td>';
                    rowTable += '</tr>';
                }

                $('#bidsTableBody').html(rowTable);

                bidsListModal.show();
            }
        })
    })

</script>