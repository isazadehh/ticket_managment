<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
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
                <div class="col-sm-12">
                    <h2><a href="<?= base_url('Customers') ?>" style="color: #ffffff;">Manage <b>Customers</b></a></h2>
                    <br>
                </div>
                <div class="col-sm-12">
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Ticket</span></a>
                    <a href="<?= base_url('Modules') ?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE5C3;</i> <span>Modules</span></a>
                    <a href="<?= base_url('Problems') ?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE000;</i> <span>Problems</span></a>
                    <a href="<?= base_url('Countries') ?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE153;</i> <span>Countries</span></a>
                    <a href="<?= base_url('Statuses') ?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE877;</i> <span>Statuses</span></a>
                    <a href="<?= base_url('Shops') ?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE8D1;</i> <span>Shops</span></a>
                    <a href="<?= base_url('Counts') ?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE881;</i> <span>Count</span></a>
                    <a href="<?= base_url('Knowledge') ?>" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE90F;</i> <span>Knowledge</span></a>
                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
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
                <th>Order</th>
                <th>Country</th>
                <th>Module</th>
                <th>Version</th>
                <th>Source</th>
                <th>Version</th>
                <th>Target</th>
                <th>Version</th>
                <th>Issue</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
<!--            ALL CUSTOMER FOREACH-->
            <?php foreach ($all_customers as $customers) {?>

                <tr>
                    <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                    </td>
                    <td><?= $customers->order_id ?></td>
                    <td><?= $customers->country_name ?></td>
                    <td>
                        <img src="<?= base_url('assets/img/modules/'.strtolower($customers->code)) ?>.png" class="img-circle" alt="<?= $customers->code ?>" width="32" title="<?= $customers->module_name ?>">
                    </td>
                    <td><?= $customers->module_version ?></td>
                    <td>
                        <img src="<?= base_url('assets/img/shops/'.strtolower($customers->source_shop_code)) ?>.png" class="img-circle" alt="<?= $customers->source_shop_code ?>" width="32" title="<?= $customers->source_shop_name ?>">
                    </td>
                    <td><?= $customers->source_shop_version ?></td>
                    <td>
                        <img src="<?= base_url('assets/img/shops/'.strtolower($customers->target_shop_code)) ?>.png" class="img-circle" alt="<?= $customers->target_shop_code ?>" width="32" title="<?= $customers->target_shop_name ?>">
                    </td>
                    <td><?= $customers->target_shop_version ?></td>
                    <td>
                        <a href="#moreEmployeeModal" class="more_issue" data-toggle="modal" title="Info : <?= $customers->id ?> : <?= $customers->problem_id ?>" style="color: red; font-weight: bolder;">DETAILS</a>
                    </td>
                    <td>
                        <div style="background: <?= $customers->color ?>; width: 16px; height: 16px; border-radius: 50%; margin: auto" title="<?= $customers->status ?>"></div>
                    </td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit : <?= $customers->id ?>">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons material-delete" data-toggle="tooltip" title="Delete : <?= $customers->id ?>">&#xE872;</i></a>
                    </td>
                </tr>

            <?php }?>

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
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('Customers/ticket_add') ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Add Ticket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Order</label>
                        <input type="text" name="order_number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Order Status</label>
                        <select name="order_status" id="order_status" class="form-control">
                            <option value="0">Select Country</option>
                            <?php foreach ($all_order_statuses as $order_status) { ?>
                                <option value="<?= $order_status->id ?>"><?= $order_status->code ?> - <?= $order_status->status_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <select name="country" id="country" class="form-control">
                            <option value="0">Select Country</option>
                            <?php foreach ($all_countries as $countries) { ?>
                                <option value="<?= $countries->id ?>"><?= $countries->country_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Module</label>
                        <select name="module" id="module" class="form-control">
                            <option value="0">Select Module</option>
                            <?php foreach ($all_modules as $modules) { ?>
                                <option value="<?= $modules->id ?>"><?= $modules->module_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Module Version</label>
                        <select name="module_version" id="module_version" class="form-control">
                            <option value="0">Select Module Version</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Source Shop</label>
                        <select name="source_shop" id="source_shop" class="form-control">
                            <option value="0">Select Source</option>
                            <?php foreach ($all_shops as $shops) { ?>
                                <option value="<?= $shops->id ?>"><?= $shops->shop_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Source Shop Version</label>
                        <select name="source_shop_version" id="source_shop_version" class="form-control">
                            <option value="0">Select Source Version</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Target Shop</label>
                        <select name="target_shop" id="target_shop" class="form-control">
                            <option value="0">Select Target</option>
                            <?php foreach ($all_shops as $shops) { ?>
                                <option value="<?= $shops->id ?>"><?= $shops->shop_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Target Shop Version</label>
                        <select name="target_shop_version" id="target_shop_version" class="form-control">
                            <option value="0">Select Target Version</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Issue</label>
                        <select name="issue" id="issue" class="form-control">
                            <option value="0">Select Issue</option>
                            <?php foreach ($all_issues as $issues) { ?>
                                <option value="<?= $issues->id ?>"><?= $issues->problem_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Select Status</option>
                            <?php foreach ($all_statuses as $statuses) { ?>
                                <option value="<?= $statuses->id ?>"><?= $statuses->status ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" name="ticket_submit">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Edit Ticket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="module_delete_form" action="<?= base_url('Customers/ticket_delete/') ?>" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Ticket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete" name="ticket_delete">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Show Modal HTML -->
<div id="moreEmployeeModal" class="modal fade">
    <div class="modal-dialog modal-lg" style="width: 95%; height: 95%;">
        <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">More info about issue</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
<!--                CART INFO  -->
                <div class="modal-body issue-info" style="width: 28%; display: inline-block; border-right: 1px solid #e5e5e5">
                </div>
<!--                ISSUE INFO-->
                <div class="modal-body issue-info2" style="width: 70%; display: inline-block; position:  absolute; top: 60px; height: 300px; overflow-y: scroll">
                    <div id="exactissue">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 150px;">Main Issue</th>
                                    <th style="width: 250px;">Problems</th>
                                    <th>Solutions</th>
                                    <th style="width: 94px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form name="ajax_add_issue" class="ajax_add_issue" method="POST" style="border-top: 1px solid #e5e5e5">
                    <div class="modal-body">
    <!--                    ADDING CHILD ISSUE-->
                        <div id="forform">
                            <div class="form-group">
                                <label>Main Issue</label>
                                <select name="ajax_main_issue" id="issue" class="form-control">
                                    <option value="0">Select Main Issue</option>
                                    <?php foreach ($all_issues as $issues) { ?>
                                        <option value="<?= $issues->id ?>"><?= $issues->problem_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Problem</label>
                                <textarea type="text" name="ajax_problem" class="form-control" required style="resize: none"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Solution</label>
                                <textarea rows="5" cols="50" type="text" name="ajax_solution" class="form-control" required style="resize: none"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <input data-backdrop="static" type="submit" class="btn btn-danger" value="Save" name="ajax_problem_submit">
                    </div>
                </form>
                <div class="modal-footer">
                    <input type="button" class="btn btn-success" data-dismiss="modal" value="OK">
<!--                    <input type="submit" class="btn btn-danger" value="Save" name="ticket_save">-->
                </div>
        </div>
    </div>
</div>
</body>
<script>var base_url = '<?= base_url('/Customers/ticket_') ?>';</script>
<script>var base_url2 = '<?= base_url('/Customers/') ?>';</script>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
</html>