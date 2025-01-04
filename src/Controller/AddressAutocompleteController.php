<?php

namespace App\Controller;

use App\Form\AddressAutocompleteType;
// use Solarium\Client;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

class AddressAutocompleteController extends AbstractController
{
    #[Route('/address/autocomplete', name: 'app_address_autocomplete')]
    public function index(
        // Client $solrclient,
        Request $request,
        LoggerInterface $logger,
        #[MapQueryParameter] string $field,
        #[MapQueryParameter] string $query = "",
        #[MapQueryParameter] string $plz = "",
        #[MapQueryParameter] string $ort = "",
        #[MapQueryParameter] string $strasse = "",
        #[MapQueryParameter] string $hausnr = "",
        #[MapQueryParameter] string $domain = "default"
    ): Response {
 /*
        $session = $request->getSession();

        switch ($field) {
            case "PLZ":
                $plz = $query;
                $session->set('autocomplete_address_' . $domain . '_plz', $plz);
                break;
            case "ORT":
                $ort = $query;
                $session->set('autocomplete_address_' . $domain . '_ort', $ort);
                break;
            case "STRASSE":
                $strasse = $query;
                $session->set('autocomplete_address_' . $domain . '_strasse', $strasse);
                break;
            case "HAUSNR":
                $hausnr = $query;
                $session->set('autocomplete_address_' . $domain . '_hausnr', $hausnr);
                break;
        }

        
        // load parameters from session if they are empty
        if (empty($plz))
            $plz = $session->get('autocomplete_address_' . $domain . '_plz', '');
        else
            $session->set('autocomplete_address_' . $domain . '_plz', $plz);

        if (empty($ort))
            $ort = $session->get('autocomplete_address_' . $domain . '_ort', '');
        else
            $session->set('autocomplete_address_' . $domain . '_ort', $ort);

        if (empty($strasse))
            $strasse = $session->get('autocomplete_address_' . $domain . '_strasse', '');
        else
            $session->set('autocomplete_address_' . $domain . '_strasse', $strasse);

        if (empty($hausnr))
            $hausnr = $session->get('autocomplete_address_' . $domain . '_hausnr', '');
        else
            $session->set('autocomplete_address_' . $domain . '_hausnr', $hausnr);
*/
        // get a select query instance
        // $solrquery = $solrclient->createSelect();
        // get the facetset component
        // $facetSet = $solrquery->getFacetSet();
        // $facetSet->createFacetField('ret')->setField($field)->setMinCount(1)->setLimit(200);

        // if (!empty($plz)) $queryString[] = '(iPLZ:' . $plz . '* OR iPLZ:' . $plz . ')';
        // if (!empty($ort)) $queryString[] = '(iORT:' . $ort . '* OR iORT:' . $ort . ')';
        // if (!empty($strasse)) $queryString[] = '(iSTRASSE:' . $strasse . '* OR iSTRASSE:' . $strasse . ')';
        // if (!empty($hausnr)) $queryString[] = '(iHAUSNR:' . $hausnr . '* OR iHAUSNR:' . $hausnr . ')';

        
        //if (empty($queryString)) return $this->json(null);

        // $logger->debug('Autocomplete Solr Query String: '.implode(" AND ", $queryString));
        // $solrquery->setQuery(implode(" AND ", $queryString));
        // $solrquery->setRows(0);

        // this executes the query and returns the result
        // $resultset = $solrclient->select($solrquery);
        // $ret = array('results' => array());
        // foreach ($resultset->getFacetSet()->getFacet('ret') as $key => $value) {
        //    $ret['results'][] = array('value' => $key, 'text' => $key);
        // }
        $ret['results'][] = array( 'value' => 'value1', 'text' => 'key1');
        $ret['results'][] = array( 'value' => 'value2', 'text' => 'key2');
        return $this->json($ret);
    }

}
