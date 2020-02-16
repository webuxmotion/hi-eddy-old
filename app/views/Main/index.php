<p>Hello world</p>
<?php foreach ($posts as $post) :?>
  <h2><?=$post->id?>: <?=$post->title?></h2>
<?php endforeach; ?>
