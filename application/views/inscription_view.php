
<script src="../../assets/jquery/jquery.min.js"></script>
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
    .line{
        display:inline-flex;
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
    echo'<div class="line">';
    echo '<div >' . form_label('Nom', 'to') . '</div>';
    echo form_input(array('name' => 'nom', 'placeholder' => 'nom'), '');
    echo'</div>';

    echo'<div class="line">';
    echo form_label('prenom') . '</span>';
    echo form_input('from', '');
    echo'</div>';

    echo'<div class="line">';
    echo form_label('mail');
    $data['mail'] = array('class' => "email", 'id' => 'addr', 'name' => 'addr_mail');
    echo form_input($data['mail']);
    echo'</div>';

    echo'<div class="line">';
    $data['pwd_1'] = array('type' => 'password', 'class' => "password", 'id' => 'pwd_1', 'name' => 'password1');
    echo form_label('password');
    echo form_input($data['pwd_1']);
    echo'</div>';

    echo'<div class="line">';
    $data['pwd_2'] = array('type' => 'password', 'class' => "password", 'id' => 'pwd_2', 'name' => 'password2');
    echo form_label('password 2');
    echo form_input($data['pwd_2']);
    echo'</div>';

    echo'<div class="line">';
    echo form_label('capchat');
    echo form_input();
    echo'</div>';

    echo form_submit('inscription', 'inscription');
    form_close();

    // put your code here
    ?>

</main>
<script type="text/javascript">
//        $('document').ready(function(){
    $(".email").on('change', function () {
        var val = $(this).val();
        $.ajax({
            type: 'POST',
            url: "verification_mail",
            data: {mail: val},
            dataType: "json",
            asynch: true,
            success: function (data) {
                var color = data;

                $(".email").css('background-color', color);
                console.log(color);
                $(".email").on('change', function (color) {
                    $(".email").css('background-color', color);
                });
            },
            error: function (data) {

            },
        });

    });
    $("#pwd_2").on('keyup', function () {
        var pdw_2 = $("#pwd_2").val();
        var pwd_1 = $("#pwd_1").val();
        if (pdw_2 === pwd_1) {
            $('.password').css('background-color', 'green', );
        } else {
            $('.password').css('background-color', 'red');
        }
        console.log(pwd_1);
    });
//        });



</script>
