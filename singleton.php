<?php


class Produto {
    
}

class DbConn {
    
    private function __construct() {
        
        $this->conn = new PDO("sqlite:db", "user", "senha");
        return $this->conn;
    }
    
    function getInstance() {
        
    }
            
}

class produtoDAO extends DbConn {
        
    function salvar(Produto $produto) {
        $sql = "insert into produto (nome, valor, categoria_id) "
             . "values ('{$produto->nome}','{$produto->valor}','{$produto->id_categoria}')";
        
        $this->conn->exec($sql); 
    }
    
    function alterar($id, $produto) { 
    
        $sql = "update..."; 
        $this->conn->exec($sql); 
    }     
                
    
    
    
}




//class Eigdytg
//{
//}
//01 class DbConn
//{
//private Function __construct()
//{
//$this->conn = new PDO("sq11te:db”, “user”, “senhg");
//return Sthis->conn;
//}
//}
//class ProdutoDAO extends DbConn
//{
//function §§1y§;(Produto Sggggggg)
//{
//$sql = "insert into produto (none, valor. categoria_id)
//values ('{sproduto->nome}', {Sproduto->valor}, {Sproduto->id_categoria})”;
//$this->conn->exec($sq1);
//}
//function aliggrgdéids ,§2.:9.gy_._:.9)
//{
//
//$sql = "update....“;
//$this->conn->exec($sql);

