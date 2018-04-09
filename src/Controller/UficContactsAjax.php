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
			case 'ufic': $title = $this->t("ФГБНУ Уфимский федеральный исследовательский центр РАН");
									break;
			case 'imvc': $title = $this->t("ФГБНУ Институт математики с вычислительным центром УФИЦ РАН");
									break;
			case 'imech': $title = $this->t("ФГБНУ Институт механики им. Р.Р.Мавлютова УФИЦ РАН");
									break;
			case 'ifmk': $title = $this->t("ФГБНУ Институт физики молекул и кристаллов УФИЦ РАН");
									break;
			case 'ufih': $title = $this->t("ФГБНУ Уфимский Институт химии УФИЦ РАН");
									break;
			case 'ink': $title = $this->t("ФГБНУ Институт нефтехимии и катализа УФИЦ РАН");
									break;
			case 'ibio': $title = $this->t("ФГБНУ Уфимский Институт биологии УФИЦ РАН");
									break;
			case 'ibg': $title = $this->t("ФГБНУ Институт биохимии и генетики УФИЦ РАН");
									break;
			case 'botgarden': $title = $this->t("ФГБНУ Южно-Уральский ботанический сад-институт УФИЦ РАН");
									break;
			case 'bniish': $title = $this->t("ФГБНУ Башкирский НИИСХ УФИЦ РАН");
									break;
			case 'igeo': $title = $this->t("ФГБНУ Институт геологии УФИЦ РАН");
									break;
			case 'isei': $title = $this->t("ФГБНУ Институт социально-экономических исследований УФИЦ РАН");
									break;
			case 'ihll': $title = $this->t("ФГБНУ Ордена Знак Почета Институт истории, языка и литературы УФИЦ РАН");
									break;
			case 'iethno': $title = $this->t("ФГБНУ Институт этнологических исследований им. Р.Г.Кузеева УФИЦ РАН");
									break;
			case 'polyclinic': $title = $this->t("ФГБУЗ Поликлиника УФИЦ РАН");
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