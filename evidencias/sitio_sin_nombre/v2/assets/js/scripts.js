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

$(document).ready(function () {
    $("#contact_btn").click(function(){
        alert('Atención: Este es un sitio de pruebas.')
    });
});