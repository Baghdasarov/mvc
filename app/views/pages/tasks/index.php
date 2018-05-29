<?php require( APPROOT . '/views/layout/header.view.php'); ?>

<div class="container">
    <h2 class="text-center">
        User List
        <a class="text-success" href="/Tasks/create"><small><i class="fa fa-plus-circle">Add</i></small></a>
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
                <td>
                    <span><?=$result->description?></span>
                    <?php if ($data['auth']) {?>
                        <i class="fas fa-edit edit-icon cursor-pointer" data-id="<?=$result->id?>" data-toggle="modal" data-target="#editModal"></i></td>
                    <?php }?>
                <td>
                    <img src="<?=$result->image?>" alt="No image" width=150>
                </td>
                <td>
                    <?php
                    if (isset($_SESSION["valid"]) && $_SESSION["valid"]) {
                            $checked = $result->status?'checked':'';
                            echo "<input class='toggle-task' data-id='$result->id' type='checkbox' $checked />";
                        }else{
                            echo $result->status?'Выполнено':'Не выполнено';
                        }
                    ?>
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
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Description Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="description-form" method="POST" enctype="multipart/form-data" action="/Tasks/update">
                    <div class="form-group row">
                        <label for="description" class="col-2 col-form-label">Description</label>
                        <div class="col-10">
                            <textarea class="form-control" name="description" id="edited-description"></textarea>
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require( APPROOT . '/views/layout/footer.view.php');  ?>