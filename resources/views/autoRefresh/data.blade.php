<table border="1" width="80%">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Agama</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
    </tr>

    @foreach ($employee as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->emp_name }}</td>
            <td>{{ $item->emp_religion }}</td>
            <td>{{ $item->emp_gender }}</td>
            <td>{{ $item->emp_birthdate }}</td>
            <td>{{ $item->emp_adress }}</td>
        </tr>
    @endforeach 
</table>