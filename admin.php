<?php 
include_once 'header.php'; 
include_once 'check_session.php';
?>
    <div class="clear"></div>
    <div class="outer_div">
      <div class="inn_div_img">
        <div class="inn_div1 marg1"> <img src="images/img1.jpg" alt="img">
          <p> Create New</p>
          <p> Questionnaire</p>
          <a href="client_login.php"><button class="butt_view"> Start New </button></a>
        </div>
        <div class="inn_div1 marg1"> <img src="images/img2.jpg" alt="img">
          <p> Save </p>
          <p>Questionnaires</p>
          <button class="butt_view"> View </button>
        </div>
        <div class="inn_div1 marg1"> <img src="images/img2.jpg" alt="img">
          <p> Ended </p>
          <p>Questionnaires</p>
          <button class="butt_view"> View </button>
        </div>
        <div class="clear"> </div>
      </div>
    </div>

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
