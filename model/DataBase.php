<?php
namespace AlaskaJF\model;
class DataBase
{
	//connexion à la base de données
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=alaska;charset=utf8','root','');
		return $db;		
	}
}

