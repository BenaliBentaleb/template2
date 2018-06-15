<template>
      <div class=""  >
            <div class="clearfix">
                <div class="float-left" v-if ="getper(sondage.id) ">
                    <strong>{{Number(s).toFixed(0) +"%"}}</strong>
                </div>
                <div class="float-left" v-else>
                    <strong>0%</strong>
                </div>

                <div class="float-right">
                    <small class="text-muted">{{sondage.choix}}</small>
                    </div>
            </div>
            <div class="progress progress-xs">
                <div class="progress-bar bg-blue"
                    role="progressbar" :style="{'width': Number(s).toFixed(0)  +'%'}"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="75"></div>
            </div>
        </div>
   
</template>

<script>
import { app } from "../app";
export default {
  props: ["sondage"],

  data() {
    return {
      s: "",
      m:''
    };


  },

  mounted() {
    app.$on("voter", (s) => {
   this.s = s;
  });
  },

  created() {
  // Using the service bus
  
 },

  methods: {
    getper(id) {
    //console.log(this.$parent.$options.methods.getPercentage(id))
      
      //return this.$parent.$options.methods.getPercentage(id)

      var request = axios.get(`/sondage/choix/getpercentage/${id}`);

       request.then(result => {
        // console.log( result);
       this.s =  result.data;
      });
       
           return this.s;
       
    }
  }
};
</script>

<style>
</style>
