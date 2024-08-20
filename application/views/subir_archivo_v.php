<?php
$this->session->set_userdata('familia',$familia);
$this->session->set_userdata('codigo',$codigo);
$this->session->set_userdata('coddoc',$coddoc);
?>
<form action="/Subir_c/Subir/" method="post" enctype="multipart/form-data">  
<div>
<label for="upload">Selecciona un Examen</label>  
<input name="archivo" type="file" id="archivo" />  
<p>
<input type="submit" name="submit" value="Enviar" />  
</p>
</div>  
</form>