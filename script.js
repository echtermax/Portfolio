// Navbar
document.addEventListener("DOMContentLoaded", function () {
    const sections = document.querySelectorAll("section");
    const navItem = document.querySelectorAll(".nav-item");
    
    const observerOptions = {
        root: null,
        rootMargin: "0px",
        threshold: 0.6,
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                navItem.forEach(item => {
                    item.classList.remove("active");
                    if (item.getAttribute("href").substring(1) === entry.target.id) {
                        item.classList.add("active");
                    }
                });
            }
        });
    }, observerOptions);
    
    sections.forEach(section => observer.observe(section));
});