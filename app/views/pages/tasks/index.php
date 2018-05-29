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
            <th><a href="/Tasks/index?orderBy=first_name&type=<?=$data['type']?>">First Name</a></th>
            <th>Last Name</th>
            <th><a href="/Tasks/index?orderBy=email&type=<?=$data['type']?>">Email</a></th>
            <th>Description</th>
            <th>Image</th>
            <th><a href="/Tasks/index?orderBy=status&type=<?=$data['type']?>">Status</a></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['results'] as $result) {?>
            <tr>
                <td><?=$result->first_name?></a></td>
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
    <?php for($i=1; $i<=$data['total_pages'];$i++) {
        $class = $data['current_page'] == $i?'text-success':'';
        echo "<a class='$class' href='/Tasks/index?page=$i'>$i.</a>";
    }?>
</div>
<?php require( APPROOT . '/views/layout/footer.view.php');  ?>