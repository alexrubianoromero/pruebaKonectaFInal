function listarMenuProductos()
{
    
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("divResultados").innerHTML = this.responseText;
        }
    };

    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=menuCodigos");
}

function ingresarCodigo()
{

}

function btnNuevoPropietario()
{
    // alert('nuevo propietario ');
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=nuevoCodigo"
        );
}

function btnGrabarCodigo()
{
    var validacion = validacionesCodigo();
    if(validacion)
    {

    var txtnombre = document.getElementById("txtnombre").value;
    var txtreferencia = document.getElementById("txtreferencia").value;
    var txtprecio = document.getElementById("txtprecio").value;
    var txtpeso = document.getElementById("txtpeso").value;
    var txtcategoria = document.getElementById("txtcategoria").value;
    var txtstock = document.getElementById("txtstock").value;
    var txtfecha = document.getElementById("txtfecha").value;
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=grabarCodigo"
                + "&txtnombre="+txtnombre
                + "&txtreferencia="+txtreferencia
                + "&txtprecio="+txtprecio
                + "&txtpeso="+txtpeso
                + "&txtcategoria="+txtcategoria
                + "&txtstock="+txtstock
                + "&txtfecha="+txtfecha
        );

    } 
}

function validacionesCodigo()
{
    if($("#txtnombre").val().length ==  0){
        alert("Debe digitar el nombre") ;
        $("#txtnombre").focus();
        return 0; 
    }
    if($("#txtreferencia").val().length ==  0){
        alert("Debe digitar la referencia") ;
        $("#txtreferencia").focus();
        return 0; 
    }
    if($("#txtprecio").val().length ==  0){
        alert("Debe digitar la precio") ;
        $("#txtprecio").focus();
        return 0; 
    }
    if($("#txtpeso").val().length ==  0){
        alert("Debe digitar el peso") ;
        $("#txtpeso").focus();
        return 0; 
    }
    if($("#txtcategoria").val().length ==  0){
        alert("Debe digitar la categoria") ;
        $("#txtcategoria").focus();
        return 0; 
    }
    if($("#txtstock").val().length ==  0){
        alert("Debe digitar el stock") ;
        $("#txtstock").focus();
        return 0; 
    }
    return 1;

}

function editCode(id)
{
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
        }
    };

    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=buscarIdCodigo"
    + "&id="+id
    );
}
function deleteCode(id)
{
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
        }
    };

    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=deleteCodigo"
    + "&id="+id
    );
}

function btnActualizarCodigo()
{
    var validacion = validacionesCodigo();
    if(validacion)
    {
    var txtid = document.getElementById("txtid").value;
    var txtnombre = document.getElementById("txtnombre").value;
    var txtreferencia = document.getElementById("txtreferencia").value;
    var txtprecio = document.getElementById("txtprecio").value;
    var txtpeso = document.getElementById("txtpeso").value;
    var txtcategoria = document.getElementById("txtcategoria").value;
    var txtstock = document.getElementById("txtstock").value;
    var txtfecha = document.getElementById("txtfecha").value;
    const http=new XMLHttpRequest();
    const url = 'index.php';
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status ==200){
            console.log(this.responseText);
            document.getElementById("cuerpoModalClientes").innerHTML = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send("option=actualizarCodigo"
                + "&txtid="+txtid
                + "&txtnombre="+txtnombre
                + "&txtreferencia="+txtreferencia
                + "&txtprecio="+txtprecio
                + "&txtpeso="+txtpeso
                + "&txtcategoria="+txtcategoria
                + "&txtstock="+txtstock
                + "&txtfecha="+txtfecha
        );

    } 

}


