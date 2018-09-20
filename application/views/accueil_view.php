<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script src="../../assets/jquery/jquery.min.js"></script>
        <link href="<?php echo base_url("./assets/login.css"); ?>"  rel="stylesheet"/>
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
                overflow-y: scroll; 
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
                text-align: center;
                padding-left: 5px;
                padding-right: 5px;
                height: fit-content;

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
            .final_choice{
                border: black;
                background: darkseagreen;
                border-style: dotted;
                border: 0;
                text-align: left;
              
            }
            .select_folder{
                text-align: left;

            }
            td{
                width:300px;
                text-align: right
            }
            td.checkbox{
                width:3px !important;
                text-align: left;
            }
            .list_associer{
                width: fit-content;
            }
            .format_content {
                width: fit-content;
                text-align: right
            }
            th{
                width:300px;
            }
            .block_projet{
                  overflow-y: scroll;
                height: 100px;
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
                        echo'<div><i class="material-icons" style="text-align: center;font-size:100px;color:red">folder_open</i></div>';
                        echo $value->nom;
                        echo '</div>';
                    } else {
                        echo' <div data-id="' . $value->utilisateur_id . '" class="projet" id="' . $value->id . '">';
                        echo'<div><i class="material-icons" style="text-align: center;font-size:100px;color:#84B85F">folder_open</i></div>';
                        echo $value->nom;
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="ressources" style="overflow-y: scroll;"id="">



                <?php
//                echo '<pre>' . var_dump($projet) . '</pre>';
                echo '<table>';
                echo '<th>Nom</th>';
                echo '<th>URL</th>';
                echo '<th>Taille</th>';
                echo '<th class="format_content">Format</th>';
                echo '<th class="format_content">Ext</th>';
                echo '<th class="format_content">Link</th>';
                echo '<th class="format_content">Sup</th>';

                foreach ($file as $key => $value) {
                    echo '<tr>';
                    echo '<td>' . $value->nom . '</td>';
                    echo '<td>' . $value->url . '</td>';
                    echo '<td>' . $value->taille . '</td>';
                    echo '<td class="format_content">' . $value->format . '</td>';
                    echo '<td>' . $value->ext . '</td>';
                    echo '<td class="list_associer">' . $value->projet_id . '</td>';
                    echo '<td class="checkbox">' . form_checkbox() . '</td>';
                    echo '<td id="checkbox' . $value->idressources . '" class"select_folder" style="display:none"><input id="folder_choice' . $value->idressources . '"class ="folder_choice" placeholder="associer projet" />';
                    echo'<div  class="block_projet" style="display:none;">';
                    foreach ($projet as $key => $val) {
                        echo '<div class="final_choice" style="border"><input class="linker" data-folder="' . $val->id . '" data-file="' . $value->idressources . '" id="final_choice' . $val->id . '" type="checkbox" /><a>' . $val->nom . '<a/><div>';
                    }
                    echo '</></td>';

                    echo '</div>';
                    echo '</tr>';
                }
                echo '</table>';
                ?>

            </div>
        </div>
    </main>


    <script type="text/javascript">
        $('.linker').on('change', function () {
            var file = $(this).data('file');
            var folder = $(this).data('folder');

            alert(file + ',' + folder);
            $.ajax({
                type: 'POST',
                url: '../dossier/associer',
                dataType: 'json',
                data: {idressources: file, id: folder},
                asynch: true,
                success: function (data) {
                    console.log(data);
                },
            })
        });


        $('.folder_choice').bind('click keyup', function () {
            var folder_choice_id = $(this).attr('id');
//            alert(folder_choice_id);
            var display_val = $(this).next().css('display');
            if (display_val === 'none') {
                $("#" + folder_choice_id).next().css('display', 'block');
            } else {
                $("#" + folder_choice_id).next().css('display', 'none');
            }

        });
        $('.checkbox').on('change', function () {
            var chk_id = $(this).next().attr('id');
//            alert(chk_id);
//            $('#chk_id').css('display','block');
            var display_val = $(this).next().css('display');
//            alert(display_val);
            if (display_val === 'none') {
                $("#" + chk_id).css('display', 'block');
            } else {
                $('.select_folder ,[id="' + chk_id + '"]').css('display', 'none');
            }

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
                                    <div><i class="material-icons" style="text-align: center;font-size:100px;color:#84B85F">folder_open</i></div>\n\
                                    </div>';
                                $(".bloc_folder").append(repertoire);
                            } else {

                                var repertoire = ' <div data-id="' + item.utilisateur_id + '" class="projet" id="' + item.id + '">\n\
                                    <div><i class="material-icons" style="text-align: center;font-size:100px;color:red">folder_open</i></div>\n\
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
            alert('Il faut donner une nom au projet');

        }
    </script>
</body>
</html>
