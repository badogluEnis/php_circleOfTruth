<?php

require_once '../lib/ConnectionHandler.php';
require_once '../repository/BenutzerRepository.php';

/**
 * Der Controller ist der Ort an dem es für jede Seite, welche der Benutzer
* anfordern kann eine Methode gibt, welche die dazugehörende Businesslogik
* beherbergt.
*
* Welche Controller und Funktionen muss ich erstellen?
*   Es macht sinn, zusammengehörende Funktionen (z.B: User anzeigen, erstellen,
		*   bearbeiten & löschen) gemeinsam in einem passend benannten Controller (z.B:
				*   UserController) zu implementieren. Nicht zusammengehörende Features sollten
*   jeweils auf unterschiedliche Controller aufgeteilt werden.
*
* Was passiert in einer Controllerfunktion?
*   Die Anforderungen an die einzelnen Funktionen sind sehr unterschiedlich.
*   Folgend die gängigsten:
*     - Dafür sorgen, dass dem Benutzer eine View (HTML, CSS & JavaScript)
*         gesendet wird.
*     - Daten von einem Model (Verbindungsstück zur Datenbank) anfordern und
*         der View übergeben, damit diese Daten dann für den Benutzer in HTML
*         Code umgewandelt werden können.
*     - Daten welche z.B. von einem Formular kommen validieren und dem Model
*         übergeben, damit sie in der Datenbank persistiert werden können.
*/
class RegisterController
{
	/**
	 * Die index Funktion des DefaultControllers sollte in jedem Projekt
	 * existieren, da diese ausgeführt wird, falls die URI des Requests leer
	 * ist. (z.B. http://my-project.local/). Weshalb das so ist, ist und wann
	 * welcher Controller und welche Methode aufgerufen wird, ist im Dispatcher
	 * beschrieben.
	 */
	public function index()
	{
		// In diesem Fall möchten wir dem Benutzer die View mit dem Namen
		//   "default_index" rendern. Wie das genau funktioniert, ist in der
		//   View Klasse beschrieben.
		$view = new View('register');
		$view->heading = 'Registrieren';
		$view->display();
	}

	private function isValidAlpha($input) {
		if (isset ( $input ) && ! empty ( $input )) {
			return true;
		}
			return false;
	}


	private function checkPw($input1, $input2) {
		if ($input1 == $input2) {
			return true;
		}
		return false;
	}



	public function create() {


	$passwordPattern = '/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/i';

	if ($this->checkPw($_POST ["password"], $_POST ["repassword"])) {
		if (isset ( $_POST ["register"] ) && $this->isValidAlpha ( $_POST ["username"] ) && $this->isValidAlpha ( $_POST["password"]) && preg_match ($passwordPattern, $_POST ["password"])) {


			$connection = new BenutzerRepository();

			$connection->create($_POST ["username"], $_POST ["password"], false);



		$view = new View('startseite');
		$view->heading = '';
		$view->display();
	}
} else {
	?>
	<script>
  	alert('Die beiden Passwörter stimmen nicht überein!');
	</script>
<?php
}


	}
}
