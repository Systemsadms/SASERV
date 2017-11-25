// JavaScript Document


function crearTicket()
    {
      var estilo = document.getElementById("crearServicio").className;
      if (estilo == "hidden")
      {
      document.getElementById("crearServicio").className = "show";	
      }
      else 
      {
        document.getElementById("crearServicio").className = "hidden"; 		
      }
    }




/******************************************************************************************/


function AsignarTicket()
    {
      var estilo = document.getElementById("asignar").className;

      if (estilo == "hidden")
      {
      document.getElementById("asignar").className = "show";
      document.getElementById("facturar").className = "hidden";
      document.getElementById("cerrar").className = "hidden";  
      }
      else 
      {
        document.getElementById("asignar").className = "hidden";
      }
    }



function Facturar()
    {
      var estilo = document.getElementById("facturar").className;

      if (estilo == "hidden")
      {
      document.getElementById("facturar").className = "show";
      document.getElementById("asignar").className = "hidden";
      document.getElementById("cerrar").className = "hidden";   
      }
      else 
      {
        document.getElementById("facturar").className = "hidden";
      }
    }



function EliminarTicket()
    {
      var estilo = document.getElementById("cerrar").className;

      if (estilo == "hidden")
      {
      document.getElementById("cerrar").className = "show";
      document.getElementById("facturar").className = "hidden";
      document.getElementById("asignar").className = "hidden";   

      }
      else 
      {
        document.getElementById("cerrar").className = "hidden";
      }
    }





  function registrar()
    {
      var estilo = document.getElementById("nuevoRegistro").className;

      if (estilo == "hidden")
      {
      document.getElementById("nuevoRegistro").className = "show";
      }
      else 
      {
        document.getElementById("nuevoRegistro").className = "hidden";
      }
    }





  function Asignar()
    {
      var estilo = document.getElementById("reportarPago").className;

      if (estilo == "hidden")
      {
      document.getElementById("reportarPago").className = "show";
      }
      else 
      {
        document.getElementById("reportarPago").className = "hidden";
      }
    }