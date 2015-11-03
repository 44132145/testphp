<?php
class Product
{
    private $data = null;
    private $dataFile = '/data/data.json';

    public function __construct($dataF = null)
    {
        if (($dataF === null) || (!file_exists($dataF)))
            $this->dataFile = $_SERVER['DOCUMENT_ROOT'].$this->dataFile;
        else
            $this->dataFile = $dataF;

        $this->ParseFile();
    }

    private function ParseFile()
    {
        if (file_exists($this->dataFile)){
            $this->data = json_decode(file_get_contents($this->dataFile));
            return true;
        }
        else
            return false;
    }

    public function SetDataFile()
    {
        // check new file and call $this->ParseFile();
    }

    public function asArray()
    {
        $RetArr = [];
        foreach($this->data as  $val)
        {
            $RetArr[] = (array)$val;
        }

        return $RetArr;
    }
}
?>