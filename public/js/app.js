function showPassword() {
    var x = document.getElementsByClassName("password");
    for (var i =0; i < x.length; i++){
        if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
    }

  }
  function showConfPassword() {
    var y = document.getElementsByClassName("confirm-password")[0];
    if (y.type === "password") {
      y.type = "text";
    } else {
      y.type = "password";
    }
  }

  function changetext() {
    var x = document.getElementById("btnshow");
    if (x.innerHTML === '<i class="fa-regular fa-eye"></i></button>') {
      x.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
    } else {
      x.innerHTML = '<i class="fa-regular fa-eye"></i></button>';
    }
  }
  function changeconftext() {
    var y = document.getElementById("btnshowconf");
    if (y.innerHTML === '<i style="font-size: 16px" class="bx bxs-show"></i>') {
      y.innerHTML = '<i style="font-size : 16px" class="bx bxs-hide" ></i>';
    } else {
      y.innerHTML = '<i style="font-size: 16px" class="bx bxs-show"></i>';
    }
  }
