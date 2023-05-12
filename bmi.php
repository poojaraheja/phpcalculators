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
        <?php
        include_once "navbar.php";

        ?>
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
        <footer id="Footer" style="background-color:#fff;" class="page-footer font-small stylish-color-dark pt-4 mt-4">
            <div style="background-color:#fff;" class="container">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <!-- Content -->
                        <h5 class=" text-uppercase font-weight-bold mt-3 mb-4">About our Company</h5>

                    </div>

                    <div id="link10" class="about col-md-4  mx-auto mt-3 mb-4 text-center">
                        <h6 class="text-uppercase font-weight-bold  mb-4 t" style="color: #70df70;
    font-weight: bold;
    font-size: 25px;">About Us</h6>

                        <p>
                            Welcome to
                            <a href=" https://uhealthy.in/">uhealthy,</a>
                        </p>
                        <p>
                            where health-minded individuals come together to support
                        </p>
                        <p>
                            each other on their journeys to better health.
                        </p>

                    </div>


                    <div class="col-md-4 mx-auto mt-3 mb-4 text-lg-end text-md-end text-sm-center text-center">
                        <h6 class="text-uppercase font-weight-bold mb-4 " style="color: #70df70;
    font-weight: bold;
    font-size: 25px;">Contact Us</h6>
                        <p>
                            <i class="fas fa-home mr-3"></i> +918010373181
                        </p>
                        <p>
                            <i class="fas fa-envelope mr-3"></i> Info@uhealthy.in
                        </p>
                        <p>
                            2, Gaura Complex,
                            <br>
                            Near Matrix Hospital,
                            <br>
                            Haldwani – 263139
                            <br>
                            Uttarakhand, India
                        </p>

                    </div>
                </div>
            </div>



            <!-- Copyright -->
            <div style="background-color:#fff;" class="footer-copyright text-center py-3">
                <p>
                    <a href="">Our Services</a>
                </p>
                <p>
                    <a href="">Privacy Policy</a>
                </p>
            </div>
            <div style="background-color:#fff;" class="footer-copyright text-center py-3">
                Copyright© 2023 | <a href=" https://uhealthy.in/">Uhealthy.in</a><br>
                Design and Develop by Mag Cloud Solutions Pvt. Ltd.
            </div>

        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>
    </body>

</html>