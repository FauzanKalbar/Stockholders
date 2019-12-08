<?php if(!isset($_SESSION["is_login"])){
require_once 'config.exe';
$DB = new gavsClass();
if(isset($_POST["submit"])){
	$username = $DB->secure($_POST["username"]);
	$password = md5($DB->secure($_POST["password"]));
	
	$qry = $DB->mysql->prepare("Select userlevel, username, password From tbl_users Where username=? and record_status!='Deleted'");
	$qry->bind_param("s", $username);
	$qry->execute();
	$qry->store_result();
	
	if($qry->num_rows > 0){
		$qry->bind_result($userlevel, $dbusername, $dbpassword);
		$row = $qry->fetch();
		if($username==$dbusername&&$password==$dbpassword){
			$_SESSION["is_login"]=true;
			$_SESSION["userlevel"]=$userlevel;
			$_SESSION["user"] = $dbusername;
			header("location:index.php");
		}else{
		?>
        
        <script language="javascript">
				alert("Either username or password is incorrect!");
            </script>
        <?php
		}
	}else{
		?>
        <script language="javascript">
				alert("Either username or password is incorrect!");
            </script>
        <?php
	}
	
}

?>




<table id="login_form" style="margin-top:5px;">
    <form action="#" method="post">
<tr><td><div class="placeHolder"><input type="text" class="input" watermark="Username" size="20" name="username" id="username" /></div></td>
    <td><div class="placeHolder"><input type="password" class="input" watermark="Password" size="20" name="password" /></div></td>
    <td colspan="2" align="right"><input type="submit" name="submit" class="blue_button" id="login_btn" value="Log In"/></td>
</tr>
    </form>
</table>

<?php }else{

	
	
} ?>