<template>
    <input type="submit"
    class="btn botonsito btn-danger"
    value="Eliminar"    
    @click="BorrarProducto"
    >
</template>
<script>
    export default {
        props:['producto'],
        methods:{
            BorrarProducto(){             
                this.$swal({                    
                    title: 'Seguro de borrar el producto?',
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
                                id: this.producto,
                            }                                                 
                            axios.post(`/productos/${this.producto}`,{params, _method: 'delete'})
                            .then(respuesta=>{
                                console.log(respuesta)
                                this.$swal({
                                title: 'Borrado',
                                text: 'Producto Eliminado',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: '1000'
                                })
                            setTimeout( function() { window.location.href = '/productos'; }, 1500 );
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