<?php require( APPROOT . '/views/layout/header.view.php'); ?>

<div class="container">
    <h2 class="text-center">
        User List
        <?php if ($data['auth']) {?>
            <a class="text-success" href="/Tasks/create"><small><i class="fa fa-plus-circle">Add</i></small></a>
        <?php }?>
    </h2>

    <table class="table table-striped">
        <caption><?=$data['title'];?></caption>
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['results'] as $result) {?>
            <tr>
                <td><?=$result->first_name?></td>
                <td><?=$result->last_name?></td>
                <td><?=$result->email?></td>
                <td><?=$result->description?></td>
                <td><?=$result->image?></td>
                <td>
                    <input class="toggle-task" data-id="<?=$result->id?>" type="checkbox" <?=$result->status?'checked':''?> />
                </td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<?php require( APPROOT . '/views/layout/footer.view.php');  ?>