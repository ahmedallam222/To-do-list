<?php

namespace App\Database;



class QueryBuilder
{
    private static $pdo;
    private static $log;
    public static function make(\PDO $pdo, $log = null)
    {
        self::$pdo = $pdo;
        self::$log = $log;
    }

    // الاستعلام select
    public static function get($table, $where = null)

    {
        $query = "SELECT * FROM {$table}";

        if (is_array($where)) {
            $query .= " WHERE " . implode('', $where);
        }
        $statement = self::execute($query);
        return $statement->fetchAll(\PDO::FETCH_OBJ);  //القراءة من قواعد البيانات
        //  المتغير tasks$ هو عبارة عن مصفوفة Array تحتوي الصفوف التي تم جلبها من قاعدة البيانات، فقد قمنا باستخدام التابع ()fetchAll لوضع نتيجة الاستعلام داخل مصفوفة يمكننا التعامل معها.
        // و بعد ذلك قمنا باستخدام ()var_dump لعرض هذه النتيجة، و التابع var_dump يستخدم لعرض/طباعة معلومات عن متغير ما(مثل نوعه أو قيمته...إلخ) أيًّا كان نوعه لا يشترط الكائنات فقط. 
        // 
    }



    public static function insert($table, $data)
    {

        $fields = array_keys($data);
        $fieldsStr = implode(',', $fields);
        $valueStr = str_repeat('?', count($fields) - 1) . '?';
        $query = "INSERT INTO {$table} ({$fieldsStr}) VALUES ({$valueStr})";    // تمرير المتغير $valueStr إلى جملة SQL
        self::execute($query, array_values($data));
    }



    public static function update($table, $id, $data)
    {
        $fields = implode('= ? ,', array_keys($data)) . '= ?';
        $values = array_values($data);
        $query = "UPDATE {$table} SET {$fields} WHERE id = {$id}";
        self::execute($query, $values);
    }


    public static function delete($table, $id, $column = 'id', $operator = "=")
    {
        $query = "DELETE FROM {$table} WHERE {$column} {$operator} {$id}";
        // $query = "DELETE FROM tasks WHERE id = {$id}";
        self::execute($query);
    }

    private static function execute($query, $values = [])
    {
        if (self::$log) {
            self::$log->info($query);
        }
        $statement = self::$pdo->prepare($query);
        $statement->execute($values);
        return $statement;
    }
}
