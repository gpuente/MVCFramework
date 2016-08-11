<?php
  class Banco{
    
    var $id;
    var $banco;
    var $fechamod;
    var $usuariomod;
    
    public function getId(){
      return $this->id;
    }
    
    public function setId($id){
      $this->id = $id;
      return $this;
    }
    
    public function getbanco(){
      return $this->banco;
    }
    
    public function setBanco($banco){
      $this->banco = $banco;
      return $this;
    }
    
    public function getFechaMod(){
      $fec = new DateTime($this->fechamod);
      $fechaformato = $fec->format('d-m-Y H:i:s');
      return $fechaformato;
    }
    
    public function setFechaMod($fechamod){
      $this->fechamod = $fechamod;
      return $this;
    }
    
    public function getUsuarioMod(){
      return $this->usuariomod;
    }
    
    public function setUsuarioMod($usuariomod){
      $this->usuariomod = $usuariomod;
      return $this;
    }
    
    function save($metodo){
      $con = new Conexion();
      if($metodo == 'new'){
        $sql = "insert into tbl_bancos(Banco_Nombre, Banco_UsuarioMod) values('".utf8_encode($this->banco)."','".utf8_encode($_SESSION['email'])."')";
        $con->ejecutarSQL($sql);
      }
      if($metodo == 'update'){
        $sql = "update tbl_bancos set Banco_Nombre='".utf8_encode($this->banco)."', Banco_UsuarioMod='".utf8_encode($_SESSION['email'])."', Banco_FechaMod = now() where Banco_Id = '$this->id'";
        $con->ejecutarSQL($sql);
      }
    }
    
    function getAllBancos(){
      $bancos = array();
      $con = new Conexion();
      $sql = "select * from tbl_bancos";
      $resultado = $con->ejecutarSQL($sql);
      if(mysql_num_rows($resultado) > 0){
        while($fila = mysql_fetch_array($resultado)){
          $ban = new Banco();
          $ban->setId(utf8_decode($fila['Banco_Id']));
          $ban->setBanco(utf8_decode($fila['Banco_Nombre']));
          $ban->setUsuarioMod(utf8_decode($fila['Banco_UsuarioMod']));
          $ban->setFechaMod(utf8_decode($fila['Banco_FechaMod']));
          array_push($bancos, $ban);
        }
      }
      return $bancos;
    }
    
    function delete(){
      $con = new Conexion();
      $sql = "delete from tbl_bancos where Banco_Id = '$this->id'";
      $con->ejecutarSQL($sql);
    }
    
    function tryDelete(){
      $result = false;
      $con = new Conexion();
      $sql = "select * from tbl_medicos where Banco_Id = '$this->id'";
      $resultado = $con->ejecutarSQL($sql);
      if(mysql_num_rows($resultado) > 0){
        $result = true;
      }
      return $result;
    }
    
  }
?>