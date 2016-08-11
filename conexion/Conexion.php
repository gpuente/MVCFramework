<?php 

	$con = mysql_connect('localhost','root','') or die ('no hay conexion en la base de datos');
	$db = mysql_select_db('ascomed', $con) or die('no existe la base de datos');

  class Conexion{

    function ejecutarSQL($query){
			mysql_query("SET NAMES utf8");
      $consulta = mysql_query($query);
      return $consulta;
    }

    function getID(){
    	return mysql_insert_id();
    }
  
  }
	
?>