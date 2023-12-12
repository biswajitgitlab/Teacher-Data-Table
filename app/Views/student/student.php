<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CodeIgniter 4</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<div class="container mt-5">
    <h2>Student Information</h2>

    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#studentModal">
        Add Student
    </button>

    <table class="table" id="studentTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Number</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $student) : ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['name'] ?></td>
                <td><?= $student['email'] ?></td>
                <td><?= $student['address'] ?></td>
                <td><?= $student['number'] ?></td>
                <td>
                    <a href="#" class="btn btn-info btn-sm" onclick="editStudent(<?= $student['id'] ?>)">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="deleteStudent(<?= $student['id'] ?>)">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="studentModalLabel">Student Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="studentForm">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Number</label>
                        <input type="text" class="form-control" name="number" id="number" placeholder="Enter Your Phone" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSave" onclick="saveStudent()">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-bBqV2H0BZ65SLlI5rZJ5vO51y3dH5ZgZ5SFuJMZAdKb6YbwL/2wxsLWgcViU/VFi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('#studentTable').DataTable();
    });

    function saveStudent() {
        var formData = $('#studentForm').serialize();
        $.ajax({
            type: 'POST',
            url: '/student/store',
            data: formData,
            success: function (response) {
                location.reload();
            }
        });
    }

    function editStudent(id) {
        $.ajax({
            type: 'GET',
            url: '/student/edit/' + id,
            success: function (response) {
                var student = response.student;
                $('#id').val(student.id);
                $('#name').val(student.name);
                $('#email').val(student.email);
                $('#number').val(student.number);
                $('#address').val(student.address);

                $('#studentModal').modal('show');
            }
        });
    }

    function deleteStudent(id) {
        if (confirm('Are you sure?')) {
            $.ajax({
                type: 'GET',
                url: '/students/delete/' + id,
                success: function (response) {
                    location.reload();
                }
            });
        }
    }
</script>

</body>
</html>
