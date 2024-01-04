<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Date Filters</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</head>

<body>

    <div class="container">
        <h1 class="text-center text-danger pt-4">Date Filters</h1>
        <hr>

        <div class="row py-2 d-flex">
            <div class="col-lg-4">
                <h2>List of Empoyees</h3>
            </div>

            <div class="col-lg-4">
                <div class="form-group" style="width: 250px">
                    <label for="date_filter">Filter by Date:</label>
                    <form action="{{ route('dateFilterRange') }}" method="get">
                        <div class="input-group">
                            <select class="form-select" name="date_filter" id="">
                                <option value="">All Dates</option>
                                <option value="today" {{ $dateFilter == 'today' ? 'selected' : '' }}>Today</option>
                                <option value="yesterday" {{ $dateFilter == 'yesterday' ? 'selected' : '' }}>Yesterday
                                </option>
                                <option value="this_week" {{ $dateFilter == 'this_week' ? 'selected' : '' }}>This Week
                                </option>
                                <option value="last_week" {{ $dateFilter == 'last_week' ? 'selected' : '' }}>Last Week
                                </option>
                                <option value="this_month" {{ $dateFilter == 'this_month' ? 'selected' : '' }}>This
                                    Month</option>
                                <option value="last_month" {{ $dateFilter == 'last_month' ? 'selected' : '' }}>Last
                                    Month</option>
                                <option value="this_year" {{ $dateFilter == 'this_year' ? 'selected' : '' }}>This Year
                                </option>
                                <option value="last_year" {{ $dateFilter == 'last_year' ? 'selected' : '' }}>Last Year
                                </option>
                            </select>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-lg-4 col-12">
                <div class="form-group" style="width: 250px">
                    <form action="{{ route('dateFilterRange') }}" method="get" class="d-flex gap-1">
                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">End Date</label>
                            <input type="date" name="end_date" value="{{ old('end_date') }}" class="form-control" required>
                        </div>
                       <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Filter</button>
                       </div>
                    </form>
                </div>
            </div>
        </div>

        <hr>

        <table class="display" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Position</th>
                    <th>Gender</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date Created</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($employees as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->first_name }}</td>
                        <td>{{ $row->last_name }}</td>
                        <td>{{ $row->position }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>
