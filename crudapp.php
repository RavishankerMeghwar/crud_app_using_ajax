<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::CRUD APP USING AJAX::</title>
    <style>
        .tab1{
            background-color: teal;
            padding: 30px;
            color: white;
        }
        input{
            width: 400px;
        }
        .tab2{
            background-color: teal;
            padding: 10px;
            color: white;
            width: 50%;
            
        }
    </style>
</head>
<body onload= "show_users(),add_user_form()" >
    <center>
       <div id="add_user_form"></div>
        <h1>All Users</h1>
        <hr>
		<div style="background-color: blue; width: 50%;">
			<table>
				<tr>
					<td><input type="text" id="search"></td>
					<td><button onclick="search_user()">Search</button></td>
				</tr>
			</table>
		</div>
        <div id="show_users"></div>
        </center>
    <script>
        function add_user_form(){
            var ajax_object = null;
            if(window.XMLHttpRequest){
					ajax_object = new XMLHttpRequest();
				}
				else{
					ajax_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
				ajax_object.onreadystatechange = function(){
					if(ajax_object.readyState == 4 && ajax_object.status == 200){
						document.getElementById(
							"add_user_form").innerHTML = ajax_object.responseText;
					}
				}
				ajax_object.open("GET","ajax_process.php?action=add_user_form");
				ajax_object.send();
        }
        function add_user()
        {
            var full_name = document.getElementById('full_name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var ajax_object = null;
            if(window.XMLHttpRequest){
					ajax_object = new XMLHttpRequest();
				}
				else{
					ajax_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
				ajax_object.onreadystatechange = function(){
					if(ajax_object.readyState == 4 && ajax_object.status == 200){
						document.getElementById(
							"msg").innerHTML = ajax_object.responseText;
                            show_users();
					}
				}
				ajax_object.open("POST","ajax_process.php");
                ajax_object.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				ajax_object.send("action=add_user&full_name="+full_name+"&email="+email+"&phone="+phone);
        }


    function show_users()
    {
        var ajax_object = null;
            if(window.XMLHttpRequest){
					ajax_object = new XMLHttpRequest();
				}
				else{
					ajax_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
				ajax_object.onreadystatechange = function(){
					if(ajax_object.readyState == 4 && ajax_object.status == 200){
						document.getElementById(
							"show_users").innerHTML = ajax_object.responseText;
					}
				}
				ajax_object.open("GET","ajax_process.php?action=show_users");
				ajax_object.send();
    }
    function delete_user(user_id)
    {
        var ajax_object = null;
            if(window.XMLHttpRequest){
					ajax_object = new XMLHttpRequest();
				}
				else{
					ajax_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
				ajax_object.onreadystatechange = function(){
					if(ajax_object.readyState == 4 && ajax_object.status == 200){
						document.getElementById(
							"msg").innerHTML = ajax_object.responseText;
                            show_users();
					}
				}
				ajax_object.open("GET","ajax_process.php?action=delete_user&user_id="+user_id);
				ajax_object.send();
    }
    function reset(){
        var full_name = document.getElementById('full_name').value = "";
            var email = document.getElementById('email').value="";
            var phone = document.getElementById('phone').value=""; 
    }
    function edit_user(user_id){
           
            var ajax_object = null;
            if(window.XMLHttpRequest){
					ajax_object = new XMLHttpRequest();
				}
				else{
					ajax_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
				ajax_object.onreadystatechange = function(){
					if(ajax_object.readyState == 4 && ajax_object.status == 200){
						document.getElementById(
							"add_user_form").innerHTML = ajax_object.responseText;
                            show_users();
					}
				}
				ajax_object.open("get","ajax_process.php?action=edit_user&user_id="+user_id);
               
				ajax_object.send();
        }
        function update_user(user_id)
        { 
            var full_name = document.getElementById('full_name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
            var ajax_object = null;
            if(window.XMLHttpRequest){
					ajax_object = new XMLHttpRequest();
				}
				else{
					ajax_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
				ajax_object.onreadystatechange = function(){
					if(ajax_object.readyState == 4 && ajax_object.status == 200){
						document.getElementById(
							"msg").innerHTML = ajax_object.responseText;
                            show_users();
					}
				}
				ajax_object.open("POST","ajax_process.php");
                ajax_object.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				ajax_object.send("action=update_user&user_id="+user_id+"&full_name="+full_name+"&email="+email+"&phone="+phone);
        }
		function search_user(){
			var search = document.getElementById("search").value;
			var ajax_object = null;
            if(window.XMLHttpRequest){
					ajax_object = new XMLHttpRequest();
				}
				else{
					ajax_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
				ajax_object.onreadystatechange = function(){
					if(ajax_object.readyState == 4 && ajax_object.status == 200){
						document.getElementById(
							"show_users").innerHTML = ajax_object.responseText;
					}
				}
				ajax_object.open("get","ajax_process.php?action=show_users&userSearch="+search);
               
				ajax_object.send();
		}

    </script>   
</body>
</html>