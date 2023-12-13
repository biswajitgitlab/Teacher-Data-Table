<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Quiz </title>
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
            Add New Exam
        </button>
        <div class="row">
            <div class="col-md-12" id="table_data">

                <table class="table table-bordered table-striped" id="ttable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Exam Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Form inside the modal -->
                    <form method="post" id="exam_add_form" name="exam_add_form">


                        <!-- Exam ID Field -->
                        <div class="mb-3">
                            <label for="exam_id" class="form-label">Select a Exam</label>
                            <select name="exam_id" id="exam_id" class="form-select" required>
                                <option value="" selected disabled>Select a exam</option>
                                <?php foreach ($quizlist as $exam): ?>
                                <option value="<?= $exam['quiz_id'] ?>"><?= $exam['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Status Field -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select class="form-select" id="status" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Modal Footer with Submit Button -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal" id="my_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header for edit-->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Exam</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body for edit -->
                <div class="modal-body">
                    <form method="post" id="exam_edit_form" name="exam_edit_form">
                        <input type="hidden" name="id" id="id">
                        <!-- Exam ID Field -->
                        <div class="mb-3">
                            <label for="exam_id_edit" class="form-label">Select a Exam</label>
                            <select name="exam_id_edit" id="exam_id_edit" class="form-select" required>
                                <option value="" selected disabled>Select a exam</option>
                                <?php foreach ($quizlist as $exam): ?>
                                <option value="<?= $exam['quiz_id'] ?>"><?= $exam['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Status Field -->
                        <div class="mb-3">
                            <label for="status_edit" class="form-label">Status:</label>
                            <select class="form-select" id="status_edit" name="status_edit">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.4.0/js/dataTables.dateTime.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    <script>
    function showToast(type, message) {
        // Use Toastr library to display a notification
        toastr[type](message);
    }

    $(document).ready(function() {
        $("#exam_add_form").submit(function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('add') ?>",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var jsonObj = JSON.parse(response);
                    if (jsonObj.status == 'Success') {
                        $('#myModal').modal('hide');
                        $('#exam_add_form')[0].reset();
                        get_table_data();
                        showToast('success', 'Exam added successfully');
                        var tables = $('#ttable').DataTable();
                        tables.ajax.reload(); // or table.draw();

                    }
                    console.log("Success:", response);
                },
                error: function(error) {
                    console.log("Error:", error);
                }
            });
        });
    });

    $("#exam_edit_form").submit(function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('lms/update') ?>",
            data: formData,
            processData: false,
            contentType: false,

            success: function(response) {

                if (response.status == 'Success') {
                    $('#my_edit_modal').modal('hide');
                    $('#exam_edit_form')[0].reset();
                    get_table_data();
                    showToast('success', 'Exam updated successfully');
                    var tablee = $('#ttable').DataTable();
                    tablee.ajax.reload(); // or table.draw();

                }
                console.log("Success:", response);
            },
            error: function(error) {
                console.log("Error:", error);
            }
        });
    });



    function get_table_data() {
        $('#ttable').DataTable({
            processing: true,
            serverSide: true,
            "bDestroy": true,
            orderCellsTop: true,
            ajax: '<?= base_url('exam') ?>',
            columnDefs: [{
                orderable: false,
                searchable: false,
                targets: [3]
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
                    "data": function(data) {

                        return `<td class="text-right py-0 align-middle">
                        <button type="button" class="btn btn-outline-success"  onclick ="btnEdit(${data[0]})" >Edit</button>
                               
                            </td>`
                    }
                }
            ],
        })
    }

    $(document).ready(function() {
        get_table_data();
    });

    function btnEdit(id) {
        //alert(id);

        $.ajax({
            url: "<?php echo base_url('lms/edit') ?>",
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                var data = response.data;
                var res = data[0];
                console.log(res)
                $('#id').val(res.id);
                $('#exam_id_edit').val(res.exam_id);
                $('#status_edit').val(res.status);

                $("#my_edit_modal").modal('show');
            },
            error: function() {
                console.error('Error in AJAX request');
            }
        });

    }
    </script>

</body>

</html>