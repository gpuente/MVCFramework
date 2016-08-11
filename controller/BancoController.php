<?php
  require_once (MODEL.'Banco.php');

  class BancoController{
    
    function nuevoBanco($nombre){
      $banco = new Banco();
      $banco->setBanco($nombre);
      $banco->save('new');
      header('location: rutes.php?controller=view&method=bancos');
    }
    
    function getBancos(){
      $banco = new Banco();
      $array = $banco->getAllBancos();
      return $array;
    }
    
    function deleteBanco($id){
      $banco = new Banco();
      $banco->setId($id);
      if($banco->tryDelete()){
        header('location: rutes.php?controller=view&method=deletealert&metodo=bancos');
        exit;
      }
      $banco->delete();
      header('location: rutes.php?controller=view&method=bancos');
    }
    
    function modificarBanco($id, $nombre){
      $banco = new Banco();
      $banco->setId($id);
      $banco->setBanco($nombre);
      $banco->save('update');
      header('location: rutes.php?controller=view&method=bancos');
    }
    
  }
?>