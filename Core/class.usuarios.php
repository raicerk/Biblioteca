<?php

class Usuario
{
	
	public function ValidaAcceso($Pagina, $Usuario, $redirect_false,$redirect_true){

		if (true) {
			if (!empty($redirect_true)) {
				header("location:".$redirect_true);
			}else{
				return true;
			}
		}else{
			if (!empty($redirect_false)) {
				header("location: ".$redirect_false);
			}else{
				return false;
			}
		}


		
	}
}


?>