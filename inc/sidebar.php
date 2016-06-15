<div class="sidebar clear">
  <div class="samesidebar clear">
    <h2>Categories</h2>


      <ul>

        <?php
       $query="Select * from tbl_category";
       $category=$db->Select($query);

       if ($category) {
       while ($result = $category->fetch_assoc()) {

        ?>
        <li><a href="posts.php?category=<?php echo $result['id'];  ?>"><?php echo $result['name']; ?></a></li>
        <?php } }else {?>
     <li> NO Category created</li>
        <?php }?>

      </ul>


  </div>

  <div class="samesidebar clear">
    <h2>Latest articles</h2>

    <?php
    $query="Select * from tbl_post limit 5";
   $post=$db->Select($query);

   if ($post) {
   while ($result = $post->fetch_assoc()) {




    ?>
      <div class="popular clear">
      <h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
      <a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>
      <?php echo $fm->textshort($result['body'],120); ?>
      </div>
      <?php } }else {
    header("Location:404.php");
      }?>




  </div>

</div>
