<?php

namespace App\Controller;

use WawTravel\Controller\AbstractController;

class MainController extends AbstractController {

    public function home() {
		return $this->renderView('main/home.php', ['seo' => [
			'title' => 'Accueil',
			'description' => 'Waw Travel, le site de voyage qui vous fait voyager'
		]]);
	}
}