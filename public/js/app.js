// function showPassword() {
//     var x = document.getElementsByClassName("password")[0];
//     for (var i =0; i < x.length; i++){
//         if (x.type === "password") {
//             x.type = "text";
//           } else {
//             x.type = "password";
//           }
//     }

//   }
//   function showConfPassword() {
//     var y = document.getElementsByClassName("confirm-password")[0];
//     if (y.type === "password") {
//       y.type = "text";
//     } else {
//       y.type = "password";
//     }
//   }

//   function changetext() {
//     var x = document.getElementById("btnshow");
//     if (x.innerHTML === '<i class="fa-regular fa-eye"></i></button>') {
//       x.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
//     } else {
//       x.innerHTML = '<i class="fa-regular fa-eye"></i></button>';
//     }
//   }
//   function changeconftext() {
//     var y = document.getElementById("btnshowconf");
//     if (y.innerHTML === '<i style="font-size: 16px" class="bx bxs-show"></i>') {
//       y.innerHTML = '<i style="font-size : 16px" class="bx bxs-hide" ></i>';
//     } else {
//       y.innerHTML = '<i style="font-size: 16px" class="bx bxs-show"></i>';
//     }
//   }

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
let isDarkmode = false;

const darkIcon = '<ion-icon name="moon"></ion-icon>';
const lightIcon = '<ion-icon name="sunny"></ion-icon>';

function toggleTheme() {
    isDarkmode = !isDarkmode;
    switchTheme();
}

function switchTheme() {
    if (isDarkmode) {
        html.classList.add("dark");
        switchToggle.classList.remove("bg-white", "text-black");
        switchToggle.classList.add("bg-neutral-900", "text-white");
        setTimeout(() => {
            switchToggle.innerHTML = darkIcon;
        });
    } else {
        html.classList.remove("dark");
        switchToggle.classList.remove("bg-neutral-900", "text-white");
        switchToggle.classList.add("bg-white", "text-black");
        setTimeout(() => {
            switchToggle.innerHTML = lightIcon;
        });
    }
}
