<?php
/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class PostController
 *
 * @package AlphaTrader\API\Controller
 * @author  ljbergmann <l.bergmann@sky-lab.de>
 */
class PostController extends ApiClient
{
    /**
     * @param $postId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\Posts
     */
    public function getPostById($postId)
    {
        $data = $this->get('posts/'.$postId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\Posts');
    }
}
