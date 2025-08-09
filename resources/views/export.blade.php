<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Father Name</th>
            <th>Marital Status</th>
            <th>Nic</th>
            <th>Phone</th>
            <th>Nationality</th>
            <th>Domicile</th>
            <th>Tehsil</th>
            <th>University</th>
            <th>Age</th>
            <th>Religion</th>
            <th>Degree</th>
            <th>Campus</th>
            <th>Discipline</th>
            <th>Reg_no</th>
            <th>program_duration</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->father_name }}</td>
                <td>{{ $data->marital_status }}</td>
                <td>{{ $data->nic }}</td>
                <td>{{ $data->mobile_no }}</td>
                <td>{{ $data->nationality }}</td>
                <td>{{ $data->domicile }}</td>
                <td>{{ $data->tehsil }}</td>
                <td>{{ $data->university_name }}</td>
                <td>{{ $data->age }}</td>
                <td>{{ $data->religion }}</td>
                <td>{{ $data->degree }}</td>
                <td>{{ $data->campus }}</td>
                <td>{{ $data->discipline }}</td>
                <td>{{ $data->university_reg_no }}</td>
                {{-- <td>{{ $data->university_id }}</td> --}}
                <td>{{ $data->program_duration }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
