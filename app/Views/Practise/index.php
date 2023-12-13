<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.1/css/fixedColumns.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.4.0/css/dataTables.dateTime.min.css">
</head>
<body>
<div class="container mt-3">
       


        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Add New Data
        </button>
        <div class="row">
            <div class="col-md-12" id="table_data">
            <div class="card">
  
    <div class="card-body">
    <table class="table table-bordered table-striped" id="ptable" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        
                                                                                                      
                       </tr>
                    </thead>
                    <!-- <tbody id="tableBody">
                    </tbody> -->
                </table>


    </div> 

  </div>

             
            </div>
        </div>
    </div>

<div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" id="new_add_form" name="new_add_form" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname">
                        </div>

                        <!-- Last name -->
                        <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname">
                        </div>
                        <!-- Image -->
                        <div class="mb-3">
                        <label for="image" class="form-label">Image </label>
                        <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Edit -->

    <div class="modal" id="my_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Data</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" id="new_add_form_edit" name="new_add_form_edit" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="fname_edit" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname_edit" name="fname_edit">
                        </div>

                        <!-- Last name -->
                        <div class="mb-3">
                        <label for="lname_edit" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname_edit" name="lname_edit">
                        </div>
                        <!-- Image -->
                        <div class="mb-3">
                        <label for="image_edit" class="form-label">Image </label>
                        <input type="file" class="form-control" id="image_edit" name="image_edit">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#new_add_form").submit(function(event) {
             event.preventDefault();
            var formData= new FormData(this);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('add/add') ?>",
                data: formData,
                contentType: false,
                processData: false,

                success: function(response){
                    var jsonObj = JSON.parse(response);
                    if (jsonObj.status == 'Success') {
                        $('#myModal').modal('hide');
                        $('#new_add_form')[0].reset();
                        show_table_data();
                       var tables = $('#ptable').DataTable();
                       tables.ajax.reload();


                    }
                    console.log("Success:", response);

                },
                error: function(error){
                    console.log("Error:", error);
                }

            });

         });
        });

        function btnEdit(id) {
        //alert(id);
        $.ajax({
            url: "<?php echo base_url('edit/edit') ?>",
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                var data = response.data;
                var res = data[0];
                $('#id').val(res.id);
                 $('#fname_edit').val(res.fname);
                $('#lname_edit').val(res.lname);
                $('#my_edit_modal').modal('show');
               
                if (res.image) {
                    var imagePath = "<?php echo base_url('uploads/') ?>" + res.image;
                    $('#current_image_edit').attr('src', imagePath).show();
                  
                
                }

               
            },
            error: function() {
                console.error('Error in AJAX request');
            }
        });

    }

         $("#new_add_form_edit").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('update/update') ?>",
                data: formData,
                processData: false, 
                contentType: false,
                success: function(response) {
                    var jsonObj = JSON.parse(response);
                    console.log(response)
                   
                    if (jsonObj.status == 'Success') {
                        $('#my_edit_modal').modal('hide');
                        $('#new_add_form_edit')[0].reset();
                         show_table_data();
                        var tablee = $('#ptable').DataTable();
                     tablee.ajax.reload();
                    }
                    console.log("Success:", response);
                },
                error: function(error) {
                    console.log("Error:", error);
                }
            });
        });
    
// $(document).ready(function() {
//         show_table_data();
//     });
function show_table_data() {
        $('#ptable').DataTable({
            processing: true,
            serverSide: true,
            orderCellsTop: true,
            "bDestroy": true,
            ajax: '<?= base_url('practise') ?>',
            columnDefs: [{
                orderable: false,
                searchable: false,
                targets: [4]
            }],
            columns: [{
                    'data': function(data) {
                        return data[0]
                    }
                },
                {
                    'data': function(data) {
                        return data[1]
                    }
                },
                {
                    'data': function(data) {
                        return data[2]
                    }
                },
                {
                    'data': function(data) {
                        return `<td><img src="uploads/${data[3]}" alt="${data[3]}" height="50" width="50"></td>`
                    }
                },
                {
                    "data": function(data) {

                        return `<td class="text-right py-0 align-middle">
                        <button type="button" class="btn btn-outline-success"  onclick ="btnEdit(${data[0]})" >Edit</button>
                                <button type="button" class="btn btn-outline-danger"  onclick ="btnDelete(${data[0]})">Delete</button>
                            </td>`
                    }
                }
            ],
        });
       

    }
    $(document).ready(function() {
        show_table_data();
    });



  
    function btnDelete(id) {
    // Show a confirmation dialog
    $.ajax({
            url: "<?php echo base_url('delete') ?>",
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                console.log("AJAX Success:", response);
                if (response.status == 'Success') {
                    show_table_data();
                   
                } else {
                    console.log("Deletion failed:", response.msg);
                }
            },
            error: function(error) {
                // Log AJAX errors
                console.log("AJAX Error:", error);
                console.log("Error occurred during deletion");
            }
        });
   };



</script>


</body>

</html>