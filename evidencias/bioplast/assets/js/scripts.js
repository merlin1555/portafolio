/* Fade In */
document.addEventListener('DOMContentLoaded', function() {
    var fadeInSection = document.querySelectorAll('.fade-in-section');
    var options = {
        threshold: 0.33 // Cambia el umbral al 33%
    };

    var observer = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.intersectionRatio > 0) {
                entry.target.classList.add('fade-in');
                observer.unobserve(entry.target);
            }
        });
    }, options);

    fadeInSection.forEach(function(section) {
        observer.observe(section);
    });
});

/* slide */
document.addEventListener('DOMContentLoaded', function() {
    var slideInSection = document.querySelectorAll('.slide-in-section');
    var options = {
        threshold: 0.33 // Cambia el umbral al 33%
    };

    var observer = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.intersectionRatio > 0) {
                entry.target.classList.add('slide-in');
                observer.unobserve(entry.target);
            }
        });
    }, options);

    slideInSection.forEach(function(section) {
        observer.observe(section);
    });
});
$(document).ready(function () {
    /* volver arriba */
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        var btnVolverArriba = document.getElementById("btnVolverArriba");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            btnVolverArriba.style.display = "block";
        } else {
            btnVolverArriba.style.display = "none";
        }

        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            btnVolverArriba.style.left = "20px";
        } else {
            btnVolverArriba.style.left = "-100px";
        }
    }

    document.getElementById("btnVolverArriba").onclick = function() {
        document.body.scrollTop = 0; /* Para navegadores que no sean Chrome */
        document.documentElement.scrollTop = 0; /* Para Chrome, Firefox, IE y Opera */
    }
});
