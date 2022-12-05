<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>{{config('app.name')}} - {{$title}} </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel='stylesheet' href='https://unicons.iconscout.com/release/v3.0.6/css/line.css'>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  @vite(['resources/css/dashboard.css','resources/js/app.js'])
</head>
<body>
<!-- partial:index.partial.html -->
    <x-dashboard.aside></x-dashboard.aside>

<section id="wrapper">
    <x-dashboard.navbar></x-dashboard.navbar>

  <div class="p-4">
        {{$slot}}
  </div>
</section>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script>
    let dateTime = new Date()
    const fecha = `${dateTime.getFullYear()}-${(dateTime.getMonth() + 1)}-${dateTime.getDate()}`
    dateTime = fecha + ` ${dateTime.getHours()}:${dateTime.getMinutes()}:${dateTime.getSeconds()}`
                
    let formularios = document.forms
    for (let index = 0; index < formularios.length; index++) {
        let newInput = document.createElement("input")
        newInput.type = 'hidden'
        newInput.name = 'fecha_cliente'
        newInput.value = dateTime
        const form = formularios[index];
        form.appendChild(newInput);
    }
</script>
</body>
</html>
