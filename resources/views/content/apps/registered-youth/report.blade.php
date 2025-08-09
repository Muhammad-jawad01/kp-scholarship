<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report | KP Youth Affairs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        th
        {
            font-size: 12px;
            font-weight: bold;
        }
        td
        {
            font-size: 10px;
        }
    </style>
</head>
<body>
    <h5 class="text-center font-weight-bold display-5">KP Youth Affairs</h5>
    <p class="text.center display-6 text-lead text-center">Registered Youth Report</p>
    <p class="text-lead mb-1">Total Registered Youth: {{count($register_youth)}}</p>
    <table class="table table-border w-100 table-sm">
        <thead> 
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Religion</th>
            <th>Disability Status</th>
            <th>Email</th>
            <th>Phone</th>
            <th>District</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($register_youth as $youth)
               <tr>
                    <td>{{$youth->id}}</td>
                    <td>{{$youth->name}}</td>
                    <td>{{$youth->gender}}</td>
                    <td>{{$youth->religion}}</td>
                    <td>{{$youth->disability_status}}</td>
                    <td>{{$youth->email}}</td>
                    <td>{{$youth->mobile_no}}</td>
                    <td>{{$youth->district}}</td>
               </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>