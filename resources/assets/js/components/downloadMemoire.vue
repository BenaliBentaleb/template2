<template>
    <div>
        <h5 style="margin-top:0px;margin-bottom:0;">Nombre de telechargement : {{numberDownloader}} </h5>
        <a  @click="download(id)"
         class="btn btn-link btn-block" type="button" style="font-size:16px;">
        <i class="icon-arrow-down-circle" style="font-size:16px;padding-right:10px;" >
        </i>Télécharger</a>
    </div>

</template>

<script>
    export default {
        props:['id'], 
        

        data() {
            return {
                numberDownloader:'',
            }
        },
        mounted() {
            this.getNumberOfdownloads();
        },
        methods: {
            download(id) {
                this.numberDownloader++;
                axios.get(`/memoire/download/${this.id}/${this.numberDownloader}`).then(response => {
                  

                });
            },
            getNumberOfdownloads() {
                axios.get(`/memoire/numbre/download/${this.id}`).then(response => {
                    console.log(response); console.log(this.id);
                    this.numberDownloader = response.data;
                    
                    console.log(this.numberDownloader);
                });
            }
        }


    };
</script>

<style>
</style>