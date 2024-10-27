// Fungsi untuk menampilkan atau menyembunyikan password
function showPassword() {
    var passwordInputs = document.getElementsByClassName("passwords");
    Array.from(passwordInputs).forEach(function (input) {
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    });
}

// Fungsi untuk mengganti ikon tombol show/hide password
function changeText() {
    var buttons = document.getElementsByClassName("btnshow");
    Array.from(buttons).forEach(function (button) {
        var icon = button.querySelector("i");
        if (icon.classList.contains("fa-eye-slash")) {
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    });
}

// Fungsi untuk menampilkan atau menyembunyikan konfirmasi password
function showConfPassword() {
    var confPasswordInputs =
        document.getElementsByClassName("confirm-password");
    Array.from(confPasswordInputs).forEach(function (input) {
        if (input.type === "password") {
            input.type = "text";
        } else {
            input.type = "password";
        }
    });
}

// Fungsi untuk mengganti ikon tombol show/hide konfirmasi password
function changeConfText() {
    var buttons = document.getElementsByClassName("btnshow-conf");
    Array.from(buttons).forEach(function (button) {
        var icon = button.querySelector("i");
        if (icon.classList.contains("fa-eye-slash")) {
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        } else {
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        }
    });
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