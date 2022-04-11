<template>
    <input type="submit"
    class="btn botonsito btn-danger"
    value="Eliminar"    
    @click="BorrarTipoProducto"
    >
</template>
<script>
    export default {
        props:['tipoProducto'],
        methods:{
            BorrarTipoProducto(){             
                this.$swal({                    
                    title: 'Seguro de borrar el tipo de producto?',
                    text: "Una vez Realizado no hay vuelta atras",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrarlo',
                    cancelButtonText: 'Cancelar'
                    })
                    .then((result) => {                        
                        if (result.isConfirmed) {
                            const params={                                
                                id: this.tipoProducto,
                            }                                                 
                            axios.post(`/Tipo_producto/${this.tipoProducto}`,{params, _method: 'delete'})
                            .then(respuesta=>{
                                console.log(respuesta)
                                this.$swal({
                                title: 'Borrado',
                                text: 'Tipo de Producto Eliminado',
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
                    })
            }
        }
    }
</script>