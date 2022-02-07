<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="py-16 px-8">
      <strong><h1 class="text-center">Submitted data</h1></strong>
      <br>
        <table>
          <thead>
            <tr>
              <th>NAME</th>
              <th>COLOR</th>
            </tr>
          </thead>
          <tbody>
            @foreach($submittedData as $data)
            <tr>
              <td>{{$data->name}}</td>
              <td>{{$data->color}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <br><br>
      <footer>Thanks,<br>
      {{config('app.name')}}      
      </footer>
    </body>
</html>