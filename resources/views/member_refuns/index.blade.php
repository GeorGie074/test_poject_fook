<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Admin_refuns</h2>
            </div>
            <div>
                <a href="{{ route('member_refuns.create') }}" class="btn btn-success">+ Add</a>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No.</th>
                    <th>Phone_no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Current_point</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach($member_refuns as $member_refuns)
                    <tr>
                        <td>{{ $member_refuns->id }}</td>
                        <td>{{ $member_refuns->phone_no }}</td>
                        <td>{{ $member_refuns->name }}</td>
                        <td>{{ $member_refuns->email }}</td>
                        <td>{{ $member_refuns->level }}</td>
                        <td>{{ $member_refuns->current_points }}</td>
                        <td>
                            <form action="{{ route('member_refuns.destroy', $member_refuns->id) }}" method="POST">
                                <a href="{{ route('member_refuns.edit', $member_refuns->id) }}" class="btn btn-warning">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{-- {!! $member_refuns->links('pagination::bootstrap-5') !!} --}}
        </div>
    </div>

</body>
</html>