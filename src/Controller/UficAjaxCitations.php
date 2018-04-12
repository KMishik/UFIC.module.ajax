<?php
namespace Drupal\uficajax\Controller;

//use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;
//use Symfony\Component\HttpFoundation\Response;

class UficAjaxCitations extends ControllerBase
{
	public function getRandomCitation() {

		$nodeList = [125,126];
		$output = array();

		foreach ($nodeList as $nodeID) {
			$node = Node::load($nodeID);

			$cite = $node->field_ufic_citations;
			$citeValue = $cite->getValue();

			$valueCount = count($citeValue);

			$randCitationDelta = random_int(0, (int)$valueCount - 1);
			$randCitation = $citeValue[$randCitationDelta]['value'];
			$randCitation = strip_tags($randCitation);

			$strMax = 140;
			$strEdge = mb_strpos($randCitation, " ", (int)$strMax);

			$randCitation = mb_substr($randCitation, 0, $strEdge);

			$randCitation = '<p>' . $randCitation . '...' . '</p>';

			$output[$nodeID] = array(
					'delta' => $randCitationDelta,
					'cite' => $randCitation,
			);

		}

		$response = new JsonResponse($output);

		return $response;
	}
}

