@php use App\Models\Month;use App\Models\Year; @endphp
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>


<div class="container">


    <h5 class="my-5"></h5>

    <div class="row">
        <form action="set-vacation" method="post">
            @csrf

            <div class="row">

                <div class="col">
                    <label>Year</label>

                    @php $year = Year::all() @endphp
                    @php $month = Month::all() @endphp
                    <select name="year" class="form-control my-2" type="text" value="">

                        <option value=" ">Select Year</option>
                        @foreach($year as $data)
                            <option value="{{$data->title}} ">{{$data->title}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col">
                    <label>Month</label>
                    <select name="month" class="form-control my-2" type="text" value="">
                        <option value=" ">Select Month</option>
                        @foreach($month as $data)
                            <option value="{{$data->title}} ">{{$data->title}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col">
                    <label>Vacation Day</label>
                    <input name="vacation_day" class="form-control my-2" type="text" value="">
                </div>

                <div class="col">
                    <label>Resumption Day</label>
                    <input name="resumption_day" class="form-control my-2" type="text" value="">
                </div>
            </div>


            <button type="submit" class="btn btn-success">Update</button>


        </form>
    </div>

    <hr class="my-3">


    <div class="mt-4">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif


        <table class="table responsive">


            <thead>

            <tr>

                <th>Year</th>
                <th>Month</th>
                <th>Vacation Day</th>
                <th>Resumption Day</th>
                <th>Action</th>


            </tr>

            </thead>

            <tbody id="myTable">

            @foreach($vacations as $user)

                <tr>


                    <td>

                        {{$user->session}}


                    </td>


                    <td>

                        {{$user->month}}

                    </td>

                    <td>

                        {{$user->vacation_day}}

                    </td>

                    <td>
                        {{$user->resumption_day}}
                    </td>


                    <td>
                        <div class="col-lg-12">
                            <form method="POST" action="/public/delete-vacation?id={{ $data->id }}">
                                @csrf
                                @method('POST')

                                <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                            </form>
                        </div>
                    </td>


                </tr>

            @endforeach

            </tbody>

        </table>

    </div>


</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#myInput").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>


</html>