function menu()
    {
      var estilo = document.getElementById("sectionMenu").className;    
      if (estilo == "hidden")
      {
        document.getElementById("sectionMenu").className = "show"; 
        //document.getElementById("original").className = "show";
        document.getElementById("loginmodal").className = "hidden";
        document.getElementById("ventanaServicios").className = "hidden";
        document.getElementById("sectionContactanos").className = "hidden";

      }
      else 
      {
        document.getElementById("sectionMenu").className = "hidden";
        document.getElementById("textoDelSection").className = "show";
        //document.getElementById("original").className = "show"; 
    
      }
    }


function clientes()
    {
      var estilo = document.getElementById("loginmodal").className;    
      if (estilo == "hidden")
      {
        document.getElementById("loginmodal").className = "show"; 
        //document.getElementById("original").className = "hidden";
        document.getElementById("sectionMenu").className = "hidden";
        document.getElementById("ventanaServicios").className = "hidden";
        document.getElementById("sectionContactanos").className = "hidden";
        

      }
      else 
      {
        document.getElementById("loginmodal").className = "hidden";
        document.getElementById("textoDelSection").className = "show";
        //document.getElementById("original").className = "show"; 
    
      }
    }




function servicios()
    {
      var estilo = document.getElementById("ventanaServicios").className;	   
      if (estilo == "hidden")
      {
    		document.getElementById("ventanaServicios").className = "show"; 
    		//document.getElementById("original").className = "hidden";
        document.getElementById("sectionMenu").className = "hidden";
        document.getElementById("loginmodal").className = "hidden";
        document.getElementById("sectionContactanos").className = "hidden";
        document.getElementById("textoDelSection").className = "hidden";
        

      }
      else 
      {
        document.getElementById("ventanaServicios").className = "hidden";
        document.getElementById("textoDelSection").className = "show";
        //document.getElementById("original").className = "show"; 
		
      }
    }
 


function contacto()
    {
      var estilo = document.getElementById("sectionContactanos").className;    
      if (estilo == "hidden")
      {
        document.getElementById("sectionContactanos").className = "show"; 
        //document.getElementById("original").className = "hidden";
        document.getElementById("sectionMenu").className = "hidden";
        document.getElementById("loginmodal").className = "hidden";
        document.getElementById("ventanaServicios").className = "hidden";
        document.getElementById("textoDelSection").className = "hidden";

      }
      else 
      {
        document.getElementById("sectionContactanos").className = "hidden";
        document.getElementById("textoDelSection").className = "show";
        //document.getElementById("original").className = "show"; 
    
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