/**
 * Represents a menu
 * @class
 * @param {string} container CSS class of the `<header>` element
 * @param {string} title     CSS class of the site title `<h1>` element
 * @param {string} nav       CSS class of the `<nav>` element
 * @param {string} button    CSS class of the hamburger button element
 */
function AnimateMenu(container, title, nav, button) {
    
    // Properties pulled from arguments
    this.containerElement = document.querySelector('.' + container);
    this.titleElement = this.containerElement.querySelector('.' + title);
    this.navElement = this.containerElement.querySelector('.' + nav);
    this.menuButton = this.containerElement.querySelector('.' + button);
    
    // 
    this.startTargetPosition = this.navElement
        .getBoundingClientRect().bottom;

}

// Add `sticky` class when scrolling out of view
AnimateMenu.prototype.scrollFunction = function () {
    if (window.pageYOffset > this.startTargetPosition) {
        this
            .containerElement
            .classList
            .add('sticky');
    } else {
        this
            .containerElement
            .classList
            .remove('sticky');
    }
};


AnimateMenu.prototype.autoButtonFunction = function () {

    if (window.innerWidth <= 500) {
        this
            .containerElement
            .classList
            .add('buttonized');
    } else {
        this
            .containerElement
            .classList
            .remove('buttonized');
    }

    // Toggle visibility of nav element after render.
    // This is hidden in `_header.scss` when JS is available,
    // and prevents a FOUC while the script decides whether to buttonize 
    this.navElement.style.visibility = 'visible';

};


AnimateMenu.prototype.buttonClickFunction = function () {

    // Toggle container class on button click 
    this
        .containerElement
        .classList
        .toggle('dropdownactive');
};


AnimateMenu.prototype.beginTracking = function () {
    
    window.addEventListener('scroll', this.scrollFunction.bind(this));
    window.addEventListener('scroll', this.autoButtonFunction.bind(this));
    window.addEventListener('resize', this.autoButtonFunction.bind(this));
    window.addEventListener('load', this.autoButtonFunction.bind(this));
    this.menuButton.addEventListener('click', this.buttonClickFunction.bind(this));

};


var mainMenu = new AnimateMenu('site-header', 'site-title', 'site-nav', 'menubutton');
mainMenu.beginTracking();