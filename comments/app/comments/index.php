<?php require_once("inc/config.php"); 

include("inc/header.php"); 
$yorumcontent_id=$C_id;
include("request/commentsfunc.php"); 
?>

 <!-- add comment -->
 <div class="add-comment">
<?php
	 if($CUSER==""){ ?>
	<div class="logincon pull-right " <?php if (!isset($_SESSION['oturumid'])){ echo 'style="display:none"'; }?>>
		<a href="javascript:void(0);"><i class="fa fa-sign-in"></i><span class="name"><?php if (isset($_SESSION['oturumid'])){ echo $_SESSION['user_id']; }?></span> <span class="fa fa-angle-down"></span></a>
		<ul class="dropdown-menu">
		 <li><a href="javascript:void(0);" onclick="Settings()"><i class="fa fa-cog"></i><?php echo $lang["C_1"]; ?></a></li>
         <li><a href="javascript:void(0);" onclick="ChangeAvatar()"><i class="fa fa-file-image-o"></i><?php echo $lang["C_1A"]; ?></a></li>
         <li><a href="javascript:void(0);" onclick="logoutFunc()"><i class="fa fa-sign-out"></i><?php echo $lang["C_2A"]; ?></a></li>
	
       </ul>
	</div>

	<div class="logincon nolog pull-right" <?php if (isset($_SESSION['oturumid'])){ echo 'style="display:none"'; }?>>
		<a href="javascript:void(0);"><i class="fa fa-sign-in"></i><span class="name"><?php echo $lang["C_3A"]; ?></span> <span class="fa fa-angle-down"></span></a>
		<ul class="dropdown-menu">
			<li><a href="javascript:void(0);" onclick="authLogin()"><i class="fa fa-sign-in"></i><?php echo $lang["C_4A"]; ?></a></li>
			<li><a href="javascript:void(0);" onclick="authFacebook()"><i class="fa fa-facebook"></i><?php echo $lang["C_5A"]; ?></a></li>
	
			<li><a href="javascript:void(0);" onclick="authRegister()"><i class="fa fa-user-plus""></i><?php echo $lang["C_8A"]; ?></a></li>
       </ul>
	</div>
<?php } ?>
 <h3><?php echo $titlene; ?></h3>
 <form action="" id="addcomment" onsubmit="return false;">
 <div class="loader-ajax"></div>
 <div class="formm">
<?php 
$iconne="";$user_idne="Guest";
 if (isset($_SESSION['oturumid'])){ 
 $iconne=$_SESSION['icon'];
 $user_idne=$_SESSION['user_id'];
 } 
 ?>
 <img src="<?php if($CUSER==""){ echo resimcreate($iconne,"s", "member/avatar"); }else{ echo $CUSER_ICON; } ?>" alt="" class="usericont"/>
 <div class="add-comment-form"><div>
 <textarea name="comment_text" id="" cols="30" rows="10" placeholder="<?php if($CUSER=="OFF"){ echo $lang["COMMENT_LINK_2A"]. $lang["COMMENT_LINK_2B"]. $lang["COMMENT_LINK_2C"]; }else{ echo $lang["COMMENT_LINK_3A"];  } ?>" onclick="exyorum_text(this)"></textarea>
 <div class="alt">
 <button type="submit" onclick="<?php if($CUSER=="OFF"){ ?>alert('<?php echo $lang["GENERAL_EXTRA_1"] ?>')<?php }else{ echo 'addcomment()';  } ?>"  <?php if ($CUSER=="ON"){ echo 'style="  width: 160px;"'; } ?>>
 <?php 
 if ($CUSER=="ON"){
 echo $lang["COMMENT_LINK_3C"].' as <b>'.$CUSER_NAME.' </b>';
 }elseif (isset($_SESSION['oturumid'])){ 
 echo $lang["COMMENT_LINK_3C"].' as <b>'.$user_idne.' </b>';
 }else{
	echo $lang["COMMENT_LINK_3C"]; 
 } 
 ?>
</button>
 
 
  <?php 
	if ($CUSER=="" and !isset($_SESSION['oturumid'])){
 ?>
<div class="loginbox">
	<div class="typerq">
		<a href="javascript:void(0);" id="chooseiType"><i class="fa fa-sign-in"></i><span class="name"><?php echo $lang["CB_1"]; ?></span> <span class="fa fa-angle-down"></span></a>
		<ul class="dropdown-menu">
           <li><a href="javascript:void(0);" onclick="chooseType('Login',0, this);" class="selected"><i class="fa fa-sign-in"></i><?php echo $lang["CB_1"]; ?> <i class="fa fa-selected fa-check"></i></a></li>
			<li><a href="javascript:void(0);" onclick="chooseType('Register',0, this);"><i class="fa fa-user-plus"></i><?php echo $lang["CB_2"]; ?> <i class="fa fa-selected fa-check"></i></a></li>
			<?php if($db_guestcomment=="open"){ ?><li><a href="javascript:void(0);" onclick="chooseType('Register',1, this);"><i class="fa fa-user-secret"></i><?php echo $lang["CB_3"]; ?> <i class="fa fa-selected fa-check"></i></a></li><?php }?>
       </ul>
	</div>
	<div class="callingsing Login-sign open">
		<a href="javascript:void(0);" onclick="authLogin()" title="<?php echo $lang["C_4A"]; ?>" class="social-button">
			<span class="fa-stack easycomment fa-lg">
				  <i class="fa fa-square fa-stack-2x"></i>
				  <i class="fa fa-comments fa-stack-1x"></i>
			</span>
		</a>	
		<a href="javascript:void(0);" onclick="authFacebook()" title="<?php echo $lang["C_5A"]; ?>" class="social-button">
			<span class="fa-stack facebook fa-lg">
				  <i class="fa fa-square fa-stack-2x"></i>
				  <i class="fa fa-facebook fa-stack-1x"></i>
			</span>
		</a>
	
		<div class="clear"></div>
	</div>
	<div class="callingsing Register-sign">
		<span class="boxinput"><input name="user_username" placeholder="<?php echo $lang["CB_4"]; ?>" ></span>
		<span class="boxinput"><input name="user_email"  placeholder="<?php echo $lang["CB_5"]; ?>" ></span>
		<span class="boxinput"><input name="user_password"  placeholder="<?php echo $lang["CB_6"]; ?>" ></span>
	</div> 

</div>

 <?php } ?>
 
</div>
 </div>

 </div>

 </div>
 </form>
 </div>
 <!-- comments -->
 <div id="comments">

 <?php 
 $digeryazi="";
 $populeryorum=commentget($yorumcontent_id,"",1,"populer");
 if($populeryorum>""){
	 echo '<h3 class="title"><span class="popular">'.$lang["COMMENT_LINK_5A"].'</span></h3>
			<div class="popular-comments" style="position: relative">'.$populeryorum.'</div>';
	$digeryazi=$lang["COMMENT_LINK_5B"].' ';
 }
 ?>
<?php  $satir_sayisi  = $dbpdo->query("SELECT count(*) from comments where content_id = '".$yorumcontent_id."' and approve = '1'  and domainaccess = '$domainaccess'")->fetchColumn(); ?>
 <h3 class="title"><span class="allcomments"><?php echo $digeryazi.$satir_sayisi; ?> <?php echo $lang["COMMENT_LINK_5C"]; ?></span>
 	<div class="short pull-right">
		<a href="javascript:void(0);"  data-desc="best"><i class="fa fa-star"></i> <?php echo $lang["CB_7"]; ?></a>
		<a href="javascript:void(0);" data-desc="old"><i class="fa fa-sort-numeric-asc"></i> <?php echo $lang["CB_8"]; ?></a>
		<a href="javascript:void(0);" class="active" data-desc="new"><i class="fa fa-sort-numeric-desc"></i> <?php echo $lang["CB_9"]; ?></a>
	</div>
 </h3>
 <div class="comments" style="position: relative"><div class="form-loader"></div>
 <?php
 $tumyorum=commentget($yorumcontent_id,"new",1,"tumu");
 if($tumyorum>""){
	 echo $tumyorum;
 }else{
	 echo '<div class="no-comment">'.$lang["COMMENT_LINK_6A"].''.$lang["COMMENT_LINK_6B"].'<u>'.$lang["COMMENT_LINK_6C"].'</u>'.$lang["COMMENT_LINK_6D"].'</div>';
 }

 ?>
 </div>
 </div>
 <?php if ($db_footerlinks=="open" and $FooterLinks !== "Off"){ ?>
<div class="commentsfooter">
	<div class="footer-links">
<div class="text-smaller text-gray">
<?php echo $db_sitemotto; ?> <?php echo $lang["F_1"]; ?>
<br>

<a href="javascript:void(0);" onclick="showPages('about')"><?php echo $lang["F_2"]; ?></a>
<span class="bullet"></span>
<a href="javascript:void(0);" onclick="showPages('help')"><?php echo $lang["F_3"]; ?></a>
<span class="bullet"></span>
<a href="javascript:void(0);" onclick="showPages('terms')"><?php echo $lang["F_4"]; ?></a>
<span class="bullet"></span>
<a href="javascript:void(0);" onclick="showPages('privacy')"><?php echo $lang["F_5"]; ?></a>
</div>
	</div>
<div class="footer-logo"><a href="javascript:void(0);" onclick="showPages('about')"><img alt="<?php echo $db_sitemotto; ?>" src="<?php echo $db_siteadres ?>app/assets/logo.png"></a></div>
</div>
<?php  }

include("inc/footer.php"); 
?>