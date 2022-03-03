<template>
    <input type="submit"
    class="btn botonsito btn-primary"
    value="Nuevo Tipo de Producto"
    @click="AgregarTipo_producto"
    >
</template>
<script>
    export default {      
        methods:{
            async AgregarTipo_producto(){
                const { value: descripcion } = await Swal.fire({
                    title: 'Escriba el nombre del nuevo tipo de producto',
                    input: 'text',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Añadir Tipo de producto',
                    })  

                    if (descripcion) {           
                        // mandar peticion para crear nuevo tipo de producto
                        axios.post(`/Tipo_producto/${descripcion}`,{_method: 'post'})
                        .then(respuesta=>{
                                    console.log(respuesta)
                                    this.$swal({
                                    title: 'Creado con exito',
                                    text: 'Tipo de Producto Agregado',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: '1500'
                                    })
                        setTimeout( function() { window.location.href = '/Tipo_producto'; }, 1500 );
                        })
                                .catch(error=>{
                                    console.log(error)
                                }) 
                    }

            }
        }
    }
</script>