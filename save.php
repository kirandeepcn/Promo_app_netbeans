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

function run(ques_id,status)
{
    $.ajax({
            method: "POST",
            url: "API/index.php",
            data: { ques_id: ques_id, status: status, type:"change_status" }
        }).done(function( data ) {
            location.href = location.href;
          });
}

function delete_ques(ques_id)
{
    if(confirm("Do you really want to delete the questionnaire ?")) {
        $.ajax({
                method: "POST",
                url: "API/index.php",
                data: { ques_id: ques_id, type:"delete_ques" }
            }).done(function( data ) {
                location.href = location.href;
              });
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
                $name_final = "<p>".$ques['ques_name']."</p>";
          ?>      
          <div class="inn_div2 marg1"> <img src="images/home_y.jpg" alt="img">
            <?php echo $name_final; ?>
              <a href="client_login.php?ques_id=<?php echo $ques['ques_id']; ?>" ><button class="butt_view1"> Edit </button></a>
              <button class="butt_view1" onclick="run(<?php echo $ques['ques_id'].",1"; ?>)"> Run </button>
            <button class="butt_view1 nn"> Preview </button>
            <br>
            <br>
            <label class="lab_mm">Last Modified: <?php echo $ques['updated_datetime'] ?></label>
            <div class="del_img" style="cursor: pointer;" onclick="delete_ques(<?php echo $ques['ques_id']; ?>)"><img src="images/delete.jpg"></div>
          </div>
            <?php 
            }
            if(empty($ques_list)) {
                echo '<h1>No questionnaires in Draft !</h1>';
            }
            ?>         
          <div class="clear"> </div>
        </div>
      <div id="tabs-2">
        <div class="inn_dimg">
            <?php 
                $ques_list_live = $questObj->getQuesList("1");
                foreach($ques_list_live as $ques) 
                {
                    $name_final = "<p>".$ques['ques_name']."</p>";
            ?>      
          <div class="inn_div2 marg1"> <img src="images/home_g.jpg" alt="img">
            <?php echo $name_final; ?>
              <a href="client_login.php?ques_id=<?php echo $ques['ques_id']; ?>" ><button class="butt_view1"> Edit </button></a>
            <button class="butt_view1"> End </button>
            <button class="butt_view1 nn"> Preview </button>
            <br>
            <br>
            <label class="lab_mm">Last Modified:  <?php echo $ques['updated_datetime'] ?></label>
            <div class="del_img" style="cursor: pointer;" onclick="delete_ques(<?php echo $ques['ques_id']; ?>)"><img src="images/delete.jpg"></div>
          </div>  
            <?php 
            }
            if(empty($ques_list_live)) {
                echo '<h1>No questionnaires in Live !</h1>';
            }
            ?>  
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