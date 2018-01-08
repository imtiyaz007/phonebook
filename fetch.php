<?php
//fetch.php
include 'env.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM infos 
  WHERE name LIKE '%".$search."%'
  OR num LIKE '%".$search."%' 
  OR email LIKE '%".$search."%' 
 GROUP BY name ORDER BY name ASC";
}
else
{
 $query = "
  SELECT * FROM `infos` GROUP BY name ORDER BY name ASC
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{

 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  
   <a  href="showall.php?name='.$row["name"].'" class="list-group-item list-group-item-action"><img class="card-img-top" src="'.$row["avtr"].'" alt="Card image" style="width:50px;height: 50px; border-radius: 50%;">'.$row["name"].'</a>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>