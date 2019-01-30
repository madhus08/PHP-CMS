<?php include "includes/admin_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Page!
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                            
                            <?php
                            
                            if(isset($_POST['submit']))
                            {
                               $cat_title = $_POST['cat_title'];
                                
                                if($cat_title==""||empty($cat_title))
                                {
                                    echo "A title is required";
                                }
                                else
                                {
                                    $query="INSERT INTO categories(cat_title) VALUES ('{$cat_title}')";
                                    $create_cat_query = mysqli_query($connection,$query);
                                    
                                    if(!$create_cat_query)
                                    {
                                        die("error in query<br/>".mysqli_error($connection));
                                    }
                                }
                            }
                            
                            
                            
                            ?>
                            
                            <form action="" method="post">
                                <label for="cat-title">Add Category</label>
                                <div class="form-group">
                                <input class="form-control" type="text" name="cat_title">
                                </div>
                                
                                <div class="form-group">
                                <input class="btn btn-primary" type=submit name="submit" value="Add Category">
                                </div>
                            </form>
                            
                         <?php 
                            if(isset($_GET['edit']))
                            {
                                $cat_id=$_GET['edit'];
                                //echo $cat_id;
                                include "includes/update_categories.php";
                            }
                            ?>
                        
                        </div>
                        
                        <div class="col-xs-6">
                            
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Category Title </th>
                                </tr>
                            </thead>
                            <tbody>
                           
                                 <?php //display all categories
                                $query = "SELECT * FROM categories";
                                $select_categories_query = mysqli_query($connection,$query);
                                  while($row = mysqli_fetch_assoc($select_categories_query))
                                  {
                                      $cat_title = $row['cat_title'];
                                      $cat_id=$row['cat_id'];
                                      echo "<tr>";
                                      echo "<td>{$cat_id}</td>";
                                      echo "<td>{$cat_title}</td>";
                                      echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                      echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                      echo "</tr>";
                                  }
                                ?>
                                
                                <?php
                                
                                if(isset($_GET['delete']))
                                {
                                    $delete_cat_id=$_GET['delete'];
                                    $query="DELETE FROM categories WHERE cat_id={$delete_cat_id}";
                                    $delete_category_query=mysqli_query($connection,$query);
                                    header("Location: categories.php");
                                    if(!$delete_category_query)
                                    {
                                        die("Delete error!");
                                    }
                                    
                                }
                                ?>
                            </tbody>
                            
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php";?>