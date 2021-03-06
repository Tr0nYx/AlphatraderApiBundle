<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\EventController;

/**
 * Class EventsTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
 */
trait EventsTrait
{
    /**
     * @param \DateTime $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]
     */
    public function getEvents(\DateTime $afterDate = null)
    {
        return $this->getEventController()->getEvents($this->formatTimeStamp($afterDate));
    }

    /**
     * @param \DateTime|null $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getEventsForCurrentUser(\DateTime $afterDate = null)
    {
        return $this->getEventController()->getEventsForUser($this->formatTimeStamp($afterDate));
    }

    /**
     * @param           $realms
     * @param \DateTime $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]
     */
    public function getEventsByRealms($realms, \DateTime $afterDate = null)
    {
        return $this->getEventController()->searchEvents($realms, $this->formatTimeStamp($afterDate));
    }

    /**
     * @param           $eventtype
     * @param string    $realms
     * @param \DateTime $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]
     */
    public function getEventsByType($eventtype, $realms = '', $afterDate = null)
    {
        return $this->getEventController()->searchEventsByType($eventtype, $realms, $afterDate);
    }

    /**
     * @param string    $fullTextPart
     * @param \DateTime $afterDate
     * @return \Alphatrader\ApiBundle\Model\Events[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getEventsByFullTextPart($fullTextPart, $afterDate = null)
    {
        return $this->getEventController()
            ->searchEventsByFullTextPart($fullTextPart, $this->formatTimeStamp($afterDate));
    }

    /**
     * @return EventController
     */
    public function getEventController()
    {
        return new EventController($this->config, $this->jwt);
    }
}
