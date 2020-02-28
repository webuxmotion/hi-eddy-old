<div class="available">
    <ul>
        <li>Выбрать цвет
            <select>
                <?php foreach ($mods as $mode) : ?>
                    <option
                        data-title="<?=$mode->title;?>" 
                        data-price="<?=$mode->price * $curr['value'];?>"  
                        value="<?=$mode->id;?>"     
                    >
                        <?=$mode->title;?>
                    </option>
                <?php endforeach; ?>
            </select>
        </li>
        <div class="clearfix"> </div>
    </ul>
</div>