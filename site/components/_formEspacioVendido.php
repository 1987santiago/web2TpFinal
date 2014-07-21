<?php
    session_start();
    // guardamos la nueva ruta base del sit
    $local_path = $_SESSION["local_path"];
    // guardamos la url de los recursos estaticos
    $statics_path = $_SESSION["statics_path"];
?>

<style type="text/css">

/*--- estilos del formulario ---*/
.contact_form {
background-color:#f1f1f1;
border:1px solid #cecfd0;
margin-left:50px;
width:520px;
padding-bottom: 40px;
margin-bottom: 30px;
}

.contact_form ul {
    list-style-type:none;
}

 .contact_form li{
    padding:12px;
}

label {
    color: #555555;
    display: inline-block;
    text-align:right;
    float: left;
    font-family: sans-serif;
    font-size: 13px;
    font-weight: bold;
    margin-top: 3px;
    margin-right:5px;
    padding: 3px;
    width: 110px;
}
.contact_form input {
    height:35px;
    width:220px;
    padding:5px 8px;
}
 select {
    padding:8px;
    width:220px;
}
.contact_form input[type="checkbox"] {
    display: inline-block;
    width: 19px;
    height: 19px;
    margin: -1px 4px 0 0;
    vertical-align: middle;
    cursor:pointer;
    
}
.contact_form button {
    margin-left:120px;
}
/*----- estilos visuales de los elementos --------*/
.contact_form input, .contact_form select {
     border:1px solid #aaa;
    box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
    border-radius:2px;
    color: #888;
    font-size: 12px;
   }

.contact_form input:focus {
    background: #fff;
    border:1px solid #555;
    box-shadow: 0 0 3px #aaa;
}

/* === Estilos del boton de Envio === */

button.submit {
   padding: 9px 17px;
   font-family: Helvetica, Arial, sans-serif;
   font-weight: bold;
   line-height: 1;
   color: #444;
   border: none;
   text-shadow: 0 1px 1px rgba(255, 255, 255, 0.85);
   background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fff), to(#bbb));
   background-image: -moz-linear-gradient(0% 100% 90deg, #BBBBBB, #FFFFFF);
   background-color: #fff;
   border: 1px solid #f1f1f1;
   border-radius: 10px;
   box-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
}
button.submit:hover {
    opacity:.55;
    cursor: pointer;
}
button.submit:active {
    border: 1px solid #222;
    box-shadow: 0 0 10px 5px #444 inset;
}
.reserva{
margin-left:50px;
}

label span {
	font-size: 10px;
	color: #FF0000;
	font-weight: normal;
}

</style>
<div>
  <form class="contact_form" action ="<?php echo "$statics_path"; ?>/components/verificacionPagoReserva.php" method="post" >
    <ul>
      <li>
        <label>Codigo de Reserva <span>(requerido)</span></label>
          <input type="text" name="codReserva"  required/>            
      </li>
      <li>
          <button class="submit" type="submit">Buscar</button>
      </li>
    </ul>        
  </form>
</div>  