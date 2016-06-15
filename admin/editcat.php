<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php

if ( !isset($_GET['catid']) || $_GET['catid'] == NULL ) {
  echo "<script> window.location =  'catlist.php'; </script>";
}else {
  $id = $_GET['catid'];
}

 ?>
        <div class="grid_10">

            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
                 <?php
                 if ($_SERVER['REQUEST_METHOD']=='POST')
                   {
                    $name = $_POST['name'];
                    $name = mysql_real_escape_string( $name);
                    if (empty($name)) {
                      echo "Field must not be empty..";
                    }else {
                      $query = "UPDATE  tbl_category SET name = '$name' WHERE id = '$id'";

                      $catupdate = $db->update($query);
                    }
                    if ($catupdate) {
                    echo "Category Updated Successfully";
                  }else {
                    echo "Category not Updated";
                  }

                  }

                     ?>
                <?php
                $query = "SELECT * FROM tbl_category WHERE id ='$id' ORDER by id desc ";
                $category = $db->select($query);
                while ($result = $category->fetch_assoc() ) {


                 ?>

                 <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="name"  value="<?php echo $result['name'];  ?>"class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
          <?php include 'inc/footer.php'; ?>>
