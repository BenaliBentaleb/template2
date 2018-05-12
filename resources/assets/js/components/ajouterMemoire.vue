<template>
  <div class="col-md-9 memoire-container">
    <div class="reclamation-container">
        <div class="row register-form">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-horizontal custom-form" method="post" enctype="multipart/form-data">
                    <h1 class="text-capitalize">Ajouter un mémoire</h1>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="name-input-field">Titre du mémoire</label>
                            <span style="color:rgb(248,0,0);">&nbsp;*</span>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input class="form-control" type="text" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label class="control-label" for="dropdown-input-field">Type du mémoire</label>
                            <span style="color:rgb(248,0,0);">&nbsp;*</span>
                        </div>
                        <div class="col-sm-3 col-xs-12 input-column" style="margin-bottom:15px;">
                            <select class="form-control reclamation-type" required="" id="memoiretype">
                                <option value="" selected="">Type</option>
                                <option value="licence">Licence</option>
                                <option value="master">Master</option>
                            </select>
                        </div>
                        <div class="col-sm-3 col-xs-12 input-column">
                            <select class="form-control reclamation-type" required="" id="memoireannee">
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
                            <input class="form-control" type="text" required="">
                        </div>
                        <div class="col-sm-2 input-column" style="padding-right:10px;">
                            <input class="form-control" type="text" required="" placeholder="Année" maxlength="4" minlength="4"
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
                                <input class="form-control" type="text" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">L'étudiant 2</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text" placeholder="/">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">L'étudiant 3</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text" placeholder="/">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label class="control-label" for="dropdown-input-field">L'étudiant 4</label>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input class="form-control" type="text" placeholder="/">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-4 input-column">
                            <input type="file" accept=".pdf" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button class="btn btn-default submit-button" type="submit" style="margin-bottom:0;margin-top:30px;">Sauvgarder</button>
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

mounted() {
this.filtrer();
},
methods: {
    filtrer() {
         $(document).ready(function () {
            $("#memoiretype").change(function () {
                var val = $(this).val();
                if (val == "licence") {
                    $("#memoireannee").html(
                        "<option value='ti'>TI</option><option value='sci'>SCI</option><option value='si'>SI</option><option value='gl'>GL</option>"
                    );
                } else if (val == "master") {
                    $("#memoireannee").html(
                        "<option value='stic'>STIC</option><option value='rsd'>RSD</option><option value='stiw'>STIW</option><option value='gl'>GL</option>"
                    );
                }
            });
        });
    }
}
}
</script>

<style>

</style>
