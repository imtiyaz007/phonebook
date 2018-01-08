 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

<?php 
include 'env.php';
$id=$_REQUEST['id'];
$delete="delete from infos where name='$id'";
 $result=mysqli_query($conn,$delete);
 echo '<script>
              setTimeout(function() {
                  swal({
                title: "Great Job",
                text: "Contact deleted",
                type: "success"
                }, function() {
                window.location = "index.php";
                });
                }, 100);
                </script>';
 ?>