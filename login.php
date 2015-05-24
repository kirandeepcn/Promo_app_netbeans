<?php include_once 'header.php'; ?>
        <section>
            <div class="sec">
                <div class="bb_outer">
                    <h1> Admin Log In</h1>
                    <form action="" method="post" onsubmit="return validate();">
                        <div class="right_search serch" id="usercont">
                            <input type="text" class="text" placeholder="User name" name="username" id="username">
                            <div id="user_error"></div>
                        </div>
                        <div class="right_search" id="passcont">
                            <input type="password" class="text" placeholder="Password" name="password" id="password">
                            <div id="user_pass"></div>
                        </div>
                        <!--button> Log In</button-->
                        <input type="submit" name="submit" value="Log In">
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>
