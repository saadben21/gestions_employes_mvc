
<div class="container">
  <img src="./views/asset/Creawebmarc.png"width="150"height="150" alt="">
  <h1 class="text-center bg-light p-2 rounded round">Gestions_Employes</h1>
    <div class="row my-4">
        <div class="col-md-12 mx-auto">
          <?php
          include './views/includes/alerts.php';
          ?>
           <div class="card">
             <div class="card-body bg-light">
                    <a href="<?php echo BASE_URL;?>add">
                    <i class="fa fa-plus-square fa-3x"></i>
                    </a>
                    <a href="<?php echo BASE_URL;?>">
                    <i class="fa fa-home fa-2x mb-2"></i>
                    </a>
                    <a href="<?php echo BASE_URL;?>logout" title="Déconnexion" class="btn btn-link mr-2 mb-2">
						        <i class="fas fa-user mr-2"> <?php echo $_SESSION['username'];?></i>
					          </a>
                    <form method="post"class="float-right mb-2 d-flex flex-row">
                      <input type="text"name="search"class="form-control" placeholder="Recherche">
                      <button class="btn btn-info btn-sm"name="find"type="submit"><i class="fas fa-search"></i></button>
                    </form>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nom & prénom</th>
                                <th scope="col">Matricule</th>
                                <th scope="col">Departement</th>
                                <th scope="col">Poste</th>
                                <th scope="col">Date Embauche</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($employers as $employer):?>
					    	<tr>
						      <th scope="row"><?php echo $employer->getNom().' '.$employer->getPrenom(); ?></th>
						      <td><?php echo $employer->getMatricule();?></td>
						      <td><?php echo $employer->getDepart();?></td>
						      <td><?php echo $employer->getPoste();?></td>
						      <td><?php echo $employer->getDate_emb()->format('M j Y g:i A');?></td>
						      <td>
						      	<?php echo $employer->getStatut()
						      			?
						      			'<span class="badge badge-success">Active</span>'
						      			:
						      			'<span class="badge badge-danger">Resilié</span>';
						      ;?></td>
						      <td class="d-flex flex-row">
						      	<form method="post" class="mr-1" action="update">
						      		<input type="hidden" name="id" value="<?php echo $employer->getId();?>">
						      		<button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
						      	</form>
						      	<form method="post" class="mr-1" action="delete">
						      		<input type="hidden" name="id" value="<?php echo  $employer->getId();?>">
						      		<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
						      	</form>
						      </td>
						    </tr>
					   	<?php endforeach;?>
                        </tbody>
                </table>
             </div>
           </div>
        </div>
    </div>
</div> 
