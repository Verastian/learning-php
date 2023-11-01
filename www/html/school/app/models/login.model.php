<?php
/**
 * 
 */
class Login
{
    private $db = "";

    function __construct()
    {
        $this->db = new MySQLdb();
    }

    public function validateEmail($user = '')
    {
        // 
        if (empty($user))
            return false;
        $sql = "SELECT * FROM users WHERE email='" . $user . "'";
        return $this->db->query($sql);
    }

    public function sendEmail($email = '')
    {
        $data = [];
        if ($email == "") {
            return false;
        } else {
            $data = $this->validateEmail($email);
            if (!empty($data)) {
                $id = Helper::encode($data["id"]);
                //
                $msg = "Entra a la siguiente liga para cambiar tu clave de acceso al control escolar...<br>";
                $msg .= "<a href='" . RUTA . "login/cambiarclave/" . $id . "'>Cambiar tu clave de acceso</a>";

                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type:text/html; charset=UTF-8\r\n";
                $headers .= "From: Control de escuela\r\n";
                $headers .= "Reply-to: ayuda@escuela.com\r\n";

                $asunto = "Cambiar clave de acceso";
                var_dump($msg);
                return @mail($email, $asunto, $msg, $headers);
            } else {
                $datos = [
                    "titulo" => "Cambio de clave de acceso",
                    "menu" => false,
                    "errores" => [],
                    "data" => [],
                    "subtitulo" => "Cambio de clave de acceso",
                    "texto" => "Existió un error al enviar el correo electrónico. Favor de intentarlo más tarde o reportarlo a soporte técnico.",
                    "color" => "alert-danger",
                    "url" => "login",
                    "colorBoton" => "btn-danger",
                    "textoBoton" => "Regresar"
                ];
                $this->view("message", $datos);
            }
        }
    }


}
?>