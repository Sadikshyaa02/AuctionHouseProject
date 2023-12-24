<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <p class="h3">Clients</p>
                <div>
                    <select name="selectStatus" id="selectStatus" class="form-select">
                        <option value="none">Select User Type</option>
                        <option value="all">All</option>
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                        <option value="joint">Joint</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="m-4 d-flex justify-content-center">
            <div style="width: 70%">
                <?php foreach ($users as $key => $user) { ?>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <div>
                                        <h4 id="name">
                                            <?= ucfirst($user->title) . ' ' . ucfirst($user->firstname) . ' ' . ucfirst($user->surname) ?>
                                        </h4>
                                        <span>
                                            <?= ucfirst($user->status) ?>
                                        </span>
                                    </div>
                                    <a href="<?= base_url(); ?>userDetails?clientid=<?= $user->client_id ?>" type="button" class="btn btn-warning" style="float: right; height: 40px;" id="userDetails"
                                    style="margin-left: 20px">Details</a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<script>
    $(document).on('change', '#selectStatus', function () {
        let url = '<?= base_url() ?>users';

        if($(this).val() == 'buyer'){
            url += '?status=buyer';
        }
        else if($(this).val() == 'seller'){
            url += '?status=seller';
        }
        else if($(this).val() == 'joint'){
            url += '?status=joint';
        }

        location.href = url;

    })
</script>