<?php
require_once "interfaces/ModelInterface.php";

class DB extends PDO implements ModelInterface
{
    const DB_TYPE = 'mysql';
    const DB_HOST = 'localhost';
    const DB_NAME = 'hakobgit_site';
    const DB_USER = 'hakobgit_site';
    const DB_PASS = '';


    public function __construct()
    {
        parent::__construct(self::DB_TYPE . ':host=' . self::DB_HOST . ';dbname=' . self::DB_NAME, self::DB_USER, self::DB_PASS);
        try {
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function all($table, $id = '')
    {
        try {
            $stmt = $this->prepare("SELECT * FROM $table where id != :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($result)
                return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "select error: " . $e->getMessage();
        }
    }
    public function friends_request($id='')
    {
        try {
            $stmt = $this->prepare("SELECT * FROM users u inner join friends f on f.friends_id = :id and f.user_id = u.id where status = 'pending'");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($result)
                return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "select error: " . $e->getMessage();
        }

    }


    public function friends($id){
        try {
            $stmt = $this->prepare("SELECT * FROM users u INNER JOIN friends f ON u.id=f.user_id where `status` = 'approved'");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($result)
                return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "select error: " . $e->getMessage();
        }
    }



    public function update($id)
    {
        try{
            $stmt = $this->prepare("UPDATE friends SET status = 'approved' where friends_id=:id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
    }

    public function delete($table, $id)
    {
        try{
            $query = "DELETE FROM friends WHERE friends_id = :id";
            $stmt = $this->prepare($query);
            $stmt->bindValue(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if ($result)
                return $stmt->fetchAll();
        }catch (PDOException $e){
            echo "error: " . $e->getMessage();
        }
    }

    public function create($obj)
    {
        try {
            $table = $obj['table'];
            unset($obj['table']);

            $query = "INSERT INTO $table ("
                . $this->return_list($obj)
                . ") VALUES( "
                . $this->return_list($obj, ':') . ")";
            $stmt = $this->prepare($query);
            foreach ($obj as $key => $index) {

                $stmt->bindValue(':' . $key, $index);
            }

            $stmt->execute();
            return $this->lastInsertId();

        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
        }
    }

    public function  show($id, $table)
    {
        try {
            $stmt = $this->prepare("SELECT * FROM $table WHERE 
id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
//            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->rowCount();
            if ($result > 0)
                return $stmt->fetchObject();
        } catch (PDOException $e) {
            echo "select error: " . $e->getMessage();
        }
    }

    public function return_list($obj, $colon = "")
    {
        $str = "";
        if (!empty($obj)) {
            foreach (array_keys($obj) as $index => $key) {
                (count($obj) - 1 != $index) ?
                    $str .= $colon . $key . ", " :
                    $str .= $colon . $key. " ";
            }
            return $str;
        }
    }

    public function find(array $data, $table, array $selected = ['id'=>''])
    {
        try {
            $query = "SELECT " . $this->return_list($selected) . " 
            FROM $table WHERE " .
                $this->return_list($data)  . "=".
                $this->return_list($data, ":") ;
            $stmt = $this->prepare($query);
            $stmt->execute($data);

            $result = $stmt->rowCount();
            if ($result > 0)
                return $stmt->fetch();
        } catch (PDOException $e) {
            echo "select error: " . $e->getMessage();
        }
    }
}