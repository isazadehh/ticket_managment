$(document).ready(function() {

    $( "#moreEmployeeModal" ).submit(function( event ) {
        event.preventDefault();
    });

// set module id to the modal action URL on click   FOR DELETE
// $('.material-delete').attr('data-original-title');


$('.material-delete').click(function () {
    //set base URL to default
    var base_action_delete_url = base_url + 'delete/';
    $('.module_delete_form').attr('action', base_action_delete_url);

    //set module ID to action URL
    var exact_id_arr = $(this).attr('data-original-title').split(' ');
    var action_url = $('.module_delete_form').attr('action') + exact_id_arr[2];
    $('.module_delete_form').attr('action', action_url);

});


// set module id to the modal action URL on click   FOR UPDATE
// $('.material-delete').attr('data-original-title');
$('.material-update').click(function () {
    //set base URL to default
    var base_action_delete_url = base_url + 'update/';
    $('.module_update_form').attr('action', base_action_delete_url);

    //set module ID to action URL and data to form
    var exact_id_arr = $(this).attr('data-original-title').split(' ');
    var action_url = $('.module_update_form').attr('action') + exact_id_arr[2];
    $('.module_update_form').attr('action', action_url);

    var module_name = $(this).parents().eq(2).find('td:nth-child(2)').text();
    var module_code = $(this).parents().eq(2).find('td:nth-child(3)').text();
    var problem_name = $(this).parents().eq(2).find('td:nth-child(2)').text();
    var problem_trick = $(this).parents().eq(2).find('td:nth-child(3)').text();

    $('.module_update_form').find("input[name='module_name']").val(module_name);
    $('.module_update_form').find("input[name='module_code']").val(module_code);
    $('.module_update_form').find("input[name='country_name']").val(module_name);
    $('.module_update_form').find("input[name='country_code']").val(module_code);
    $('.module_update_form').find("input[name='status_name']").val(module_name);
    $('.module_update_form').find("input[name='status_code']").val(module_code);
    $('.module_update_form').find("input[name='problem_name']").val(problem_name);
    $('.module_update_form').find("textarea[name='problem_trick']").val(problem_trick);
    $('.module_update_form').find("input[name='shop_name']").val(module_name);
    $('.module_update_form').find("input[name='shop_code']").val(module_code);

});


    $('select[name="source_shop"]').on('change', function() {
        var  source_shop_id = $(this).val();
        if( source_shop_id) {
            $.ajax({
                url: base_url2 + 'shop_version/' + source_shop_id,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    if(data.length == 0){
                        $('select[name="source_shop_version"]').empty();
                        $('select[name="source_shop_version"]').append('<option value="0">There is not any version</option>');
                    }else{
                        $('select[name="source_shop_version"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="source_shop_version"]').append('<option value="'+ value.id +'">'+ value.shop_version +'</option>');
                        });
                    }
                }
            });
        }else{
            $('select[name="source_shop_version"]').empty();
        }
    });

    $('select[name="target_shop"]').on('change', function() {
        var  source_shop_id = $(this).val();
        if( source_shop_id) {
            $.ajax({
                url: base_url2 + 'shop_version/' + source_shop_id,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    if(data.length == 0){
                        $('select[name="target_shop_version"]').empty();
                        $('select[name="target_shop_version"]').append('<option value="0">There is not any version</option>');
                    }else{
                        $('select[name="target_shop_version"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="target_shop_version"]').append('<option value="'+ value.id +'">'+ value.shop_version +'</option>');
                        });
                    }
                }
            });
        }else{
            $('select[name="target_shop_version"]').empty();
        }
    });

    $('select[name="module"]').on('change', function() {
        var  source_shop_id = $(this).val();
        if( source_shop_id) {
            $.ajax({
                url: base_url2 + 'module_version/' + source_shop_id,
                type: "GET",
                dataType: "json",
                success:function(data) {
                    if(data.length == 0){
                        $('select[name="module_version"]').empty();
                        $('select[name="module_version"]').append('<option value="0">There is not any version</option>');
                    }else{
                        $('select[name="module_version"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="module_version"]').append('<option value="'+ value.id +'">'+ value.module_version +'</option>');
                        });
                    }
                }
            });
        }else{
            $('select[name="module_version"]').empty();
        }
    });

    $('.more_issue').click(function () {
        var exact_id_arr = $(this).attr('title').split(' ');
        if(exact_id_arr[2]){
            // GET ONE TICKET DATA
            $.ajax({
                url: base_url2 + 'get_one_ticket/' + exact_id_arr[2],
                type: 'POST',
                dataType: 'json',
                async: false,
                success:function(data){
                    // console.log(data);
                    $.each(data, function(key, value) {
                        $('#moreEmployeeModal').find('.issue-info').empty();
                        $('#moreEmployeeModal').find('.issue-info2').find('tbody').empty();
                        $('#moreEmployeeModal').find('.issue-info').append('<h6><span style="font-weight: bolder" class="ticket_id" title='+value.id+'>Order ID : </span><span>'+ value.order_id +'</span></h6>');
                        $('#moreEmployeeModal').find('.issue-info').append('<h6><span style="font-weight: bolder">Order Status : </span><span>'+ value.status_name +'</span></h6>');
                        $('#moreEmployeeModal').find('.issue-info').append('<h6><span style="font-weight: bolder">Country : </span><span>'+ value.country_name +'</span></h6>');
                        $('#moreEmployeeModal').find('.issue-info').append('<h6><span style="font-weight: bolder">Module : </span><span>'+ value.module_name +'</span></h6>');
                        $('#moreEmployeeModal').find('.issue-info').append('<h6><span style="font-weight: bolder">Module Version : </span><span>'+ value.module_version +'</span></h6>');
                        $('#moreEmployeeModal').find('.issue-info').append('<h6><span style="font-weight: bolder">Source Shop : </span><span>'+ value.source_shop_name +'</span></h6>');
                        $('#moreEmployeeModal').find('.issue-info').append('<h6><span style="font-weight: bolder">Source Version : </span><span>'+ value.source_shop_version +'</span></h6>');
                        $('#moreEmployeeModal').find('.issue-info').append('<h6><span style="font-weight: bolder">Target Shop : </span><span>'+ value.target_shop_name +'</span></h6>');
                        $('#moreEmployeeModal').find('.issue-info').append('<h6><span style="font-weight: bolder">Target Version : </span><span>'+ value.target_shop_version +'</span></h6>');
                        $('#moreEmployeeModal').find('.issue-info').append('<h6 style="color: red;">First Issue - <span>'+ value.problem_name +'</span></h6>');
                        $('#moreEmployeeModal').find('.issue-info').append('<h6 style="color: ' +value.color+ '">Process - <span>'+ value.color +'</span></h6>');
                    });
                }
            });
            // GET ONE TICKET ISSUE
            $.ajax({
                url: base_url2 + 'get_one_ticket_issue/' + exact_id_arr[2],
                type: 'POST',
                dataType: 'json',
                success:function(data){
                    // console.log(data.length);
                    if(data.length == 0){
                        $('#moreEmployeeModal').find('.issue-info2').find('tbody').append('<tr><td>No main -</td><td>sub problem and</td><td>solution</td></tr>');
                    }else{
                        // console.log(data);
                        $.each(data, function(key, value) {
                            $('#moreEmployeeModal').find('.issue-info2').find('tbody').append('<tr>' +
                                '<td>'+value.problem_name+'</td>' +
                                '<td>'+value.problem+'</td>' +
                                '<td>'+value.solution+'</td>' +
                                '<td>' +
                                '<a href="#" class="edit"><i class="material-icons" title="Edit : ">&#xE254;</i></a>' +
                                '<a href="#" class="delete"><i class="material-icons material-delete" title="Delete : ">&#xE872;</i></a></td>' +
                                '</tr>');
                        });
                    }
                }
            });
        }
    })

    $('input[name="ajax_problem_submit"]').click(function(){
        var ticket_id = $('.ticket_id').attr('title');
        var main_issue_id = $('select[name="ajax_main_issue"]').val();
        var ajax_problem = $('textarea[name="ajax_problem"]').val();
        var ajax_solution = $('textarea[name="ajax_solution"]').val();

        $.ajax({
            url: base_url2 + 'add_sub_issue_to_ticket',
            method:'POST',
            dataType: 'json',
            data:{
                ticket_id:ticket_id,
                main_issue_id:main_issue_id,
                ajax_problem:ajax_problem,
                ajax_solution:ajax_solution
            },
            success:function(data){
                // console.log(data)
                if(data.length != 0){
                    $('form[name="ajax_add_issue"]').trigger('reset');
                    $.each(data, function(key, value) {
                        $('#moreEmployeeModal').find('.issue-info2').find('tbody').append('<tr>' +
                            '<td>'+value.problem_name+'</td>' +
                            '<td>'+value.problem+'</td>' +
                            '<td>'+value.solution+'</td>' +
                            '<td>' +
                            '<a href="#" class="edit"><i class="material-icons" title="Edit : ">&#xE254;</i></a>' +
                            '<a href="#" class="delete"><i class="material-icons material-delete" title="Delete : ">&#xE872;</i></a>' +
                            '</td>' +
                            '</tr>');
                    });
                }
            }
        });
    })
});
