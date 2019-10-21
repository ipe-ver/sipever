<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reporte generado</title>
  </head>
  <body>
    <style type="text/css" media="screen">
      .header{
        border-bottom-style: solid;
        border-bottom-color: #A9ADCC;
        padding: 12px;
    }
    .table {
      width: 100%;
      margin-bottom: 1rem;
      background-color: transparent;
    }

    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }

    .table thead th {
      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6;
    }

    .table tbody + tbody {
      border-top: 2px solid #dee2e6;
    }

    .table .table {
      background-color: #fff;
    }

    .pull-right{
      margin-left: 75%;
      margin-right: 0;
    }

    </style>
    <div class="header" style="text-align: center;">
      <h3 style="word-wrap: break-word;">{{$mensaje}}</h3>
      <div class="pull-right">
        <p>Fecha: {{$fecha}}</p>
        <p>Hora: {{$hora}}</p>
      </div>
    </div>
  </body>
</html>