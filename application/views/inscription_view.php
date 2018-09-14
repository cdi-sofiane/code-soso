
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<style>
    .sidenav {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: auto;
        padding-top: 20px;
    }
    .main {
        position:initial;
        border:300px;
        margin: 10% ; /* Same as the width of the sidenav */
        font-size: 28px; /* Increased text to enable scrolling */
        padding: 0px 10px;
    }
    input {

        display: block;
    }
    .return{
        top:100px;
        position:relative;
        font-family: cursive;
        font-style: normal;
        color: #ffffff;
        border-bottom: #f0f0f0;
        border-bottom-style: solid;
        border-top-style: solid;
    }
    a {
        padding-left: 30px;
        color: #ffffff;
        text-decoration: inherit;
    }
</style>

<div class="sidenav">
    <div class="return" ><a href="../connexion">retour page login</a></div>>
    <?php
    // put your code here
    ?>
</div >
<main class="main">
    <?php
    echo form_open('inscription/create_new');
    echo form_label('Nom', 'to');
    echo form_input(array('name' => 'nom', 'placeholder' => 'nom'), '');
    echo form_label('prenom');
    echo form_input('from', '');
    echo form_label('mail');
    $data['mail'] = array('type' => 'mail', 'class' => "email", 'id' => 'addr', 'name' => 'addr_mail');
    echo form_input($data['mail']);
    $data['pwd_1'] = array('type' => 'password', 'class' => "password", 'id' => 'pwd_1', 'name' => 'password1');
    echo form_label('password');
    $data['pwd_2'] = array('type' => 'password', 'class' => "password", 'id' => 'pwd_2', 'name' => 'password2');
    echo form_input($data['pwd_1']);
    echo form_label('password 2');
    echo form_input($data['pwd_2']);
    echo form_label('capchat');
    echo form_input();
    echo form_submit('inscription', 'inscription');
    form_close();

    // put your code here
    ?>

</main>
<script type="text/javascript">
//        $('document').ready(function(){
    $(".email").on('change', function () {
        var email = $(this).val();
//        alert(email);
        $.ajax({
            url: '/Inscription/ajaxval',
            type: "POST", // Send post data
            dataType: "text",
            data: {mail: email},
            async: true,
            success: function (ind) {
//                    console.log(ind.message);
                console.log(ind);
//                json_events = data;
            },
            error: function (ind) {
                console.log(ind);
            },
        });
    });
    $("#pwd_2").on('keyup', function () {
        var pdw_2 = $("#pwd_2").val();
        var pwd_1 = $("#pwd_1").val();
        if (pdw_2 === pwd_1) {
            $('.password').css('border-color', 'green', 'border-style', 'solid');
        } else {
            $('.password').css('border-color', 'red');
        }
        console.log(pwd_1);
    });
//        });



</script>
