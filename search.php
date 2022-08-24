<?php
$connect = mysqli_connect('localhost', 'root', '' , 'blog_db');
$sr = $_GET['data'];
$sql = mysqli_query($connect, 'SELECT postId FROM comm WHERE body LIKE' . ' "%' . $sr . '%"');
$count = [];
foreach(mysqli_fetch_all($sql) as $ss){
    array_push($count,  $ss[0]);
}
$c = array_unique($count);
$count1 = [];

    $sql1 = mysqli_query($connect, 'SELECT title, email, comm.body FROM blog JOIN comm ON blog.id = postId WHERE comm.body LIKE' . ' "%' . $sr . '%"');
    array_push($count1, mysqli_fetch_all($sql1));

echo json_encode($count1);

