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
                                <th scope="col">Contact</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Created At</th>

                              </tr>
                            </thead>
                                <tbody>
                                                  <?php 
                    $viewcat = $viewcls->studentlist();
                    if ($viewcat) {
                        $i = 0;
                    foreach ($viewcat as $value) {
                        $i++;
                                 ?>
                              <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $value['student_name']; ?></td>
                                <td><?php echo $value['student_email']; ?></td>
                                <td><?php echo $value['student_phone']; ?></td>
                            
                                <td><?php echo $value['gender']; ?></td>
                                <td><?php echo $value['created_at']; ?></td>
                          
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