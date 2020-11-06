<template>
    <input type="submit" class="btn btn-danger d-block w-100 mb-2" value="Eliminar x">
</template>

<script>
export default {
    props:['recetaId'],
    mounted(){
        console.log('receta actual',this.recetaId)
    }
}
</script>
