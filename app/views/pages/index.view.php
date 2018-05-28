<?php require( APPROOT . '/views/inc/header.view.php'); ?>
<h1><?php echo $data['title'];  ?> </h1>
<ul>
  <?php foreach($data['pages'] as $p) : ?>
    <li><?= $p->name ?></li>
  <?php endforeach; ?>
</ul>
<?php require( APPROOT . '/views/inc/footer.view.php');  ?>