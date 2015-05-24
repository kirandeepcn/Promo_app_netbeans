 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/applogo.css">
<script>
function myFunction() {
    window.open("http://codenomad.net/promo_app/welcome-page.php");
}
</script>

</head>
<body>
<header>
  <div class="wrapper">
    <div class="outer_header">
      <div class="logo head"> <img src="images/logo.jpg" alt="logo"> </div>
      <div class="ryt_admin">
        <div class="inner_admin">
          <div class="droper">
            <div class="dropper_inner">
              <div class="user_name"> Admin <img src="images/arrow.jpg" alt="arrow" id="show"> </div>
              <div class="htab_o">
                <div class="htab hr_l"> Change Password </div>
                <div class="htab"> Logout </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	</div>
	</header>
<div class="sec_create">
    <h2 class="sec_head_ques"> Create a Questionnaire</h2>
  </div>

</header>
<div class="wrapper">
       <div class="center">
   <div class="top_data">
      <div class="left_data">
         <span>Questionnaire Name</span>
		 <div class="qsn_name">
		<input type="text" class="input">
	      </div>
	    <span>Client Login</span>
		
		     <div class="name">
       		<input type="text" class="input" placeholder="Username">
			</div>
			<div class="pass">
			<input type="text" class="input" placeholder="Password">
			</div>
	  </div>

     <div class="right_data">
         <div class="run_time">
		   <span>Questionnaire Run Time</span>
		   <h2>11/7/15, 7:00am-8:00am
           <button class="bb_img"> <img src="images/minus.jpg"/></button></h2>
		    <button class="bb_img"><img src="images/add.jpg"/></button>
            <span> add time</span>
		 </div>
		 <div class="export">
		   <span>Allow client to export?</span>
		     <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab4" checked>
    <label class="onoffswitch-label" for="tab4">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
		 </div>
		 <div class="import">
		 <span>Allow client to import?</span>
		     <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="tab5" checked>
    <label class="onoffswitch-label" for="tab5">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
		 </div>
     </div>	 
   </div>
   <div class="clear"></div>
   <div class="lastouter_sec">
        <button class="butt_view bb_sec6"> Save&Next </button>
        <button class="butt_view bb_sec6"> Save&Exit </button>
        <button class="butt_view bb_sec6 bb_bg"> Cancel </button>
      </div>
</div>
</div>

</body>
</html>