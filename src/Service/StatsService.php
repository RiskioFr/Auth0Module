<?php
namespace Riskio\Auth0Module\Service;

use DateTime;

class StatsService extends AbstractService
{
    /**
     * @return int
     */
    public function getActiveUsers()
    {
        return $this->client->sendRequest('GET', 'stats/active-users');
    }

    /**
     * @param  DateTime|null $from
     * @param  DateTime|null $to
     * @return array
     */
    public function getDailyStats(DateTime $from = null, DateTime $to = null)
    {
        $params = [];
        if ($from) {
            $params['from'] = $from->format('Ymd');
        }
        if ($to) {
            $params['to'] = $to->format('Ymd');
        }

        return $this->client->sendRequest('GET', 'stats/daily', $params);
    }
}
