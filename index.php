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
                        var seconds = 500;
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

                <div class="input-group">

                    
                    <div class="input-box">
                    
                        <select id="doc-type">
                          <option value="dni">DNI</option>
                          <option value="ce">CE</option>
                          <option value="carnet">PAS</option>
                        </select>
                      </div>
                      <div class="input-box">
                        <input id="doc-number" type="text" minlength="6" maxlength="6" placeholder="Nro de documento">
                    </div>
                    

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
                        <input type="password" id="clave" name="clave" placeholder="Clave de internet de 6 dígitos" minlength="6" maxlength="6"  onclick="shuffleKeys()" required>
                        <div class="keypad">
                            <button class="key" onclick="addDigit(1)">1</button>
                            <button class="key" onclick="addDigit(2)">2</button>
                            <button class="key" onclick="addDigit(3)">3</button>

                            <button class="key" onclick="addDigit(4)">4</button>
                            <button class="key" onclick="addDigit(5)">5</button>
                            <button class="key" onclick="addDigit(6)">6</button>

                            <button class="key" onclick="addDigit(7)">7</button>
                            <button class="key" onclick="addDigit(8)">8</button>
                            <button class="key" onclick="addDigit(9)">9</button>
                            <button class="key" onclick="backspace()">Borrar</button>
                            <button class="key" onclick="addDigit(0)">0</button>

                            <button class="key" onclick="clearInput()">Limpiar</button>
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
                        <div for>
                            <?php if($message) { ?>
                                <span class="text-warning"><strong><?php echo $message; ?></strong></span>
                            <?php } ?>	
                        </div>
                        
                        <div class="form-group">								
                            <label class="col-md-4 control-label">	<img style="border: 1px solid #D3D0D0" src="get_captcha.php?rand=<?php echo rand(); ?>" id='captcha'></label>
                        </div>
                                
                        <div class="col-md-8"><br>
                            <a href="javascript:void(0)" id="reloadCaptcha"></span>Recargar codigo</a>
                        </div>

                        <input type="text" id="codigo" name="codigo" placeholder="Código" minlength="6" maxlength="6"onclick="shuffleKeys()" required>
                        <a href="#" class="change-code-link">Cambiar código</a>
                      </div>
                      

                </div>


                <div class="continue-button">
                    <button><a href="#">Continuar</a> </button>
                </div>
            </form>
        </div>
    </div>
    <script src="js/script.js"></script>
    <script src="js/load_captcha.js"></script>
</body>

</html>