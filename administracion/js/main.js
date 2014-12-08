window.addEventListener("load",function(){
    var borrar = document.getElementsByName("borrar");    
    for(var i=0;i<borrar.length;i++){
            borrar[i].addEventListener("click", confirmar); 
    }
    
    function confirmar(e){
        var respuesta = confirm("¿Está seguro de elimirar a: "+ this.getAttribute("data-titulo")+"?");
        if(!respuesta){
            e.preventDefault();
        }
    }
});