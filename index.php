<html>
<head>
    <title>Chat en vivo</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .chat_wrapper{
            margin-left: 25%;
        }
        #contenedor_msj{
            width: 100%;
        }
        #mi_mensaje{
            text-align: end;
            border: 2px solid #dedede;
            background-color: greenyellow;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }
        #otro_mensaje{
            border-color: #ccc;
            background-color: #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }
        #caja_mensaje{
            width: 800px;
            height: 500px;
            overflow-y:scroll;

        }
        #mensaje{
            width: 700px;
        }
    </style>
</head>
<body>
<h1>Chat negocios web</h1>

<div class="chat_wrapper">
    <div id="contenedor_msj"><div class="caja_mensaje" id="caja_mensaje"></div></div>
    <div class="panel">
        <input type="text" name="mensaje" id="mensaje" placeholder="Mensje" maxlength="80"/>
        <button id="enviar">Enviar</button>
    </div>
</div>


</body>
<script>

    let ws = new WebSocket('ws://192.168.43.101:4000');

    ws.onopen = function () {
        let nuevo_div = document.createElement("div");
        nuevo_div.innerHTML = "<span>Conecatdo</span>";
        document.body.appendChild(nuevo_div);
    };

    document.getElementById('enviar').addEventListener('click', function (e) {
        let mensaje = document.getElementById('mensaje').value;
        if (mensaje === "") {
            alert("Ingrese un mensaje!");
        }

        console.log(event.data);
        let mensaje_div = document.createElement("div");
        mensaje_div.setAttribute("id","mi_mensaje");
        mensaje_div.innerHTML = "<span>" + mensaje + "</span>";
        document.getElementById('caja_mensaje').appendChild(mensaje_div);
        ws.send(mensaje);
        document.getElementById('mensaje').value = "";
    });

    ws.onmessage = function (event) {
        console.log(event.data);
        let mensaje_div = document.createElement("div");
        mensaje_div.setAttribute("id","otro_mensaje");
        mensaje_div.innerHTML = "<span>" + event.data + "</span>";
        document.getElementById('caja_mensaje').appendChild(mensaje_div);
        console.log(event);

    };

</script>
</html>
