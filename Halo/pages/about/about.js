document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems);
    var instance = M.Carousel.getInstance(elems[0]);
    setInterval(() => {
        instance.next();
    }, 2000);
});