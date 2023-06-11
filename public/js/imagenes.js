'use strict'
// amount of images in the slider :
var amountImg = 7;
// width of one image (in pixels)
var widthImg = 570;
// waiting interval (in milliseconds)
var waitTime = 4000;


var deltaX = 0;
var slider = document.getElementById('my-slider');

 window.setInterval(doSlide, waitTime);

 function doSlide() {
    deltaX += widthImg;
    deltaX %= amountImg * widthImg;
    console.log(deltaX);
    slider.style.setProperty('--current-slide', deltaX / widthImg);
    slider.querySelector('#my-slider-inner').style.marginLeft = '-' + deltaX + 'px';
}
