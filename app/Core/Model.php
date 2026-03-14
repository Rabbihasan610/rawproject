<?php

namespace App\Core;

class Model
{
   protected static string $table = '';

   public static function find(int $id) : ?array 
   {
        $stmt = DB::pdo()->prepare("SELECT * FROM " . static::$table . " WHERE id = ? LIMIT 1");

        $stmt->execute([$id]);

        $row = $stmt->fetch();

        return $row ?: null;
   }

    public static function get(array $columns = ['*']): ?array
    {
        $stmt = DB::pdo()->prepare("SELECT " . implode(',', $columns) . " FROM " . static::$table);

        $stmt->execute();

        $row = $stmt->fetch();

        return $row ?: null;
    }

   // whereFast

   // get 

   // all

   // findOrCreate

   // firstOrCreate

   // updateOrCreate

   // update

   // store

   // delete

   // destroy


   // extras [avg, count, max, min, sum, ...]



}