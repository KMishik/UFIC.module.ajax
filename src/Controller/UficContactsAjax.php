<?php
namespace Drupal\uficajax\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Controller\ControllerBase;

class UficContactsAjax extends ControllerBase
{

	public function divContactAjax($name) {

		$renderArray = [
			'#theme' => 'phone_contacts_template',
			'#name' => $name,
		];

		$modalDialogOptions = [
			'width' => '910px',
			'hide' => 'slideUp',
			'show' => 'fadeIn',
		];

		$title = "";
		$this->getTitle($title, $name);

		$response = new AjaxResponse();

		$renderResult = render($renderArray);

		$response->addCommand(new OpenModalDialogCommand($title, $renderResult, $modalDialogOptions));

		return $response;
	}

	private function getTitle(&$title, $name) {
		switch ($name) {
			case 'unz': $title = $this->t("ФГБУ Уфимский научный центр РАН");
									break;
			case 'imvc': $title = $this->t("ФГБУН Институт математики с вычислительным центром УНЦ РАН");
									break;
			case 'imech': $title = $this->t("ФГБУН Институт механики им. Р.Р.Мавлютова УНЦ РАН");
									break;
			case 'ifmk': $title = $this->t("ФГБУН Институт физики молекул и кристаллов УНЦ РАН");
									break;
			case 'ioch': $title = $this->t("ФГБУН Институт органической химии УНЦ РАН");
									break;
			case 'ink': $title = $this->t("ФГБУН Институт нефтехимии и катализа УНЦ РАН");
									break;
			case 'ibio': $title = $this->t("ФГБУН Институт биологии УНЦ РАН");
									break;
			case 'ibg': $title = $this->t("ФГБУН Институт биохимии и генетики УНЦ РАН");
									break;
			case 'botgarden': $title = $this->t("ФГБУН Ботанический сад-институт УНЦ РАН");
									break;
			case 'igeo': $title = $this->t("ФГБУН Институт геологии УНЦ РАН");
									break;
			case 'isei': $title = $this->t("ФГБУН Институт социально-экономических исследований УНЦ РАН");
									break;
			case 'ihll': $title = $this->t("ФГБУН Институт истории, языка и литературы УНЦ РАН");
									break;
			case 'iethno': $title = $this->t("ФГБУН Институт этнологических исследований им. Р.Г.Кузеева УНЦ РАН");
									break;
			case 'polyclinic': $title = $this->t("ФГБУЗ Поликлиника Уфимского научного центра РАН");
									break;
			default: $title = "";
		}
	}

	public function divContactNojs() {
		$renderArray = [
			'#type' => 'markup',
			'#markup' => $this->t('Для отражения содержимого справочника требуется включить JavaScript.'),
		];
		return $renderArray;
	}

}