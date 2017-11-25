function menu()
    {
      var estilo = document.getElementById("sectionMenu").className;    
      if (estilo == "hidden")
      {
        document.getElementById("sectionMenu").className = "show"; 
        document.getElementById("original").className = "hidden";
        document.getElementById("sectionAreaDeClientes").className = "hidden";
        document.getElementById("ventanaServicios").className = "hidden";
        document.getElementById("sectionContactanos").className = "hidden";

      }
      else 
      {
        document.getElementById("sectionMenu").className = "hidden";
        document.getElementById("original").className = "show"; 
    
      }
    }


function clientes()
    {
      var estilo = document.getElementById("sectionAreaDeClientes").className;    
      if (estilo == "hidden")
      {
        document.getElementById("sectionAreaDeClientes").className = "show"; 
        document.getElementById("original").className = "hidden";
        document.getElementById("sectionMenu").className = "hidden";
        document.getElementById("ventanaServicios").className = "hidden";
        document.getElementById("sectionContactanos").className = "hidden";
        

      }
      else 
      {
        document.getElementById("sectionAreaDeClientes").className = "hidden";
        document.getElementById("original").className = "show"; 
    
      }
    }




function servicios()
    {
      var estilo = document.getElementById("ventanaServicios").className;	   
      if (estilo == "hidden")
      {
    		document.getElementById("ventanaServicios").className = "show"; 
    		document.getElementById("original").className = "hidden";
        document.getElementById("sectionMenu").className = "hidden";
        document.getElementById("sectionAreaDeClientes").className = "hidden";
        document.getElementById("sectionContactanos").className = "hidden";

      }
      else 
      {
        document.getElementById("ventanaServicios").className = "hidden";
        document.getElementById("original").className = "show"; 
		
      }
    }
 


function contacto()
    {
      var estilo = document.getElementById("sectionContactanos").className;    
      if (estilo == "hidden")
      {
        document.getElementById("sectionContactanos").className = "show"; 
        document.getElementById("original").className = "hidden";
        document.getElementById("sectionMenu").className = "hidden";
        document.getElementById("sectionAreaDeClientes").className = "hidden";
        document.getElementById("ventanaServicios").className = "hidden";

      }
      else 
      {
        document.getElementById("sectionContactanos").className = "hidden";
        document.getElementById("original").className = "show"; 
    
      }
    }

/******************************NAV PARA LOS OTROS MENU QUE NO SEA EL INDEX*******************************************/
function menu2()
    {
      var estilo = document.getElementById("navMenuOtro").className;    
      if (estilo == "hidden")
      {
        document.getElementById("navMenuOtro").className = "show"; 
        document.getElementById("loginmodalMenuOtro").className = "hidden";

      }
      else 
      {
        document.getElementById("navMenuOtro").className = "hidden";

      }
    }



function clientes2()
    {
      var estilo = document.getElementById("loginmodalMenuOtro").className;    
      if (estilo == "hidden")
      {
        document.getElementById("loginmodalMenuOtro").className = "show"; 
        document.getElementById("navMenuOtro").className = "hidden";

      }
      else 
      {
        document.getElementById("loginmodalMenuOtro").className = "hidden";

      }
    }

/************************************Menu Telefonos en Mi Cuentas*******************************************/

    function menuOpciones()
    {
      var estilo = document.getElementById("menuMiCuenta").className;    
      if (estilo == "hidden2")
      {
        document.getElementById("menuMiCuenta").className = "show2";        

      }
      else 
      {
        document.getElementById("menuMiCuenta").className = "hidden2";

      }
    }




/************************************SOLICITAR SERVICIOS Y SERVICIOS SOLICITADOS Mi Cuentas*******************************************/




function solicitarServ()
{
  var estilo = document.getElementById("solicitud").className;
  if (estilo == "hidden")
      {
        document.getElementById("solicitud").className = "show";
        document.getElementById("solicitados").className = "hidden";   
      }
      else 
      {
        document.getElementById("solicitud").className = "hidden";
      }
}


function servSolicitados()
{
  var estilo = document.getElementById("solicitados").className;
  if (estilo == "hidden")
      {
        document.getElementById("solicitados").className = "show";
        document.getElementById("solicitud").className = "hidden";
      }
      else 
      {
        document.getElementById("solicitados").className = "hidden";
      }
}



/************************************Cambiar PAssword (editarPerfil.php)*******************************************/



function verPassword()
{
  var estilo = document.getElementById("passwords").className;
  if (estilo == "hidden")
      {
        document.getElementById("passwords").className = "show";   
      }
      else 
      {
        document.getElementById("passwords").className = "hidden";
      }
}



/************************************PAGAR FACTURAS (ver hisorial)*******************************************/



function verHistorial()
{
  var estilo = document.getElementById("historiales").className;
  if (estilo == "hidden")
      {
        document.getElementById("historiales").className = "show";     
      }
      else 
      {
        document.getElementById("historiales").className = "hidden";
      }
}



