<?php
require '/../models/dbModule.php';
require '/../../fl_task1/models/Product.php';
require '/../traits/sorter.php';

class loader extends dbModule
{
    use  sorter;

    private $table = 'data';
    private $dataFile = '/../../data/data.json';

    protected function GetTable()
    {
        if (!empty($this->table))
            return $this->table;
        else
            return false;
    }

    public function SetTable($tableName)
    {
        $this->table = $tableName;
        return true;
    }

    public function SetDataFromFile($fileName = null)
    {
        if ($fileName !== null)
            $this->SetDataFileName($fileName);

        $dataObj = new Product(__DIR__.$this->dataFile);
        $dataArr = $dataObj->asArray();

        $dataArr = $this->Sort($this->Sort($dataArr,'price'),'name', 2, true);

        die(var_dump($this->AddArrayToDB($dataArr)));
    }

    private function AddArrayToDB(&$data)
    {
        $this->Insert();
        $result = [];

        for($i = 0; $i < count($data); $i++)
        {
            $result[$i] = $this->PrepareAdd($data[$i]);
        }

        return $result;
    }

    public function SetDataFileName($DFName)
    {
        if (file_exists($DFName)){
            $this->dataFile = $DFName;
            return true;
        }
        else
            return false;
    }
}

//-- for start from cmd
$lo = new loader();
$lo->SetDataFromFile();
?>