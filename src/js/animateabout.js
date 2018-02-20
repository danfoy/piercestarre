(function() {
    
    /**
     * Takes all elements of a given class and adds an 'animation' class
     * to each sequentially after a specified delay.
     * @param  {string} targetClass Class to target
     */
    function animateAbout(targetClass) {
	
	var elementList = document.getElementsByClassName(targetClass);

    /**
     * Recursively loop through each element and add the `animate` class
     * after 1-second delay.
     * @param {HTMLCollecton} target HTMLCollection of target elements
     * @param {number} index  Index of current element in HTMLCollection
     */
    function addClass(target, index) {
        setTimeout(function(){
            target[index].classList.add('animate');
            if ( index + 1 < target.length ) {
                addClass(target, index + 1);
            }
        }, 1000);
    }

    /** Start adding classes */
    addClass(elementList, 0);

}
/** Fire the function */
animateAbout('row');
})();