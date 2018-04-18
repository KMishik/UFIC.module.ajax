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

		$citeAuthor = array(
			'rb' => 14,
			'ufic' => 15,
		);

		//$allEntities = \Drupal::entityTypeManager()->getDefinitions();
		$entityQuery = \Drupal::entityQuery('node')->condition('type', 'ufic_citations');

		$extCond = $entityQuery->andConditionGroup()
			->condition('status',1);

		$nodeList = $entityQuery->condition($extCond)->execute();

		$output = array();

		if (!empty($nodeList)) {
			foreach ($nodeList as $nodeID) {
				$node = Node::load($nodeID);

				$authorTerm = $node->field_ufic_author_term->getValue()[0]['target_id'];
				$authorID = array_search($authorTerm, $citeAuthor);
				if (!$authorID) {
					$authorID = 'none';
				}
				$citeValue = $node->field_ufic_citations->getValue();

				$valueCount = count($citeValue);

				$randCitationDelta = random_int(0, (int)$valueCount - 1);
				$randCitation = $citeValue[$randCitationDelta]['value'];
				$randCitation = strip_tags($randCitation);

				$strMax = 140;
				$strEdge = mb_strpos($randCitation, " ", (int)$strMax);

				$randCitation = mb_substr($randCitation, 0, $strEdge);

				$randCitation = '<p>' . $randCitation . '...' . '</p>';

				$output[$authorID] = array(
					'nodeID'=> $nodeID,
					'delta' => $randCitationDelta,
					'cite' => $randCitation,
				);

			}
		}

		$response = new JsonResponse($output);

		return $response;
	}
}

