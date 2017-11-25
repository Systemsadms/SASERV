<!DOCTYPE html>
<html lang="es">
<head>
	<title>Systems Admins</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <link rel="stylesheet" type="text/css" href="style/menu.css">
	<link rel="stylesheet" type="text/css" href="style/registro.css">
  <link rel="stylesheet" type="text/css" media="all" href="style/mediastyle.css">
  <link rel="stylesheet" type="text/css" media="all" href="style/mediastylemenu.css">
  <script src="style/ventanas.js"></script>

	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  	<script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
  	<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
  	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
  	<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />
  	<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />

</head>
<body>
<!----------------------------------------------HEADER---------------------------------->

<header>
  <a href="#" onclick="menu()">
    <div id="contenedorbottonMenu">
      <div id="bottonMenu"></div>
      <div id="systemsAdms">
        <div id="systems">Systems</div>
        <div id="adms">Admins C.A</div>
        <div id="rifMenu">Rif:J-29952662-2</div>
      </div>
    </div>
    </a>
    
  <a href="#" onclick="clientes()">
    <div id="contenedorbottonClientes">
      <div id="cliente"></div>
      <div id="areadeCliente">Clientes</div>
    </div>
  </a>
</header>
<!----------------------------------------------FIN HEADER---------------------------------->

<?php
  require ("menu.php");
  require ("areaCliente.php");
?>




<div id="banner">

<!-------------------------------------------CUERPO PARA EL CONTENIDO-------------------------------------------------------------->



    <div style="width: 100%; text-align: center; margin-top:100px; "><strong><em><font color="#B01600">REGISTRO DE CLIENTES</font></em></strong></div>
    <br>
   	<div style="width: 100%; text-align: center;">

                <form method="POST" action="#">
                  <label for="tipo"><b>Seleccione el tipo de cuenta:</b></label>
                  <select name="tipo">
                    <option>Personas</option>
                    <option>Empresas</option>
                    <option selected="selected">Seleccionar</option>
                  </select>
                  <input type="submit" name="tipocuenta" id="tipocuenta" value="Seleccionar" />
                </form>
    </div>


  <?php       
    if (isset($_POST['tipocuenta']))
      {
        $tipo = $_POST['tipo'];
          
        if ($tipo == 'Personas')
        {
        ?>

<form method="post" action="registro2.php">
    
          <h4 style="text-align: center;">Registro Personas</h4>

          <div id="contenedorFormulario">
          <div id="formulario1">
            <div id="divFormulario">
              <label>Nombres:</label>
              <br>
          <span id="sprytextfield1">
                  <input type="text" name="nombres" id="nombres" size="27"/>
          <span class="textfieldRequiredMsg">Coloque su nombre.</span></span>
              </input>
              

                      
                        <label>Apellidos:</label>
                        <br>
                        <span id="sprytextfield2">
                            <label for="apellidos"></label>
                            <input type="text" name="apellidos" id="apellidos" size="27" />
                        <span class="textfieldRequiredMsg">Coloque su apellido.</span></span>
                        </input>
                      

                      
                        <label>Email:</label>
                        <br>
                        <span id="sprytextfield3">
                        <label for="emailPersonas"></label>
                        <input type="text" name="emailPersonas" id="emailPersonas" size="27"/>
                        <span class="textfieldRequiredMsg">Coloque su Email.</span><span class="textfieldInvalidFormatMsg">No es un email valdo.</span></span>
                        </input>
                      

                      
                        <label>Re Email:</label>
                        <br>
                        <span id="spryconfirm1">
                        <label for="reEmailPersonas"></label>
                        <input type="text" name="reEmailPersonas" id="reEmailPersonas" size="27"/>
                        <span class="confirmRequiredMsg">Confirme su Email.</span><span class="confirmInvalidMsg">No coincide con el email colocado.</span></span>
                        </input>
                      

                      
                        <label>Celular:</label>
                        <br>
                        <span id="sprytextfield5">
                        <label for="celularPersonas"></label>
                        <input type="text" name="celularPersonas" id="celularPersonas" size="27"/>
                        <span class="textfieldRequiredMsg">Coloque su Celular.</span><span class="textfieldInvalidFormatMsg">No es un numero valido.</span></span>
                        </input>
                      

                      
                        <label>Telefono:</label>
                        <br>
                        <span id="sprytextfield6">
                        <label for="telefonoPersonas"></label>
                        <input type="text" name="telefonoPersonas" id="telefonoPersonas" size="27"/>
                        <span class="textfieldRequiredMsg">Coloque su Telefono.</span><span class="textfieldInvalidFormatMsg">No es un numero valido.</span></span>
                        </input>
                      </div>
          </div>


           <div id="formulario2">

              <div id="divFormulario2">
                        <label>Pais:</label>
                        <br>
                        <select name="paisPersonas" id="paisPersonas">
                                <option>Venezuela</option>
                                <option>Argentina</option>
                                <option>Brasil</option>
                                <option>Bolivia</option>
                                <option>Canada</option>
                                <option>Chile</option>
                                <option>Colombia</option>
                                <option>Costa Rica</option>
                                <option>Ecuador</option>
                                <option>Estados Unidos (USA)</option>
                                <option>Guatemala</option>
                                <option>Mexico</option>
                                <option>Panama</option>
                                <option>Peru</option>
                                <option>Paraguay</option>
                                <option>Republica Dominicana</option>                                
                                <option>Trinidad y Tobago</option>
                                <option>Uruguay</option> 
                </select>
             

                      
                        <label>Estado:</label>
                        <br>
                        <span id="sprytextfield7">
                        <label for="estadoPersonas"></label>
                        <input type="text" name="estadoPersonas" id="estadoPersonas" size="27"/>
                        <span class="textfieldRequiredMsg">Coloque su estado</span></span>
                        </input>
                      

                      
                        <label>Ciudad:</label>
                        <br>
                        <span id="sprytextfield8">
                        <label for="ciudadPersonas"></label>
                        <input type="text" name="ciudadPersonas" id="ciudadPersonas" size="27"/>
                        <span class="textfieldRequiredMsg">Coloque su ciudad</span></span>
                        </input>
                      

                      
                        <label>Direccion:</label>
                        <br>
                        <span id="sprytextfield9">
                        <label for="dirPersonas"></label>
                        <input type="text" name="dirPersonas" id="dirPersonas" size="27"/>
                        <span class="textfieldRequiredMsg">Coloque su direccion</span></span>
                        </input>
                      

                     
                        <label>ZipCode:</label>
                        <br>
                        <span id="sprytextfield10">
                        <label for="zipCodePersonas"></label>
                        <input type="text" name="zipCodePersonas" id="zipCodePersonas" size="27"/>
                        <span class="textfieldRequiredMsg">Coloque su codigo postal de area.</span></span>
                        </input>
                      </div>

            </div>
  </div>



  <div style="text-align: center; float: left; width:100%;  margin-top:1em; background-color: none; ">
                        
                       Como se entero de nosotros  <select name="comoPersonas" id="comoPersonas">
                                                <option>Recomendacion</option>
                                                <option>Amigos</option>
                                                <option>Otra Empresa</option>
                                                <option>Internet</option>
                                                <option>Publicidad</option>
                                                <option>Prensa</option>
                                                <option>Radio</option>
                                            </select>
              </div>

              <div style="text-align: center; float: left; width:100%;  margin-top:1em; background-color: none; ">
                <span id="sprycheckbox1">
                <input type="checkbox" name="confirmPersonas" id="confirmPersonas" />
                <label for="confirmPersonas"></label>
                <span class="checkboxRequiredMsg">Acepta los terminos de servicio?.</span></span> He leido, comprendido y aceptado los <a href="">terminos de servicios de Systems Admins C.A</a>
              </div>

     
               <div style="text-align: center; float: left; width:100%;  margin-top:1em; background-color: none; ">
                    <input type="hidden" name="tipo" value="<?php echo $tipo; ?>"></input>
                    <input type="submit" name="btn_enviar" value="Registrar">                 

               </div>
            
  </form>
    
  <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "integer");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10");
var sprycheckbox1   = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "emailPersonas");
  </script>
                        
   <!-----------------------------------------COMIENZO DE EMPRESA ------------------------------------>


 <?php
          }
          elseif ($tipo == 'Empresas')
          {
            ?>
            <form method="post" action="registro2.php">         
            <h4 style="text-align: center;">Registro Empresas</h4>

            <div id="contenedorFormularioEmpresas">
            <div id="formulario1">
              <div id="divFormulario">
                <label>Empresa:</label></input>
                <br>
                <span id="sprytextfield4">
                <label for="empresas"></label>
                <input type="text" name="empresa" id="empresa" />
                <span class="textfieldRequiredMsg">Coloque el nombre de su empresa.</span></span>
                <br>
              
                <label>Rif:</label>
                <br>
                <span id="sprytextfield11">
                <label for="rif"></label>
                <input type="text" name="rif" id="rif" />
                <span class="textfieldRequiredMsg">Coloque el rif de su empresa.</span></span>
                </input>
                
                

                      
                        <label>Email:</label>
                        <br>
                        <span id="sprytextfield12">
                        <label for="emailEmpresas"></label>
                        <input type="text" name="emailEmpresas" id="emailEmpresas" />
                        <span class="textfieldRequiredMsg">Coloque su direccion email.</span></span>
                        </input>
                      

                      <br>
                        <label>Confiarmar Email</label>
                        <br>
                        <span id="spryconfirm2">
                        <label for="reEmailEmpresas"></label>
                        <input type="text" name="reEmailEmpresas" id="reEmailEmpresas" />
                        <span class="confirmRequiredMsg">Confirme su direccion email</span><span class="confirmInvalidMsg">La direccion email no coincide con la colocada</span></span>
                        </input>
                      

                      
                        <label>Telefono1:</label>
                        <br>
                        <span id="sprytextfield13">
                        <label for="telefono1Empresas"></label>
                        <input type="text" name="telefono1Empresas" id="telefono1Empresas" />
                        <span class="textfieldRequiredMsg">Coloque su numero de contacto.</span><span class="textfieldInvalidFormatMsg">No es un numero valido.</span></span>
                        </input>
                      

                      
                        <label>Telefono2:</label>
                        <br>
                        <span id="sprytextfield14">
                        <label for="telefono2Empresas"></label>
                        <input type="text" name="telefono2Empresas" id="telefono2Empresas" />
                        <span class="textfieldRequiredMsg">Coloque su numero de contacto.</span><span class="textfieldInvalidFormatMsg">NO es un numero valido.</span></span>
                        </input>
                      </div>
          </div>


           <div id="formulario2">

              <div id="divFormulario2">
                        <label>Pais:</label>
                        <br>
                         <select name="paisEmpresas" id="paisEmpresas">
                                <option>Venezuela</option>
                                <option>Argentina</option>
                                <option>Brasil</option>
                                <option>Bolivia</option>
                                <option>Canada</option>
                                <option>Chile</option>
                                <option>Colombia</option>
                                <option>Costa Rica</option>
                                <option>Ecuador</option>
                                <option>Estados Unidos (USA)</option>
                                <option>Guatemala</option>
                                <option>Mexico</option>
                                <option>Panama</option>
                                <option>Peru</option>
                                <option>Paraguay</option>
                                <option>Republica Dominicana</option>                                
                                <option>Trinidad y Tobago</option>
                                <option>Uruguay</option> 
                </select>
             

                      
                        <label>Estado:</label>
                        <br>
                        <span id="sprytextfield15">
                        <label for="estadoEmpresas"></label>
                        <input type="text" name="estadoEmpresas" id="estadoEmpresas" />
                        <span class="textfieldRequiredMsg">Coloque su estado.</span></span>
                        </input>
                      

                      
                        <label>Ciudad:</label>
                        <br>
                        <span id="sprytextfield16">
                        <label for="ciudadEmpresas"></label>
                        <input type="text" name="ciudadEmpresas" id="ciudadEmpresas" />
                        <span class="textfieldRequiredMsg">Coloque su ciudad.</span></span>
                        </input>
                      

                     
                        <label>Direccion:</label>
                        <br>
                        <span id="sprytextfield17">
                        <label for="dirEmpresas"></label>
                        <input type="text" name="dirEmpresas" id="dirEmpresas" />
                        <span class="textfieldRequiredMsg">Coloque su direccion.</span></span>
                        </input>
                

                 
                        <label>ZipCode:</label>
                        <br>
                        <span id="sprytextfield18">
                        <label for="zipCodeEmpresas"></label>
                        <input type="text" name="zipCodeEmpresas" id="zipCodeEmpresas" />
                        <span class="textfieldRequiredMsg">Coloque su codigo postal de area.</span></span>
                        </input>
                      </div>

              </div>
  </div>

               <div id="formulario1">
                 <div id="divFormulario">
                   <label>Encargado:</label>
                   <br>
                   <span id="sprytextfield19">
                   <label for="encargado"></label>
                   <input type="text" name="encargado" id="encargado" />
                   <span class="textfieldRequiredMsg">Encargado de la empresa o persona contacto.</span></span>
                   </input>
                 </div>                 
               </div>
                <div id="formulario2">
                  <div id="divFormulario2">
                    <label>Cargo:</label>
                    <br>
                    <span id="sprytextfield20">
                    <label for="cargo"></label>
                    <input type="text" name="cargo" id="cargo" />
                    <span class="textfieldRequiredMsg">Cargo del encargado o persona contacto.</span></span>
                    </input>
                  </div>
                </div>
              
              <div style="text-align: center; float: left; width:100%;  margin-top:1em; background-color: none; ">
                        
                       Como se entero de nosotros  <select name="comoEmpresas" id="comoEmpresas">
                                                <option>Recomendacion</option>
                                                <option>Amigos</option>
                                                <option>Otra Empresa</option>
                                                <option>Internet</option>
                                                <option>Publicidad</option>
                                                <option>Prensa</option>
                                                <option>Radio</option>
                                            </select>
  </div>

              <div style="text-align: center; float: left; width:100%;  margin-top:1em; background-color: none; ">
<span id="sprycheckbox2">
<input type="checkbox" name="confirmEmpresas" id="confirmEmpresas" />
<label for="confirmEmpresas"></label>
<span class="checkboxRequiredMsg">Acepta los terminos de servicio?.</span></span> He leido, comprendido y aceptado los <a href="">terminos de servicios de Systems Admins C.A</a>
</div>

     
               <div style="text-align: center; float: left; width:100%;  margin-top:1em; background-color: none; ">
                    <input type="hidden" name="tipo" value="<?php echo $tipo; ?>"></input>
                    <input type="submit" name="btn_enviar" value="Registrar">                 

               </div>

       </form>   

<script type="text/javascript">
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12");
var spryconfirm2 = new Spry.Widget.ValidationConfirm("spryconfirm2", "emailEmpresas");
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13", "integer");
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14", "integer");
var sprytextfield15 = new Spry.Widget.ValidationTextField("sprytextfield15");
var sprytextfield16 = new Spry.Widget.ValidationTextField("sprytextfield16");
var sprytextfield17 = new Spry.Widget.ValidationTextField("sprytextfield17");
var sprytextfield18 = new Spry.Widget.ValidationTextField("sprytextfield18");
var sprytextfield19 = new Spry.Widget.ValidationTextField("sprytextfield19");
var sprytextfield20 = new Spry.Widget.ValidationTextField("sprytextfield20");
</script>
          <?php
          }
          
          
        }
        
        else
        {
          echo "<div style='height:350px; background-color:none;'></div>";
        }
        
      ?>
<!-----------------------------------Fin de FORMULARIO REGISTRO------------------------------->




<br /><br />


<!--------------------------------------------FIN CUERPO PARA EL CONTENIDO---------------------------------------------->


</div><!----------------------------------------- FIN DEL DIV BANNER  ---------------------------------------------------->


<div id="footerRegistro">© 2016 Systems Admins. All Rights Reserved.</div>

</body>
</html>