<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="container-fluid">
            <div class="m-4">
                <div>
                    <div class="vh-100 d-flex justify-content-center align-items-center">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="col-12 col-md-8 col-lg-6">
                                        <div class="card bg-white">
                                            <div class="card-body p-5">
                                                <form class="mb-3 mt-md-4" action="<?=base_url(); ?>userLogin" method="post">
                                                    <h2>Login</h2>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label ">Email address</label>
                                                        <input type="email" class="form-control" id="email" name="email" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label ">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" required>
                                                    </div>
                                                    <div class="d-grid">
                                                        <button class="btn btn-outline-dark" type="submit">Login</button>
                                                    </div>
                                                </form>
                                                <div>
                                                    <p class="mb-0  text-center"><a href="<?php echo base_url(); ?>register"
                                                        class="text-primary fw-bold">Sign
                                                        Up</a>
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-evenly mt-3">
                                                    <a href="<?=base_url(); ?>"><input class="btn btn-light btn-lg" type="button" value="Go Back" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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