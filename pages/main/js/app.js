// UI Constructor
class UI {
    addProduct(product) {
        const productList = document.getElementById('product-list');
        const element = document.createElement('div');
        element.innerHTML = `
            <div class="card text-center mb-10">
                <div class="card-body">
                    <strong>Categoría</strong>: ${product.category} -
                    <strong>Producto</strong>: ${product.name} -
                    <strong>Precio</strong>: ${product.price} - 
                    <strong>Fecha</strong>: ${product.year}
                    <a href="#" class="btn btn-danger" name="delete">Delete</a>
                </div>
            </div>
        `;
        productList.appendChild(element);
    }


 

    showMessage(message, cssClass) {
        const div = document.createElement('div');
        div.className = `alert alert-${cssClass} mt-2`;
        div.appendChild(document.createTextNode(message));
        // Show in The DOM
        const container = document.querySelector('.container');
        const app = document.querySelector('#App');
        // Insert Message in the UI
        container.insertBefore(div, app);
        // Remove the Message after 3 seconds
        setTimeout(function () {
            document.querySelector('.alert').remove();
        }, 3000);
    }
}


        

    //Create a new UI
    const ui = new UI();


    $('#product-form').on('submit', function (e) {
        const name = document.getElementById('name').value,
            category = document.getElementById('category').value,
            price = document.getElementById('price').value,
            year = document.getElementById('year').value;

        e.preventDefault();
        //Input User Validation
        if (category === '' || name === '' || price === '' || year === '') {
            ui.showMessage('Por favor inserta todos los datos', 'danger');
        }else{
        //Save Product
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

                            ui.showMessage('Producto añadido satisfactoriamente', 'success'); 

                            setTimeout(function(){
                                window.location.reload();
                            }, 1000);
                        } else {   
                            ui.showMessage('Ha ocurrido un error, inténtalo más tarde...', 'danger');
                    }
                }
            });
        }

    });

$('.delete').on('click', function (e) {
    e.preventDefault();
    Swal.fire({
        title: 'Estás seguro?',
        text: "No podrás revertir este cambio!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar!'
    }).then((result) => {
        if (result.value) {
            var id = $(this).attr('data-id');
            $.ajax({
                type: 'post',
                data: {
                    'id': id
                },
                url: 'functions/delete_product.php',
                success: function(data) {
                    var resultado =  JSON.parse(data);
                    if(resultado.respuesta == "correcto") {
                        Swal.fire(
                            'Eliminado!',
                            'Producto eliminado correctamente.',
                            'success'
                        );
                        setTimeout(function(){
                            window.location.reload();
                        }, 1000);
                    } else {
                        Swal.fire(
                            'Error!',
                            'Ha ocurrido un error, inténtalo de nuevo.',
                            'error'
                        )
                    }
                }
            });
        }
    })   
}); 

