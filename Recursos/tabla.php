<?php
echo('hewo');

function getPagos(){
    $db = new PDO('mysql:host=localhost;'
    .'dbname=db_deudas;charset=utf8'
    , 'root', '');
    $query = $db->prepare('SELECT*FROM pagos');
    $query->execute();
    $pagos = $query->fetchAll(PDO::FETCH_OBJ);
    var_dump($pagos);
    return $pagos;
}

$pagos = getPagos();

foreach($pagos as $pago){
    echo "$pago->deudor(cuota nro: $pago->cuota)";
}