/**
 * [PictureSlider Element to be slider-ed]
 * @param {string} target class assigned to target image
 */
function PictureSlider(target) {
    this.moveWrapper = document.getElementsByClassName(target);
    this.moveTarget = this.moveWrapper[0];
    this.moveTargetPosition = this.moveTarget.getBoundingClientRect();
    this.bodyPosition = document.body.getBoundingClientRect();
    this.horizontalOffset = this.moveTargetPosition.left - this.bodyPosition.left;
    this.verticalOffset = this.moveTargetPosition.top - this.bodyPosition.top;
}

/**
 * [beginTracking begin tracking for scrolling]
 */
PictureSlider.prototype.beginTracking = function () {
    
    window.addEventListener('scroll', function () {

        
        var scrollPosition = window.pageYOffset;
        var distanceToEdge = this.moveTargetPosition.right - (window.pageYOffset * 4);

        if (window.innerWidth >= 799 && 
            window.innerWidth <= 1440) {
            
            // Target is landscape tablets and
            // computers  up to 15" mbp
            
            this.moveTarget.style.right = ((scrollPosition * 4) + 'px');
            this.moveTarget.style.top = ((scrollPosition * 2) + 'px');
            
            if (distanceToEdge <= 0) {
                this.moveTarget.style.display = 'none';
            } else {
                this.moveTarget.style.display = 'inline-block';
            }
        
        } else if (window.innerWidth > 1440 &&
                   window.innerWidth <= 1920) {

            // Targets computers larger than 15" mbp,
            // TVs and consoles etc., but not larger
            // than 1080p to avoid scrolling issues

            this.moveTarget.style.right = ((scrollPosition * 6) + 'px');
            this.moveTarget.style.top = ((scrollPosition * 2) + 'px');

            if (distanceToEdge <= 0) {
                this.moveTarget.style.display = 'none';
            } else {
                this.moveTarget.style.display = 'inline-block';
            }
        }
    
    }.bind(this));

};


var bioPortrait = new PictureSlider('image');
bioPortrait.beginTracking();
