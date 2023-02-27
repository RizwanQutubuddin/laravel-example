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
                <button type="button" class="btn btn-danger" id="undoAllSelectedCheckbox">
                    Undo Selected
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
                                <input type="button" value="Undo" id="{{$student->id}}" name='deleteStudentUndo' class="btn btn-success" />
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
                        <h2>Do you really want to UNDO this record?</h2>
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

            $("input[name='deleteStudentUndo']").click(function() {
                $("#deleteModal").modal('toggle');
                $("input[name='idDelete']").val(this.id);
            });

            $("#studentDeleteForm").submit(function(e) {
                e.preventDefault();
                let id = $("input[name='idDelete']").val();
                $.ajax({
                    url: '/student-deleted-undo/' + id,
                    type: "GET",
                    data: {
                        _token: $('input[name="_token"]').val()
                    },
                    success: function(response) {
                        $("#tableRowId_" + id).remove();
                        $("#deleteModal").modal('toggle');
                    },error: function(err) {
                        console.log(err);
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

            $("#undoAllSelectedCheckbox").click(function(){
                let selecteCheckedBox=[];
                $('input[name="studentChbox"]:checked').each(function(){
                    selecteCheckedBox.push($(this).prop('value'));
                });
                $.ajax({
                    url:'{{route("undoDeletedCheckBoxStudents")}}',
                    type:'post',
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
            });
        });
    </script>
</body>

</html>