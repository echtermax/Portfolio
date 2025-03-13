document.querySelectorAll('nav a.nav-item').forEach(link => {
    link.addEventListener('click', event => {
        event.preventDefault();
        const targetURL = link.getAttribute('href');
        
        history.pushState(null, '', targetURL);
        
        const sectionId = targetURL.substring(1);
        const targetElement = document.getElementById(sectionId);
        if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    let urlParams = new URLSearchParams(window.location.search);
    let section = urlParams.get('section');
    if (section) {
        const targetElement = document.getElementById(section);
        if (targetElement) {
            history.replaceState(null, '', '/' + section);
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    }
});

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
            const currentIcon = this.querySelector(".list-icon");
            
            document.querySelectorAll(".experience-content h3").forEach(otherHeadline => {
                const otherList = otherHeadline.nextElementSibling;
                const otherIcon = otherHeadline.querySelector(".list-icon");
                
                if (otherList !== currentList) {
                    otherList.style.maxHeight = "0";
                    if (otherIcon) {
                        otherIcon.style.transform = "rotate(0deg)";
                    }
                }
            });
            
            if (currentList.style.maxHeight === "0px" || currentList.style.maxHeight === "") {
                currentList.style.maxHeight = currentList.scrollHeight + "px";
                if (currentIcon) {
                    currentIcon.style.transform = "rotate(90deg)";
                }
            } else {
                currentList.style.maxHeight = "0";
                if (currentIcon) {
                    currentIcon.style.transform = "rotate(0deg)";
                }
            }
        });
    });
});

// projects

function openLanguageModal(repoId) {
    document.getElementById('language-modal-' + repoId).style.display = 'block';
}
function closeLanguageModal(repoId) {
    document.getElementById('language-modal-' + repoId).style.display = 'none';
}
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
}