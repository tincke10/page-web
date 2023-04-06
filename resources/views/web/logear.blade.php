<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login autogestion</title>
    <link href="/plantilla/assets/css//scss.css" rel="stylesheet" />
</head>
<body>
<div class="cotn_principal">
<div class="cont_centrar">

  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
<div class="cont_ba_opcitiy">
        
        <h2>LOGIN</h2>  
  <p>Ingresa a tu cuenta</p> 
  <button class="btn_login" onclick="cambiar_login()">Ingresar</button>
  </div>
  </div>
<div class="col_md_sign_up">
<div class="cont_ba_opcitiy">
  <h2>Crear Cuenta</h2>

  
  <p>Si es tu primera vez en la pagina coloca tu Email y DNI, te llegara la contraseña al mail ingresado.</p>

  <button class="btn_sign_up" onclick="cambiar_sign_up()">Crear Cuenta</button>
</div>
  </div>
       </div>

    
    <div class="cont_back_info">
       <div class="cont_img_back_grey">
       <img src="https://www.amma.org.ar/web/images/botones/obrasocial.png" alt="" />
       </div>
       
    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="https://www.amma.org.ar/web/images/botones/obrasocial.png" alt="" />
       </div>
 <div class="cont_form_login">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
   <h2>LOGIN</h2>
   <form action="sesion.blade.php" method="POST">
 <input  type="num" placeholder="DNI" />
<input type="password" placeholder="Contraseña" />
<button class="btn_login" onclick="cambiar_login()">Ingresar</button>
  </div>
  </form>
   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
     <h2>Crear Cuenta</h2>
<input type="text" placeholder="Email" />
<input type="text" placeholder="DNI" />
<button class="btn_sign_up" onclick="cambiar_sign_up()">Enviar</button>

  </div>

    </div>
    
  </div>
 </div>
</div>
<script src="/plantilla/assets/js/logear.js"></script>
</body>
</html>