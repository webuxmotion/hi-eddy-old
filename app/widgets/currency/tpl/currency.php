<select id="<?=$this->options['id'];?>" tabindex="4" class="dropdown drop">
    <option value="<?=$this->currency['code'];?>" class="label"><?=$this->currency['code'];?></option>
    <?php foreach ($this->currencies as $k => $v) : ?>
      <?php if ($k != $this->currency['code']) : ?>
        <option value="<?=$k?>"><?=$k?></option>
      <?php endif; ?>
    <?php endforeach; ?>
</select>