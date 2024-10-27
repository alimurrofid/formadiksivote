// Fungsi untuk menampilkan atau menyembunyikan password
function showPassword(userId = "") {
    var passwordInput = document.querySelector(`#password${userId}`);
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

// Fungsi untuk mengganti ikon tombol show/hide password
function changeText(userId = "") {
    var eyeIcon = document.querySelector(`#password${userId} + button i`);
    if (eyeIcon.classList.contains("fa-eye-slash")) {
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    } else {
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    }
}

// Fungsi untuk menampilkan atau menyembunyikan konfirmasi password
function showConfPassword(userId = "") {
    var confPasswordInput = document.querySelector(
        `#confirm-password${userId}`
    );
    if (confPasswordInput.type === "password") {
        confPasswordInput.type = "text";
    } else {
        confPasswordInput.type = "password";
    }
}

// Fungsi untuk mengganti ikon tombol show/hide konfirmasi password
function changeConfText(userId = "") {
    var eyeIcon = document.querySelector(
        `#confirm-password${userId} + button i`
    );
    if (eyeIcon.classList.contains("fa-eye-slash")) {
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    } else {
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    }
}

function Menu(e) {
    let list = document.querySelector("ul");
    e.name === "menu"
        ? ((e.name = "close"),
          list.classList.add("top-[70px]"),
          list.classList.add("opacity-100"))
        : ((e.name = "menu"),
          list.classList.remove("top-[70px]"),
          list.classList.remove("opacity-100"));
}

const switchToggle = document.querySelector("#switch-toggle");
const html = document.querySelector("html");

const darkIcon = '<ion-icon name="moon"></ion-icon>';
const lightIcon = '<ion-icon name="sunny"></ion-icon>';

// Ambil preferensi dari localStorage jika ada
let isDarkmode = localStorage.getItem("theme") === "dark" ? true : false;

// Fungsi untuk toggle mode
function toggleTheme() {
    isDarkmode = !isDarkmode;
    switchTheme();
}

// Fungsi untuk mengganti tema
function switchTheme() {
    if (isDarkmode) {
        html.classList.add("dark");
        switchToggle.classList.remove("bg-white", "text-black");
        switchToggle.classList.add("bg-neutral-900", "text-white");
        switchToggle.innerHTML = darkIcon;

        // Simpan preferensi dark mode di localStorage
        localStorage.setItem("theme", "dark");
    } else {
        html.classList.remove("dark");
        switchToggle.classList.remove("bg-neutral-900", "text-white");
        switchToggle.classList.add("bg-white", "text-black");
        switchToggle.innerHTML = lightIcon;

        // Simpan preferensi light mode di localStorage
        localStorage.setItem("theme", "light");
    }
}

// Panggil switchTheme saat halaman dimuat untuk menerapkan preferensi
document.addEventListener("DOMContentLoaded", switchTheme);