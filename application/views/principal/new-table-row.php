<?php ob_start(); $rowNum = isset($_REQUEST['currentRow']) ? $_REQUEST['currentRow'] : 1; $tabStart = (($rowNum-1)*4) + 1;?>
    <tr class="tablerow<?php echo $rowNum % 2 == 0 ? ' odd' : '';?>">
        <td><span class="row-number"><?php echo $rowNum;?></span></td>
        <td class="first-td">
            <select id="loteria-<?php echo $rowNum;?>" class="loteria playField form-control" data-next-item="fecha-<?php echo $rowNum;?>" tabindex="<?php echo $tabStart;?>">
                <option>Loter&iacute;a</option>
                <option value="quiniela">La Quiniela</option>
                <option value="nacional">La Nacional</option>
                <option value="loteka">Loteka</option>
            </select>
            <?php if ($rowNum == 1) : ?>
                <h3 id="lotteryTip">&lt; Inicia seleccionando una loter&iacute;a</h3>
            <?php endif;?>
        </td>
        <td>
            <input type="text" class="fecha playField form-control" id="fecha-<?php echo $rowNum;?>" name="fecha-<?php echo $rowNum;?>" data-next-item="apuesta-<?php echo $rowNum;?>" title="Fecha" tabindex="<?php echo $tabStart + 1;?>">
        </td>
        <td>
            <input type="text" class="apuesta playField form-control" id="apuesta-<?php echo $rowNum;?>" name="apuesta-<?php echo $rowNum;?>" data-next-item="monto-<?php echo $rowNum;?>" title="Apuesta" tabindex="<?php echo $tabStart + 2;?>">
        </td>
        <td>
            <input type="text" class="monto playField form-control" id="monto-<?php echo $rowNum;?>" name="monto-<?php echo $rowNum;?>" title="Monto" tabindex="<?php echo $tabStart + 3;?>">
        </td>
        <td>
            <input type="text" class="apagar playField form-control" id="apagar-<?php echo $rowNum;?>" name="apagar-<?php echo $rowNum;?>" title="A Pagar">
        </td>
        <td>
            <span><a class="newRow" href="#">+</a></span>
        </td>
    </tr>
<?php
$new_row = ob_get_contents();
ob_end_clean();
echo $new_row;