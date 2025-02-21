$(window).on('load', function() {
    const Time = 1000; // 1 seconde (1000 ms)
    
    setTimeout(function() {
        $('#preloader').fadeOut("slow", function() {
            $(this).remove(); // Supprime l'élément du DOM
        });
    }, Time);
});
