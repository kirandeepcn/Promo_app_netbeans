<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="post">
        <fieldset>
            <legend>Login</legend>
            <table>
                <tr><td>Username:</td> <td><input type="text" name="username" /></td></tr>
                <tr><td>Password:</td> <td><input type="text" name="password" /></td></tr>           
                <tr><td><input type="hidden" name="type" value="login" /><input type="submit" value="Login" /></td></tr>
            </table>
        </fieldset>
        </form>
        
       
        <form action="index.php" method="post">
        <fieldset>
            <legend>Create Account</legend>
            <table>
                <tr><td>Username:</td> <td><input type="text" name="username" /></td></tr>
                <tr><td>Password:</td> <td><input type="text" name="password" /></td></tr>              
                <tr><td><input type="hidden" name="type" value="create_account" /><input type="submit" value="Create" /></td></tr>
            </table>
        </fieldset>        
        </form>
        
        
        <form action="index.php" method="post">
        <fieldset>
            <legend>Create Questionnaire</legend>
            <table>
                <tr><td>Questionnaire name:</td> <td><input type="text" name="ques" /></td></tr>
                <tr><td>Username:</td> <td><input type="text" name="clientname" /></td></tr>
                <tr><td>Password:</td> <td><input type="text" name="password" /></td></tr>      
                <tr><td>Allow export:</td> <td><input type="checkbox" name="allowexport" value="yes" /></td></tr>      
                <tr><td>Allow import:</td> <td><input type="checkbox" name="allowimport" value="yes" /></td></tr>      
                <tr><td><input type="hidden" name="type" value="create_quest" /><input type="submit" value="Create" /></td></tr>
            </table>
        </fieldset>        
        </form>
        
      <form action="index.php" method="post">
        <fieldset>
            <legend>Get Welcome Page</legend>
            <table>
                <tr><td>Question ID:</td> <td><input type="text" name="ques_id" /></td></tr>                
                <tr><td><input type="hidden" name="type" value="welcome_page" /><input type="submit" value="Get" /></td></tr>
            </table>
        </fieldset>        
      </form>
      
      <form action="index.php" method="post">
        <fieldset>
            <legend>Get Questionnaire</legend>
            <table>
                <tr><td>Question ID:</td> <td><input type="text" name="ques_id" /></td></tr>                
                <tr><td><input type="hidden" name="type" value="questions" /><input type="submit" value="Get" /></td></tr>
            </table>
        </fieldset>        
      </form>
       
    </body>
</html>
