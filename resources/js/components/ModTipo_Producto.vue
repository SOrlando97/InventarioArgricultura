<template>
    <input type="submit"
    class="btn botonsito btn-success"
    value="Modificar"
    @click="CambiarTipo_Producto"
    >
</template>
<script>
    export default {
        props:['tipoProducto'],
        methods:{
            async CambiarTipo_Producto(){
                const { value: formValues } = await Swal.fire({
                    title: 'Modificar Producto',
                    text: 'Por escriba el nuevo nombre del Tipo de Producto',
                    html:
                        '<input id="swal-input1" placeholder="Nombre" class="swal2-input">' +
                        '<input id="swal-input2" placeholder="Repetir Nombre" class="swal2-input">',
                    focusConfirm: false,
                    showCancelButton: true,
                    confirmButtonText: 'Cambiar Nombre',
                    cancelButtonText: 'Cancelar',
                    preConfirm: () => {
                        return [
                        document.getElementById('swal-input1').value,
                        document.getElementById('swal-input2').value
                        ]
                    }
                    })

                    if (formValues) {
                        if(formValues[0]==formValues[1]){
                            const params={                                
                                id: this.tipoProducto,
                            }    
                            //peticion para cambiar contraseña
                            axios.post(`/Tipo_producto/${this.tipoProducto}/${formValues[0]}`,{params, _method: 'put'})
                            .then(respuesta=>{
                                console.log(respuesta)
                                this.$swal({
                                title: 'Cambiado',
                                text: 'El Nombre ha sido cambiado',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: '1000'
                                })                                
                                setTimeout( function() { window.location.href = '/Tipo_producto'; }, 1500 );
                            })
                            .catch(error=>{
                                console.log(error)
                            })  
                        }
                        else{
                            Swal.fire(
                            'Error',
                            'El nombre en los 2 campos tiene que ser igual',
                            'error'
                            )
                        }
                    }

            }
        }
    }
</script>