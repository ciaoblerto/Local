document.querySelector(".hamburgerMenu").addEventListener("click", () => {
    const navLinks = document.querySelector(".navLinks");
    navLinks.classList.toggle("active");
});

//sliderit

var i = 0; 
var testimonials = [
    {
        image: "./assets/kit.jpg",
        text: "Ever since finding out about this website back in 2017, I have used it to plan trips with my family, and we could not be more satisfied.",
        info: "I defended Castle Black"
    },
    {
        image: "./assets/President_Barack_Obama.jpg",
        text: "This platform has been an amazing companion for our travel planning. It's user-friendly and has all the tools we need.",
        info: "I am Castle Black"
    },
    {
        image: "./assets/chris.webp",
        text: "The recommendations and trip planning features are unmatched! My family loves it.",
        info: "I hate Castle Black"
    }
];
    
    function ndrroImg() {
        document.getElementById('placeholder').style.backgroundImage = 'url(' + testimonials[i].image + ')';
        document.getElementById('textboxes-text').innerText = testimonials[i].text;
        document.getElementById('smallinfo-text').innerText = testimonials[i].info;
    
        if (i < testimonials.length - 1) {
            i++;
        } else {
            i = 0;
        }
        }
    
    document.getElementById('next-btn').addEventListener('click', ndrroImg);
    window.onload = ndrroImg;

//per footer
document.getElementById("currentYear").textContent = new Date().getFullYear();


