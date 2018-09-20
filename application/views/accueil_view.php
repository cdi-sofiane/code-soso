<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script src="../../assets/jquery/jquery.min.js"></script>
        <link href="<?php echo base_url("./assets/base.css"); ?>"  rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Tableau de bord</title>
    </head>
    <body>
        <style>
            side{
                background-color: cadetblue;
                display:flex;
                width: 300px;
                height:auto;

                /*flex-wrap: wrap;*/



            }
            main{
                width: 90%;
                background-color: #F0F8FF /*#333333*/;         }
            body{
                display: flex;
                /*overflow-y: scroll;*/ 
                margin: 0;
                padding: 0;
                /* flex-wrap: wrap; */

                /*flex-wrap: wrap;*/

            }
            element_side1{
                display: inline-grid;

            }
            element_side2{
                padding-top: 30px;
            }
            [data-nav-side="nav_bord"]{
                width:  100%;
                color: whitesmoke;
                font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
                font-size: 19px;
                letter-spacing: 1.4px;
                word-spacing: -2px;
                color: #000000;
                font-weight: 700;
                text-decoration: none solid rgb(68, 68, 68);
                font-style: italic;
                font-variant: normal;
                text-transform: none;


            }
            .projet{

            }
            .bloc_folder{
                display: flex;
                flex-wrap: wrap;
                overflow-y: auto;
                height: 300px;

            }

            .material-icons {
                cursor: zoom-in;

            }
            .block_side1{
                padding-top: 300px;
                height: 100vh;
                width: 100%;
            }
            .block_side0{
                height: 100px;
                width: 100%;
            }
            .ressources{
                overflow-y: scroll;
                border-top-style: groove;
            }
        </style>
    <side >
        <div class="side">
            <div class="block_side1">

                <div class="element_side1">

                    <div data-nav-side="nav_bord"  id="projet">Creer projet</div>
                    <div class="new_projet" style="display:none">


                        <?php
                        echo form_input(array('type' => 'hidden', 'name' => 'user_id', 'id' => $is_logged->id));
                        echo form_input(array('type' => 'hidden', 'name' => 'user_name', 'id' => $is_logged->nom));

                        echo form_input(array("placeholder" => 'Nom du Projet', 'name' => 'titre', 'value' => ''));
//                    echo form_input(array('name' => 'fichier', 'value' => '', 'type' => 'file'));
                        echo form_submit(array('id' => 'ajax_projet', 'class' => 'submit_btn', 'value' => 'New projet', 'type' => 'submit'));
                        ?>

                    </div>


                </div>
                <div class="element_side2">

                    <!--<div data-nav-side="nav_bord" >Supprimer projet</div>-->


                </div>
                <div class="element_side3">

                    <div data-nav-side="nav_bord" id="ressource" >Cree ressources</div>
                    <div class="new_ressources" style="display:none">


                        <?php
                        echo form_open_multipart('accueil/upload', 'post');
                        echo form_input(array('type' => 'hidden', 'name' => 'user_id', 'id' => $is_logged->id));
                        echo form_input(array('type' => 'hidden', 'name' => 'user_name', 'id' => $is_logged->nom));

//                        echo form_input(array("placeholder" => 'Nom de la Ressource', 'name' => 'titre', 'value' => ''));
                        echo form_input(array('name' => 'file_name', 'value' => '', 'type' => 'file'));
                        echo form_submit(array('id' => 'ajax_ressources', 'class' => 'submit_btn', 'value' => 'New ressources', 'type' => 'submit'));
                        echo form_close();
                        ?>

                    </div>

                </div>
            </div>
        </div>
    </side>
    <main>
        <div class="bloc_gestion">
            <div class="bloc_folder">

                <?php
                $id_user = json_encode($is_logged->id);

                foreach ($projet as $value) {
                    if ($value->utilisateur_id != $is_logged->id) {
                        echo' <div data-id="' . $value->utilisateur_id . '" class="projet" id="' . $value->id . '">';
                        echo'<div><i class="material-icons" style="font-size:100px;color:red">folder_open</i></div>';
                        echo $value->nom;
                        echo '</div>';
                    } else {
                        echo' <div data-id="' . $value->utilisateur_id . '" class="projet" id="' . $value->id . '">';
                        echo'<div><i class="material-icons" style="font-size:100px;color:#84B85F">folder_open</i></div>';
                        echo $value->nom;
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="ressources" style="overflow-y: scroll;"id="">



                <?php
//                echo '<pre>'.  var_dump($file).'</pre>';
                echo '<table>';
                echo '<th>';
                foreach ($file as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value->nom . '</td>';
                    echo '<td>' . $value->url . '</td>';
                    echo '<td>' . $value->taille . '</td>';
                    echo '<td>' . $value->format . '</td>';
                    echo '<td>' . $value->ext . '</td>';
                    echo '<td>' . $value->projet_id . '</td>';
                    echo '<td>' . form_checkbox() . '</td>';
                    echo '</tr>';
                }
                echo '</th></table>';
                ?>

            </div>
        </div>
    </main>


    <script type="text/javascript">
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
    </script>
</body>
</html>
