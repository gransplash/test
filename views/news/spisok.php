<?php include_once 'inc/menu.php'; ?>

<table border="1">
<?php foreach($items as $item): ?>
<tr>
    <td style="width: 60%;"><h3><?=$item->title; ?></h3></td>
    <td style="width: 30%;"><a href="/admin/update/<?=$item->id?>">Редактировать</a></td>
    <td><a href="/admin/delete/<?=$item->id?>">Удалить</a></td>
</tr>
<?php endforeach; ?>
</table>