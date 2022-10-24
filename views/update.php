<div class="container">
	<div class="row my-4">
		<div class="col-md-8 mx-auto">
			<div class="card">
				<div class="card-header">Modifier un employé</div>
				<div class="card-body bg-light">
					<a href="<?php echo BASE_URL;?>home" class="btn btn-sm btn-secondary mr-2 mb-2">
						<i class="fas fa-home"></i>
					</a>
					<form method="post">
						<div class="form-group">
							<label for="nom">Nom*</label>
							<input type="text" name="nom" class="form-control" placeholder="Nom"
							value="<?php echo $employers->getNom(); ?>"
							>
						</div>
						<div class="form-group">
							<label for="prenom">Prénom*</label>
							<input type="text" name="prenom" class="form-control" placeholder="Prénom"
							value="<?php echo $employers->getPrenom(); ?>"
							>
						</div>
						<div class="form-group">
							<label for="mat">Matricule*</label>
							<input type="text" name="matricule" class="form-control" placeholder="Matricule"
								value="<?php echo $employers->getMatricule(); ?>">
						</div>
						<div class="form-group">
							<label for="depart">Département*</label>
							<input type="text" name="depart" class="form-control" placeholder="Département"
							value="<?php echo $employers->getDepart(); ?>">
							<input type="hidden" name="id" value="<?php echo $employers->getId();?>">
						</div>
						<div class="form-group">
							<label for="poste">Poste*</label>
							<input type="text" name="poste" class="form-control" placeholder="Poste"
							value="<?php echo $employers->getPoste(); ?>">
						</div>
						<div class="form-group">
							<label for="date_emb">Date Embauche*</label>
							<input type="date" name="date_emb" class="form-control">
						</div>
						<div class="form-group">
							<select class="form-control" name="statut">
								<option value="1" <?php echo $employers->getStatut() ? 'selected' : ''; ?>>Active</option>
								<option value="0"
								<?php echo !$employers->getStatut() ? 'selected' : ''; ?>
								>Résilié</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="submit">MODIFIER</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>