
function hoverCard(el){
    let children = el.children;
    for(let i of children){
    i.style.display="block";
    i.style.transitionDuration = "0.5s";
    }
    el.style.opacity="1";
}
function unhoverCard(el){
    let children = el.children;
    for(let i of children){
        i.style.display="none";
        i.style.transitionDuration = "0.5s";
        }
        el.style.opacity="0.8";
}

function promeniMinDatum(el){
    let min = el.value;
    let end = document.querySelector('#dateEnd');
    end.setAttribute('min',min);
}