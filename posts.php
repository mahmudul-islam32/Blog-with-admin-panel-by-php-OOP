<?php include 'inc/header.php';  ?>

<?php
if (!isset($_GET['category']) || $_GET['category'] == NULL ) {
header("Location:404.php");
}else {
  $id=$_GET['category'];
}

 ?>


 	<div class="contentsection contemplete clear">
 		<div class="maincontent clear">


 			<?php
      $query="Select * from tbl_post where cat = $id";
 		 $post=$db->Select($query);

 		 if ($post) {
 		 while ($result = $post->fetch_assoc()) {




 			?>
 			<div class="samepost clear">
 				<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
 				<h4><?php echo $fm->formatDate($result['date']) ;?> By <a href="#"><?php echo $result['author']; ?></a></h4>
 				 <a href="#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
 			 <?php echo $fm->textshort($result['body']); ?>
 				<div class="readmore clear">
 					<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
 				</div>
 			</div>

 			<?php } ?>



 			<?php } else {?>

        <h3>No post availabele in this category...</h3>

 		<?php 	}?>



 		</div>
 		<?php include'inc/sidebar.php'; ?>
     <?php include'inc/footer.php'; ?>