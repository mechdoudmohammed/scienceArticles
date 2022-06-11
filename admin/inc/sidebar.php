<?php
if(isset($_SESSION['email']) && $_SESSION['role'] == 'admin'){
?>
<ul class="list-group list-group-flush">
    <li class="list-group-item list-group-item-primary"><a href="all_posts" class="text-white font-weight-bold"><i class="fa fa-file"></i> All Posts</a></li>
    <li class="list-group-item list-group-item-primary"><a href="category" class="text-white font-weight-bold"><i class="fa fa-list-alt"></i> Tags</a></li>
   
    <li class="list-group-item list-group-item-primary"><a href="users" class="text-white font-weight-bold"><i class="fa fa-users"></i> Authors</a></li>
</ul>
<?php }
if(isset($_SESSION['email']) && $_SESSION['role'] == 'author'){
?>
    <ul class="list-group list-group-flush">
    <li class="list-group-item list-group-item-primary"><a href="all_posts" class="text-white font-weight-bold"><i class="fa fa-file"></i> All Posts</a></li>
    <li class="list-group-item list-group-item-primary"><a href="colaboration" class="text-white font-weight-bold"><i class="fa fa-file"></i> Liste colaboration</a></li>
      
    </ul>
<?php }?>
