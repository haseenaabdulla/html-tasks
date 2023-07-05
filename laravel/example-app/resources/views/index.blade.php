<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="card">
            <h1>STUDENT LIST</h1>
        </div>
        <div class="row">
            <div class="col mt-5">
                <div class="icon col-2">
                    <a href="{{url('/create')}}" class="btn btn-success">ADD STUDENTS</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">R.no</th>
                            <th scope="col">full Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Email</th>
                            <th scope="col">Branch</th>
                            <th scope="col">Hostel</th>
                            <th scope="col">Additional subjects</th>
                            <th scope="col">Address</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$student-> id}}</td>
                            <td>{{$student->first_name.' '.$student->last_name}}</td>
                            <td>{{$student->mobile_number}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->branch_select}}</td>
                            <td>{{$student->hostel}}</td>
                            <td>

                            </td>
                            <td>{{$student->permanent_address}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{url('/edit/'.$student->id)}}">Edit
                                </a>
                                <a class="btn btn-primary btn-sm" href="{{url('/show/'.$student->id)}}">View
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{url('/delete/'.$student->id )}}" onclick="return confirm('Are you sure to delete?');">Delete
                                </a>
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