<template>
    <div>
        <button    class="btn btn-primary btn-block modify-profile" type="button" style="width:75%;margin:0 auto;" data-toggle="modal"
            data-target="#add">
            <i class="icon-pencil">
                Modifier profile
            </i>

        </button>

       <div  class="modal fade modify-profile-modal" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-lg" role="dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4>Modifie profile</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nom">Nom et prenom :</label>
                                    <div class="form-group">
                                        <input type="text" name="nom" placeholder="Nom et prenom" id="nom" class="form-control">
                                    </div>
                                    <label>Email :</label>
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Votre email" id="email" class="form-control">
                                    </div>
                                    <label style="margin-top:7px;">Formation :</label>
                                    <div class="form-group formation-select">
                                        <select class="form-control">
                                            <optgroup label="Departement MI">
                                                <option value="l1" selected="">L1 - Tronc commun</option>
                                                <option value="l2">L2 - Tronc commun</option>
                                            </optgroup>
                                            <optgroup label="Departement IFA">
                                                <option value="ti">Licence - TI</option>
                                                <option value="sci">Licence - SCI</option>
                                                <option value="m1-stic">Master 1 - STIC </option>
                                                <option value="m1-rsd">Master 1 - RSD</option>
                                                <option value="m2-stic">Master 2 - STIC</option>
                                                <option value="m2-rsd">Master 2 - RSD</option>
                                            </optgroup>
                                            <optgroup label="Departement TLSI">
                                                <option value="l3-gl">Licence - GL</option>
                                                <option value="l3-si">Licence SI</option>
                                                <option value="m1-stiw">Master 1 - STIW</option>
                                                <option value="m1-gl">Master 1 GL</option>
                                                <option value="m2-stiw">Master 2 - STIW</option>
                                                <option value="m2-gl">Master 2 - GL</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <label for="nom">Date de naissance :</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control">
                                    </div>
                                    <label for="nom">Adresse :</label>
                                    <div class="form-group">
                                        <textarea placeholder="Adresse" class="form-control" style="resize:none;"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="nom">Numéro de téléphone :</label>
                                    <div class="form-group">
                                        <input type="text" name="nom" placeholder="Numéro de téléphone" id="nom" class="form-control">
                                    </div>
                                    <label for="nom">A propos :</label>
                                    <div class="form-group">
                                        <textarea rows="3" placeholder="A propos" class="form-control" style="resize:none;"></textarea>
                                    </div>
                                    <div class="input-group form-group">
                                        <span id="facebook-input" class="input-group-addon">&nbsp;
                                            <i class="fa fa-facebook-f"></i>
                                        </span>
                                        <input type="url" placeholder="Lien de votre profile Facebook" class="form-control"
                                            aria-describedby="facebook-input">
                                    </div>
                                    <div class="input-group form-group">
                                        <span id="twitter-input" class="input-group-addon">
                                            <i class="fa fa-twitter"></i>
                                        </span>
                                        <input type="url" placeholder="Lien de votre profile Twitter" class="form-control"
                                            aria-describedby="facebook-input">
                                    </div>
                                    <div class="input-group form-group">
                                        <span id="insta-input" class="input-group-addon">
                                            <i class="fa fa-instagram"></i>
                                        </span>
                                        <input type="url" placeholder="Lien de votre profile Instagram" class="form-control"
                                            aria-describedby="facebook-input">
                                    </div>
                                    <div class="input-group form-group">
                                        <span id="youtube-input" class="input-group-addon">
                                            <i class="fa fa-youtube"></i>
                                        </span>
                                        <input type="url" placeholder="Lien de votre chaine Youtube" class="form-control"
                                            aria-describedby="facebook-input">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success">Enregistrer</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
   
</template>
<script>
    export default {
        props: ['user_id'],
        data() {
            return {
                
            }
        }
    }
</script>

<style>
</style>