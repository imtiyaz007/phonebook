<?php 
include("env.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Phonebook</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Ovo" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

  <style type="text/css">
    body {
        background-image: url(img/1.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-color: #464646;
        font-family: 'Ovo', serif;
        
}


  </style>
  <script type="text/javascript">
 jQuery(document).ready( function () {
        $("#add_item").click( function(e) {
          e.preventDefault();
        $(".add").append('<div class="form-group">\
          <div class="input-group">\
           <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>\
           <input type="text" pattern="[7|8|9]\d{9}" name="phone[]" placeholder="Enter Phone Number" class="form-control" required />\
              <a href="#" class="remove_this btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></a>\
          </div>\
         </div>\
                \
            </div>');
        return false;
        });

    jQuery(document).on('click', '.remove_this', function() {
        jQuery(this).parent().remove();
        return false;
        });
   
  });
  </script>

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
</head>
<body>


<div class="container">
  <div class="row">
    <div class="col-12" style="background-color: #f4f7fc; border-radius: 10px;" >
      <div class="" style=" text-align: center;">
  <h1>Welcome To Phone Book</h1>
  
  <p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="cursor: pointer;">
  <i class="fa fa-user-plus" aria-hidden="true"></i> Add Contact
</button></p>
      

      <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Contact</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="post">
          
          <div class="form-group">
          <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
           <input type="text" name="name" id="" placeholder="Enter Name" class="form-control" required />
          </div>
         </div>

          <div class="form-group">
          <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
           <input type="text" name="email" placeholder="Enter Email Id" class="form-control" required />
          </div>
         </div>
         <div class="form-group add" id="add" >
          <div class="input-group" >
           <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
           <input type="text" pattern="[7|8|9]\d{9}" name="phone[]" placeholder="Enter Phone Number" class="form-control" required />
            <button style=" cursor: pointer; " class="btn btn-success" name="add_item" id="add_item"><i class="fa fa-plus" aria-hidden="true"></i></button>
          </div>

         </div>

          <!-- <div class="form-group add" id="add">
            
            <input type="number" class="form-control" name="" placeholder="Enter number">
            <button style="margin-top: -70px; margin-left: 230px; cursor: pointer;" class="btn btn-success" name="add_item" id="add_item"><i class="fa fa-plus" aria-hidden="true"></i></button>
          </div> -->

           
           
          <input type="submit" value="Save" name="save" class="btn btn-info" name="">
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
  
    </div>

  </div>
  <br>
  <div class="row">
    
    <div class="col-4">
      <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Contact Details" class="form-control" />
    </div>
   </div>
   <?php 

    ?>
      <div class="list-group" style="overflow: auto; height:400px;" id="result">
        
    </div>
    </div>
    <!-- <div class="col-1" >
       <div style="width: 100px; background-color: #f4f7fc;">
  <img class="card-img-top" src="img/2.jpg" alt="Card image" style="width: 100px;height: 100px;">
   <p class="card-title" style="color: skyblue; text-align: center;"><b>John Doe</b></p>
  
</div>
    </div> -->

   
</div>

</body>
</html>

<?php 
    
  if (isset($_POST['save'])) {
    $name=mysqli_real_escape_string($conn, $_POST['name']);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
    $phone=$_POST['phone'];
    $limit=(int)sizeof($phone);

     for($i=0;$i<$limit;$i++){
      $insert="insert into infos values('','$name','$email','$phone[$i]','img/av1.png',0)";
      $result=mysqli_query($conn,$insert);

     }
     echo '<script>
              setTimeout(function() {
                  swal({
                title: "Great Job",
                text: "Contact Added Successfully",
                type: "success"
                }, function() {
                window.location = "index.php";
                });
                }, 100);
                </script>';
  }
 ?>