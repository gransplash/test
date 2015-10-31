<?php include_once 'inc/menu.php'; ?>

<?php foreach ($items as $item): ?>
    <h1><a href="news/one/<?=$item->id?>"><?=$item->title?></a></h1>
    <div><?=$item->content?></div>
<?php endforeach; ?>
