var pwd = document.getElementById('pwd');
var eye = document.getElementById('eye');

eye.addEventListener('click',togglePass);

function togglePass(){

   eye.classList.toggle('active');

   (pwd.type == 'password') ? pwd.type = 'text' : pwd.type = 'password';
}

// Form Validation

function checkStuff() {
  var name = document.form1.name;
  var email = document.form1.email;
  var password = document.form1.pwd;
  var confirmpass = document.form1.confirm;
  var msg = document.getElementById('msg');
  
  if (name.value == "") {
    msg.style.display = 'block';
    msg.innerHTML = "Introduce tu nombre!";
    name.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }

  if (email.value == "") {
    msg.style.display = 'block';
    msg.innerHTML = "Introduce tu email!";
    email.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
  
   if (password.value == "") {
    msg.style.display = 'block';
    msg.innerHTML = "Por favor introduce tu contraseña";
    password.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
  if (confirmpass.value == "") {
    msg.style.display = 'block';
    msg.innerHTML = "Por favor confirma tu contraseña";
    confirmpass.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
  if(confirmpass.value !== password.value){
    msg.style.display = 'block';
    msg.innerHTML = "Las contraseñas no coinciden";
    confirmpass.focus();
    return false;
  } else {
    msg.innerHTML = "";
  }
   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!re.test(email.value)) {
    msg.innerHTML = "Por favor introduce un email válido";
    email.focus();
    return false;
  } else {
    msg.style.display = 'none';
    msg.innerHTML = ""; 
    redirect(); // ACCION
  }

          
};
    
window.addEventListener("keyup", function(e){
    if(e.keyCode === 13){
    checkStuff()    
    }
});

// ParticlesJS

// ParticlesJS Config.
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 150,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.1,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 6,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.1,
      "width": 2
    },
    "move": {
      "enable": true,
      "speed": 1.5,
      "direction": "top",
      "random": false,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "repulse"
      },
      "onclick": {
        "enable": false,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});

function redirect(){
    $('#create-account').on('submit', function(e) {
    e.preventDefault();
       var datos = $(this).serialize(); 
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',             
            success: function(data) {
                 var resultado = data;
                if(resultado.respuesta == 'exito') {
                    Swal.fire(
                        'Registro Exitoso!',
                        'Cuenta creada correctamente!',
                        'success'
                    );
                    setTimeout(function(){
                        window.location.href = '../../index.php';
                    }, 2000);
                } else {
                    Swal.fire(
                        'Error...',
                        'Se ha producido un error, inténtalo más tarde!',
                        'error'
                    );
                }
            }
        });
});
}