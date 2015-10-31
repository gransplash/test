<?php include_once 'inc/menu.php'; ?>

<table>
<?php foreach($items as $item): ?>
<tr>
    <td style="width: 60%;"><h3><?=$item->title; ?></h3></td>
    <td style="width: 30%;"><a href="?ctrl=admin&act=update&amp;id=<?=$item->id?>">Редактировать</a></td>
    <td><a href="?ctrl=admin&act=delete&amp;id=<?=$item->id?>">Удалить</a></td>
</tr>
<?php endforeach; ?>
</table>