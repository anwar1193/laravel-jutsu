<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <style>
        #emp{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #emp td, #emp th{
            border: 1px solid #ddd;
            padding: 8px;
        }

        #emp tr:nth-child(even){
            background-color: aqua;
        }

        #emp th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: aquamarine;
            color: #000;
        }
    </style>
</head>
<body>
    <h3>Report PDF</h3>

    <table id="emp">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Agama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->emp_name }}</td>
                    <td>{{ $row->emp_religion }}</td>
                    <td>{{ $row->emp_gender }}</td>
                    <td>{{ date('d-m-Y', strtotime($row->emp_birthdate)) }}</td>
                    <td>{{ $row['emp_adress'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>