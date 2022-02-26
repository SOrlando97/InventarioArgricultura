<template>
    <input type="submit"
    class="btn botonsito btn-secondary"
    value="Modificar Contraseña"
    @click="CambiarContra"
    >
</template>
<script>
    export default {
        props:['usuarioActual'],
        methods:{
            async CambiarContra(){
                const { value: formValues } = await Swal.fire({
                    title: 'Cambiar contraseña',
                    text: 'Por favor digite la nueva contraseña, debe ser igual en los 2 campos',
                    html:
                        '<input id="swal-input1" placeholder="contraseña" class="swal2-input">' +
                        '<input id="swal-input2" placeholder="Repetir contraseña" class="swal2-input">',
                    focusConfirm: false,
                    showCancelButton: true,
                    confirmButtonText: 'Cambiar contraseña',
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
                                id: this.usuarioActual,
                            }    
                            //peticion para cambiar contraseña
                            axios.get(`/Usuarios/${this.usuarioActual}/${formValues[0]}/edit`,{params, _method: 'get'})
                            .then(respuesta=>{
                                console.log(respuesta)
                                this.$swal({
                                title: 'Cambiada',
                                text: 'La contraseña ha sido cambiada',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: '1000'
                                })
                            })
                            .catch(error=>{
                                console.log(error)
                            })  
                        }
                        else{
                            Swal.fire(
                            'Error',
                            'Las contraseñas tienen que ser iguales',
                            'error'
                            )
                        }
                    }

            }
        }
    }
</script>