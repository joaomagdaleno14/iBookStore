<?php 
    include_once '../model/Editora.php';
    include_once '../bl/EditoraBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Editora = new Editora();
        $Editora->setNomeEditora($_POST['NomeEditora']);

        $tmpName = $_FILES['Editora_Img']['tmp_name'];
        $name = $_FILES['Editora_Img']['name'];

        move_uploaded_file($tmpName, "../public/img/".$name);

        $Editora->setEditora_Img($name);
        
        $eBl = new EditoraBl();
        $resultado = $eBl->registrarEditora($Editora);
        
        if ($resultado == true){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>