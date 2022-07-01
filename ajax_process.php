<?php 
require_once('connection.php');
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "add_user_form"){?>
<table  class="tab1" cellspacing= "0" cellpadding='2' >
<h1>Add User</h1>
<td colspan="2" align="center" id="msg"></td> 
<tr>
    <th><b>Name :</b></th>
    <td><b><input type="text"  id="full_name"></b></td>
</tr>
<tr>
<th><b>Email :</b></th>
<td><b><input type="email"  id="email"></b></td>
</tr>
<tr>
    <th><b>Phone Number :</b></th>
    <td><b><input type="text"  id="phone"></b></td>
</tr>
<tr>
    <td colspan="2" align="center" ><b><button style="width: 150px; height:30px; margin-top:20px;" onclick="add_user()">Add User</button></b></td>
</tr>
<tr>
    <td colspan="2" align="center" ><b><button style="width: 150px; height:30px; margin-top:20px;" onclick="reset()">Reset</button></b></td>
</tr>
</table><?php 
}


if(isset($_REQUEST['action']) && $_REQUEST['action'] == "add_user"){
    $query = "INSERT INTO users (full_name,email,phone) VALUES('".$_REQUEST['full_name']."','".$_REQUEST['email']."','".$phone = $_REQUEST['phone']."')";
    $result = mysqli_query($connection,$query);
    // $user= mysqli_fetch_assoc($result);
    if($result)
    {
        $id= mysqli_insert_id($connection);
        ?>
    
        <div> <?php echo " Inserted User Successfully ".$id ?></div>
   <?php }
   else{
       ?>
   <div> <?php echo " Not Insert User Successfully " ?></div>
   <?php 
   }    
    ?>
    <?php
}
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "show_users")
{
    if(isset($_REQUEST['userSearch']))
    {
        extract($_REQUEST);
        $query = "SELECT * FROM users WHERE full_name LIKE '%".$userSearch."%'  ORDER BY user_id desc ";
    }
    else
    {
        $query = "SELECT * FROM users ORDER BY user_id desc ";
    }
    $result = mysqli_query($connection,$query);
    if($result)
    {
        
         ?>
         <head>
             <style>
                 .tab3{
                     width: 70%;
                    background-color: teal;
                    color: white;
                    font-weight: bold;
                    padding: 12px;
                 }
             </style>
         </head>
         <table class="tab3" border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th><b>#</b></th>
                <th><b>Name</b></th>
                <th><b>Email</b></th>
                <th><b>Phone</b></th>
                <th colspan="2"><b>Actions</b></th>
            </tr>
            <?php
            $i=1;
        while($user= mysqli_fetch_assoc($result))
        {?>
                    <tr>
                        <td><b><?php  echo $i++  ?></b></td>
                        <td><b><?php  echo $user['full_name']  ?></b></td>
                        <td><b><?php  echo $user['email']  ?></b></td>
                        <td><b><?php  echo $user['phone']  ?></b></td>
                        <td align="center"><button onclick="edit_user(<?php echo $user['user_id'] ?>)" style="color: white; background-color:green; width:50px;">Edit</button></td>
                        <td align="center" ><button style="color: white; background-color:red; width:50px;" onclick="delete_user(<?php echo $user['user_id'] ?>)">X</button></b></td>
                    </tr>
                    <?php } ?>
                </table> <?php
     }
   else{
       ?>
        <div> <?php echo "Users Not Available" ?></div>
   <?php 
   }    
    ?>
    <?php
}
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "delete_user"){
    $query = "DELETE  FROM USERS WHERE user_id=".$_REQUEST['user_id'];
    $result = mysqli_query($connection,$query);
    if($result)
    {
        ?>
    
        <div style="color:red"> <?php echo " Delete User Successfully  ".$_REQUEST['user_id']?></div>
   <?php }
   else{
       ?>
   <div> <?php echo " Not Delete User Successfully".$_REQUEST['user_id'] ?></div>
   <?php 
   }    
    ?>
    <?php
}
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "edit_user"){ $query = "select * FROM USERS WHERE user_id=".$_REQUEST['user_id'];
    $result = mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
    extract($row);
    ?>
<table  class="tab1" cellspacing= "0" cellpadding='2' >
<h1>Edit User</h1>
<td colspan="2" align="center" id="msg"></td> 
<tr>
    <th><b>Name :</b></th>
    <td><b><input type="text"  id="full_name" value="<?= $full_name?>"></b></td>
</tr>
<tr>
<th><b>Email :</b></th>
<td><b><input type="email"  id="email" value="<?= $email?>"></b></td>
</tr>
<tr>
    <th><b>Phone Number :</b></th>
    <td><b><input type="text"  id="phone"  value="<?= $phone?>"></b></td>
</tr>
<tr>
    <td colspan="2" align="center" ><b><button style="width: 150px; height:30px; margin-top:20px;" onclick="update_user(<?= $_REQUEST['user_id']?>)">Update User</button></b></td>
</tr>
<tr>
    <td colspan="2" align="center" ><b><button style="width: 150px; height:30px; margin-top:20px;" onclick="reset()">Reset</button></b></td>
</tr>
</table><?php 

}
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "update_user"){

     $query = "UPDATE users SET full_name = '".$_REQUEST['full_name']."', email= '".$_REQUEST['email']."',phone = '".$_REQUEST['phone']."' WHERE user_id = ".$_REQUEST['user_id'];
    $result = mysqli_query($connection,$query);
    if($result)
    {
        ?>
        <div style="color:Green"> <?php echo " Update User Successfully  "?></div>
   <?php }
   else{
       ?>
   <div> <?php echo " Not Update User Successfully" ?></div>
   <?php 
   }    
    ?>
    <?php
}
?>
    
