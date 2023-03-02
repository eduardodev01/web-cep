<?php
    require '../vendor/autoload.php';
    use Medoo\Medoo;
    
    $database = new Medoo([
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'web-cep',
        'username' => 'root',
        'password' => ''
    ]);
     
    $database->insert('teste', [
        'usuario' => 'foo',
        'senha' => 'foo@bar.com'
    ]);
     
    $data = $database->select('teste', [
        'usuario',
        'senha'
    ], [
        'id' => 50
    ]);
     
    echo json_encode($data);
?>