<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
              <th>Post No</th>
							<th>Post Title</th>
							<th>Description</th>
							<th>Category</th>
							<th>Image</th>

              <th>Author</th>
              <th>Date</th>
              <th>Tags</th>
              <th>Action</th>
						</tr>
					</thead>

					<tbody>
            <?php $query ="SELECT tbl_post.*, tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id
                ORDER BY tbl_post.title DESC";
                $post_list = $db->select($query);
                if ($post_list) {
                  $i = 0;
                while ($result = $post_list->fetch_assoc()) {
                  $i++;




             ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['title']; ?></td>
							<td><?php echo  $fm->textshort($result['body'],50); ?></td>
							<td> <?php echo $result['name']; ?></td>
              <td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"/></td>
							<td><?php echo $result['author']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
							<td> <?php echo $result['tags']; ?></td>
							<td><a href="">Edit</a> || <a href="">Delete</a></td>
						</tr>

            <?php   }  } ?>


					</tbody>
				</table>

               </div>
            </div>
        </div>
        <script type="text/javascript">
              $(document).ready(function () {
                  setupLeftMenu();
                  $('.datatable').dataTable();
      			setSidebarHeight();
              });
          </script>

            <?php include 'inc/footer.php'; ?>>
