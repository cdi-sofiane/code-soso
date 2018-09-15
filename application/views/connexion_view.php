<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<style>
    .image{
        position: absolute;
        /*width: 200px;*/
        background-image: url("http://localhost:8000/upload/realiz3d.jpg");
        background-repeat: no-repeat;
        width: auto; 
        height: auto; 
        margin: 0;
        padding: 0;

    }
    .login_form input{
        position: relative;
        inline-box-align: inherit;
        margin:10px 0px 10px 0px; 
        padding: 10px;
    }
    .login_form div{

    }
    input:-webkit-autofill{
        background-color: whitesmoke !important;
    }


</style>
<form method="post" accept-charset="utf-8" action="connexion/login">
    <fieldset style="   position: fixed;padding:150px; top: 50%;left: 50%;transform: translate(-50%, -50%);">

        <div class="login_form">

            <div>

                <input name="email" type="email" value=""/>
                <input name="password" type="password" value=""/>
                <input type="submit" value="Login"/>

            </div>

        </div>
    </fieldset>
</form>
<div class="error">', '</div>
</body>
<?php
// put your code here
?>
 
