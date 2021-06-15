// carousels


function carousel() {

    
    var carouselii = $('.contenedor-scroll').flickity({
        cellAlign: 'left',
        cellSelector: '.b-diapositiva',
        friction: 0.35,
        prevNextButtons: true,
        wrapAround: true,
        autoPlay: 4000,
        pageDots: true,
        freeScroll: false,
        groupCells: 1
    });

}

function carouselaplicaciones() {

    var carouselaplicaciones = $('#slideraplicaciones').flickity({
        cellAlign: 'left',
        cellSelector: '.b-aplicaciones .b-slide',
        friction: 0.35,
        prevNextButtons: false,
        wrapAround: true,
        autoPlay: 5000,
        pageDots: true,
        freeScroll: false,
        groupCells: 1
    });

}

function carouselprincipal() {

    var carouselaplicaciones = $('#sliderprincipal').flickity({
        cellAlign: 'left',
        cellSelector: '.c-home-slider .b-featured',
        friction: 0.35,
        prevNextButtons: false,
        wrapAround: true,
        autoPlay: 3000,
        pageDots: true,
        freeScroll: false,
        groupCells: 1
    });

}

function carouselrelacionados() {

    var carouselaplicaciones = $('.slider-relacionados').flickity({
        cellAlign: 'left',
        cellSelector: '.slider-relacionados .b-card',
        friction: 0.35,
        prevNextButtons: false,
        wrapAround: true,
        autoPlay: 3000,
        pageDots: false,
        freeScroll: false,
        groupCells: 1
    });

}
