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

// experience

document.addEventListener("DOMContentLoaded", function () {
    const headlines = document.querySelectorAll(".experience-content h3");
    
    headlines.forEach(headline => {
        headline.addEventListener("click", function () {
            const currentList = this.nextElementSibling;
            document.querySelectorAll(".experience-content ul").forEach(ul => {
                if (ul !== currentList) {
                    ul.style.maxHeight = "0";
                }
            });
            
            if (currentList.style.maxHeight === "0px" || currentList.style.maxHeight === "") {
                currentList.style.maxHeight = currentList.scrollHeight + "px";
            } else {
                currentList.style.maxHeight = "0";
            }
        });
    });
});