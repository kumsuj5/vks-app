<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
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

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/student', $student->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card p-5 mt-5">
                <div class="text-center mb-5">
                    <h1>Edit Student</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="form-label">Name</label>
                        <input name="name" class="form-control" value="{{ old('name', $student->name) }}">
                    </div>
                    <div class="col-lg-4">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input name="email" class="form-control" id="exampleInputEmail1" value="{{ old('email', $student->email) }}">
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">Mobile</label>
                        <input name="mobile" class="form-control" value="{{ old('mobile', $student->mobile) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="form-label">Institute</label>
                        <input name="institute" class="form-control" value="{{ old('institute', $student->institute) }}">
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">State</label>
                        <input name="state" class="form-control" value="{{ old('state', $student->state) }}">
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">District</label>
                        <input name="district" class="form-control" value="{{ old('district', $student->district) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label class="form-label">Address</label>
                        <input name="address" class="form-control" value="{{ old('address', $student->address) }}">
                    </div>
                </div>  
                <div class="col-lg-12">
                    <label class="form-label">Branches</label>
                    <select class="form-select" aria-label="Default select example" name="branch_id" required>
                        <option selected disabled>Open this select menu</option>
                        @foreach ($branches as $item)
                            <option value="{{ $item->id }}" {{ $student->branch_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
