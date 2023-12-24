<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="">
                <section class="gradient-custom">
                    <div class="container py-5">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-12 col-lg-9 col-xl-7">
                                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                    <div class="card-body p-4 p-md-5">
                                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Register</h3>
                                        <form action="<?=base_url(); ?>clientRegistration" method="POST">

                                            <div class="row">
                                                <div class="col-md-6 mb-4">

                                                    <div class="form-outline">
                                                    <label class="form-label" for="firstname">First Name</label>
                                                        <input type="text" id="firstname" name="firstname" class="form-control form-control-lg" required />
                                                    </div>

                                                </div>
                                                <div class="col-md-6 mb-4">

                                                    <div class="form-outline">
                                                    <label class="form-label" for="surname">Surname</label>
                                                        <input type="text" id="surname" name="surname" class="form-control form-control-lg" required />
                                                        
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-4 pb-2">

                                                    <div class="form-outline">
                                                    <label class="form-label" for="address">Address</label>
                                                        <input type="text" id="address" name="address" class="form-control form-control-lg" required />
                                                        
                                                    </div>

                                                </div>
                                                <div class="col-md-6 mb-4 pb-2">

                                                    <div class="form-outline">
                                                    <label class="form-label" for="telephone">Phone Number</label>
                                                        <input type="tel" id="telephone" name="telephone" class="form-control form-control-lg" required />
                                                        
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-4 d-flex align-items-center">

                                                    <select name="title" class="select form-control-lg" >
                                                        <option value="none" disabled>Title</option>
                                                        <option value="mr">Mr.</option>
                                                        <option value="mrs">Mrs.</option>
                                                    </select>

                                                </div>
                                                <div class="col-md-6 mb-4">

                                                    <h6 class="mb-2 pb-1">Status: </h6>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="buyer" value="buyer" checked />
                                                        <label class="form-check-label">Buyer</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="seller" value="seller" />
                                                        <label class="form-check-label">Seller</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="joint" value="joint" />
                                                        <label class="form-check-label">Joint</label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-4 pb-2">

                                                    <div class="form-outline">
                                                    <label class="form-label" for="email">Email</label>
                                                        <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                                                        
                                                    </div>

                                                </div>
                                                <div class="col-md-6 mb-4 pb-2">

                                                    <div class="form-outline">
                                                    <label class="form-label" for="password">Password</label>
                                                        <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                                                        
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-4 pb-2">

                                                    <div class="form-outline">
                                                    <label class="form-label" for="accountno">Bank Account No.</label>
                                                        <input type="number" id="accountno" name="accountno" class="form-control form-control-lg" required />
                                                        
                                                    </div>

                                                </div>
                                                <div class="col-md-6 mb-4 pb-2">

                                                    <div class="form-outline">
                                                    <label class="form-label" for="sortcode">Bank Sort Code</label>
                                                        <input type="number" id="sortcode" name="sortcode" class="form-control form-control-lg" required />
                                                        
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="mt-1 d-flex justify-content-evenly">
                                                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                                <a href="<?=base_url(); ?>login"><input class="btn btn-secondary btn-lg" type="button" value="Cancel" /></a>
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
</body>

</html>