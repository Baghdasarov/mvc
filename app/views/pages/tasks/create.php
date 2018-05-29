<?php require( APPROOT . '/views/layout/header.view.php'); ?>

<div class="container">
    <h2 class="text-center">
        Create Task
    </h2>
    <form id="task-form" method="POST" action="/Tasks/store">
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
            <input type="file" name="image" class="form-control-file" id="uploadImage" >
            <img id="preview" class="d-none" src="#" alt="Will be uploaded image" width="150" />
        </div>
        <div class="form-group text-center">
            <button type="button" class="btn btn-primary" id="preview-button">Preview</button>
            <button type="button" class="btn btn-danger d-none" id="hide-preview">Hide Preview</button>
            <button type="submit" class="btn btn-success">Upload</button>
        </div>
    </form>

    <div id="task-preview" class="d-none">
        <table class="table table-striped">
            <caption>Preview</caption>
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
                <tr>
                    <td class="pr-first_name"></td>
                    <td class="pr-last_name"></td>
                    <td class="pr-email"></td>
                    <td class="pr-description"></td>
                    <td><img src="" class="pr-preview" alt="No image" width="150"></td>
                    <td>
                        <input type="checkbox" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php require( APPROOT . '/views/layout/footer.view.php');  ?>