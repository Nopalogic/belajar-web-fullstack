<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <table border="1" cellpadding="10">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Jurusan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $index => $student)
      <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $student->nama }}</td>
        <td>{{ $student->nim }}</td>
        <td>{{ $student->jurusan }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>