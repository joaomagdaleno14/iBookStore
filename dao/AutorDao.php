<?php
include_once '../model/Autor.php';
include_once '../common/respostas.php';

class AutorDao extends Autor{


    public function inserir( Autor $Autor) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "INSERT INTO Autor (NomeAutor, Descricao, Autor_Img) VALUES (:NomeAutor, :Descricao, :Autor_Img)";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":NomeAutor",$Autor->getNomeAutor());
            $preparedStatment->bindValue(":Descricao",$Autor->getDescricao());
            $preparedStatment->bindValue(":Autor_Img",$Autor->getAutor_Img());
            $preparedStatment->execute();
            $connection->commit();
           return SUCESSO;
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALHA;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }
    
    public function listarFetchAll() {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "SELECT * FROM Autor";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->execute();

            $resultado=$preparedStatment->fetchAll(PDO::FETCH_ASSOC);
            $connection->commit();

            return $resultado;
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALHA;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }
    public function listar() {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "SELECT * FROM Autor";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->execute();

            $resultado=$preparedStatment->fetch(PDO::FETCH_ASSOC);
            $connection->commit();

            return $resultado;
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALHA;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function listarunico($obj) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "SELECT * FROM Autor WHERE ID = :Id";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":Id",$obj->getId());
            $preparedStatment->execute();

            $resultado=$preparedStatment->fetch(PDO::FETCH_ASSOC);
            $connection->commit();

            return $resultado;
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALHA;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function update(Autor $Autor) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "UPDATE Autor SET
            NomeAutor = :NomeAutor, Descricao = :Descricao, Ator_Img = :Autor_Img WHERE ID = :id";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":id",$Autor->getId());
            $preparedStatment->bindValue(":NomeAutor",$Autor->getNomeAutor());
            $preparedStatment->bindValue(":Descricao",$Autor->getDescricao()());
            $preparedStatment->bindValue(":Autor_Img",$Autor->getAutor_Img());
            $resultado=$preparedStatment->execute();
            $connection->commit();

            return $resultado;
            //var_dump($resultado);
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALHA;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function delete(Autor $Autor) {
        try {
            $connection = new PDO('mysql:host=127.0.0.1;dbname=bookstore;charset=utf8', 'root', '');
            $connection->beginTransaction();
            $sql = "DELETE FROM Autor WHERE ID = :ID";
            $preparedStatment = $connection->prepare($sql);
            $preparedStatment->bindValue(":ID",$Autor->getId());
            $resultado=$preparedStatment->execute();
            $connection->commit();
            
            return $resultado;
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            echo $exc->getMessage();
            return FALHA;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }

    }
    
}
