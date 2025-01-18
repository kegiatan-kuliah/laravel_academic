<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report</title>
  <style>
    table {
      width: 100%;
    }
    table, td {
      border: 1px solid;
    }
  </style>
</head>
<body>
    <h1 style="text-align:center;">Grade Report</h1>
    <table>
      <thead>
        <tr>
          <td>No</td>
          <td>Grade</td>
          <td>Student</td>
          <td>Room</td>
        </tr>
      </thead>
      <tbody>
        @foreach($grades as $grade)
          <tr>
            <td>{{ $grade->grade }}</td>
            <td>{{ $grade->student->name }}</td>
            <td>{{ $grade->room->class_id }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
</body>
</html>