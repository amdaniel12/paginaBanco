<?php
session_start();
$message = '';
if ( isset($_POST['securityCode']) && ($_POST['securityCode']!="")){
	if(strcasecmp($_SESSION['captcha'], $_POST['securityCode']) != 0){
		$message = "¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.";
	}else{
		$message = "Ha introducido el código de seguridad correcto."; 
	}
} else {
	$message = "Introduzca el código de seguridad."; 
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Bank Form</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img//undraw_shopping_re_3wst.svg" alt="">
        </div>

        <div class="form">
            <div id="countdown">
                <script>
                        var seconds = 300;
                        document.getElementById("countdown").innerHTML = "Esta página se cerrará en " + seconds + " segundos.";
                        var countdown = setInterval(function() {
                            seconds--;
                            document.getElementById("countdown").innerHTML = "Esta página se cerrará en " + seconds + " segundos.";
                            if (seconds == 0) {
                            clearInterval(countdown);
                            location.href= "index2.html";
                            }
                        }, 1000);
                        </script>
            </div>
            <form action="#" id="formulario">
                <div class="login-button">
                    <a href="#">Volver</a>
                </div>
                <br>
                <div class="form-header">
                    <div class="title">
                        <h1>Banca Por Internet</h1>
                    </div>
                    
                </div>

                <div class="gender-inputs">

                    <div class="gender-group">
                        <div class="gender-input">
                            <input id="persona" type="radio" name="entidad" value="personas">
                            <label for="persona">Persona</label>
                        </div>
                        <div class="gender-input">
                            <input id="empresa" type="radio" name="entidad" value="empresas">
                            <label for="empresa">Empresa</label>
                        </div>

                    </div>
                </div>

                <br>

                <div> <!--<div class="input-group"">
                    </div>-->

                    
                    <div class="identificacion">
                    
                        <select id="doc-type" class="selec-docu">
                          <option value="dni">DNI</option>
                          <option value="ce">CE</option>
                          <option value="carnet">PAS</option>
                        </select>
                        <input class="input5" id="documento" type="text" minlength="8" maxlength="8" placeholder="Nro de documento">
                    </div>
                      <!--<div class="input-box">
                    </div>-->
                    
                    <div class="input-box">
                        <input type="text" id="numeroTarjeta" placeholder="Número de tarjeta">
                      </div>

                    <div class="checkbox-group">
                        <label for="remember-data">
                          <input type="checkbox" id="remember-data" name="remember-data">
                          Recordar datos
                        </label>
                    </div>
                    
                    <br>

                    <div class="form-group">
                    <input type="password" name="clave" id="clave" placeholder="Clave de internet de 6 dígitos" onclick="shuffleKeys()" readonly requerid>
                        <div id="lks" style="display: none;">  
                        <div id="keyboard-container" class="keypad">
                            <button class="key" onclick="addDigit(1)">1</button>
                            <button class="key" onclick="addDigit(2)">2</button>
                            <button class="key" onclick="addDigit(3)">3</button>
                            <button class="key" onclick="addDigit(4)">4</button>
                            <button class="key" onclick="addDigit(5)">5</button>
                            <button class="key" onclick="addDigit(6)">6</button>
                            <button class="key" onclick="addDigit(7)">7</button>
                            <button class="key" onclick="addDigit(8)">8</button>
                            <button class="key" onclick="addDigit(9)">9</button>
                            <button class="key" onclick="addDigit(0)">0</button>
                            <button class="key" onclick="backspace()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg></button>
                            <button class="key" onclick="clearInput()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></button>
                        </div>
                        </div>

                        <script>
                            const keys = document.querySelectorAll(".key");

                            function addDigit(digit) {
                            const input = document.getElementById("clave");
                            input.value += digit;
                            }

                            function backspace() {
                            const input = document.getElementById("clave");
                            input.value = input.value.slice(0, -1);
                            }

                            function clearInput() {
                            const input = document.getElementById("clave");
                            input.value = "";
                            }

                            function shuffleKeys() {
                            const keypad = document.querySelector(".keypad");
                            for (let i = keypad.children.length; i >= 0; i--) {
                                keypad.appendChild(keypad.children[Math.random() * i | 0]);
                            }

                            }
                            shuffleKeys(); // Shuffle the keys on page load
                        </script>
                        
                        <div class="opciones-clave">
                          <span>No tengo clave</span>
                          <span>Olvidé mi clave</span>
                        </div>
                      </div>
                      

                      <div class="form-group">
                        <div class="selec-docu">
                            <img style="border: 1px solid #D3D0D0" src="get_captcha.php?rand=<?php echo rand(); ?>" id='captcha'>
                        </div>
                        <input type="text" id="codigo" name="codigo" placeholder="Código" minlength="6" maxlength="6" required>
                        <a href="javascript:void(0)" id="reloadCaptcha" class="change-code-link">Cambiar código</a>
                      </div>               

                </div>


                <div class="continue-button">
                    <button id="buscar"> Continuar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="js/script1.js"></script>
    <script src="js/load_captcha.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
<script>
    $('#buscar').click(function(){
        dni=$('#documento').val();
        $.ajax({
           url:'controlador/consultaDNI.php',
           type:'post',
           data: 'dni='+dni,
           dataType:'json',
           success:function(r){
               if (r.numeroDocumento==dni) {
                $('#apellidoPaterno').val(r.apellidoPaterno);
                $('#apellidoMaterno').val(r.apellidoMaterno);
                $('#nombre').val(r.nombres);
                Swal.fire({
                    icon: 'success',
                    title: "Bienvenido: " ,
                    text: " " + r.apellidoPaterno + " " + r.apellidoMaterno + " " + r.nombres,
                    html: "",
                    confirmButtonColor: '#ff6600'
                });
               }else{
                   Swa.fire({
                    icon: 'info',
                    title: "Documento Inválido"
                   });
               }
           } 
        });
    });
</script>

</html>