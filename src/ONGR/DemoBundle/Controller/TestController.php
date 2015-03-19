<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TestController.
 */
class TestController extends Controller
{
    /**
     * Index action.
     *
     * @return Response
     */
    public function indexAction()
    {
        $cookie = $this->container->get('ongr_demo.cookie.foo');
        $oldVal = $cookie->getValue();
        $val = $oldVal;

        if (!isset($val['visited'])) {
            $val['visited'] = 1;
        } else {
            $val['visited']++;
        }

        $cookie->setValue($val);

        return new Response(
            '<html><p>Before:<br> '
            . print_r($oldVal, true)
            . '</p><p>After:<br>'
            . print_r($val, true)
            . '</p></html>'
        );
    }
}
