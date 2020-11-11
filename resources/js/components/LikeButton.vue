<template>
    <div>
        <span
            class="like-btn"
            @click="likeReceta"
            :class="{ 'like-active': isActive }"
        ></span>
        <p>{{ cantidadLikes }} Les gustó esta receta</p>
    </div>
</template>

<script>
export default {
    props: ["recetaId", "like", "likes"],
    data:function(){
        return{
            totalLikes: this.likes,
            isActive:this.like
        }
    },
    methods: {
        likeReceta() {
            axios
                .post("/recetas/" + this.recetaId)
                .then(respuesta => {
                    if(respuesta.data.attached.length){
                        this.$data.totalLikes++;
                    } else {
                        this.$data.totalLikes--;
                    }

                    this.isActive = !this.isActive
                })
                .catch(error => {
                    if(error.response.status == 401){
                        window.location = "/register";
                    }
                });
        }
    },
    computed: {
        cantidadLikes: function() {
            return this.totalLikes
        }
    }
};
</script>
