                                 
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/

var exten = ["Dirección Secretaría, 1003","Dirección Secretaría , 2020","Bienes Inmuebles Deparartamento , 1009","Bienes inmuebles Secretaría, 1088","Bienes Inmuebles Area Común, 1089","Unidad de Genero, 1114","Unidad de Transparencia, 1027","Organo Interno de Control, 1108", "Organo interno de control Secretaria, 1107",
  "Órgano Interno de Control Área Común, 1102", "Subdirección Juridica, 1023, 1021, 1097", "Consultuvo Departamento, 1124","Consultivo Secretaria, 1096", "Abogados Departamento consultivo, 1095","Contencioso Departamneto, 1115", "Contencioso Secretaria, 1098","Abogados Departamento Contencioso, 1122","Subdireción Administrativa,1018",
"Subdirección Administrativa Secretaría, 1019","Subdirección Administrativa Analista, 1087","organización y métodos, 1103","servicio Medico, 1037", "Recursos Humanos Departamento, 1013", "Recursos Humanos Secretaría, 1048", "Oficina de Nomina, 1052","Personal Oficina, 1050","Recuros Humanos Área Común, 1049", "Protección Civil, 1072", "Servicios Generales Departamento, 1014",
"Servicios Generales Secretaría, 1004","Servicios Generales Analista, 1016", "Servicios Generales Área Común, 1016", "´Pagos, 1015","Mantenimiento Taller, 1047","Mantenimiento Bodega, 1137", "vigilantes Caseta, 1131","Módulo de Información, 1112", "Intendecia, 1133", "Oficialía de Partes, 1093","Copias, 1092","Adquisiciones e Inventarios Departamento, 1025", "Compras, 1056","Licitaciones, 1054","Almacén, 1057",
"Activo Fijo, 1123", "Sala De Licitaciones, 1109","Tecnologias de la Información Departamento, 1017","Tecnologias de la Información Secretaría, 1082", "Oficina de infrestructura y asistencia tecnica, 1083","Soporte Técnico, 1080, 1081","Gobierno Electronico Oficina, 1085","Gobierno Electronico Secretaría, 1084","Subdirección de Prestaciones Institucionales, 1012","Subdirección de Prestaciones Institucionales Secretaría, 1011, 1039","Vigencia de Derechos, 1032",
"Vigencia de Derechos Secretaría, 1033", "Seguridad Social Oficina, 1034","Seguridad Social Secretaría, 1111","Módulo de Revista de Supervivencia NIP, 1029","Transparencia de Vigencia y Subd de prestaciones, 1064","Programa de Defunciones del Registro Civil IMSS, 1118","Módulo de Vigencia de Derechos (Tramite de Ventanilla), 1074","Vigencia de Derechos - Información, 1119","ISR, 1031", "Control de Beneficios, 1030, 1038","Nomina de Penionados, 1106","Archivo de Pensionado, 1042","Archivo de Pensionados en Trámite, 1043",
"Archivo de Afiliación, 1086","Registro y Control de Cotizantes Oficina, 1078","Registro y Control de Cotizantes Secretario, 1079","Registro y Control de Cotizantes Área Común, 1094","Prestaciones Económicas Departamento, 1117","Prestaciones Económicas Secretaría, 1028","Préstamos, 1044, 1045","Banco de Datos Departamento, 1078", "Banco de Datos Secretaría, 1077","Oficina de Activos, 1099", "Subdirección de Finanzas, 1022", "Subdirección de Finanzas Secretaría, 1020","Contabilidad y Presupuesto Departamento, 1070","Contabilidad y Presupuesto Secrearía, 1071",
"Contabilidad General Oficina, 1071", "Contabilidad de Impuestos, 1071","Control Presupuestal Encargado de Oficina 1067","Coordinadora de Equipo, 1069","contabilidad de Audeudo Oficina, 1060","Control de Adeudos Coordinadora, 1101", "Control de Adeudos, 1066","Atención a Público, 1065","Archivo de Préstamos, 1042","Recursos Financieros Departamento, 1058", "Recursos Financieros Secretaría, 1061, 1062","Ingresos Oficina, 1068", "Ingresos Secrearía, 1068", "Pago a Pensionados Cambio, 1059, 1116", "Tesorería, 1041", "Bancos e Inversiones, 1110", "STIPE, 1104", "SUIPE, 1026"];

/*initiate the autocomplete function on the "myInput" element, and pass along the exten array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), exten);

