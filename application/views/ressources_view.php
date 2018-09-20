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

            /*display:flex;*/
            width: 100%;
            flex-align: auto;
        }
        .material-icons {
            cursor: zoom-in;

        }
        .block_side1{
            padding-top: 300px;
            height: 100px;
            width: 100%;
        }
        .block_side0{
            height: 100px;
            width: 100%;
        }
    </style>
    <side >
        <div class="side">

            <div class="block_side1">
                <div class="element_side1">

                    <div data-nav-side="nav_bord"  class="form_hidden">Creer Ressources</div>
                    <div class="new_projet" style="display:none">


                        <?php
//                        echo form_input(array('type' => 'hidden', 'name' => 'user_id', 'id' => $is_logged->id));
//                        echo form_input(array('type' => 'hidden', 'name' => 'user_name', 'id' => $is_logged->nom));
//                        echo form_input(array('type' => 'hidden', 'name' => 'projet_name', 'id' => $is_logged->nom));
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
            <div class="block_side2">
                <a  href="<?php echo base_url() . 'accueil/bord' ?>">page de bord</a>
            </div>
        </div>
    </side>
    <main>
</html>
