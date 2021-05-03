setInterval(function(){
    var w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0],
    x = w.innerWidth || e.clientWidth || g.clientWidth,
    y = w.innerHeight|| e.clientHeight|| g.clientHeight;
    var mudar = document.getElementsByClassName('menu')[0];
    console.log(x);
    if(mudar){
        if(x <= 1345){
            mudar.setAttribute('class', 'menu2');
            // mudar.style.opacity='0';
            // mudado = true;
            
            // var colocaMenu = document.getElementsByClassName('titulo')[0];
            // colocaMenu.setAttribute('class', 'titulo2')

            // var logo = document.getElementsByClassName('logo')[0]
            // logo.style.marginRight='50px';
            // var menu = document.createElement('button');
            // menu.setAttribute('class ', 'menu');
            // menu.innerHTML='<div> <b>__ </b></div><div> <b>__ </b></div><div><b>__ </b></div>';
            // colocaMenu.appendChild(menu)
            // var l = 1;
            // document.getElementById('m').addEventListener('click', function(){
            //     if(l == 1){
            //         mudar.style.opacity='1';
            //         l = 2;
            //     }else if(l == 2){
            //         mudar.style.opacity='0';
            //         l = 1;
            //     }
                
            // })
        }
    }else{
       
        if(x > 1345){
            mudar = document.getElementsByClassName('menu2')[0];
            mudar.setAttribute('class', 'menu')
            mudar.style.opacity='1'
            
            var colocaMenu = document.getElementById('m').remove();

            var logo = document.getElementsByClassName('logo')[0]
            logo.style.marginRight='0px'

            var colocaMenu = document.getElementsByClassName('titulo2')[0];
            colocaMenu.setAttribute('class', 'titulo')
            // colocaMenu.appendChild(criaele)
        }
    }
    
}, 100);


    