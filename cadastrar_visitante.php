<?php
require_once('conexao.php');
// new filename
/*$url = '';
$filename = 'pic_'.date('YmdHis') . '.jpeg';
if(move_uploaded_file($_FILES['webcam']['tmp_name'],'upload/'.$filename)){
 $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/upload/' . $filename;
 $sql= "INSERT INTO fotos(id_visitante, foto)VALUES('{$last_id}','{$filename}')";
 mysqli_query($conn,$sql);
 $imagem_last_id=mysqli_insert_id($conn);
}*/
$nome = strip_tags($_POST["nome"]);
$cpf = strip_tags($_POST["cpf"]);
$origemVisitante = strip_tags($_POST["empresa"]);
$telefone = strip_tags($_POST["telefone"]);


if(!empty($cpf)){
    $sql="SELECT cpf FROM visitantes WHERE cpf='{$cpf}'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
        header("Location:http://localhost/registro-de-visitas-hugoDev/administrativo.php?link=3&error_cpf=1");
        exit;
    }
    elseif(!empty($nome)){
        $foneReplace = str_replace('(','',str_replace(')','',str_replace('-','',$telefone)));
        $sql="INSERT INTO visitantes(nome, cpf, origem_visitante, telefone, imagem, criado, editado)
        VALUES('{$nome}','{$cpf}','{$origemVisitante}','{$foneReplace}', 'default.png', NOW(), NOW())";
        mysqli_query($conn,$sql);
        $last_id=mysqli_insert_id($conn);
        header("Location:http://localhost/registro-de-visitas-hugoDev/administrativo.php?link=16&id_visitante=$last_id");
        exit;
    } else {
        return false;
    }
} else {
    return false;
}
