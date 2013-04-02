<style type="text/css">
#demo-header{
    width: 980px;
    margin: 0 auto;
    position: relative;
    float:right
}
#login-link{
    position: absolute;
    top: 0px;
    right: 0px;
    display: block;
    background: #2a2a2a;
    padding: 5px 15px 0px 15px;
    color: #FFF;
    height:15px
}
#login-panel{
    position: absolute;
    top: 26px;
    right: 20px;
    width: 190px;
	padding: 10px 15px 5px 15px;
    background: #2a2a2a;
    font-size: 8pt;
    font-weight: bold;
    color: #FFF;
    display: none;
}
label{
    line-height: 1.8;
}
</style>
<!-- Demo Scripts -->
<script type="text/javascript" src="Jquery/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $("#login-link").click(function(){
        $("#login-panel").slideToggle(200);
    })
})
$(document).keydown(function(e) {
    if (e.keyCode == 27) {
        $("#login-panel").hide(0);
    }
});

</script>
<div id="demo-header">
<?php
if (isset($_SESSION['username'])) {?>
    <b><a id="login-link" href="logout.php" title="Logout"><span style="color: cyan;"><?php echo $_SESSION['username'];?></span> | Logout</a></b>
<?php }else{ ?>
<a id="login-link" href="#login" title="Login"><span style="text-decoration: underline;"><b>Login</b></span></a>
<?php } ?>
<div id="login-panel">
    <form action="validar_user.php" name="frmLogin" method="post"> 
    <p> 
    <label>Username:
    <input name="Username" style="text-transform:none" type="text" value="" /> 
    </label> <br /> 
    <label>Password:
    <input name="Password" style="text-transform:none" type="password" value="" /> 
    </label><br />

    <!--input type="submit" name="submit" value="Login" /-->
	<input type="image"  src="img/img/btn_SignUP.png" style="margin-top:7px" width="95" height="30">
    <br>
    <a href="register_user.php" style="margin-left:60px"><b>Registrarse</b></a>
    </p> 
    </form> 
</div><!-- /login-panel -->
</div><!-- /demoheader -->
