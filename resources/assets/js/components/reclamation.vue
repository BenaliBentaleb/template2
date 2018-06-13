<template>
    <div class="col-md-9 col-md-offset-0">
        <div class="reclamation-container">
            <div class="row register-form">
                <div class="col-md-10 col-md-offset-1">
                    <form class="form-horizontal custom-form">
                        <h1 class="text-capitalize">Déposer une réclamation</h1>
                        <p class="reclamation-note">
                            <span>Note :</span>Vos informations ( nom, prénom, formation et groupe ) dans votre profile doivent
                            être juste.</p>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="name-input-field">Titre de réclamation</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text"  v-model="titre" required="" autofocus="">
                                 <small class="has-text-danger"  v-if="errors.title">{{errors.titre[0]}} </small>
  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">Type de réclamation</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <select class="form-control reclamation-type" v-model="type" required="">
                                    <option value="Reclamation generale" selected="">Réclamation générale</option>
                                    <option value="Faute de calcule">Faute de calcule</option>
                                    <option value="Changer le rôle">Changer le rôle</option>
                                    <option value="Suggestion">Suggestion</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">Contenu</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <textarea class="form-control reclamation" v-model="contenu"  required="" placeholder="Donnez tous le details possible pour bien régler votre réclamation .."
                                    autofocus=""></textarea>
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-default submit-button" @click.prevent="envoyer()">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
   
  data() {
    return {
      titre: "",
      type: "",
      contenu: "",
      errors: {}
    };
  },

  notifications: {
    ajouterReclamation: {
      // You can have any name you want instead of 'showLoginError'
      title: "Ajouter!",
      message: "Votre reclamation est ajouté avec success",
      type: "success" // You also can use 'VueNotifications.types.error' instead of 'error'
    },
    errorReclamation: {
      // You can have any name you want instead of 'showLoginError'
      title: "Les champs est vide!",
      message: "Svp remplie tous les champs",
      type: "error" // You also can use 'VueNotifications.types.error' instead of 'error'
    }
  },

  methods: {
    envoyer() {
      if (this.titre != "" && this.type != "" && this.contenu != "") {
        axios
          .post("/reclamation/store", {
            title: this.titre,
            Type: this.type,
            reclamation: this.contenu
          })
          .then(response => {
            this.clearInput();
            this.ajouterReclamation();
          })
          .catch(errors => console.log(errors.response.data));
      }else {
          this.errorReclamation();
      }
    },
    clearInput() {
      (this.titre = ""), (this.type = ""), (this.contenu = "");
    }
  }
};
</script>

<style>

</style>