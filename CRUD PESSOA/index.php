<?php
    echo"<h3> FORMA NORMAL DO ARRAY</h3>";
    $frutas = array("maçã","pera","melancia","cacau","limão","tomate","kiwi");
    print_r($frutas);
    echo"<h3> FORMA ABREVIADA DO ARRAY</h3>";
    $carros = ["Opala", "Hilux", "Dodge", "Ferrari"];
    print_r($carros);
    echo"<h3> ARRAY ASSOCIATIVO</h3>";
    $pessoa = ["nome"=> "Juan", "idade"=>"25"];
    print_r($pessoa);
    echo"<h3>ACESSANDO ELEMENTOS DE ARRAY</h3>";
    echo $frutas[1]."<br>";
    echo $carros[2]."<br>";
    echo $pessoa["nome"]."<br>";

    $carros[2] = "Onix";
    echo $carros[2]."<br>";

    $pessoa["idade"] = "30";
    echo $pessoa["idade"]."<br>";

    echo"<h3>ADICIONANDO ELEMENTOS NO ARRAY</h3>";
    $carros [] = "Marajó";
    print_r($carros);

    echo"<h3>ADICIONANDO ELEMENTOS NO ARRAY ASSOCIATIVO</h3>";
    $pessoa["profissão"] = "Developer";
    print_r($pessoa);

    echo"<h3>REMOVENDO ELEMENTOS NO ARRAY</h3>";
    unset($carros[0]);
    print_r($carros);

    echo"<h3>USANDO O FOR</h3>";
    for ($i = 1; $i <= count($carros); $i++) {
        echo "Carros na posição $i: ".$carros[$i]."<br>";
    }

    foreach($pessoa as $chave=>$valor) {
        echo "$chave: ".$valor."<br>";
    }
?>