<template>
    <input
        type="submit"
        class="btn btn-danger d-block w-100 mb-2"
        value="Eliminar x"
        @click="eliminarReceta"
    >
</template>

<script>
export default {
    props:['recetaId'],
    methods:{
        eliminarReceta(){
            console.log('click',this.recetaId);
        }
    }
}
</script>
