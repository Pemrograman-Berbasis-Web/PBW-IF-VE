    const navLinks = document.querySelectorAll('nav a');

navLinks.forEach(link => {
    link.addEventListener('mouseover', () => {
        link.style.transform = 'scale(1.2)';
        link.style.transition = 'transform 0.3s ease';
    });

    link.addEventListener('mouseout', () => {
        link.style.transform = 'scale(1)';
    });
});

const darkModeToggle = document.getElementById('darkModeToggle');
const body = document.body;

darkModeToggle.addEventListener('click', () => {
    body.classList.toggle('dark-mode');

    if (body.classList.contains('dark-mode')) {
        darkModeToggle.textContent = 'Mode Terang';
    } else {
        darkModeToggle.textContent = 'Mode Gelap';
    }
});

// Tambahkan gaya CSS untuk mode gelap
const darkModeStyles = document.createElement('style');
darkModeStyles.innerHTML = `
    .dark-mode {
        background-color: #000;
        color: #fff;
    }

    .dark-mode header, .dark-mode footer, .dark-mode nav {
        background-color: #333;
    }

    .dark-mode nav a {
        color: #00ffff;
    }

    .dark-mode section {
        background-color: #444;
        box-shadow: 0px 0px 15px rgba(255, 0, 255, 0.2);
    }
`;
document.head.appendChild(darkModeStyles);

const scrollLinks = document.querySelectorAll('nav a');

scrollLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const targetId = link.getAttribute('href').substring(1);
        const targetSection = document.getElementById(targetId);

        window.scrollTo({
            top: targetSection.offsetTop - 20, // Sesuaikan posisi agar tidak terlalu menempel ke atas
            behavior: 'smooth'
        });
    });
});

const projectPopup = document.getElementById('projectPopup');
const popupTitle = document.getElementById('popupTitle');
const popupDescription = document.getElementById('popupDescription');
const closeBtn = document.querySelector('.close-btn');

// Menampilkan popup dengan konten yang diinginkan
function showPopup(title, description) {
    popupTitle.textContent = title;
    popupDescription.textContent = description;
    projectPopup.style.display = 'block';
}

// Menutup popup
closeBtn.addEventListener('click', () => {
    projectPopup.style.display = 'none';
});

// Tambahkan event listener pada proyek
const projects = document.querySelectorAll('.portfolio-item');
projects.forEach(project => {
    project.addEventListener('click', () => {
        const title = project.querySelector('h3').textContent;
        const description = project.querySelector('p').textContent;
        showPopup(title, description);
    });
});

// Menutup popup jika pengguna mengklik di luar area popup
window.addEventListener('click', (e) => {
    if (e.target === projectPopup) {
        projectPopup.style.display = 'none';
    }
});