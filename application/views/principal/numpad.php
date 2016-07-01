<?php $numpad_keys = array('//', '1', '2', '3', '--', '4', '5', '6', '&#149;&#149;', '7', '8', '9', '&#149;/', '*', '0', '#');?>
<ul id="numpad">
    <?php $i=-1; foreach($numpad_keys as $key) : $i++;?>
        <li class="key-container <?php if($i == 0 || $i == 4) {echo 'first-in-row'; $i = 0;}?>"><a class="key"><?php echo $key;?></a></li>
    <?php endforeach;?>
</ul>