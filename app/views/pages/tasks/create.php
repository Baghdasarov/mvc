<?php require( APPROOT . '/views/layout/header.view.php'); ?>

<div class="container">
    <h2 class="text-center">
        Create Task
    </h2>
    <form method="POST" action="Task/store">
        <div class="form-group row">
            <label for="first_name" class="col-2 col-form-label">First Name</label>
            <div class="col-10">
                <input class="form-control" type="text" name="first_name" id="first_name">
            </div>
        </div>
        <div class="form-group row">
            <label for="last_name" class="col-2 col-form-label">Last Name</label>
            <div class="col-10">
                <input class="form-control" type="text" name="last_name" id="last_name">
            </div>
        </div>
        <div class="form-group row">
            <label for="example-email-input" class="col-2 col-form-label">Email</label>
            <div class="col-10">
                <input class="form-control" type="email" name="email" id="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-2 col-form-label">Description</label>
            <div class="col-10">
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="uploadImage">Upload Image</label>
            <input type="file" class="form-control-file" id="uploadImage" >
        </div>
    </form>
</div>
<?php require( APPROOT . '/views/layout/footer.view.php');  ?>