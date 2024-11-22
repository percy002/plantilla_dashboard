document.addEventListener("DOMContentLoaded", function () {
  // localStorage.removeItem("productos");
  const cantidadElement = document.getElementById("carrito_cantidad");
  const carrito_cantidad_mobile = document.getElementById(
    "carrito_cantidad_mobile"
  );

  let productos = JSON.parse(localStorage.getItem("productos")) || [];

  let cantidad = 0;
  productos.forEach(function (producto) {
    cantidad += producto.cantidad;
  });
  cantidadElement.innerText = cantidad;
  carrito_cantidad_mobile.innerText = cantidad;

  //agregar item al carrito
  window.agregarProducto = function (titulo) {
    let tituloServicio = "";
    const cantidadElement = document.getElementById("carrito_cantidad");
    const carrito_cantidad_mobile = document.getElementById(
      "carrito_cantidad_mobile"
    );

    let cantidad = cantidadElement.innerText;
    
    const servicioElement = document.getElementById(titulo);
    
    tituloServicio = servicioElement.querySelector('.servicio__card__titulo').innerText;
    let imagen = servicioElement.querySelector('.servicio__card__imagen img')?.src;
    if (!imagen) {
      imagen = servicioElement.querySelector('.servicio-detalle__card__imagen img').src;
    }    

    // Obtener la lista de productos desde el localStorage y convertirla a un array
    let productos = JSON.parse(localStorage.getItem("productos")) || [];

    let productoIndex = productos.findIndex(
      (producto) => producto.titulo === tituloServicio
    );
    
    if (productoIndex !== -1) {      
      if (parseInt(productos[productoIndex].cantidad) > 98) {        
        return;
      }
      productos[productoIndex].cantidad += 1;
    } else {
      productos.push({ titulo: tituloServicio, cantidad: 1, imagen: imagen });
    }
    cantidad++;

    cantidadElement.innerText = cantidad;
    carrito_cantidad_mobile.innerText = cantidad;
    localStorage.setItem("productos", JSON.stringify(productos));
  };

  //eliminar producto del carrito
  window.eliminarProducto = function (nombre) {
    let productos = JSON.parse(localStorage.getItem("productos")) || [];

    const cantidadElement = document.getElementById("carrito_cantidad");
    const carrito_cantidad_mobile = document.getElementById(
      "carrito_cantidad_mobile"
    );

    let cantidad = cantidadElement.innerText;

    let productoIndex = productos.findIndex(
      (producto) => producto.titulo === nombre
    );

    if (productoIndex !== -1) {
      productos.splice(productoIndex, 1); // Elimina el producto
      productos.forEach(function (producto) {
        cantidad += producto.cantidad;
      });
    }
    localStorage.setItem("productos", JSON.stringify(productos));

    const elementoProducto = document.getElementById(nombre);
    if (elementoProducto) {
      elementoProducto.remove();

      let cantidad = 0;
      productos.forEach(function (producto) {
        cantidad += producto.cantidad;
      });
      const cantidadElement = document.getElementById("carrito_cantidad");
      cantidadElement.innerText = cantidad;
      carrito_cantidad_mobile.innerText = cantidad;
    }
  };

  window.comprar = function () {
    var datos = localStorage.getItem("productos");
    if (!datos) {
      alert("No hay productos para comprar.");
      return;
    }
    var productos = JSON.parse(datos);
    var mensaje = "Quisiera comprar los siguientes servicios:\n";
    productos.forEach(function (producto, index) {
      mensaje +=
        index +
        1 +
        ". " +
        producto.titulo +
        " | cantidad: " +
        producto.cantidad +
        "\n";
    });

    var numero = "+51950314016";
    var urlWhatsApp = `https://wa.me/${numero}?text=${encodeURIComponent(
      mensaje
    )}`;

    window.open(urlWhatsApp, "_blank");
  };

  window.comprarServicio = function () {
    const servicio = document.querySelector(".servicio__card__titulo");
    var mensaje = `Quiero mas información del producto:\n ${servicio.textContent}`;

    var numero = "+51950314016";
    var urlWhatsApp = `https://wa.me/${numero}?text=${encodeURIComponent(
      mensaje
    )}`;

    window.open(urlWhatsApp, "_blank");
  };
});

document.addEventListener("DOMContentLoaded", function () {
  var modal = document.getElementById("exampleModal");
  modal.addEventListener("show.bs.modal", function (event) {
    const modalBody = document.getElementById("modalBodyContent");
    const productos = JSON.parse(localStorage.getItem("productos") || "[]");
    if (productos.length > 0) {
      productos.forEach(function (producto, index) {
        const elementoProducto = document.getElementById(producto.titulo);
        if (elementoProducto) {
          return;
        }
        modalBody.innerHTML += `
            <div class="servicios-seleccionados" id="${producto.titulo}">
                <div class="servicios-title">
                  <img src="${producto.imagen}" alt="${producto.titulo}" />
                  <p>${producto.titulo}</p>
                </div>
                <div class="servicios-cantidad">
                <button onclick="decrementarCantidad(${index},'${
          producto.titulo
        }')"><i class="fas fa-minus-circle"></i></button>
                <input 
                    type="text" 
                    value="${producto.cantidad}" 
                    oninput="this.value = this.value.replace(/[^0-9]/g, ''); 
                    if (this.value !== '' && (parseInt(this.value) < 1 || parseInt(this.value) > 99)) {
                        this.value = Math.min(Math.max(parseInt(this.value), 1), 99);
                    }" 
                    onchange="actualizarCantidad('${
                      producto.titulo
                    }', this.value)"
                    id="cantidad-${index}"
                />
                <button onclick="incrementarCantidad(${index},'${
          producto.titulo
        }')"><i class="fas fa-plus-circle"></i></button>
                </div>
                <div>
                <button 
                    class="buCancelar" 
                    onclick="eliminarProducto('${producto.titulo}')" 
                    aria-label="Eliminar ${producto.titulo.replace(
                      /"/g,
                      "&quot;"
                    )}"
                >
                    <i class="fas fa-trash-alt"></i>
                </button>
                </div>
            </div>
            `;
      });
    } else {
      modalBody.innerHTML = "No hay datos disponibles";
    }
  });
  modal.addEventListener("hide.bs.modal", function () {
    var modalBody = document.getElementById("modalBodyContent");
    modalBody.innerHTML = ""; // Limpia el contenido al cerrar el modal
  });

  const detalleServicioElements = document.querySelectorAll(".detalleServicio");

  detalleServicioElements.forEach((element, index) => {
    element.addEventListener("click", () => {
      numeroServicio = index + 1;

      const servicioElement = document.getElementById(
        "servicio" + numeroServicio
      );

      const servicioId = servicioElement.id;
      const title = servicioElement.querySelector('.servicio__card__titulo').textContent;
      const imagen = servicioElement.querySelector('.servicio__card__imagen img').src;
      const precio = servicioElement.querySelector('.servicio__card__precio').textContent;
      
      const descripcionBreve = servicioElement.querySelector('.servicio__card__descripcion_breve').innerHTML;
      const descripcionExtensa = servicioElement.querySelector('.servicio__card__descripcion_extensa').innerHTML;

      const servicioData = {
        title,
        precio,
        descripcionBreve,
        descripcionExtensa,
        imagen,
        servicioId
      };
      localStorage.setItem("servicioData", JSON.stringify(servicioData));
      window.location.href = "servicio.php";
    });
  });

  //actualizar cantidad total
  window.actualizarCantidad = function (titulo, cantidad) {
    let productos = JSON.parse(localStorage.getItem("productos")) || [];
    let productoIndex = productos.findIndex(
      (producto) => producto.titulo === titulo
    );

    if (productoIndex !== -1) {
      const cantidadElement = document.getElementById("carrito_cantidad");
      const carrito_cantidad_mobile = document.getElementById(
        "carrito_cantidad_mobile"
      );

      let nuevaCantidad =
        parseInt(cantidadElement.innerText, 10) + parseInt(cantidad);

      if (cantidad !== 1 && cantidad !== -1) {
        nuevaCantidad =
          nuevaCantidad - parseInt(productos[productoIndex].cantidad);
      }

      //actualizar imput
      cantidadElement.innerText = nuevaCantidad;
      carrito_cantidad_mobile.innerText = nuevaCantidad;

      //actualizar localstorage
      if (cantidad == 1 || cantidad == -1) {
        productos[productoIndex].cantidad = parseInt(
          parseInt(productos[productoIndex].cantidad) + parseInt(cantidad),
          10
        );
      } else {
        productos[productoIndex].cantidad = parseInt(cantidad);
      }

      //actualizar lista
      localStorage.setItem("productos", JSON.stringify(productos));
    }
  };

  // incrementar la cantidad del producto
  window.incrementarCantidad = function (index, titulo = "") {
    let input = document.querySelector(`#cantidad-${index}`);
    let nuevaCantidad = parseInt(input.value, 10) + 1;
    if (input.value <= 98) {
      input.value = nuevaCantidad;
      actualizarCantidad(titulo, 1);
    }
  };

  // decrementar la cantidad del producto
  window.decrementarCantidad = function (index, titulo) {
    let input = document.querySelector(`#cantidad-${index}`);
    let nuevaCantidad = parseInt(input.value, 10) - 1;
    if (nuevaCantidad >= 1) {
      input.value = nuevaCantidad;
      actualizarCantidad(titulo, -1);
    }
  };
});

if (!sessionStorage.getItem("sessionActive")) {
  // Si no existe
  localStorage.removeItem("productos");
}

// Crea una clave en sessionStorage para marcar que la sesión está activa
sessionStorage.setItem("sessionActive", "true");

window.addEventListener("pageshow", function () {
  const cantidadElement = document.getElementById("carrito_cantidad");
  const carrito_cantidad_mobile = document.getElementById("carrito_cantidad_mobile");

  let productos = JSON.parse(localStorage.getItem("productos")) || [];

  let cantidad = 0;
  productos.forEach(function (producto) {
    cantidad += producto.cantidad;
  });
  cantidadElement.innerText = cantidad;
  carrito_cantidad_mobile.innerText = cantidad;
});
