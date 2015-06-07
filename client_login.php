<?phpinclude_once 'header.php';include_once 'check_session.php';?><script>    function save(check) {        var ques = $('#ques').val();        var ques_id = $('#ques_id').val();        var clientname = $('#clientname').val();        var password = $('#password').val();        var allowexport = $("input[name=allowexport]").is(":checked");        var allowimport = $("input[name=allowimport]").is(":checked");        var is_update = $('#is_update').val();        var startdateObj = new Array();        var enddateObj = new Array();        $("input[class=startdatearr]").each(function() {            var startdatearr = $(this).val()            startdateObj.push(startdatearr);        });        $("input[class=enddatearr]").each(function() {            var enddatearr = $(this).val()            enddateObj.push(enddatearr);        });        var returnedData = "";        if (ques == "" || clientname == "" || password == "") {            $("#err_msg").html("Some fields are missing");            return;        }        if (allowexport) {            allowexport_val = "";        } else {            allowexport_val = "on";        }        if (allowimport) {            allowimport_val = "";        } else {            allowimport_val = "on";        }        if (is_update == "yes") {            $.ajax({                method: "POST",                url: "API/index.php",                data: {type: "update_quest", ques_id: ques_id, ques: ques, clientname: clientname, password: password, allowexport: allowexport_val, allowimport: allowimport_val, startdate: startdateObj, enddate: enddateObj}            }).done(function(data) {                //alert(data);                returnedData = JSON.parse(data);                if (returnedData.code == "0") {                    if (check == "san") {                        location.href = "welcome-page.php?ques_id=" + returnedData.ques_id;                    } else {                        location.href = "admin.php";                    }                } else {                    $("#err_msg").html(returnedData.log);                }            });        } else {            $.ajax({                method: "POST",                url: "API/index.php",                data: {type: "create_quest", ques: ques, clientname: clientname, password: password, allowexport: allowexport_val, allowimport: allowimport_val, startdate: startdateObj, enddate: enddateObj}            }).done(function(data) {                returnedData = JSON.parse(data);                if (returnedData.code == "0") {                    if (check == "san") {                        location.href = "welcome-page.php?ques_id=" + returnedData.ques_id;                    } else {                        location.href = "admin.php";                    }                } else {                    $("#err_msg").html(returnedData.log);                }            });        }        return returnedData;    }    $(document).ready(function() {        $('#saveandnext').click(function(event) {            event.preventDefault();            save("san");        });        $('#saveandexit').click(function(event) {            event.preventDefault();            save("sae");        });        $('#cancel').click(function(event) {            event.preventDefault();            location.href = "admin.php";        });        $('#startdatetimepicker').datetimepicker();        $('#enddatetimepicker').datetimepicker();        $(document).on("click", ".removedate", function(e) {            $(this).closest("div#datetime").remove();            e.preventDefault();        });        $("#addtime").on("click", function(e) {            var startdate = $('#startdatetimepicker').val();            var enddate = $('#enddatetimepicker').val();            var timehtml = '<div id="datetime">' + startdate + ' to ' + enddate +                    ' <button class="bb_img removedate"> <img src="images/minus.png"/></button>' +                    '<input type="hidden" class="startdatearr" value="' + startdate + '" />' +                    '<input type="hidden" class="enddatearr" value="' + enddate + '" />' +                    '</div>';            $("#ques_time").append(timehtml);            e.preventDefault();        });    });</script><?php$is_export = "checked";$is_preview = "checked";$ques_date_arr = array();$ques_name = "";$client_name = "";$is_update = "no";if (isset($_GET['ques_id'])) {    include "./API/include/Connection.class.php";    include "./API/include/Quest.class.php";    $questObj = new Quest();    $ques_id = $_GET['ques_id'];    $bool = $questObj->isValidQuesID($ques_id);    $ques_name = "";    $client_name_arr = array();    if (!$bool) {        $ques_name_arr = $questObj->getQuesNameFromID($ques_id);        $ques_name = $ques_name_arr['ques_name'];        $client_id = $ques_name_arr['user_id'];        $ques_date_arr = $questObj->getQuesDateFromID($ques_id);        $client_name_arr = $questObj->getQuesClientFromID($client_id);        $client_name = $client_name_arr['username'];        $ques_setting_arr = $questObj->getQuesSettingFromID($ques_id);        $is_export = ($ques_setting_arr['is_export']) ? "" : "checked";        $is_preview = ($ques_setting_arr['is_preview']) ? "" : "checked";        $is_update = "yes";    }}?><div class="sec_create">    <h2 class="sec_head_ques"> Create a Questionnaire</h2></div><div class="wrapper">    <form action="#" method="post">        <input type="hidden" name="is_update" id="is_update" value="<?php echo $is_update; ?>" />        <input type="hidden" name="ques_id" id="ques_id" value="<?php echo $ques_id; ?>" />        <div class="center" style="width: 85%;">            <div id="err_msg"></div>            <div class="top_data">                <div class="left_data">                    <span>Questionnaire Name</span>                    <div class="qsn_name">                        <input type="text" id="ques" name="ques" class="input_ques" value="<?php echo $ques_name; ?>" placeholder="Questionnaire Name">                    </div>                    <span>Client Login</span>                    <div class="name">                        <input type="text" id="clientname" name="clientname" value="<?php echo $client_name; ?>" class="input_ques" placeholder="Username">                    </div>                    <div class="pass">                        <input type="text" id="password" name="password" class="input_ques" placeholder="Password">                    </div>                </div>                <div class="right_data" style="width: 45%">                    <div class="run_time">                        <span>Questionnaire Run Time</span>                        <h3 id="ques_time">                            <?php                            $datetime = array();                            foreach ($ques_date_arr as $ques_date) {                                $datetime[] = '<div id="datetime">' . $ques_date['start_date'] . ' to ' . $ques_date['end_date'] .                                        ' <button class="bb_img removedate"> <img src="images/minus.png"/></button>' .                                        '<input type="hidden" class="startdatearr" value="' . $ques_date['start_date'] . '" />' .                                        '<input type="hidden" class="enddatearr" value="' . $ques_date['end_date'] . '" />' .                                        '</div>';                            }                            echo join(" ", $datetime);                            ?>                        </h3>                        <div class="name"><input type="text" id="startdatetimepicker" placeholder="Start Date" class="input_ques" autocomplete="off"/></div>                        <div class="pass"><input type="text" id="enddatetimepicker" placeholder="End Date" class="input_ques" autocomplete="off"/></div>                        <button id="addtime" class="bb_img"><img src="images/add.jpg"/></button>                        <span> add time</span>                    </div>                    <div class="export">                        <span>Allow client to export?</span>                        <div class="onoffswitch">                            <input type="checkbox" name="allowexport" class="onoffswitch-checkbox" id="tab4" <?php echo $is_export ?>>                            <label class="onoffswitch-label" for="tab4">                                <span class="onoffswitch-inner"></span>                                <span class="onoffswitch-switch"></span>                            </label>                        </div>                    </div>                    <div class="import">                        <span>Allow client to preview?</span>                        <div class="onoffswitch">                            <input type="checkbox" name="allowimport" class="onoffswitch-checkbox" id="tab5" <?php echo $is_preview ?>>                            <label class="onoffswitch-label" for="tab5">                                <span class="onoffswitch-inner"></span>                                <span class="onoffswitch-switch"></span>                            </label>                        </div>                    </div>                </div>            </div>            <div class="clear"></div>            <div class="lastouter_sec">                <button class="butt_view bb_sec6" id="saveandnext"> Save&Next </button>                <button class="butt_view bb_sec6" id="saveandexit"> Save&Exit </button>                <button class="butt_view bb_sec6 bb_bg" id="cancel"> Cancel </button>            </div>        </div>    </form></div></body></html>