<template>
    <div>
        <span class="like-btn" @click="likeReceta" :class="{'like-active':this.like}"></span>
    </div>
</template>

<script>
export default {
    props: ["recetaId","like"],
    methods: {
        likeReceta() {
            axios.post('/recetas/'+this.recetaId)
                 .then(respuesta => {
                     console.log(respuesta);
                 })
                 .catch(error => {
                     console.log(error);
                 });
        }
    }
};
</script>
