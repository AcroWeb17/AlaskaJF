<?php
namespace AlaskaJF\model;
class DataBase
{
	//connexion à la base de données
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=mysql-acroweb.alwaysdata.net;dbname=acroweb_alaska;charset=utf8','acroweb','Alaska_JForteroche');
		return $db;		
	}
}

