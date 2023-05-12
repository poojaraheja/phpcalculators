<?php

require "function.php";

if (isset($_POST['submit'])) {
    $response = bmi_cal($_POST['name'], $_POST['mobile'], $_POST['email'], $_POST['weight'], $_POST['height'], $_POST['inches']);
}

?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="container">

            <div class="form-wrap">
                <form id="survey-form" action="bmi.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="name-label" for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter your name"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="email-label" for="email">Mobile</label>
                                <input type="number" name="mobile" placeholder="Enter your number" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="number-label" for="number">Email Id</label>
                                <input type="email" name="email" id="number" min="10" max="99" class="form-control"
                                    placeholder="Enter your email id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label id="email-label" for="email">Your Weight(Kg)</label>
                                <input type="number" name="weight" id="email" placeholder="Enter your weight"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Your Height(Feet)</label>
                                <select id="dropdown" name="height" class="form-control" required>
                                    <option disabled selected value>Select</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>

                                </select>


                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Your Height(Inches)</label>
                                <select id="dropdown" name="inches" class="form-control" required>
                                    <option disabled selected value>Select</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>

                                </select>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Interested in knowing more :</label>
                                <select id="dropdown" name="interested" class="form-control" required>
                                    <option value="yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Not Sure">Not Sure</option>
                                </select>
                            </div>
                        </div>

                    </div>






                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" id="submit" class="btn btn-primary btn-block" name="submit">Calculate
                                BMI</button>
                        </div>
                    </div>

                </form>
                <?php echo @$response ?>
            </div>

        </div>
        <footer id="Footer" style="background-color:#fff;" class="page-footer font-small stylish-color-dark pt-4 my-4">
            <div style="background-color:#fff;" class="container text-center text-md-left">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <!-- Content -->
                        <h5 class="text-uppercase font-weight-bold mt-3 mb-4">About our Company</h5>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 70px;">
                        <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit
                            amet,
                            consectetur
                            adipisicing elit.</p>
                    </div>
                    <hr class="clearfix w-100 d-md-none">
                    <div id="link10" class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase font-weight-bold">Products</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 70px;">
                        <p>
                            <a href="#!">Travelling</a>
                        </p>
                        <p>
                            <a href="#!">About</a>
                        </p>
                        <p>
                            <a href="#!">BrandFlow</a>
                        </p>
                        <p>
                            <a href="#!">Services</a>
                        </p>
                    </div>

                    <hr class="clearfix w-100 d-md-none">
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase font-weight-bold">Contact</h6>
                        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                        <p>
                            <i class="fas fa-home mr-3"></i> Mumbai, Maharashtra
                        </p>
                        <p>
                            <i class="fas fa-envelope mr-3"></i> collab@codewithfaraz.com
                        </p>
                        <p>
                            <i class="fas fa-phone mr-3"></i> + 91 80254 52xxx
                        </p>
                        <p>
                            <i class="fas fa-print mr-3"></i> + 91 80254 55xxx
                        </p>
                    </div>
                </div>
            </div>



            <!-- Copyright -->
            <div style="background-color:#fff;" class="footer-copyright text-center py-3">
                Copyright© 2023: Design and Develop by Mag Cloud Solutions Pvt. Ltd
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
    </body>

</html>