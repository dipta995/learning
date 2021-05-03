<?php 
include 'head.php'; 
if (isset($_GET['upcat'])) {
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])) {
        
    $senddata->updatecat($_POST,$_FILES,$_GET['upcat']);
    }
}elseif(isset($_GET['delcat'])){
    $deletedata->removecat($_GET['delcat']);
}else{}
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['create'])) {
    echo $senddata->createcat($_POST,$_FILES);
    }
?>
    
        <div id="page-wrapper">
                    <a class="btn btn-danger" href="cat.php">Create New Category</a>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main" >
                    <div class="col-sm-12 col-md-5 well" id="content">
                        <?php 
                        if (isset($_GET['upcat'])) { 

                            $viewsin = $viewcls->catviewbyId($_GET['upcat']);
                        
                
                    foreach ($viewsin as $val) {
                     
                            ?>
                             <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleFormControlFile1">Example file input</label>
                              <input class="form-control form-control-lg" type="text" name="category_name" value="<?php echo $val['category_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                                <img style="height: 120px; width: 200px;" src="../<?php echo $val['category_image']; ?>">
                              </div>
                            <input style="float: right;" class="btn btn-info" type="submit" name="update" value="Update Catagory">
                        
                        </form>
                            
                        <?php }}else{ ?>
                        
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleFormControlFile1">Example file input</label>
                              <input class="form-control form-control-lg" type="text" name="category_name" placeholder="Create New Catagory">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
                              </div>
                            <input style="float: right;" class="btn btn-info" type="submit" name="create" value="Create New Catagory">
                        
                        </form>
                    <?php } ?>
                    </div>


                    <div class="col-sm-12 col-md-7 well" id="content">
                       
                          
                          <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Image</th>
                                <th scope="col">Button</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php 
                    $viewcat = $viewcls->catview();
                    if ($viewcat) {
                        $i = 0;
                    foreach ($viewcat as $value) {
                        $i++;
                                 ?>
                              <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $value['category_name']; ?></td>
                                <td><img style="height: 120px; width: 200px;" src="../<?php echo $value['category_image']; ?>"></td>
                                <td>
                                    <a href="?upcat=<?php echo $value['category_id']; ?>">Update</a>
                                    <a href="?delcat=<?php echo $value['category_id']; ?>">Delete</a>
                                </td>
                              </tr>
                          <?php } } ?>
             
                     
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