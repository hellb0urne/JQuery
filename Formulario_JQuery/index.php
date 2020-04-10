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

        <div class="row">
            <div class="col s6 offset-s3 z-depth-1">
                <h5 class="center-align">Remuneracion</h5>
                <div class="input-field col s6">
                    <input id="titular" type="text" >
                    <label for="titular">Titular</label>
                </div>
                <div class="input-field col s6">
                    <input id="sueldo" type="number">
                    <label for="sueldo">Sueldo $</label>
                </div>
                <div class="input-field col s6">
                    <input id="salud" type="number">
                    <label for="salud">Salud%</label>
                </div>
                <div class="input-field col s6">
                    <input id="afp" type="number">
                    <label for="afp">AFP%</label>
                </div>
                <br>
                <button class="btn" id="cal">
                    Calcular
                </button>
                <br><br>

                Historial de calculos
                <hr>

                <table class="bordered">
                    <thead>
                        <tr>
                            <th>Titular</th>
                            <th>Sueldo base</th>
                            <th>Desc AFP</th>
                            <th>Desc Salud</th>
                            <th>Liquido</th>

                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>

            </div>
        </div>


        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>

        <script type="text/javascript">
            $(function () {
                var historial = [];

                $("#cal").click(function () {
                    var xtitular = $("#titular").val();
                    var xsueldo = $("#sueldo").val();
                    var xafp = $("#afp").val();
                    var xsalud = $("#salud").val();

                    if (xtitular == "" || xsueldo == "" || xafp == "" || xsalud == "") {
                        M.toast({html: 'complete campos vacios'});

                    } else {
                        var esueldo = parseInt(xsueldo);
                        var eafp = parseInt(xafp);
                        var esalud = parseInt(xsalud);

                        if (esueldo >= 300000 && esueldo <= 2000000) {
                            if (eafp + esalud <= 40) {
                                var desc_salud = esueldo * esalud / 100;
                                var desc_afp = esueldo * eafp / 100;
                                var sueldo_liquido = esueldo - (desc_afp + desc_salud);
                                var objeto = {xtitular: xtitular, esueldo: esueldo, desc_afp: desc_afp,
                                    desc_salud: desc_salud, sueldo_liquido: sueldo_liquido};
                                //Agregar el objeto en la tabla
                                historial.push(objeto);
                                cargarTabla()
                                M.toast({html: 'Sueldo liquido' + sueldo_liquido});
                            } else {
                                M.toast({html: 'Los porcentajes deben sumar maximo 40%'});
                            }
                        } else {
                            M.toast({html: 'El sueldo no esta en el rango'});
                        }

                    }

                });

                function cargarTabla() {
                    $("#tbody").empty();
                    $.each(historial, function (i, o) {
                        var row = "<tr>";
                        row += "<td>" + o.xtitular + "</td>";
                        row += "<td>" + o.esueldo + "</td>";
                        row += "<td>" + o.desc_afp + "</td>";
                        row += "<td>" + o.desc_salud + "</td>";
                        row += "<td>" + o.sueldo_liquido + "</td>";
                        row += "</tr>";
                        $("#tbody").append(row);
                    });
                }

            });





        </script>
    </body>
</html>
