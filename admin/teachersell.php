<?php include 'head.php'; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main" >
                    <div class="col-sm-12 col-md-12 well" id="content">
                        
                        <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Teacher Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Course Fee</th>
                                <th scope="col">Payable Fee</th>
                     
                                <th scope="col">Button</th>

                              </tr>
                            </thead>
                            <tbody>
                    <?php 
                    if (isset($_GET['tpay'])) {
                        echo $senddata->paymentconfirm($_GET['tpay']);
                    }
                    $viewcat = $viewcls->teachersell();
                    if ($viewcat) {
                        $i = 0;
                    foreach ($viewcat as $value) {
                        $i++;
                                 ?>
                              <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $value['teacher_name']; ?></td>
                                <td><?php echo $value['teacher_email']; ?></td>
                                <td><?php echo $value['course_title']; ?></td>
                                <td><?php echo ($value['price']); ?> Taka</td>
                                <td><?php echo ($value['price'])-($value['price']*.2); ?> Taka</td>
                    
                                <td>
                                    <?php if ($value['t_pay']==0) { ?>
                                         <a class="btn btn-danger" href="?tpay=<?php echo $value['enrole_id']; ?>">Confirm Now</a>
                                  <?php  }else{ 
                                    echo "<button class='btn btn-success'>Paid</button>";
                                  } ?>
                                   </td>
                              </tr>
             
                     <?php }} ?>
                            </tbody>
                          </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include 'foot.php'; ?>