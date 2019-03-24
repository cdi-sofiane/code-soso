<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script src="../../assets/js/script_ajax.js"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>
        side{
            background-color: cadetblue;
            display:flex;
            width: 300px;
            height:-webkit-fill-available;

            /*flex-wrap: wrap;*/



        }
        main{
            /*display:flex;*/
            width:-webkit-fill-available;
            background-color: #F0F8FF /*#333333*/;            }
        body{
            display: flex;
            overflow: hidden;
            margin:0;
            padding:0;

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
            display:flex;
            flex-wrap: wrap;
        }
        .side{



            width: 100%;
        }
        .material-icons {
            cursor: zoom-in;

        }

    </style>
    <side >
        <div class="side">
            <div class="element_side1">

                <div data-nav-side="nav_bord"  class="form_hidden">Creer Ressources</div>
                <div class="new_projet" style="display:none">


                    <?php
                    echo form_input(array('type' => 'hidden', 'name' => 'user_id', 'id' => $is_logged->id));
                    echo form_input(array('type' => 'hidden', 'name' => 'user_name', 'id' => $is_logged->nom));
                    echo form_input(array('type' => 'hidden', 'name' => 'projet_name', 'id' => $is_logged->nom));
//                    echo form_input(array("placeholder" => 'Nom de Projet', 'name' => 'titre', 'value' => ''));
                    echo form_input(array('name' => 'fichier', 'value' => '', 'type' => 'file'));
                    echo form_submit(array('id' => 'ajax_ressource', 'class' => 'submit_btn', 'value' => 'New ressorce', 'type' => 'submit'));
                    ?>

                </div>


            </div>
            <div class="element_side2">

                <div data-nav-side="nav_bord" >Supprimer Ressources</div>


            </div>
        </div>
    </side>
    <main style='padding-top:15%;padding-left: 15%;'>
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

                foreach ($fichier as $key => $value) {
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
    </main>
</html>
