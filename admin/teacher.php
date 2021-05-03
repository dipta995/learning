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
                                <th scope="col">Photo</th>
                                <th scope="col">Created At</th>

                              </tr>
                            </thead>
                            <tbody>
                                                  <?php 
                    $viewcat = $viewcls->teacherlist();
                    if ($viewcat) {
                        $i = 0;
                    foreach ($viewcat as $value) {
                        $i++;
                                 ?>
                              <tr>
                                <th scope="row"><?php echo $i; ?> </th>
                                <td><?php echo $value['teacher_name']; ?></td>
                                <td><?php echo $value['teacher_email']; ?></td>
                                <td><?php echo $value['teacher_phone']; ?></td>
                                <td><img style="height: 120px; width: 120px; border-radius: 10px;" src="../<?php echo $value['teacher_image']; ?>"></td>
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