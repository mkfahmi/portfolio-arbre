function doBounce(element, times, distance, speed) {
    for(var i = 0; i < times; i++) {
        element.animate({top: '-='+distance+'vw'}, speed, 'swing')
        .animate({top: '+='+distance+'vw'}, speed, 'swing');
    }
}