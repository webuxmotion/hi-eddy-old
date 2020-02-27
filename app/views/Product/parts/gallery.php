<div class="flexslider">
  <ul class="slides">
    <?php foreach ($gallery as $galleryImage) : ?>
      <li data-thumb="/images/<?=$galleryImage->img?>">
        <div class="thumb-image"> <img src="/images/<?=$galleryImage->img?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>