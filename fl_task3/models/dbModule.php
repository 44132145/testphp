<?php
class dbModule
{
    private $dbConf = [
        'host' => 'localhost',
        'user' => 'testUser',
        'pass' => 'testUser',
        'db' => 'test'
    ];

    protected $dbC = false;
    protected $InsertRQ = null;
    protected $UpdateRQ = null;

    function __construct()
    {
        if ($this->connect() !== true)
            die ('no db; connection');
    }

    private function connect()
    {
        $this->dbC = new mysqli($this->dbConf['host'], $this->dbConf['user'], $this->dbConf['pass'], $this->dbConf['db']);
        if ($this->dbC->connect_error === null)
            return true;
        else
            return false;
    }

    public function GetData($tableName, $columns = [])
    {
        $result = $this->dbC->query('select '.((!empty($columns))? implode(', ',$columns):'*').' from '.$tableName.
            ' WHERE 1');
        if ($this->dbC->errno)
            return [];
        else{
            $res = [];
            for ($i = 0; $i < $result->num_rows; $i++)
                $res[] = $result->fetch_assoc();
            return $res;
        }
    }

    public function InsertData($data)
    {
        if (is_array($data[key()]))
            $this->AddMany($data);
        else
            $this->AddOne($data);
    }

    private function AddMany($data)
    {
        // for insert in one request many rows

        return false;
    }

    private function AddOne($data)
    {
        return false;
    }

    protected function Insert()
    {
        $this->InsertRQ = $this->dbC->prepare('Insert into ' . $this->GetTable() . '(name, description, price) values (?, ?, ?)');
        if ($this->InsertRQ)
            return true;
        else
            return '[' . $this->dbC->errno . "]" . $this->dbC->error;
    }

    protected function PrepareAdd($row = null)
    {
        if (($row === null) || (!$this->InsertRQ))
            return false;

        $this->InsertRQ->bind_param("ssd", $row['name'], $row['description'], $row['price']);

        if ($this->InsertRQ->execute())
            return true;
        elseif (intval($this->dbC->errno) == 1062)
            return $this->updatePrice($row);
            else
                return false;
    }

    private function updatePrice(&$row)
    {
        if (!$this->UpdateRQ)
            $this->UpdateRQ = $this->dbC->prepare('Update ' . $this->GetTable() . ' SET  price = (?) WHERE name = (?)');

        $this->UpdateRQ->bind_param("ds",  $row['price'],$row['name']);

        if ($this->UpdateRQ->execute())
            return true;
        else
            return false;
    }

    protected function SetConf($host, $user, $pass, $db)
    {
        //set new $this->dbConf
        //return $this->connect();
        return false;
    }
}
?>