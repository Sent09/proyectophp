window.addEventListener("load",function(){
    var borrar = document.getElementsByClassName("borrar");    
    for(var i=0;i<borrar.length;i++){
            borrar[i].addEventListener("click", confirmar); 
    }
    
    var editar = document.getElementsByClassName("editar");    
    for(var i=0;i<editar.length;i++){
            editar[i].addEventListener("click", modificar);
    }
    
    function modificar(e){
        e.preventDefault();
        var id = this.getAttribute("data-id");        
        var f = document.getElementById("formulario");
        f.action = "view.php";
        var idf = document.getElementById("idformulario");
        idf.value = id;
        f.submit();
    }
    
    function confirmar(e){
        var respuesta = confirm("¿Está seguro de elimirar a: "+ this.getAttribute("data-nombre")+"?");
        if(!respuesta){
            e.preventDefault();
        }
    }
});