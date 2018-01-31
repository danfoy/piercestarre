// Sync test

function PictureSlider(target) {
    this.moveTarget = document.getElementsByClassName(target)[0];
    this.moveTargetPosition = this.moveTarget.getBoundingClientRect();
    this.bodyPosition = document.body.getBoundingClientRect();
    this.horizontalOffset = this.moveTargetPosition.left - this.bodyPosition.left;
    this.verticalOffset = this.moveTargetPosition.top - this.bodyPosition.top;
}

PictureSlider.prototype.beginTracking = function () {
    this.moveTarget.style.position = "relative";
    window.addEventListener('scroll', function () {
        if (window.innerWidth >= 799 && 
            window.innerWidth <= 1440) {
            // Target is landscape tablets and
            // computers  up to 15" mbp
            var scrollPosition = window.pageYOffset;
            this.moveTarget.style.right = ((scrollPosition * 4) + 'px');
            this.moveTarget.style.top = ((scrollPosition * 2) + 'px');
        } else if (window.innerWidth > 1440 &&
                   window.innerWidth <= 1920) {
            // Targets computers larger than 15" mbp,
            // TVs and consoles etc., but not larger
            // than 1080p to avoid scrolling issues
            var scrollPosition = window.pageYOffset;
            this.moveTarget.style.right = ((scrollPosition * 6) + 'px');
            this.moveTarget.style.top = ((scrollPosition * 2) + 'px');
        }
    }.bind(this));
};


var bioPortrait = new PictureSlider('image');
bioPortrait.beginTracking();
