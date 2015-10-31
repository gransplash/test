<?php
    
abstract class AbstactModel
{
    static  protected  $table;
    
    protected $data = [];
    
    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }
    
    public function __get($k)
    {
        return $this->data[$k];
    }
    
    public function __isset($k)
    {
        return isset($this->data[$k]);
    }
    
    public static  function findAll()
    {
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClassName(get_called_class());
        return $db->query($sql);
    }
    
    public static  function findOneByPk($id)
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $res = $db->query($sql, [':id' => $id]);
        if(!empty($res)) {
            return $res[0];
        }
        return false;
    }
    
    public static function findOneByColumn($column, $value)
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' .$column . '=:value';
        $res = $db->query($sql, [':value' => $value]);
        if(empty($res)) {
            throw new ModelExeption('Ничего не найдено');
        }
        return $res;
    }

    protected function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }
        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(', ', $cols) . ') VALUES(' . implode(', ', array_keys($data)) . ')';
        $db = new DB();
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    protected function update()
    {
        $cols = [];
        $data = [];
        foreach($this->data as $k => $v){
            $data[':' . $k] = $v;
            if('id' == $k){
                continue;
            }
            $cols[] = $k . '=:' . $k;
        }

        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';
        $db = new DB();
        $db->execute($sql, $data);
    }
    
    public function save()
    {
        if(!isset($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $data = [];
        foreach($this->data as $k => $v){
            $data[':' . $k] = $v;
        }
        
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->execute($sql, [':id' => $this->id]);
    }

}