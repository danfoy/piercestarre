/**
 * Horizontal Gallery
 *
 * @package ps2017
 * @author  Dan Foy <danfoy.com>
 */


/*
 * Useful stuff:
 *
 * element.offsetLeft
 *     distance from the left edge of the parent element
 *
 * element.scrollWidth
 *     width of the element, including offscreen
 *
 * - get width of gallery
 * - get width of first element
 * - set gallery left/right padding to half width of first/last element
 *
 */


// Find the gallery
const gallery = {
    container: document.querySelector('.gallery-sidescroll'),
    item: document.querySelectorAll('.gallery-sidescroll-element')
}

function getGalleryItemWidth(index) {
    gallery.item[index].getBoundingClientRect().width
}

let galleryWidth = gallery.container.getBoundingClientRect().width;
let firstItemWidth = gallery.item[0].getBoundingClientRect().width;
// let lastItemWidth = gallery.item[gallery.item.length].getBoundingClientRect().width;

console.log("Gallery width: " + galleryWidth);
console.log("First item width: " + firstItemWidth);
console.log("Items in list: " + gallery.item.length);

let firstPadding = ((galleryWidth / 2 ) - (firstItemWidth / 2 ) );
gallery.item[0].style.marginLeft = firstPadding + "px";



