 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/applogo.css">


</head>
<body>
<header>
<div class="wrapper">
<div class="logo">
<img src="images/logo.jpg" alt="logo">
</div>
</div>
<div class="sec"> 
  <h1> Create New Questionnaire </h1>
</div>
</header>
<div class="wrapper">
       <div class="center">
   <div class="top_data">
      <div class="left_data">
         <label>Questionnaire Name</label>
		 <div class="qsn_name">
		<input type="text" class="input">
	      </div>
	    <label>Client Login</label>
		
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
		   <h2>11/7/15, 7:00am-8:00am <img src="images/minus.jpg"/></h2>
		   <span> <img src="images/add.jpg"/> add time</span>
		 </div>
		 <div class="export">
		   <span>Allow client to export?</span>
		     <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
		 </div>
		 <div class="import">
		 <span>Allow client to import?</span>
		     <div class="onoffswitch">
    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
		 </div>
     </div>	 
   </div>
   <div class="clear"></div>
    
   <div class="button" style="margin-top: 100px;">
<button type="button" class="btn">Save & Next</button>
<button type="button" class="btn">Save & Exit</button>
<button type="button" class="btn_cancel">Cancel</button>
</div>
</div>
</div>

</body>
</html>