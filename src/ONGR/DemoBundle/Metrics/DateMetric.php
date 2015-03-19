<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\DemoBundle\Metrics;

use ONGR\MonitoringBundle\Metric\MetricInterface;

/**
 * Class DateMetric.
 */
class DateMetric implements MetricInterface
{
    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        return new \DateTime();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'date_metric';
    }
}
