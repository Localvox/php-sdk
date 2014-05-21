<?php
/**
 * WEB-APPLICATION
 * EventSpot API
 *
 * PHP Version 5
 *
 * @category Production
 * @package  Default
 * @author   Philipp Tkachev <philipp@marketmesuite.com>
 * @date     1/15/14 1:21 PM
 * @license  http://marketmesuite.com/license.txt MMS License
 * @version  GIT: 1.0
 * @link     http://marketmesuite.com/
 */

namespace Ctct\Services;

use \Ctct\Util\Config;

/**
 * EventSpot Events implementation
 * Class EventSpotService
 * @package Ctct\Services
 */
class EventSpotService extends BaseService
{

    /**
     * Get Events from EventSpot Collection
     *
     * @param $accessToken
     * @param array $params
     * @return array
     */
    public function getEvents($accessToken, array $params = array())
    {
        $baseUrl = Config::get('endpoints.base_url')
            . sprintf(Config::get('endpoints.eventspot_events'));
        return $this->doIt($baseUrl, $params, $accessToken);
    }

    /**
     * Retrieve an event specified by the event_id path parameter.
     * Properties with a null value are not returned in the JSON response.
     *
     * @param $accessToken
     * @param $eventId
     * @param array $params
     * @return array
     */
    public function getEvent($accessToken, $eventId, array $params = array())
    {
        $baseUrl = Config::get('endpoints.base_url')
            . sprintf(Config::get('endpoints.eventspot_events_event'), $eventId);
        return $this->doIt($baseUrl, $params, $accessToken);
    }

    /**
     * Retrieve all promocodes for an event specified by the eventId path parameter.
     * Promo codes are used to create various discounts for event fees.
     *
     * @param $accessToken
     * @param $eventId
     * @param array $params
     * @return array
     */
    public function getPromocodes($accessToken, $eventId, array $params = array())
    {
        $baseUrl = Config::get('endpoints.base_url')
            . sprintf(Config::get('endpoints.eventspot_events_event_promocodes'), $eventId);
        return $this->doIt($baseUrl, null, $accessToken);
    }

    /**
     * Retrieve a specific promotional code for an event; use the promocodeId
     * and eventId path parameters to specify the code and event.
     *
     * @param $accessToken
     * @param $eventId
     * @param $codeId
     * @param array $params
     * @return array
     */
    public function getPromocode($accessToken, $eventId, $codeId, array $params = array())
    {
        $baseUrl = Config::get('endpoints.base_url')
            . sprintf(Config::get('endpoints.eventspot_events_event_promocode'), $eventId, $codeId);
        return $this->doIt($baseUrl, $params, $accessToken);
    }
}
