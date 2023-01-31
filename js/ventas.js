function listarVentas()
{
    
    const http=new XMLHttpRequest();
    const url = 'ventas.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("divResultados").innerHTML = this.responseText;
        }
    };

    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=menuVentas");
}



function btnNuevaVenta()
{
    // alert('nuevo propietario ');
    const http=new XMLHttpRequest();
    const url = 'ventas.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=nuevaVenta"
        );
}

function btnGrabarVenta()
{
    var validacion = validacionesVenta();
    if(validacion)
    {
        var idCodigo = document.getElementById("idCodigo").value;
        var txtcantidad = document.getElementById("txtcantidad").value;
        var txtfecha = document.getElementById("txtfecha").value;

        const http=new XMLHttpRequest();
        const url = 'ventas.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("option=grabarVenta"
        + "&idCodigo="+idCodigo
        + "&txtfecha="+txtfecha
        + "&txtcantidad="+txtcantidad
            );

            //aqui debe ir el descuento del inventario 

            descontarInventario(idCodigo,txtcantidad);   

    }

}


function validacionesVenta()
{
    if($("#idCodigo").val().length ==  0){
        alert("Debe escoger un producto") ;
        $("#idCodigo").focus();
        return 0; 
    }
    if($("#txtcantidad").val().length ==  0){
        alert("Debe digitar la cantidad") ;
        $("#txtcantidad").focus();
        return 0; 
    }
   
    return 1;

}

// function reviseStock()
// {
//         var idCodigo = document.getElementById("idCodigo").value;
//         // alert('revision codigo '+ idCodigo); 
//         const http=new XMLHttpRequest();
//         const url = 'ventas.php';
//         http.onreadystatechange = function(){
//             if(this.readyState == 4 && this.status ==200){
//                 console.log(this.responseText);
//                 document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
//             }
//         };
//         http.open("POST",url);
//         http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         http.send("option=verifiqueStock"
//         + "&idCodigo="+idCodigo
//             );
// }

function descontarInventario(id,txtcantidad)
{
    // var idCodigo = document.getElementById("idCodigo").value;
        // alert('revision codigo '+ idCodigo); 
        const http=new XMLHttpRequest();
        const url = 'ventas.php';
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
            }
        };
        http.open("POST",url);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("option=descontarInventario"
        + "&idCodigo="+id
        + "&txtcantidad="+txtcantidad
        );

}