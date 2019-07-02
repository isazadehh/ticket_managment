<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Support Managment!</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/icons/favicon.ico') ?>"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function(){
                if(this.checked){
                    checkbox.each(function(){
                        this.checked = true;
                    });
                } else{
                    checkbox.each(function(){
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function(){
                if(!this.checked){
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
</head>
<body>
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-4">
                    <h2><a href="<?= base_url('Problems'); ?>" style="color: #ffffff;">Manage <b>Problems</b></a></h2>
                </div>
                <div class="col-sm-8">
                    <a href="<?= base_url('Customers') ?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE853;</i> <span>Customers</span></a>
                    <a href="<?= base_url('Problems') ?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE000;</i> <span>Problems</span></a>
                    <a href="#addModulesModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Problem</span></a>
                    <a href="#deleteModulesModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Multi-Delete</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>
					<span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                </th>
                <th>Problem</th>
                <th>Trick</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <!--            ALL Problems FOREACH-->
            <?php foreach ($all_problems as $problems) { ?>

                <tr>
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox1" name="options[]" value="1">
                            <label for="checkbox1"></label>
                        </span>
                    </td>
                    <td><?= $problems->problem_name ?></td>
                    <td><?= $problems->trick ?></td>
                    <td><div style="background: <?= $problems->color ?>; width: 16px; height: 16px; border-radius: 50%;" title="<?= $problems->status ?>"></div></td>
                    <td>
                        <a href="#editModuleModal" class="edit" data-toggle="modal"><i class="material-icons material-update" data-toggle="tooltip" title="Edit : <?= $problems->id ?>">&#xE254;</i></a>
                        <a href="#deleteModulesModal" class="delete" data-toggle="modal"><i class="material-icons material-delete" data-toggle="tooltip" title="Delete : <?= $problems->id ?>">&#xE872;</i></a>
                    </td>
                </tr>

            <?php } ?>

            </tbody>
        </table>
        <div class="clearfix">
            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
            <ul class="pagination">
                <li class="page-item disabled"><a href="#">Previous</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="addModulesModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('Problems/problem_add') ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Add Problem</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Problem Name</label>
                        <input type="text" class="form-control" name="problem_name">
                    </div>
                    <div class="form-group">
                        <label>Trick</label>
                        <textarea type="text" class="form-control" name="problem_trick" rows="10" cols="45"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="problem_status" id="problem_status" class="form-control">
                            <option value="0">Select Status</option>
                            <?php foreach ($all_statuses as $statuses) { ?>
                                <option value="<?= $statuses->id ?>"><?= $statuses->status ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" name="problem_submit">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editModuleModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="module_update_form" action="<?= base_url('Problems/problem_update') ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Problem</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Problem Name</label>
                        <input type="text" class="form-control" name="problem_name" value="">
                    </div>
                    <div class="form-group">
                        <label>Trick</label>
                        <textarea type="text" class="form-control" name="problem_trick" rows="10" cols="45"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save" name="problem_submit">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteModulesModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  class="module_delete_form" action="<?= base_url('Problems/problem_delete/') ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Problem</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete" name="problem_delete">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script>var base_url = '<?= base_url('/Problems/problem_') ?>';</script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
</html>