<?php
/**
 * 
 */
class LoginController extends Controller
{
	private $model = "";

	function __construct()
	{
		$this->model = $this->model("login");
	}

	public function cover($value = '')
	{
		$data = [
			'title' => 'Entrada al sistema',
			'subtitle' => 'Escuela',
			'errors' => [],
			'data' => []
		];
		$this->view("login", $data);
	}
	public function forgot($value = '')
	{
		$errors = array();

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$user = $_POST['user'] ?? "";
			echo $user;
			//
			if (empty($user)) {
				array_push($errors, "El correo electrónico es requerido.");
			}
			if (!filter_var($user, FILTER_VALIDATE_EMAIL)) {
				array_push($errors, "El correo electrónico no es válido.");
			}
			//
			if (empty($errors)) {
				// Validar en la base de datos
				if ($this->model->validateEmail($user)) {
					if ($this->model->sendEmail($user)) {
						$data = [
							"title" => "Cambio de clave de acceso",
							"menu" => false,
							"errors" => [],
							"data" => [],
							"subtitle" => "Cambio de clave de acceso",
							"text" => "Se ha enviado un correo a <b>" . $user . "</b> para que puedas cambiar tu clave de acceso. Cualquier duda te puedes comunicar con nosotros. No olvides revisar tu bandeja de spam.",
							"color" => "alert-success",
							"url" => "login",
							"colorButton" => "btn-success",
							"textButton" => "Regresar"
						];
						$this->view("mensaje", $data);
					} else {
						$data = [
							"title" => "Cambio de clave de acceso",
							"menu" => false,
							"errors" => [],
							"data" => [],
							"subtitle" => "Cambio de clave de acceso",
							"text" => "Existió un error al enviar el correo electrónico. Favor de intentarlo más tarde o reportarlo a soporte técnico.",
							"color" => "alert-danger",
							"url" => "login",
							"colorButton" => "btn-danger",
							"textButton" => "Regresar"
						];
						$this->view("mensaje", $data);
					}

				} else {
					$data = [
						"title" => "Cambio de clave de acceso",
						"menu" => false,
						"errors" => [],
						"data" => [],
						"subtitle" => "Cambio de clave de acceso",
						"text" => "Existió un error al enviar el correo electrónico. Favor de intentarlo más tarde o reportarlo a soporte técnico.",
						"color" => "alert-danger",
						"url" => "login",
						"colorButton" => "btn-danger",
						"textButton" => "Regresar"
					];
					$this->view("mensaje", $data);
				}
			}
			// exit;
		}

		$data = [
			'title' => 'Ovidaste la contraseña',
			'subtitle' => 'Olvidaste la clave de acceso',
			'errors' => $errors,
			'data' => []
		];
		$this->view('forgot', $data);
	}
}

?>