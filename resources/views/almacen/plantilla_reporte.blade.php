<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Reporte generado</title>
  </head>
  <body>
    <style type="text/css" media="screen">
      h1, h2, h3, h4, h5, h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
      }

      .header{
          border-bottom-style: solid;
          border-bottom-color: #A9ADCC;
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

      .row {
        display: -ms-flexbox;
        display: inline-flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
      }
    </style>
    <div class="header" style="text-align: center;">
      <div class="row" style="height: 7%;">
        <div style="margin-left: 75%;">
          <p style="font-size: 13px;font-weight: bold; margin:0; padding:0;">Fecha: {{$fecha}}</p>
          <p style="font-size: 13px; font-weight: bold;">Hora: {{$hora}}</p>
        </div>
        <h4 style="word-wrap: break-word; width: 50%; margin-left: 24%; padding:10px; ">{{$mensaje}}</h4>
      </div>
    </div>
  </body>
</html>