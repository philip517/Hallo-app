<?php
session_start();
require "config/conn.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}


$sql = "SELECT * FROM website";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all results into an associative array
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html style="overflow: scroll">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Projects - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" />
    <link rel="stylesheet" href="assets/css/animate.min.css" />
    <link rel="stylesheet" href="assets/css/pikaday.min.css" />
</head>

<body>
    <main class="page projets-page">
        <section class="portfolio-block project-no-images" style="padding-top: 35px">
            <div class="container" style="background: var(--bs-btn-disabled-color)">
                <div class="modal fade justify-content-center align-items-center" role="dialog" tabindex="-1"
                    id="modal-2">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-bg-warning" style="width: 498px">
                                <h4 class="modal-title">Modal Title</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Delete Website info ?</p>
                            </div>
                            <div class="modal-footer text-center justify-content-center">
                                <button class="btn btn-danger" type="submit" data-bs-target="#" style="
                      border-style: none;
                      width: 60.1px;
                      border-radius: 0px;
                    ">
                                    Yes</button><a class="btn btn-success" role="button" data-bs-target="#modal-1"
                                    data-bs-toggle="modal" style="
                      border-style: none;
                      border-radius: 0px;
                      margin-left: 12px;
                      width: 60.1px;
                    ">No</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="modal-1" style="padding-top: 158px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header d-lg-flex justify-content-lg-center align-items-lg-center" style="
                    height: 52.3px;
                    border-color: var(--bs-btn-border-color);
                    background: #0c1975;
                    color: #d6ddd6;
                    padding-left: 13px;
                  ">
                                <h4 class="modal-title d-lg-flex justify-content-lg-end align-items-lg-end"
                                    style="padding-left: 0px; margin-left: 0px">
                                    Website Title
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="
                    height: 105px;
                    padding-bottom: 20px;
                    margin-bottom: -1px;
                  ">
                                <p>URL:</p>
                                <p>Password:</p>
                            </div>
                            <div class="modal-footer" style="padding-top: 0px">
                                <button class="btn btn-primary text-bg-danger" type="button" data-bs-target="#modal-2"
                                    data-bs-toggle="modal" style="
                      border-style: none;
                      border-radius: 0px;
                      margin-right: 11px;
                    ">
                                    Delete</button><a class="btn btn-primary text-bg-warning" role="button"
                                    href="edit.php" style="
                      border-style: none;
                      border-radius: 0px;
                      margin-right: 13px;
                    ">&nbsp; Edit&nbsp;&nbsp;</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="heading" style="text-align: right">
                    <form class="d-flex justify-content-center align-items-center pulse animated">
                        <h2 class="d-lg-flex justify-content-lg-center align-items-lg-center"
                            style="text-align: center; height: 43px">
                            <input class="form-control" type="text" style="
                    padding-top: 0px;
                    padding-bottom: 0px;
                    width: 309.6px;
                    height: 39px;
                    margin-right: -2px;
                    padding-left: 21px;
                    border-top-right-radius: 0px;
                    border-bottom-right-radius: 0px;
                  " placeholder="search name" /><button
                                class="btn btn-primary text-capitalize fw-semibold text-bg-secondary" type="button"
                                style="
                    border-radius: 5px;
                    padding-left: 0px;
                    height: 39px;
                    padding-top: 0px;
                    margin-top: 0px;
                    padding-right: 0px;
                    margin-right: 0px;
                    margin-left: 0px;
                    padding-bottom: 0px;
                    margin-bottom: 0px;
                    width: 91.4px;
                    background: #2d338e;
                    border-top-left-radius: 0px;
                    border-bottom-left-radius: 0px;
                    border-style: none;
                  ">
                                Search
                            </button>
                        </h2>
                    </form>
                    <h2 style="padding-top: 0px; margin-top: 39px">
                        <a class="btn btn-primary text-capitalize fw-semibold text-bg-success" role="button"
                            data-bss-disabled-mobile="true" data-bss-hover-animate="pulse"
                            style="border-radius: 5px; border-style: none" href="add.php">Add New</a>
                    </h2>
                </div>
                <?php foreach($data as $website): ?>
                <div class="row" style="overflow: visible">

                    <div class="col-md-6 col-lg-4" data-bss-hover-animate="pulse"
                        style="padding-top: 11px; padding-bottom: 0px">
                        <div class="project-card-no-image pt-lg-3 mb-lg-4 pb-lg-3 ms-lg-0 me-lg-0 pe-lg-5" style="
                  height: 116.2px;
                  margin-bottom: 39px;
                  padding-bottom: 0px;
                ">
                            <h3 class="pt-lg-0 pb-lg-0 mb-lg-3 mt-lg-2" style="margin-bottom: 29px">
                                <?php echo $website['name']; ?>
                            </h3>
                            <a class="btn btn-outline-primary btn-sm" role="button" href="#modal-1"
                                style="margin-bottom: 3px; padding-top: 3px; margin-top: 4px" data-bs-target="#modal-1"
                                data-bs-toggle="modal">See More</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>