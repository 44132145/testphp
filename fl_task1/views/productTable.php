<div id="productTable">
    <?php
if (isset($products) && (!empty($products) && (is_array($products)))){
    ?>
    <table>
    <tr>
    <?php
    $keys = array_keys($products[0]);
    foreach ($keys as $name)
    {?>
            <td class="t_head"><?=$name?></td>
    <?}
    ?>
    </tr>
    <?php
    for($i = 0; $i < count($products); $i++)
    {
        ?>
        <tr>
        <?
        for(reset($products[$i]); (list($id,$data) = each($products[$i])) !== false;)
        {
            ?>
            <td id="<?=$id;?>"><?=$data;?></td>
            <?
        }
        ?>
        </tr>
        <?
    }
    ?>
    </table>
    <?php
}
else{
?>
    <span>NO DATA</span>
    <?
}
?>
</div>