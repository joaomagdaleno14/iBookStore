<?php 
    include_once '../model/Autor.php';
    include_once '../bl/AutorBl.php';
    include_once '../common/respostas.php';
    if (isset($_POST)){
        $Autor = new Autor();
        $aBl = new AutorBl();
        $Autor->setNomeAutor($_POST['NomeAutor']);
        $Autor->setDescricao($_POST['Descricao']);
        

        $tmpName = $_FILES['Autor_Img']['tmp_name'];
        $name = $_FILES['Autor_Img']['name'];

        move_uploaded_file($tmpName, "../public/img/".$name);

        $Autor->setAutor_Img($name);
        
        $resultado = $aBl->registrarAutor($Autor);
        
        if ($resultado == true){
            echo "ok inserido com sucesso";
        } else {
            echo "nao foi inserido";    
        }
        
        
    }?>