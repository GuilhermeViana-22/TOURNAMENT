

//animação dos itens
const target = document.querySelectorAll('[data-anime]');
const card = document.querySelectorAll('.anime');
const animationClass = 'animate';
const ativo = 'ativo'

function animeScroll(){
    ///distancia entre a barra e o topo do site
    const windowTop = window.pageYOffset + (window.innerHeight*3)/4; //1268
    const windowBottom = window.pageYOffset * 1.2;
    const windowBottomM = window.pageYOffset * 1.1;
    target.forEach( (e) => {
        if((windowTop) > e.offsetTop){
            e.classList.add(animationClass);
        }else{
            e.classList.remove(animationClass);
        }
    });
    card.forEach( (e) => {
        if((windowBottom) >= e.offsetTop && (windowBottomM) <= e.offsetTop){
            e.classList.add(ativo);

        }else{
            e.classList.remove(ativo);
        }
    });
}
window.addEventListener('scroll', function(){
    animeScroll();
});
