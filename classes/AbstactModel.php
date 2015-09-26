<?php
    
abstract class AbstactModel
{
    protected static $table = 'foobar';
    
    public static function getAll()
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->queryAll($sql, static::$class);
    }
    
    public static function getOne($id)
    {
        $db = new DB();
        $sql = 'SELECT * FROM'  . static::$table . 'WHERE id=' . $id;
        return $db->queryOne($sql, static::$class);
    }
}