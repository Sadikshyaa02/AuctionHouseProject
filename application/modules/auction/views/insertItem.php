<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="m-4">
                <div class="m-4">

                    <div class="d-flex justify-content-between">
                        <p class="h3">Items</p>
                    </div>

                    <div class="m-4" id="insertItemForm">
                        <section class="vh-100 gradient-custom">
                            <div class="container py-5 h-100">
                                <div class="row justify-content-center align-items-center h-100">
                                    <div class="col-12 col-lg-9 col-xl-9">
                                        <div class="card shadow-2-strong card-registration"
                                            style="border-radius: 15px;">
                                            <div class="card-body p-4 p-md-5">
                                                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Add Item</h3>
                                                <form action="<?= base_url(); ?>insertItem" method="POST"
                                                    enctype="multipart/form-data">
                                                    <?php $category = isset($items[0]->category) ? $items[0]->category : $category; ?>
                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">

                                                            <div class="form-outline">
                                                                <input type="text" id="itemname" name="itemname"
                                                                    class="form-control form-control-lg"
                                                                    value="<?= isset($items[0]->itemname) ? $items[0]->itemname : '' ?>"
                                                                    required />
                                                                <label class="form-label" for="itemname">Item
                                                                    name</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-4">

                                                            <div class="form-outline">
                                                                <input type="text" id="artist" name="artist"
                                                                    class="form-control form-control-lg"
                                                                    value="<?= isset($items[0]->artist) ? $items[0]->artist : '' ?>"
                                                                    required />
                                                                <label class="form-label" for="artist">Artist</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 mb-4">

                                                            <div class="form-outline">
                                                                <input type="date" id="produceddate" name="produceddate"
                                                                    class="form-control form-control-lg"
                                                                    value="<?= isset($items[0]->produceddate) ? $items[0]->produceddate : '' ?>"
                                                                    required />
                                                                <label class="form-label" for="produceddate">Produced
                                                                    Year</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-4 pb-2">

                                                            <div class="form-outline">
                                                                <input type="text" id="classification"
                                                                    name="classification"
                                                                    class="form-control form-control-lg"
                                                                    value="<?= isset($items[0]->classification) ? $items[0]->classification : '' ?>"
                                                                    required />
                                                                <label class="form-label" for="classification">Subject
                                                                    Classification</label>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 mb-4 pb-2">

                                                            <div class="form-outline">
                                                                <input type="tel" id="price" name="price"
                                                                    class="form-control form-control-lg"
                                                                    value="<?= isset($items[0]->price) ? $items[0]->price : '' ?>"
                                                                    required />
                                                                <label class="form-label" for="price">Price
                                                                    (Pounds)</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 mb-4">

                                                            <div class="form-outline">
                                                                <textarea id="description" name="description"
                                                                    class="form-control form-control-lg" rows="3"
                                                                    required><?= isset($items[0]->description) ? $items[0]->description : '' ?></textarea>
                                                                <label class="form-label"
                                                                    for="description">Description</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-4 pb-2">

                                                            <div class="form-outline">
                                                                <select name="auctionid" id="auctionid"
                                                                    class="form-select">
                                                                    <option value="none">Select Auction</option>
                                                                    <?php foreach ($auctions as $key => $auction) { ?>
                                                                        <option value="<?= $auction->auction_id ?>"
                                                                            <?= isset($items[0]->auctionid) && $items[0]->auctionid == $auction->auction_id ? 'selected' : '' ?>>
                                                                            <?= $auction->auction_name ?>
                                                                        </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <?php if ($category != 'images') { ?>
                                                            <div class="col-md-6 mb-4 pb-2">

                                                                <div class="form-outline">
                                                                    <input type="tel" id="medium" name="medium"
                                                                        class="form-control form-control-lg"
                                                                        value="<?= isset($items[0]->medium) ? $items[0]->medium : '' ?>"
                                                                        required />
                                                                    <label class="form-label"
                                                                        for="medium">Medium/Material</label>
                                                                </div>

                                                            </div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6 mb-4 pb-2">

                                                            <div class="form-outline">
                                                                <input type="text" id="dimension" name="dimension"
                                                                    class="form-control form-control-lg"
                                                                    value="<?= isset($items[0]->dimension) ? $items[0]->dimension : '' ?>"
                                                                    required />
                                                                <label class="form-label" for="dimension">Dimension
                                                                    (height * length cm)</label>
                                                            </div>

                                                        </div>
                                                        <?php if ($category == 'drawings' || $category == 'paintings') { ?>
                                                            <div class="col-md-6 mb-4 pb-2">

                                                                <div class="form-outline">
                                                                    <select name="framed" id="framed" class="form-select"
                                                                        required>
                                                                        <option value="none">Framed or Not?</option>
                                                                        <option value="Yes" <?= isset($items[0]->framed) && $items[0]->framed == 'Yes' ? 'selected' : '' ?>>Yes
                                                                        </option>
                                                                        <option value="No" <?= isset($items[0]->framed) && $items[0]->framed == 'No' ? 'selected' : '' ?>>No
                                                                        </option>
                                                                    </select>
                                                                    <label class="form-label" for="framed">Framed Or
                                                                        Not?</label>
                                                                </div>

                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($category == 'images') { ?>
                                                            <div class="col-md-6 mb-4 pb-2">

                                                                <div class="form-outline">
                                                                    <select name="imagetype" id="imagetype" class="form-select"
                                                                        required>
                                                                        <option value="none">Image Type</option>
                                                                        <option value="Black and White" <?= isset($items[0]->imagetype) && $items[0]->imagetype == 'Black and White' ? 'selected' : '' ?>>Black and White
                                                                        </option>
                                                                        <option value="Colour" <?= isset($items[0]->imagetype) && $items[0]->imagetype == 'Colour' ? 'selected' : '' ?>>Colour
                                                                        </option>
                                                                    </select>
                                                                    <label class="form-label" for="imagetype">Image
                                                                        Type</label>
                                                                </div>

                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($category == 'sculptures' || $category == 'carvings') { ?>
                                                            <div class="col-md-6 mb-4 pb-2">

                                                                <div class="form-outline">
                                                                    <input type="text" id="weight" name="weight"
                                                                        class="form-control form-control-lg"
                                                                        value="<?= isset($items[0]->weight) ? $items[0]->weight : '' ?>"
                                                                        required />
                                                                    <label class="form-label" for="weight">Weight (kg)</label>
                                                                </div>

                                                            </div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-9 mb-4">

                                                            <input class="form-control" type="file" name="image"
                                                                id="image" />
                                                            <label for="newField">Item Image</label>

                                                        </div>
                                                        <div class="col-md-3 mb-4">

                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" name="status"
                                                                    id="status" type="checkbox"
                                                                    <?= isset($items[0]->status) && $items[0]->status == 'N' ? 'checked' : '' ?> />
                                                                <label class="form-check-label" for="newField5">Item
                                                                    Archive</label>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <?php if (isset($items[0]->category)) { ?>
                                                            <div class="col-md-9 mb-4">

                                                                <select name="category" id="category" class="form-select">
                                                                    <option value="drawings"
                                                                        <?= $items[0]->category == 'drawings' ? 'selected' : ''; ?>>Drawings</option>
                                                                    <option value="paintings"
                                                                        <?= $items[0]->category == 'paintings' ? 'selected' : ''; ?>>Paintings</option>
                                                                    <option value="images" <?= $items[0]->category == 'images' ? 'selected' : ''; ?>>Photographic Images</option>
                                                                    <option value="sculptures"
                                                                        <?= $items[0]->category == 'sculptures' ? 'selected' : ''; ?>>Sculptures</option>
                                                                    <option value="cravings"
                                                                        <?= $items[0]->category == 'cravings' ? 'selected' : ''; ?>>Cravings</option>
                                                                </select>
                                                                <label for="newField">Item Category</label>

                                                            </div>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="mt-1 d-flex justify-content-evenly">
                                                        <?php if (!isset($items[0]->category)) { ?>
                                                            <input type="text" name="category" value="<?php if (isset($category)) {
                                                                echo $category;
                                                            } else {
                                                                echo '';
                                                            } ?>" hidden>
                                                        <?php } ?>
                                                        <input type="number" name="auctionlotid"
                                                            value="<?= isset($items[0]->auctionlotid) ? $items[0]->auctionlotid : '' ?>"
                                                            hidden>
                                                        <input class="btn btn-primary btn-lg" type="submit"
                                                            id="insertItem" value="Add" />
                                                        <a href="<?= base_url(); ?>items"><input
                                                                class="btn btn-danger btn-lg" type="button"
                                                                value="Cancel" /></a>
                                                    </div>

                                                </form>
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
    </div>
</body>

</html>

<script>
    $(document).on('click', '#insertItem', function (e) {
        if ($('#auctionid').val() == 'none') {
            e.preventDefault();
            alert('Select Auction');
            return;
        }
        if ($('#framed').val() == 'none') {
            e.preventDefault();
            alert('Select Framed or Not');
            return;
        }
    })
</script>