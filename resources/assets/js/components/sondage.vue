<template>
   
            <div class="content">
                {{pubcontenu.contenu}}
                <br>
                <div class="custom-controls-stacked" :id="'sondage-options'+pubcontenu.id">

                    <label class="custom-control custom-radio" v-for="sondage in sondages" :key="sondage.id">
                        <input type="radio" class="custom-control-input" name="example-radios" value="sondage.choix" @click="voter(sondage.id,sondage.choix)" >
                        <div class="custom-control-label">{{sondage.choix}}</div>
                    </label>
                  <!--  <label class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" name="example-radios" value="option2">
                        <div class="custom-control-label">Option 2</div>
                    </label>-->
                    <div class="text-center" style="margin-bottom: 20px;margin-top:20px;">
                        <button :id="'show-result' + pubcontenu.id " @click="showResult(pubcontenu.id)" class="btn btn-outline-primary  text-center" type="button">Afficher résultats</button>
                    </div>
                </div>

                <div class="sondage-result" 
                :id="'sondage-result'+pubcontenu.id" style="display: none;">
                    <div class="" v-for="sondage in sondages" :key="sondage.id" >
                        <div class="clearfix">
                            <div class="float-left" v-if ="getPercentage(sondage.id) ">
                                <strong>{{getPercentage(sondage.id) +"%"}}</strong>
                            </div>
                            <div class="float-left" v-else>
                                <strong>0%</strong>
                            </div>

                            <div class="float-right">
                                <small class="text-muted">{{sondage.choix}}</small>
                              </div>
                        </div>
                        <div class="progress progress-xs">
                            <div class="progress-bar bg-blue" role="progressbar" :style="{'width': getPercentage(sondage.id)+'%'}" aria-valuenow="80" aria-valuemin="0" aria-valuemax="75"></div>
                        </div>
                    </div>
   
                </div>
             
            </div>
             
       
</template>

<script>
export default {
  props: ["pubcontenu", "authuser"],
  data() {
    return {
      sondages: "",
      p:''
    };
  },

  mounted() {
    this.getPublicationSondage();
  },
  methods: {
    getPublicationSondage() {
      console.log(this.pubcontenu);
      axios
        .get(`/getPublicationOfSondage/${this.pubcontenu.id}`)
        .then(response => {
          this.sondages = response.data;
          console.log(response.data);
        })
        .catch(err => console.log(err));
    },
    voter(idSondage, choix) {
       console.log(this.getPercentage(idSondage) );
       
      console.log(idSondage);
      console.log(choix);
      axios
        .post(`/sondage/choix/${idSondage}`)
        .then(response => {
          console.log(response);
        })
        .catch(err => console.log(err));
    },

    //getPercentage(id) {
    /*  axios.get(`/sondage/choix/getpercentage/${id}`).then(response => {
        return response.data;
        // console.log(per +'   ' + id);
      });*/

    getPercentage(id) {
      
      var  request= axios.get(`/sondage/choix/getpercentage/${id}`);
      
      request
        .then(result => {
         this.p =  result.data
       
         
        });
      
      return this.p;
     



   
    },

    //console.log(this.percentage);
    //   return  this.percentage;
    // },

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
