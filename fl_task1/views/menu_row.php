<div id="MainMenu">
    <?php
        for (reset($menu); (list($Name, $Url) = each($menu)) !== false; )
        {
            ?>
            <a href="<?=$Url?>"><?=$Name?></a>
            <?php
        }
    ?>
</div>
