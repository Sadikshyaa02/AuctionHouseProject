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
            <div class="m-4">
                <section class="gradient-custom">
                    <div class="container py-5">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-12 col-lg-9 col-xl-7">
                                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                    <div class="card-body p-4 p-md-5">
                                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">User</h3>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Name</h5>
                                                        <p class="card-text" id="name">
                                                            <?= ucfirst($users[0]->title) . ' ' . ucfirst($users[0]->firstname) . ' ' . ucfirst($users[0]->surname) ?>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Address</h5>
                                                        <p class="card-text" id="address">
                                                            <?= $users[0]->address ?>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Telephone</h5>
                                                        <p class="card-text" id="telephone">
                                                            <?= $users[0]->telephone ?>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Email</h5>
                                                        <p class="card-text" id="email">
                                                            <?= $users[0]->email ?>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Bank Account Number</h5>
                                                        <p class="card-text" id="accountno">
                                                            <?= $users[0]->accountno ?>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-4">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Bank Sort Code</h5>
                                                        <p class="card-text" id="sortcode">
                                                            <?= $users[0]->sortcode ?>
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>