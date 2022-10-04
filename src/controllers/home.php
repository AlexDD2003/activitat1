<?php

    //renderizar template home

    require 'src/render.php';
    $title="Superman";
    $alumnes=[
        'Perico Palotes', 
        'Aitor Tillas Frias', 
        'Aitor Mentas Fuertes'
    ];
    echo render('home',['title'=>$title,
                        'alumnes'=>$alumnes]);