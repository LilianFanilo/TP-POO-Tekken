function init() {
    gsap.from(".js-logo",{
        duration: 1,
        y:50,
        opacity : 0,
    });

}
window.addEventListener("load", function() {
    init();
});

        