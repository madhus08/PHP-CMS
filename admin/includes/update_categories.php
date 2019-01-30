    <form action="" method="post">
        <label for="cat-title">Update Category</label>
        <?php
        
        if(isset($_GET['edit']))
        {
            $edit_cat_id=$_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id=$edit_cat_id";
            $edit_category_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($edit_category_query))
            {
                $cat_title = $row['cat_title'];
                $cat_id=$row['cat_id'];
        ?>
        <input value="<?php if(isset($cat_title)) {echo $cat_title;}?>" class="form-control" type="text" name="cat_title">
        
        <?php }} ?>
        <?php
        //Update Category
        if(isset($_POST['update']))
        {
            $update_cat_title=$_GET['cat_title'];
            echo $update_cat_title;
//            $query="UPDATE categories SET cat_title ='{$update_cat_title}' WHERE cat_id={$cat_id}";
//            $update_category_query=mysqli_query($connection,$query);
//            header("Location: categories.php");
//            if(!$update_category_query)
//            {
//                die("Delete error!");
//            }
        }
        ?>
        <div class="form-group">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type=submit name="update" value="Update Category">
        </div>
</form>