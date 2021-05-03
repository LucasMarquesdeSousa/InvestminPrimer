var botao = document.getElementsByTagName('input')[0];
var ativo = true;
botao.addEventListener('click', function(){
    if(ativo){
        document.getElementsByTagName('nav')[0].style.backgroundColor='rgba(0,0,0,1)';
        document.getElementsByTagName('nav')[0].style.transform='translateX(350px)';
        document.getElementsByTagName('label')[0].style.marginLeft=' 25%';
        ativo = false;
    }else{
        document.getElementsByTagName('nav')[0].style.backgroundColor="rgba(0,0,0,0.4)";
        document.getElementsByTagName('nav')[0].style.transform='translateX(-350px)';
        document.getElementsByTagName('label')[0].style.marginLeft='0%';
        ativo = true;
    }
})
    
