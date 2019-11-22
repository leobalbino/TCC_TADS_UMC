var app = new Vue({
    el: '#app',
    data: {
        currentSlide: 0,
        isPreviousSlide: false,
        isFirstLoad: true,
        slides: [
            {
                headlineFirstLine: "Laboratório",
                headlineSecondLine: "Praticas",
                sublineFirstLine: "Visite",
                sublineSecondLine: "Agende",
                bgImg: "logoUMC.jpg",
                rectImg: "img/15.jpg"
            },
            {
                headlineFirstLine: "Nulla",
                headlineSecondLine: "Auctor",
                sublineFirstLine: "Il n'y a rien de neuf sous",
                sublineSecondLine: "le soleil",
                bgImg: "img/13.jpg",
                rectImg: "img/21.jpg"
            },
            {
                headlineFirstLine: "Nullam",
                headlineSecondLine: "Ultricies",
                sublineFirstLine: "Τίποτα καινούργιο κάτω από",
                sublineSecondLine: "τον ήλιο",
                bgImg: "img/17.jpg",
                rectImg: "img/12.jpg"
            }
        ]
    },
  mounted: function () {
    var productRotatorSlide = document.getElementById("app");
        var startX = 0;
        var endX = 0;

        productRotatorSlide.addEventListener("touchstart", (event) => startX = event.touches[0].pageX);

        productRotatorSlide.addEventListener("touchmove", (event) => endX = event.touches[0].pageX);

        productRotatorSlide.addEventListener("touchend", function(event) {
            var threshold = startX - endX;

            if (threshold < 150 && 0 < this.currentSlide) {
                this.currentSlide--;
            }
            if (threshold > -150 && this.currentSlide < this.slides.length - 1) {
                this.currentSlide++;
            }
        }.bind(this));
  },
    methods: {
        updateSlide(index) {
            index < this.currentSlide ? this.isPreviousSlide = true : this.isPreviousSlide = false;
            this.currentSlide = index;
            this.isFirstLoad = false;
        }
    }
})