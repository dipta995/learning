<?php include 'include/header.php'; ?>

<style type="text/css">
    body {
        background-color: #f9f9fa
    }

    .padding {
        padding: 3rem !important
    }

    .user-card-full {
        overflow: hidden
    }

    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        border: none;
        margin-bottom: 30px
    }

    .m-r-0 {
        margin-right: 0px
    }

    .m-l-0 {
        margin-left: 0px
    }

    .user-card-full .user-profile {
        border-radius: 5px 0 0 5px
    }

    .bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
        background: linear-gradient(to right, #ee5a6f, #f29263)
    }

    .user-profile {
        padding: 20px 0
    }

    .card-block {
        padding: 1.25rem
    }

    .m-b-25 {
        margin-bottom: 25px
    }

    .img-radius {
        border-radius: 5px
    }

    h6 {
        font-size: 14px
    }

    .card .card-block p {
        line-height: 25px
    }

    @media only screen and (min-width: 1400px) {
        p {
            font-size: 14px
        }
    }

    .card-block {
        padding: 1.25rem
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0
    }

    .m-b-20 {
        margin-bottom: 20px
    }

    .p-b-5 {
        padding-bottom: 5px !important
    }

    .card .card-block p {
        line-height: 25px
    }

    .m-b-10 {
        margin-bottom: 10px
    }

    .text-muted {
        color: #919aa3 !important
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0
    }

    .f-w-600 {
        font-weight: 600
    }

    .m-b-20 {
        margin-bottom: 20px
    }

    .m-t-40 {
        margin-top: 20px
    }

    .p-b-5 {
        padding-bottom: 5px !important
    }

    .m-b-10 {
        margin-bottom: 10px
    }

    .m-t-40 {
        margin-top: 20px
    }

    .user-card-full .social-link li {
        display: inline-block
    }

    .user-card-full .social-link li a {
        font-size: 20px;
        margin: 0 10px 0 0;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out
    }
</style>
<!-- Page info -->
<div class="page-info-section set-bg" data-setbg="img/page-bg/4.jpg">
    <div class="container">
        <div class="site-breadcrumb">
            <a href="#">Home</a>
            <span>Contact</span>
        </div>
    </div>
</div>
<!-- Page info end -->
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $sending = $senddata->updateteacherprofile($_POST, $_FILES, $student_id);
                            }
                            $viewcat = $viewcls->teacherviews($_SESSION['student_id'], $_SESSION['name']);
                            if ($viewcat) {

                                foreach ($viewcat as $value) {

                            ?>
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25"> <img src="<?php echo $value['teacher_image']; ?>" class="img-radius" alt="User-Profile-Image"> </div>
                                        <h6 class="f-w-600"><?php echo $value['teacher_name']; ?></h6>

                                        <p> <a href="?upme=<?php echo $value['teacher_id']; ?>">Update Profile</a></p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                        </div>
                        <div class="col-sm-8">
                            <?php if (isset($_GET['upme'])) { ?>
                                <div class="card-block">

                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Change Information</h6>
                                    <form method="post" action="" enctype=multipart/form-data>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Name</label>
                                                <input type="text" value="<?php echo $value['teacher_name']; ?>" class="form-control" name="teacher_name" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Email</label>
                                                <input type="email" name="teacher_email" value="<?php echo $value['teacher_email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Phone</label>
                                                <input type="text" name="teacher_phone" value="<?php echo $value['teacher_phone']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Password</label>
                                                <input type="text" name="teacher_password" value="<?php echo $value['teacher_password']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Account no</label>
                                                <input type="text" name="account_no" value="<?php echo $value['account_no']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                            </div>


                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>

                                </div>


                            <?php } else { ?>

                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600"><span style="color:red;font-weight: 400;">Name:</span><br><?php echo $value['teacher_name']; ?></p>
                                            <h6 class="text-muted f-w-400"><span style="color:red;font-weight: 400;">Email:</span><br><?php echo $value['teacher_email']; ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600"><span style="color:red;font-weight: 400;">Contact:</span><br><?php echo $value['teacher_phone']; ?></p>
                                            <h6 class="text-muted f-w-400"><span style="color:red;font-weight: 400;">Account No:</span><br><?php echo $value['account_no']; ?></h6>

                                        </div>
                                    </div>
                                </div>

                            <?php } ?>



                            <?php
                                    $price = null;
                                    $viewamount = $viewcls->teacheraccountbalance($_SESSION['student_id']);
                                    foreach ($viewamount as $value) {
                                        $price += ($value['teacher_pay']);
                                    }
                            ?>
                            <h6 class="text-muted f-w-400"><span style="color:red;font-weight: 400; margin-left:50px; ">My Balance: </span><span><?php echo $price; ?> Taka</span></h6>
                        </div>

                <?php }
                            } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include 'include/footer.php'; ?>