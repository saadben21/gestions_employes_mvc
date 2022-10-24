
<div class="container">
    <div class="row my-4">
        <div class="col-md-10 mx-auto">
        <?php
          include './views/includes/alerts.php';
          ?>
           <div class="card">
            <div class="card-header bg-primary text-white">Ajouté un employer</div>
             <div class="card-body bg-light">
                    <a href="<?php echo BASE_URL;?>home">
                    <i class="fa fa-home fa-2x"></i>
                    </a>
                    <form method="post">
                        <div class="form-group">
                            <label for="Nom">Nom</label>
                            <input type="text"name="nom"class="form-control" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <label for="Nom">prenom</label>
                            <input type="text"name="prenom"class="form-control" placeholder="prenom">
                        </div>
                        <div class="form-group">
                            <label for="matricule">matricule</label>
                            <input type="text"name="matricule"class="form-control" placeholder="matricule">
                        </div>
                        <div class="form-group">
                            <label for="departement">departement</label>
                            <input type="text"name="depart"class="form-control" placeholder="departement">
                        </div>
                        <div class="form-group">
                            <label for="poste">poste</label>
                            <input type="text"name="poste"class="form-control" placeholder="poste">
                        </div>
                        <div class="form-group">
                            <label for="date_emb">date d'embauche</label>
                            <input type="date"name="date_emb"class="form-control" placeholder="date d'embauche">
                        </div>
                            <select class="form-control"name="statut" >
                                <option value="1">Active</option>
                                <option value="0">Résilier</option>
                            </select>
                        <div class="mb-2">
                            <button type="submit"class="btn btn-primary mt-2"name="submit">Ajouté</button>
                        </div>
                        
                    </form>
             </div>
           </div>
        </div>
    </div>
</div>