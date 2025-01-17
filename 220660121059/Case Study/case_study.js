// Smooth Scroll Effect
const scrollLinks = document.querySelectorAll('a[href^="#"]');
scrollLinks.forEach(link => {
    link.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        window.scrollTo({
            top: target.offsetTop,
            behavior: "smooth"
        });
    });
});

// Profile Image Hover Effect (Zoom In)
const profileImage = document.querySelector(".profile-info img");
profileImage.addEventListener("mouseover", function () {
    this.style.transform = "scale(1.2)";
    this.style.transition = "transform 0.3s ease-in-out";
});
profileImage.addEventListener("mouseout", function () {
    this.style.transform = "scale(1)";
});

// Scroll Animation
const animateElements = document.querySelectorAll(".animate");
window.addEventListener("scroll", function () {
    animateElements.forEach(element => {
        if (isElementInViewport(element)) {
            element.classList.add("fade-in");
        }
    });
});

function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return rect.top >= 0 && rect.left >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight);
}

// Background Image Change Button
const changeBackgroundButton = document.createElement("button");
changeBackgroundButton.textContent = "Change Background Image";
changeBackgroundButton.style.position = "fixed";
changeBackgroundButton.style.bottom = "20px";
changeBackgroundButton.style.right = "20px";
changeBackgroundButton.style.padding = "10px";
changeBackgroundButton.style.border = "none";
changeBackgroundButton.style.backgroundColor = "#00796b";
changeBackgroundButton.style.color = "#fff";
changeBackgroundButton.style.cursor = "pointer";
changeBackgroundButton.style.borderRadius = "5px";
document.body.appendChild(changeBackgroundButton);

changeBackgroundButton.addEventListener("click", function () {
    changeBackgroundImage();
});

function changeBackgroundImage() {
    const images = [
        "https://wallpapers.com/images/hd/inazuma-genshin-dwax8tzmhpaqftc6.jpg", // Image 1
        "https://images6.alphacoders.com/127/thumb-1920-1272169.jpg", // Image 2
        "https://upload-os-bbs.hoyolab.com/upload/2023/01/22/73323670/49f8663125b209bc809b215b2fb34a86_2034104150738545133.png?x-oss-process=image%2Fresize%2Cs_1000%2Fauto-orient%2C0%2Finterlace%2C1%2Fformat%2Cwebp%2Fquality%2Cq_70", // Image 3
        "https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/8ce453d9-40c2-4cbf-bd37-6185c5cda602/dh253c0-73d02b9e-b8a5-4aeb-9b44-ad0a1b071465.png/v1/fill/w_1024,h_574,q_80,strp/commission_04___mondstadt___genshin_impact_by_leork_dream_dh253c0-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzhjZTQ1M2Q5LTQwYzItNGNiZi1iZDM3LTYxODVjNWNkYTYwMlwvZGgyNTNjMC03M2QwMmI5ZS1iOGE1LTRhZWItOWI0NC1hZDBhMWIwNzE0NjUucG5nIiwiaGVpZ2h0IjoiPD01NzQiLCJ3aWR0aCI6Ijw9MTAyNCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS53YXRlcm1hcmsiXSwid21rIjp7InBhdGgiOiJcL3dtXC84Y2U0NTNkOS00MGMyLTRjYmYtYmQzNy02MTg1YzVjZGE2MDJcL2xlb3JrLWRyZWFtLTQucG5nIiwib3BhY2l0eSI6OTUsInByb3BvcnRpb25zIjowLjQ1LCJncmF2aXR5IjoiY2VudGVyIn19.rlQKcQ89az5Gc5lLVvkw333tsjDXU3U2U8z_iuFQCqs", // Image 4
        "https://wallpapercave.com/wp/wp12802079.png" // Image 5
    ];
    const randomIndex = Math.floor(Math.random() * images.length);
    document.body.style.backgroundImage = `url(${images[randomIndex]})`;
    document.body.style.backgroundSize = "cover";
    document.body.style.backgroundRepeat = "no-repeat";
}


// Menampilkan pesan sambutan
function showWelcomeMessage() {
alert("Selamat datang di portofolio saya! Saya adalah seorang pengembara yang penuh semangat.");
}

window.onload = function() {
showWelcomeMessage(); // Panggil fungsi pesan sambutan
displayProjects();
displayExperience();
}