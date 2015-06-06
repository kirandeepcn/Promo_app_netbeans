<?php
include './header.php';
include './check_session.php';
?>
    <link rel="stylesheet" href="css/tabs.css">

  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
$(function() {
    $( "#tabs" ).tabs();
});
var styleSheets = document.styleSheets;
var href = 'css/style.css';
for (var i = 0; i < styleSheets.length; i++) {
    if (styleSheets[i].href == href) {
        styleSheets[i].disabled = true;
        break;
    }
}
</script>
<div class="sec_create">
  <h2 class="sec_head_ques"> Create a Questionnaire</h2>
</div>
<div class="wrapper">
    <div id="tabs">
    <div class="tabs_outer">
      <ul class="tabs_ul">
        <li class="tabs_li"><a href="#tabs-1">Draft</a></li>
        <li class="tabs_li"><a href="#tabs-2">Live</a></li>
      </ul>
      </div>
      <div id="tabs-1">
          <?php
          session_start();
          $accessToken = $_SESSION['access_token'];
            include "./API/include/Connection.class.php";
            include "./API/include/Quest.class.php";
            include "./API/include/User.class.php";
            $userObj = new User();
            $questObj = new Quest();
            $user_id = $userObj->getUserIDFromAccToken($accessToken);
            $ques_list = $questObj->getQuesList("0");
            foreach($ques_list as $ques) 
            {
//                $name_arr = explode(" ", $ques['ques_name']);
//                foreach ($name_arr as $name) {
//                    $temp_arr[] = "<p>".$name."</p>";
//                }
//                $name_final = join(" ", $temp_arr);
                $name_final = "<p>".$ques['ques_name']."</p>";
          ?>      
          <div class="inn_div2 marg1"> <img src="images/home_y.jpg" alt="img">
            <?php echo $name_final; ?>
              <a href="client_login.php?ques_id=<?php echo $ques['ques_id']; ?>" ><button class="butt_view1"> Edit </button></a>
            <button class="butt_view1"> Run </button>
            <button class="butt_view1 nn"> Preview </button>
            <br>
            <br>
            <label class="lab_mm">Last Modified: <?php echo $ques['updated_datetime'] ?></label>
            <div class="del_img"><a href="#"><img src="images/delete.jpg"></a></div>
          </div>
            <?php 
            }
            ?>
         <!-- <div class="inn_div2 marg1"> <img src="images/home_y.jpg" alt="img">
            <p> Questionnaires </p>
            <p> Name </p>
            <button class="butt_view1"> Edit </button>
            <button class="butt_view1"> Run </button>
            <button class="butt_view1 nn"> Preview </button>
            <br>
            <br>
            <label class="lab_mm">last Modified: 15-05-2015</label>
            <div  class="del_img"><a href="#"><img src="images/delete.jpg"></a></div>
          </div>
          <div class="inn_div2 marg1"> <img src="images/home_y.jpg" alt="img">
            <p> Questionnaires </p>
            <p> Name </p>
            <button class="butt_view1"> Edit </button>
            <button class="butt_view1"> Run </button>
            <button class="butt_view1 nn"> Preview </button>
            <br>
            <br>
            <label class="lab_mm">last Modified: 15-05-2015</label>
            <div  class="del_img"> <a href="#"><img src="images/delete.jpg"></a></div>
          </div>-->
          <div class="clear"> </div>
        </div>
      <div id="tabs-2">
        <div class="inn_div_img">
          <div class="inn_div2 marg1"> <img src="images/home_g.jpg" alt="img">
            <p> Questionnaire</p>
            <p> Name</p>
            <button class="butt_view1"> Edit </button>
            <button class="butt_view1"> End </button>
            <button class="butt_view1 nn"> Preview </button>
            <br>
            <br>
            <label class="lab_mm">last Modified: 15-05-2015</label>
            <div class="del_img"><a href="#"><img src="images/delete.jpg"></a></div>
          </div>
          <div class="inn_div2 marg1"> <img src="images/home_g.jpg" alt="img">
            <p> Questionnaires </p>
            <p> Name </p>
            <button class="butt_view1"> Edit </button>
            <button class="butt_view1"> End </button>
            <button class="butt_view1 nn"> Preview </button>
            <br>
            <br>
            <label class="lab_mm">last Modified: 15-05-2015</label>
            <div  class="del_img"><a href="#"><img src="images/delete.jpg"></a></div>
          </div>
          <div class="inn_div2 marg1"> <img src="images/home_g.jpg" alt="img">
            <p> Questionnaires </p>
            <p> Name </p>
            <button class="butt_view1"> Edit </button>
            <button class="butt_view1"> End </button>
            <button class="butt_view1 nn"> Preview </button>
            <br>
            <br>
            <label class="lab_mm">last Modified: 15-05-2015</label>
            <div  class="del_img"> <a href="#"><img src="images/delete.jpg"></a></div>
          </div>
          <div class="clear"> </div>
        </div>
      </div>
    </div>
 </div><!--wrapper closed-->
<script>
function myFunction() {
    window.open("http://localhost/promoapps/create_new_questinnare.php");
}
</script> 
<script>
$('#selectUl li:not(":first")').addClass('unselected');
$('#selectUl').hover(
    function(){
        $(this).find('.form_li').click(
            function(){
                $('.unselected').removeClass('unselected');
                $(this).siblings('.form_li').addClass('unselected');
                var index = $(this).index();
                $('select option:selected').removeAttr('selected');
                $('select[name=size]')
                    .find('option:eq(' + index + ')')
                    .attr('selected',true);
                <!--alert($('select[name]').val());-->
            });
    },
    function(){
    });
	</script>
</body>
</html>