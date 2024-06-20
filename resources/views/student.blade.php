<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <form action="{{url('/')}}/student" method="post">
            @csrf
            <div class="card p-5 mt-5">
                <div class="text-center mb-5">
                    <h1>Student from</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="form-label">Name</label>
                        <input name="name" class="form-control" value="{{ old('name') }}">
                   <span class="text-danger">
                    @error('name')
                    {{$message}}
                    @enderror
                   </span>
                    </div>
                    <div class="col-lg-4">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email') }}">
                        <span class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                           </span>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">Mobile</label>
                        <input name="mobile" class="form-control" value="{{ old('mobile') }}">
                        <span class="text-danger">
                            @error('mobile')
                            {{$message}}
                            @enderror
                           </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="form-label">Institute</label>
                        <input name="institute" class="form-control" value="{{ old('institute') }}">
                        <span class="text-danger">
                            @error('institute')
                            {{$message}}
                            @enderror
                           </span>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">State</label>
                        <input name="state" class="form-control" value="{{ old('state') }}">
                        <span class="text-danger">
                            @error('state')
                            {{$message}}
                            @enderror
                           </span>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">District</label>
                        <input name="district" class="form-control" value="{{ old('district') }}">
                        <span class="text-danger">
                            @error('district')
                            {{$message}}
                            @enderror
                           </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label class="form-label">Address</label>
                        <input name="address" class="form-control" value="{{ old('address') }}">
                        <span class="text-danger">
                            @error('address')
                            {{$message}}
                            @enderror
                           </span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-lg-12 mt-5">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Institute</th>
                            <th>State</th>
                            <th>District</th>
                            <th>Address</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student as $index=> $student)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->mobile }}</td>
                                <td>{{ $student->institute }}</td>
                                <td>{{ $student->state }}</td>
                                <td>{{ $student->district }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->created_at }}</td>
                                <td>
                                    <a href="{{ url('/student/edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ url('/student', ['id' => $student->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>



<!-- resources/views/students/index.blade.php -->

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Students List</h1>
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createStudentModal">Add Student</button>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Institute</th>
                        <th>State</th>
                        <th>District</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="studentsTableBody">
                    @foreach($students as $student)
                        <tr id="studentRow{{ $student->id }}">
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->mobile }}</td>
                            <td>{{ $student->institute }}</td>
                            <td>{{ $student->state }}</td>
                            <td>{{ $student->district }}</td>
                            <td>{{ $student->address }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm edit-btn" data-id="{{ $student->id }}" data-bs-toggle="modal" data-bs-target="#editStudentModal">Edit</button>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $student->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Create Student Modal -->
        <div class="modal fade" id="createStudentModal" tabindex="-1" aria-labelledby="createStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createStudentModalLabel">Add Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createStudentForm">
                            @csrf
                            <div class="mb-3">
                                <label for="createName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="createName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="createEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="createEmail" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="createMobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="createMobile" name="mobile" required>
                            </div>
                            <div class="mb-3">
                                <label for="createInstitute" class="form-label">Institute</label>
                                <input type="text" class="form-control" id="createInstitute" name="institute" required>
                            </div>
                            <div class="mb-3">
                                <label for="createState" class="form-label">State</label>
                                <input type="text" class="form-control" id="createState" name="state" required>
                            </div>
                            <div class="mb-3">
                                <label for="createDistrict" class="form-label">District</label>
                                <input type="text" class="form-control" id="createDistrict" name="district" required>
                            </div>
                            <div class="mb-3">
                                <label for="createAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="createAddress" name="address" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Student Modal -->
        <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editStudentForm">
                            @csrf
                            @method('PUT')
                            <input type="hidden" id="editStudentId" name="id">
                            <div class="mb-3">
                                <label for="editName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="editName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="editEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="editEmail" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="editMobile" class="form-label">Mobile</label>
                                <input type="text" class="form-control" id="editMobile" name="mobile" required>
                            </div>
                            <div class="mb-3">
                                <label for="editInstitute" class="form-label">Institute</label>
                                <input type="text" class="form-control" id="editInstitute" name="institute" required>
                            </div>
                            <div class="mb-3">
                                <label for="editState" class="form-label">State</label>
                                <input type="text" class="form-control" id="editState" name="state" required>
                            </div>
                            <div class="mb-3">
                                <label for="editDistrict" class="form-label">District</label>
                                <input type="text" class="form-control" id="editDistrict" name="district" required>
                            </div>
                            <div class="mb-3">
                                <label for="editAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="editAddress" name="address" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Handle create student form submission
            $('#createStudentForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '{{ route("students.store") }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.success);
                        location.reload();
                    },
                    error: function(response) {
                        alert('Error occurred. Please try again.');
                    }
                });
            });

            // Handle edit button click
            $('.edit-btn').on('click', function() {
                let id = $(this).data('id');
                $.ajax({
                    url: '/students/' + id + '/edit',
                    method: 'GET',
                    success: function(response) {
                        $('#editStudentId').val(response.id);
                        $('#editName').val(response.name);
                        $('#editEmail').val(response.email);
                        $('#editMobile').val(response.mobile);
                        $('#editInstitute').val(response.institute);
                        $('#editState').val(response.state);
                        $('#editDistrict').val(response.district);
                        $('#editAddress').val(response.address);
                    }
                });
            });

            // Handle edit student form submission
            $('#editStudentForm').on('submit', function(e) {
                e.preventDefault();
                let id = $('#editStudentId').val();
                $.ajax({
                    url: '/students/' + id,
                    method: 'PUT',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.success);
                        location.reload();
                    },
                    error: function(response) {
                        alert('Error occurred. Please try again.');
                    }
                });
            });

            // Handle delete button click
            $('.delete-btn').on('click', function() {
                if(confirm('Are you sure you want to delete this student?')) {
                    let id = $(this).data('id');
                    $.ajax({
                        url: '/students/' + id,
                        method: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert(response.success);
                            location.reload();
                        },
                        error: function(response) {
                            alert('Error occurred. Please try again.');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html> --}}
