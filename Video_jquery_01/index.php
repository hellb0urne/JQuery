
<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <p class="red white-text" id="p1">
            Parrafo 1
        </p>

        <p class="green white-text" id="p2">
            Parrafo 2

        </p>

        <button class="btn-floating" id="boton1">
            Edit
        </button>

        <div class="container">
            <div class="row">
                <div class="col s6 offset-s3">
                    <div class="input-field">
                        <input id="txt1" type="text">
                        <label for="txt1">Nombre</label>
                    </div>
                    <button class="btn" id="btsaluda">
                        Saludar
                    </button>
                    <br><br>
                    <hr>     

                    <h5>Operaciones aritmeticas</h5>
                    <div class="input-field">
                        <input id="num1" type="number">
                        <label for="num1">Numero 1</label>
                    </div>
                    <div class="input-field">
                        <input id="num2" type="number">
                        <label for="num2">Numero 2</label>
                    </div>
                    <button class="btn" id="btsuma">
                        Sumar
                    </button>

                    <br><br>
                    <hr>

                    <h5>Etiqueta select ejemplo</h5>

                    <div class="input-field">
                        <input id="pre" type="number">
                        <label for="pre">Precio</label>
                    </div>

                    <div class="input-field">
                        <select id="des">
                            <option value="1000">Descuento por $1000</option>
                            <option value="2000">Descuento por $2000</option>
                            <option value="3000">Descuento por $3000</option>
                        </select>
                        <label>Seleccione un descuento</label>
                    </div>

                    <button class="btn" id="btcalcular">
                        Calcular
                    </button>

                    <br><br>
                    <hr>

                    <h5>Calendario</h5>
                    <input type="text" class="datepicker">



                </div>
            </div>
        </div>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>

        <script type="text/javascript">
            $(function () {
                //Inicializacion comboBox
                $('select').formSelect();

                //Inicializacion Calendario
                $(document).ready(function () {
                    $('.datepicker').datepicker();
                
                });


                $("#boton1").click(function () {
                    M.toast({html: 'funciona'});
                })

                $("#boton1").mouseover(function () {
                    $("#boton1").addClass("pulse");
                });

                $("#boton1").mouseleave(function () {
                    $("#boton1").removeClass("pulse");
                });

                $("#btsaluda").click(function () {
                    var texto = $("#txt1").val();
                    if (texto == "") {
                        M.toast({html: 'Completa el nombre'});
                    } else {
                        M.toast({html: "hola " + texto})
                    }
                });

                $("#btsuma").click(function () {
                    //val() = captura los datos
                    var texto1 = $("#num1").val();
                    var texto2 = $("#num2").val();

                    if (texto1 == "" || texto2 == "") {
                        M.toast({html: 'complete los campos vacios'})
                    } else {
                        //parseInt = int ;  ParseFloat = entero
                        var suma = parseFloat(texto1) + parseFloat(texto2);
                        M.toast({html: 'La suma es ' + suma})
                    }
                });

                $("#btcalcular").click(function () {
                    var precio = $("#pre").val();
                    var descuento = $("#des").val();

                    if (precio == "" || descuento == "") {
                        M.toast({html: 'Campos incompletos'});
                    } else {
                        if (parseInt(precio) < parseInt(descuento)) {
                            M.toast({html: 'El precio tiene que ser mayor o igual a ' + descuento});

                        } else {
                            var total = parseInt(precio) - parseInt(descuento);

                            M.toast({html: 'Total a pagar ' + total});
                        }

                    }
                });

            });


        </script>
    </body>
</html>