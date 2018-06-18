<template>
   
           
           
                <div>
                  <div class="custom-controls-stacked" :id="'sondage-options'+pubcontenu">

                    <label class="custom-control custom-radio" v-for="sondage in sondages" :key="sondage.id">
                        <input type="radio" class="custom-control-input"
                         name="example-radios"  value="sondage.choix" @click="voter(sondage.id)" >
                        <div class="custom-control-label">{{sondage.choix}}</div>

                    </label>
                  <!--  <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="example-radios" value="option2">
                        <div class="custom-control-label">Option 2</div>
                    </label>-->
                    <div class="text-center" style="margin-bottom: 20px;margin-top:20px;">
                        <button :id="'show-result' + pubcontenu " @click="showResult(pubcontenu)"
                         class="btn btn-outline-primary  text-center" type="button">Afficher résultats</button>
                    </div>
                </div>

                <div class="sondage-result" 
                :id="'sondage-result'+pubcontenu" style="display: none;">
                 <div v-for="sondage in sondages" :key="sondage.id">
                    <sondagechoix :sondage='sondage'  ></sondagechoix>
                 </div>
                 
   
                </div>
                </div>
             
           
             
       
</template>

<script>
import sondagechoix from "./sondageChoix.vue";
import { app } from "../app";
export default {
  props: ["pubcontenu", "authuser"],
  components: {
    sondagechoix: sondagechoix
  },
  data() {
    return {
      sondages: "",
      p: ""
    };
  },

  mounted() {
    this.getPublicationSondage();
  },
  methods: {
    getPublicationSondage() {
      console.log(this.pubcontenu);
      axios
        .get(`/getPublicationOfSondage/${this.pubcontenu}`)
        .then(response => {
          this.sondages = response.data;
          console.log(response.data);
        })
        .catch(err => console.log(err));
    },
    voterr(idSondage, choix) {
      console.log(idSondage);
      //console.log(choix);
      axios
        .post(`/sondage/choix/${idSondage}`)
        .then(response => {
          console.log(response);
          var s = this.getPercentage(idSondage);
          console.log(s);
          // console.log(this.$children.$options.methods.getper(idSondage))
        })
        .catch(err => console.log(err));
    },
    getPercentage(id) {
      var request = axios.get(`/sondage/choix/getpercentage/${id}`);

      request.then(result => {
        //  console.log( result);
        this.p = result.data;
      });
      return this.p;
    },

    voter(idSondage) {
       console.log(idSondage);
      
        axios
        .post(`/sondage/choix/${idSondage}`)
        .then(response => {
          console.log(response);
          var s = this.getPercentage(idSondage);
          console.log(s);
         app.$emit("voter", s);
        })
        .catch(err => console.log(err));

      
    },

    showResult(id) {
      //$('.sondage-resultat').hide();
      //  $("#show-result"+id ).click(function(e) {
      //e.preventDefault();
      //$('.sondage-result').replaceWith('Hellooo');
      $("#sondage-options" + id).hide(500);
      //$('#show-result').hide(600);
      $("#sondage-result" + id).show(500);

      console.log("hi" + id);
      // });
    }
  }
};


</script>

<style>
</style>
