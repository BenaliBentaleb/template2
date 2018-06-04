<template>
  <div class="col-md-9 memoire-container">
    <div class="reclamation-container">
        <div class="row register-form">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal custom-form" enctype="multipart/form-data">
                    <h1 class="text-capitalize">Ajouter un mémoire</h1>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="name-input-field">Titre du mémoire</label>
                            <span style="color:rgb(248,0,0);">&nbsp;*</span>

                            
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" v-model="memoire.titre" required="" autofocus="">
                        </div>
                        
                    </div>
                    <!-- <span class="text-danger" v-if="errors.titre">
                               <strong >{{errors.titre[0]}}</strong>
                     </span>-->
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="dropdown-input-field">Type du mémoire</label>
                            <span style="color:rgb(248,0,0);">&nbsp;*</span>
                        </div>
                        <div class="col-sm-3 col-xs-12 input-column" style="margin-bottom:15px;">
                            <select class="form-control reclamation-type" required="" v-model="memoire.niveau"   id="memoiretype">
                                <option  value="" selected disabled>Type</option>
                                <option value="licence">Licence</option>
                                <option value="master">Master</option>
                            </select>
                        </div>
                        <div class="col-sm-3 col-xs-12 input-column">
                            <select class="form-control reclamation-type" v-model="memoire.formation"  required="" id="memoireannee">
                                <option value="">Spécialité</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="dropdown-input-field">L'encadreur</label>
                            <span style="color:rgb(248,0,0);">&nbsp;*</span>
                        </div>
                        <div class="col-sm-4 input-column" style="margin-bottom:15px;">
                            <input class="form-control" type="text" v-model="memoire.encadreur"  required="">
                        </div>
                        <div class="col-sm-2 input-column" style="padding-right:10px;">
                            <input class="form-control" type="number" required="" v-model="memoire.annee" placeholder="Année" maxlength="4" minlength="4"
                                pattern="[0-9][0-9][0-9][0-9]" style="width:80%;      display: inline-block;">
                            <span style="color:rgb(248,0,0);">&nbsp;*</span>
                        </div>
                    </div>
                    <fieldset>
                        <legend></legend>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">L'étudiant 1</label>
                                <span style="color:rgb(248,0,0);">&nbsp;*</span>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text" v-model="memoire.etudiant1"  required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">L'étudiant 2</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text" v-model="memoire.etudiant2" placeholder="/">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">L'étudiant 3</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text" v-model="memoire.etudiant3" placeholder="/">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">L'étudiant 4</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text" v-model="memoire.etudiant4" placeholder="/">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-4 input-column">
                            <input type="file"  accept=".pdf" @change="onFileChange" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button class="btn btn-default submit-button" @click.prevent="uploadMemoire()" style="margin-bottom:0;margin-top:30px;">Sauvgarder</button>
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
      memoire: {
        titre: "",
        niveau: "",
        formation: "",
        encadreur: "",
        annee: "",
        etudiant1: "",
        etudiant2: "",
        etudiant3: "",
        etudiant4: "",
        fichier: ""
      },
      errors: {}
    };
  },

  mounted() {
    this.filtrer();
  },
  methods: {
    filtrer() {
      $(document).ready(function() {
        $("#memoiretype").change(function() {
          var val = $(this).val();

          if (val == "licence") {
            axios.get("/getformation/" + val).then(response => {
              let option = "";
              console.log(response);
               
              response.data.forEach(val => {
                $("#memoireannee").html(
                  (option +=
                    "<option value='" + val.id + "'>" + val.nom + "</option>")
                );
                console.log(val);
              });
            });
          } else if (val == "master") {
            axios.get("/getformation/" + val).then(response => {
              let option = "";
              console.log(response);
                
              response.data.forEach(val => {
                $("#memoireannee").html(
                  (option +=
                    "<option  value='" + val.id + "'>" + val.nom + "</option>")
                );
                console.log(val);
              });
            });
          }
        });
      });
    },

    onFileChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createFile(files[0]);
    },
    createFile(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = e => {
        vm.memoire.fichier = e.target.result;
      };
      reader.readAsDataURL(file);
    },

    uploadMemoire() {
      if (!(parseInt(this.memoire.annee) < 2010) && typeof parseInt(this.memoire.annee) === "number" ) {
        axios.post("/memoire/saveFile", this.memoire).then(response => {
          //

          this.errors = response.data.errors ? response.data.errors : null;
          this.errors ? this.errorMemoire() : this.ajouterMemoire();
       
         response.data.success ?    this.clearAllInput() : '';
        });
      } else {
          
          this.errorDate();
      }
    }
    ,


    clearAllInput() {
        
        this.memoire.titre= "",
        this.memoire.niveau= "",
        this.memoire.formation= "",
        this.memoire.encadreur= "",
        this.memoire.annee= "",
        this.memoire.etudiant1= "",
        this.memoire.etudiant2="",
        this.memoire.etudiant3= "",
        this.memoire.etudiant4= "",
        this.memoire.fichier= "";
        
    }
  },
  notifications: {
    ajouterMemoire: {
      // You can have any name you want instead of 'showLoginError'
      title: "Ajouter!",
      message: "Votre memoire est ajouté avec success",
      type: "success" // You also can use 'VueNotifications.types.error' instead of 'error'
    },
    errorMemoire: {
      // You can have any name you want instead of 'showLoginError'
      title: "Les champs est vide!",
      message: "Svp remplie tous les champs",
      type: "error" // You also can use 'VueNotifications.types.error' instead of 'error'
    },
    errorDate: {
      // You can have any name you want instead of 'showLoginError'
      title: "Date invalide !",
      message: "Entrer une date superieur 2009",
      type: "error" // You also can use 'VueNotifications.types.error' instead of 'error'
    }
  }
}; 
</script>

<style>
</style>
