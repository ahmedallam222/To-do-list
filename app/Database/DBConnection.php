<?php



namespace App\Database;

class DBConnection
{
   
private static $pdo;

public static function make ($config){
   // تعمل ع انشاء الاتصال مع قاعده البيانات واعاده الكائن بي دي او

   try { 
      self::$pdo = self::$pdo ? :new \PDO("mysql:host={$config['host']};dbname={$config['name']}", $config['user'], $config['password']);
      return self::$pdo;

   } catch (\PDOException $e) 
   {
      die($e->getMessage());
   }
}

}

