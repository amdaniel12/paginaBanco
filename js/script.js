let inputCadena = document.getElementById("numeroTarjeta");

inputCadena.addEventListener("input", (e) => { 
    let valor = e.target.value;
    
    valor = valor.replace(/[^0-9]/g, '').substring(0,16)
    
  
    const groups = [];


    for (let i = 0; i < valor.length; i += 4) {
      groups.push(valor.substring(i, i+4));
      
    }
  
    const valorSeparado = groups.join(' ');
  
    e.target.value = valorSeparado;
  });
  
  
let form = document.getElementById("formulario") 


form.addEventListener("change", function(e){
  let chec = document.querySelector("input[name='entidad']:checked").value;
  let numeroTarjeta = document.getElementById("numeroTarjeta");
  if(chec == "personas"){
    numeroTarjeta.value=""
  }else{
    numeroTarjeta.value = 4912;
  }
  
});
