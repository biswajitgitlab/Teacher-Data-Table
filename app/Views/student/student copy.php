
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>codeigniter 4</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
<body>
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="studentModalLabel">Student Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="form-group">
            <label for="Name"></label><span id="error_name" class="text-danger ms-3"></span>
            <input type="text" class="form-control name" placeholder="Enter Full Name">
        </div>
        <div class="form-group">
            <label for="Name"></label><span id="error_email" class="text-danger ms-3">
            <input type="text" class="form-control email" placeholder="Enter Email">
        </div>
     
        <div class="form-group">
            <label for="Address"></label><span id="error_address" class="text-danger ms-3">
            <input type="text" class="form-control address" placeholder="Enter Address">
        </div>
        <div class="form-group">
            <label for="Number"></label><span id="error_phone" class="text-danger ms-3">
            <input type="text" class="form-control number" placeholder="Enter Your Phone">
        </div>

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary a-save" id="btnSave">Save</button>
      </div>
    </div>
  </div>
</div>


                


<div class="container">
    <div class="row">
        <div class="col-md-12 my-4">
        <h3 class="tex-center">Student Table</h3>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student-Data-Table
                        <a href="#" data-bs-toggle="modal" data-bs-target="#studentModal" class="btn btn-success float-end"> Add Student</a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>

    
    
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

 
<script type="javascript">

$(document).ready(function(){
    $(document).on('click','.a-save', function(){
        alert('added');
    
        

       
            $.ajax({
                method:"POST",
                url:"/student/student"
                data:data;
                success: function(response){
                    $('#studentModal').modal('hide');
                    $('#studentModal').find('input').val('');
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(response.status);


                }
            });
        });
    });





  </script>
 
    <!-- Bootstrap modal -->
    
  <!-- End Bootstrap modal -->
  </body>
</html>