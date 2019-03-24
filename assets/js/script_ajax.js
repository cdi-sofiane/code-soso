/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
        $(".password").css("background-color", "green" );
    } else {
        $('.password').css('background-color', 'red');
    }
    console.log(pwd_1);
});
      $(document).ready(function () {
            $.ajax({
                type: 'POST',
                url: "load_projet",
                asynch: true,
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {

                },
            });
            $('.projet').on('click', function () {
                var id_repertoir = $(this).attr('id');

                $.ajax({
                    type: 'POST',
                    url: 'check_ressources',
                    dataType: "json",
                    data: {id_repertoir: id_repertoir},
                    asynch: true,
                    success: function (data) {
                        window.location.href = data.redirect;
                        console.log(data);
                    },
                    error: function (data) {

                    },
                })
            });
        });


        $("#projet").on('click', function () {
            var display_val = $(".new_projet").css('display');
            console.log(display_val);
            if (display_val === 'block') {
                $(".new_projet").css('display', 'none');
            } else {
                $(".new_projet").css('display', 'block');
            }

        });
        $("#ressource").on('click', function () {
            var display_val = $(".new_ressources").css('display');
            console.log(display_val);
            if (display_val === 'block') {
                $(".new_ressources").css('display', 'none');
            } else {
                $(".new_ressources").css('display', 'block');
            }

        });

//        $('#ajax_ressources').on('click',function(){
//            var id = $("[name='user_id']").attr('id');
//            var createur = $("[name='user_name']").attr('id');
//            var file=$("[name='file']").attr('value');
//            
//            
//        });


        $('#ajax_projet').on('click', function () {
            var id = $("[name='user_id']").attr('id');
            var createur = $("[name='user_name']").attr('id');
            var nom_projet = $("[name='titre']").val();
            if (nom_projet === "") {
                fail();

            } else {
                $.ajax({
                    type: 'POST',
                    url: "new_projet",
                    data: {user_id: id, createur: createur, nom_projet: nom_projet},
                    dataType: "json",
                    asynch: true,
                    success: function (data) {
                        console.log(data);
                        $(".bloc_folder").empty();
                        $.each(data, function (i, item) {


                            if (item.utilisateur_id === <?= $id_user; ?>) {

                                var repertoire = ' <div data-id="' + item.utilisateur_id + '" class="projet" id="' + item.id + '">\n\
                                    <div><i class="material-icons" style="font-size:100px;color:#84B85F">folder_open</i></div>\n\
                                    </div>';
                                $(".bloc_folder").append(repertoire);
                            } else {

                                var repertoire = ' <div data-id="' + item.utilisateur_id + '" class="projet" id="' + item.id + '">\n\
                                    <div><i class="material-icons" style="font-size:100px;color:red">folder_open</i></div>\n\
                                    </div>';
                                $(".bloc_folder").append(repertoire);
                            }
                        });


                    },
                    error: function (data) {

                    },
                });
            }

        });

        function fail() {
            alert('Il faut donner une titre au projet');

        }