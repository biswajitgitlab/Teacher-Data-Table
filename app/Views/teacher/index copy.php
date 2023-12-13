<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?> </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
     

     
</head>

<body>

    <div class="container mt-3">
        <h3><?php echo $title; ?></h3>


        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Add New Teacher
        </button>
        <div class="row">
            <div class="col-md-12" id="table_data">

                <table class="table table-bordered"  border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Number</th>
                            <th>Teacher Class</th>
                            <th>Student's Id</th>
                            <th>Images</th>
                            <th>States</th>
                            <th>District</th>
                            <th>Cities</th>
                            <th>Action</th>
                                                                                                      
                       </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Teacher</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" id="teacher_add_form" name="teacher_add_form" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Number</label>
                            <input type="tel" class="form-control" id="number" name="number" required>
                        </div>
                        <div class="mb-3">
                            <label for="teacher_class" class="form-label">Teacher Class</label>
                            <select class="form-select" id="teacher_class" name="teacher_class" required>
                                <option value="" selected disabled>Select Teacher Class</option>
                                <option value="classA">Class A</option>
                                <option value="classB">Class B</option>
                                <option value="classC">Class C</option>
                            </select>
                        </div>
                        <div class="mb-3">

                            <label for="image" class="form-label">Teacher Image</label>

                            <input type="file" name="image" class="form-control" id="image" required>
                        </div>

                        <div class="mb-3">
                            <label for="student_id" class="form-label">Select a Student</label>
                            <select name="student_id" id="student_id" class="form-select" required>
                                <option value="" selected disabled>Select a student</option>
                                <?php foreach ($students as $student): ?>
                                <option value="<?= $student['id'] ?>"><?= $student['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- For State -->
                        <div class="mb-3">
                            <label for="state_id" class="form-label">Select a State</label>
                            <select name="state_id" id="state_id" class="form-select" onchange="fetch_data(this.value)" required>
                            <option value="" selected disabled>Select a State</option>
                            <?php foreach ($states as $state): ?>
                            <option value="<?= $state['id']; ?>"><?= $state['name']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- For District -->
                        <div class="mb-3">
                        <label for="district_id" class="form-label">Select a District</label>
                            <select name="district_id" id="district_id" class="form-select" onchange="catch_data(this.value)" required>
                            <option value="" selected >Select Yours District</option>
                           
                            
                           
                        </select>
                        </div>
                        <!-- For Cities -->
                        <div class="mb-3">
                                <label for="cities_id" class="form-label">Select a City</label>
                                <select name="cities_id" id="cities_id" class="form-select" required>
                                <option value="" selected disabled>Select a City</option>                               
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

    <div class="modal" id="my_edit_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header for edit-->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Teacher</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body for edit -->
                <div class="modal-body">
                    <form method="post" id="teacher_edit_form" name="teacher_edit_form" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name_edit" name="name_edit" required>
                        </div>
                        <div class="mb-3">
                            <label for="email_edit" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email_edit" name="email_edit" required>
                        </div>
                        <div class="mb-3">
                            <label for="address_edit" class="form-label">Address</label>
                            <textarea class="form-control" id="address_edit" name="address_edit" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Number</label>
                            <input type="tel" class="form-control" id="number_edit" name="number_edit" required>
                        </div>
                        <div class="mb-3">
                            <label for="teacher_class" class="form-label">Teacher Class</label>
                            <select class="form-select" id="teacher_class_edit" name="teacher_class_edit" required>
                                <option value="" selected disabled>Select Teacher Class</option>
                                <option value="classA">Class A</option>
                                <option value="classB">Class B</option>
                                <option value="classC">Class C</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="student_edit_id" class="form-label">Select a Student</label>
                            <select name="student_edit_id" id="student_edit_id" class="form-select" required>
                                <option value="" selected disabled>Select a student</option>
                                <?php foreach ($students as $student): ?>
                                <option value="<?= $student['id'] ?>"><?= $student['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>



                        <!-- For Image Edit -->
                        <div>
                            <label for="image_edit">Current Image:</label>
                            <img id="current_image_edit" height="50px" width="50px" alt="Current Image"
                                style="max-width: 200px;">
                        </div>
                        <div class="mb-3">
                            <label for="image_edit" class="form-label">Teacher Image</label>
                            <input type="file" name="image_edit" class="form-control" id="image_edit" required>
                        </div>

                         <!-- For State_edit -->
                <div class="mb-3">
                            <label for="state_edit_id" class="form-label">Select a State</label>
                            <select name="state_edit_id" id="state_edit_id" class="form-select" onchange="fetch_data(this.value)" required>
                            <option value="" selected disabled>Select a State</option>
                            <?php foreach ($states as $state): ?>
                            <option value="<?= $state['id']; ?>"><?= $state['name']; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- For District_edit -->
                        <div class="mb-3">
                        <label for="district_edit_id" class="form-label">Select a District</label>
                            <select name="district_edit_id" id="district_edit_id" class="form-select" onchange="catch_data(this.value)" required>
                            <option value="" selected >Select Yours District</option>
                           
                            
                           
                        </select>
                        </div>
                        <!-- For Cities_edit -->
                        <div class="mb-3">
                                <label for="cities_edit_id" class="form-label">Select a City</label>
                                <select name="cities_edit_id" id="cities_edit_id" class="form-select" required>
                                <option value="" selected disabled>Select a City</option>                               
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://kit.fontawesome.com/745a5fedc5.js" crossorigin="anonymous"></script>
    
    <script>
         function showToast(type, message) {
        // Use Toastr library to display a notification
        toastr[type](message);
    }

    $(document).ready(function() {
        // Intercept the form submission
        $("#teacher_add_form").submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

           
            // Get form data
            //var formData = $("#teacher_add_form").serialize();
            var formData = new FormData(this);

            // AJAX request
            $.ajax({
                type: "POST", // Change to "GET" if your server supports GET requests
                url: "<?php echo base_url('teacher/add') ?>", // Replace with your server endpoint
                data: formData,

                processData: false, // Important! Don't process the data
                contentType: false, // Important! Don't set contentType

                success: function(response) {
                    var jsonObj = JSON.parse(response);
                    

                    // Handle the success response
                    if (jsonObj.status == 'Success') {
                        //1. hide modal when response == success,
                        //2. reset a form 

                        //showNotification();

                        $('#myModal').modal('hide');
                        $('#teacher_add_form')[0].reset();
                        

                        get_table_data();
                        showToast('success', 'Teacher added successfully');
                        //showNotification();
                    }
                    else{
                        alert(jsonObj.msg.image);
                    }
           

                    console.log("Success:", response);
                },
                error: function(error) {
                    // Handle the error response
                    console.log("Error:", error);
                    //alert(response);
                    //alert("Error:", error);
                }
            });
        });





        //edit submit
        $("#teacher_edit_form").submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();


            // Get form data
            // var formData = $("#teacher_edit_form");
            var formData = new FormData(this);
            //   console.log();
            // AJAX request
            $.ajax({
                type: "POST", // Change to "GET" if your server supports GET requests
                url: "<?php echo base_url('teacher/update') ?>", // Replace with your server endpoint
                data: formData,
                processData: false, // Important! Don't process the data
                contentType: false,
                success: function(response) {
                    var jsonObj = JSON.parse(response);

                    // Handle the success response
                    if (jsonObj.status == 'Success') {
                        //1. hide modal when response == success,
                        //2. reset a form 


                        $('#my_edit_modal').modal('hide');
                        $('#teacher_edit_form')[0].reset();

                        get_table_data();
                        showToast('success', 'Teacher updated successfully');
                    }

                    console.log("Success:", response);
                },
                error: function(error) {
                    // Handle the error response
                    console.log("Error:", error);
                }
            });
        });
    });



    function get_table_data() {
        $.ajax({
            url: "<?php echo base_url('teacher/pado') ?>",
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                // var jsonObj = JSON.parse(response);
                //console.log(response.data);
                var data = response.data;
                let tableHTML = '';
                for (let i = 0; i < data.length; i++) {
                    const person = data[i];
                    //console.log(person);

                    // Add a table row with person information
                    tableHTML += `
                            <tr>
                                <td>${person.id}</td>
                                <td>${person.name}</td>
                                <td>${person.email}</td>
                                <td>${person.address}</td>
                                <td>${person.number}</td>
                                <td>${person.teacher_class}</td>
                                <td>${person.student_id}</td>
                                <td><img src="uploads/` + person.image + `" height="150px"; width= "85px"; ></td>
                                <td>${person.state_id}</td>
                                <td>${person.district_id}</td>
                                <td>${person.city_id}</td>
                                <td>
                                <button type="button" class="btn btn-outline-success"  onclick ="btnEdit(` + person.id + `)" ><i class="fa-solid fa-pen-to-square fa-beat"></i></button>
                                <button type="button" class="btn btn-outline-danger"  onclick ="btnDelete(` +
                        person.id + `)"><i class="fa-solid fa-trash fa-beat" style="color: #f50505;"></i></button>
                                </td>
                                
                            </tr>
                        `;
                }

                // Set the HTML content of the table body
                tableBody.innerHTML = tableHTML;

            },
            error: function() {
                console.error('Error in AJAX request');
            }
        });

    }

    $(document).ready(function() {
        get_table_data();
    });

    function btnEdit(id) {
        //alert(id);

        $.ajax({
            url: "<?php echo base_url('teacher/pado-single') ?>",
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                // var jsonObj = JSON.parse(response);
                //console.log(response.data);
                var data = response.data;
                //console.log(data);
                var res = data[0];
                //console.log(res);
                $('#id').val(res.id);
                $('#name_edit').val(res.name);
                $('#email_edit').val(res.email);
                $('#number_edit').val(res.number);
                $('#teacher_class_edit').val(res.teacher_class);
                $('#address_edit').val(res.address);
                $('#student_edit_id').val(res.student_id);
                $('#district_id').val(res.district_id);
                $('#state_id').val(res.state_id);
                $('#cities_id').val(res.cities_id);

                //$('#image_edit').val(res.image);

                if (res.image) {
                    // Construct the image path based on your application's structure
                    var imagePath = "<?php echo base_url('uploads/') ?>" + res.image;

                    // Set the constructed image path to the src attribute of the <img> tag
                    $('#current_image_edit').attr('src', imagePath).show();
                }

                // Clear the file input field to allow selecting a new image
                //$('#image_edit').val('');



                $("#my_edit_modal").modal('show');

            },
            error: function() {
                console.error('Error in AJAX request');
            }
        });

    }

     
    //     get_table_data();
    // });
    

    function btnDelete(id) {
         $("#deleteConfirmationModal").modal("show");
    // Show a confirmation dialog
   $('#deleteModal').click(function(){

   
        $.ajax({
            url: "<?php echo base_url('teacher/delete') ?>",
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                // Log the AJAX response
                console.log("AJAX Success:", response);

                // Handle the success response
                if (response.status == 'Success') {
                    // Reload the table data after successful deletion
                    get_table_data();
                    showToast('success', 'Teacher deleted successfully');
                    $("#deleteConfirmationModal").modal("hide");
                } else {
                    console.log("Deletion failed:", response.msg);
                }
            },
            error: function(error) {
                // Log AJAX errors
                console.log("AJAX Error:", error);

                // Handle the error response
                console.log("Error occurred during deletion");
            }
        });
   })
}

    function fetch_data(stateid){
        //alert(stateid);
        $.ajax({
                type: "POST", // Change to "GET" if your server supports GET requests
                url: "<?php echo base_url('state') ?>", // 
                data: {
                    sid: stateid
                },
                
                success: function(result) {
                    let data=JSON.parse(result);
                    let output="<option value=''>Select District</option>";
                   // 
                    for(let row in data){
                        output+=`<option value="${data[row].id}">${data[row].name}</option>`;
                    }
                    document.querySelector("#district_id").innerHTML=output;
                    document.querySelector("#district_edit_id").innerHTML=output;
                    //console.log(data);
                }
    
        });
            };


            function catch_data(distid){
        //alert(distid);
        $.ajax({
                type: "POST", // Change to "GET" if your server supports GET requests
                url: "<?php echo base_url("city") ?>", // 
                data: {
                    cid: distid
                },
                
                success: function(result) {
                    let data=JSON.parse(result);
                    let output="<option value=''>Select City</option>"
                   // 
                    for(let row in data){
                        output+=`<option value="${data[row].id}">${data[row].name}</option>`;
                    }
                    document.querySelector("#cities_id").innerHTML=output;
                    document.querySelector("#cities_edit_id").innerHTML=output;
                    //console.log(data);
                }
    
        });
            };

        
  
     
    
    </script>

<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="deleteModal">Delete</button>
      </div>
    </div>
  </div>
</div>

</body>

</html>