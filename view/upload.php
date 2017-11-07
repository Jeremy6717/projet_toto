<br>
<br>
<div class="container">
      <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-0"></div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                  <div class="page-header">
                        <h1><small>Fichier csv uniquement</small></h1>
                  </div>

                  <form action="" method="post" enctype="multipart/form-data">
                        <fieldset>
                        <input type="hidden" name="submitFile" value="1" />
                        <label for="fileForm">Fichier à importer</label>
                        <input type="file" name="fileForm" id="fileForm" />
                        <p class="help-block">seule l'extension csv est autorisée</p>
                        <br />
                        <input type="submit" class="btn btn-success btn-block" value="Upload" />
                        </fieldset>
                  </form>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-0"></div>
      </div>

</div>
<br>
<br>
<br>
<br>
<br>

<div class="container">
      <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-0"></div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                  <div class="col-md-6">
      		<h3>Export en CSV</h3>
      		<!-- Si envoi de ficher => POST + enctype !!! -->
      		<form action="" method="post" enctype="multipart/form-data">
      			<fieldset>
      			<input type="hidden" name="csvGeneration" value="1" />
      			<input type="submit" class="btn btn-success btn-block" value="Export CSV" />
      			</fieldset>
      		</form>
	           </div>
           </div>
            </div>
            <div class="col-md-2 col-sm-2 col-xs-0"></div>
      </div>

</div>
