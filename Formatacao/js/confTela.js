setInterval(function(){
    var w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName('body')[0],
    x = w.innerWidth || e.clientWidth || g.clientWidth,
    y = w.innerHeight|| e.clientHeight|| g.clientHeight;
    console.log(x)
    var a = document.body;
    var b = document.getElementsByClassName('diversao')[0];
    if(!b){
        b = document.getElementsByClassName('diversaoo')[0];
    }
    if(x < 800){
       b.setAttribute('class', 'diversaoo');
    }else if(x > 800){
        b.setAttribute('class', 'diversao');
    }
}, 100)
