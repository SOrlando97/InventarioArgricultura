<template>
    <input type="submit"
    class="btn btn-danger"
    value="Eliminar"
    style="width: 155px"
    @click="borrarcuenta"
    >
</template>
<script>
    export default {
        props:['usuarioActual'],
        methods:{
            borrarcuenta(){               
                this.$swal({
                    title: 'Seguro de borrar la cuenta?',
                    text: "Una vez Realizado no hay vuelta atras",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrarla'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            const params={
                                id: this.usuarioActual
                            }
                            axios.post(`/Usuario/${this.usuarioActual}`,{params, _method: 'delete'})
                            .then(respuesta=>{
                                console.log(respuesta)
                            })
                            .catch(error=>{
                                console.log(error)
                            })                           
                            this.$swal({
                            title: 'Borrada',
                            text: 'La cuenta ha sido eliminada ',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: '1000'
                            })
                            .then(function(){
                                window.location ="/home";
                            })
                        }
                    })
            }
        }
    }
</script>