<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
    <table class="table">
        <tr>
            <th>Pangkat</th>
            <th>Status</th>
            <th>Avatar</th>
            <th>Name</th>
            <th>E-Mail</th>
            <th>NRP</th>
            <th>Password</th>
        </tr>
        @foreach($user as $account)
        <tr>
            <td>{{ $account->pangkat }}</td>
            <td>{{ $account->name }}</td>
            <td>{{ $account->email }}</td>
            <td>{{ $account->nrp }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>