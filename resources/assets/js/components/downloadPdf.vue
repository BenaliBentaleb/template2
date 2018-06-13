<template>
    <li class="single-file">
                    <span>{{nom.nom_fichier}}</span>
                    <a  @click="download(id)" type="button"
                         class="download-file-link" style="float:right;">
                        <i class="icon-arrow-down-circle download-icon"></i>
                        <span style="font-size:16px;" >Télécharger({{counter}})</span>
                    </a>
                </li>
</template>

<script>
export default {
    props:['id','nom'],
    data() {
        return {
            counter: ''
        }
    },
    mounted() {
        this.getNumberOfdownloads();
    },

    methods:{
          download(id) {
                this.counter++;
                axios.get(`/download/${this.id}/${this.counter}`).then(response => {
                //  console.log(response);
                  

                });
            },
            getNumberOfdownloads() {
                axios.get(`/file/numbre/download/${this.id}`).then(response => {
                  //  console.log(response); console.log(this.id);
                    this.counter = response.data;
                    
                    console.log(this.counter);
                });
            }
    }
}
</script>

<style>

</style>
