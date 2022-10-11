// CAROUSEL

const buttons = document.querySelectorAll("[data-carousel-button]");

buttons.forEach(button => {
    button.addEventListener("click", () => {
        const offset = button.dataset.carouselButton === "next" ? 1 : -1
        const slides = button.closest("[data-carousel]").querySelector("[data-slides]")

        const activeSlide = slides.querySelector("[data-active]")
        let newIndex = [...slides.children].indexOf(activeSlide) + offset
        if (newIndex < 0) newIndex = slides.children.length - 1
        if (newIndex >= slides.children.length) newIndex = 0

        slides.children[newIndex].dataset.active = true
        delete activeSlide.dataset.active
    })
})

// DELETE DESTINATION

document.querySelectorAll(".js_article_button_deleted").forEach(element =>{
    element.addEventListener("click", (e)=> fetchIdArticle(e))
    
})

const fetchIdArticle = (e)=>{
    let article_id = e.currentTarget.dataset.article_id;
    document.querySelector("#js_article_deleted_id").value = article_id;
}

// MENU BG

function toggleMenu () {
    const navbar = document.querySelector('.navbar');
    const burger = document.querySelector('.burger');
    // const div = document.querySelector('.picto-hero-section');
    burger.addEventListener('click', () => {
        navbar.classList.toggle('show-nav');
        // div.classList.toggle('show-nav');
    })
}
toggleMenu();

// NAVBAR

const header = document.querySelector('header');
const hero = document.querySelector('.hero-section');

const options = {
    rootMargin: '-70px'
}

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
             header.classList.remove('changecolor')
        } else {
            header.classList.add('changecolor')
        }
    })
}, options)


observer.observe(hero)