<?php require( APPROOT . '/views/layout/header.view.php'); ?>

<div class="container">
    <h2 class="text-center">User List</h2>
    <table class="table table-striped">
        <caption><?=$data['title'];?></caption>
        <thead>
        <tr>
            <th>First Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['results'] as $result) {?>
            <tr>
                <td><?=$result->first_name?></td>
                <td><?=$result->email?></td>
                <td><?=$result->status?'Выполнено':'Не выполнено'?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>
</div>
<?php require( APPROOT . '/views/layout/footer.view.php');  ?>