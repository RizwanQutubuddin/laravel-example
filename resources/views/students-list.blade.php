<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Students List</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add new Record
                </button>
                <button type="button" class="btn btn-danger" id="deleteAllSelectedCheckbox">
                    Delete Selected
                </button>
                <table id="studentTable" class="table">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" value="all" name="allStudentChbox" />All</th>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach($students as $student)
                        <tr id="tableRowId_{{$student->id}}">
                            <td><input type="checkbox" value="{{$student->id}}" name="studentChbox" /></td>
                            <td>{{$i+=1}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td>
                            <td>
                                <input type="button" value="Edit" id="{{$student->id}}" name='editStudent' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" />
                                <input type="button" value="Delete" id="{{$student->id}}" name='deleteStudent' class="btn btn-danger" />
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- The Add Modal -->
    <div class="modal" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="studentForm">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Student Details</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone">
                            @error('phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add New</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- The edit Modal -->
    <div class="modal" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="studentEditForm">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Student Details</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="idEdit" />
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="nameEdit">
                            @error('nameEdit')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="emailEdit">
                            @error('emailEdit')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phoneEdit">
                            @error('phoneEdit')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- The edit Modal -->
    <div class="modal" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="studentDeleteForm">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="idDelete" />
                        <h2>Do you really want to delete this record?</h2>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Yes,Sure</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#studentForm").submit(function(e) {
                e.preventDefault();

                let name = $('input[name="name"]').val();
                let email = $('input[name="email"]').val();
                let phone = $('input[name="phone"]').val();
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{route('student.add')}}",
                    type: "POST",
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        _token: _token
                    },
                    success: function(response) {
                        $("#studentTable tbody").prepend("<tr><td><input type='checkbox' value='"+ response.id +"' name='studentChbox' /></td><td>" + response.id + "</td><td>" + response.name + "</td><td>" + response.email + "</td><td>" + response.phone + "</td><td><input type='button' value=\"Edit\" id='" + response.id + "' name='editStudent' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editModal'/><input type = 'button' value = 'Delete' id = " + response.id + " name = 'deleteStudent' class = 'btn btn-danger' / > </td></tr>");
                        $("#addModal").modal('hide');
                        $("#studentForm")[0].reset();
                    },
                    error: function(err) {
                        console.log(err);
                    }

                });
            });

            $("input[name='editStudent']").click(function() {
                editStudent(this.id);
            });

            function editStudent(id) {
                $.get('/get-student/' + id, function(student) {
                    console.log(student);
                    $("input[name='idEdit']").val(student.id);
                    $("input[name='nameEdit']").val(student.name);
                    $("input[name='emailEdit']").val(student.email);
                    $("input[name='phoneEdit']").val(student.phone);
                });
            }

            $("#studentEditForm").submit(function(e) {
                e.preventDefault();
                let id = $("input[name='idEdit']").val();
                let name = $('input[name="nameEdit"]').val();
                let email = $('input[name="emailEdit"]').val();
                let phone = $('input[name="phoneEdit"]').val();
                let _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{route('updateStudentById')}}",
                    type: "PUT",
                    data: {
                        id: id,
                        name: name,
                        email: email,
                        phone: phone,
                        _token: _token
                    },
                    success: function(response) {

                        $("#tableRowId_" + response.id + " td:nth-child(2)").text(response.name);
                        $("#tableRowId_" + response.id + " td:nth-child(3)").text(response.email);
                        $("#tableRowId_" + response.id + " td:nth-child(4)").text(response.phone);
                        $("#editModal").modal('toggle');
                        $("#studentEditForm")[0].reset();
                    }
                });
            });

            $("input[name='deleteStudent']").click(function() {
                $("#deleteModal").modal('toggle');
                $("input[name='idDelete']").val(this.id);
            });

            $("#studentDeleteForm").submit(function(e) {
                e.preventDefault();
                let id = $("input[name='idDelete']").val();
                $.ajax({
                    url: '/student/' + id,
                    type: "DELETE",
                    data: {
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(response) {
                        $("#tableRowId_" + id).remove();
                        $("#deleteModal").modal('toggle');
                    }
                });
            });

            $('input[name="allStudentChbox"]')[0].addEventListener("change", function(e) {
                $('input[name="studentChbox"]').prop('checked', $(this).prop('checked'));
            });

            $('input[name="studentChbox"]').change(function(e) {
                if (!this.checked) {
                    $('input[name="allStudentChbox"]')[0].checked = false;
                } else {
                    let cb = true;
                    $('input[name="studentChbox"]').each(function() {
                        if (!$(this).prop('checked')) {
                            cb = false;
                        }
                    })

                    if (cb)
                        $('input[name="allStudentChbox"]')[0].checked = true;
                }
            });

            $("#deleteAllSelectedCheckbox").click(function(){
                let selecteCheckedBox=[];
                $('input[name="studentChbox"]:checked').each(function(){
                    selecteCheckedBox.push($(this).prop('value'));
                });
                $.ajax({
                    url:'{{route("deleteSelectedStudent")}}',
                    type:'DELETE',
                    data:{
                        ids:selecteCheckedBox,
                        _token:$('input[name="_token"]').val()
                    },
                    success:function(response){
                        $.each(selecteCheckedBox,function(key,val){
                            $("#tableRowId_"+val).remove();
                        })
                    }
                })
                console.log(selecteCheckedBox);
            });
        });
    </script>
</body>

</html>