<?php
trait sorter
{
    function Sort($sortData, $sortKey, $type = 1, $asString = false)
    {
        $count = count($sortData);

        if (($type == 1) || ($type == '+'))
            $ff = '+';
        else
            $ff = '-';

        for ($i = 0; $i < $count; $i++)
            for($j = $i; $j < $count; $j++){

                //if ($sortData[$i][$sortKey] > $sortData[$j][$sortKey]){
                if ($this->Check((($asString)? $this->GetFirrstAcci($sortData[$i][$sortKey]): floatval($sortData[$i][$sortKey])),
                    (($asString)? $this->GetFirrstAcci($sortData[$j][$sortKey]): floatval($sortData[$j][$sortKey])),
                    $ff)){
                    $el = $sortData[$i];
                    $sortData[$i] = $sortData[$j];
                    $sortData[$j] = $el;
                }
            }
        return $sortData;
    }

    private function GetFirrstAcci($str)
    {
        return (ord(strtolower(substr($str,0,1))));
    }

    private function Check($a,$b,$minmax = '+')
    {
        if ($a > $b)
            return ($minmax == '+')? true: false;
        else
            return ($minmax == '-')? true: false;;
    }

}
?>