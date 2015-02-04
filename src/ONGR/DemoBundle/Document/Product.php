<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\DemoBundle\Document;

use ONGR\ElasticsearchBundle\Annotation as ES;
use ONGR\MagentoConnectorBundle\Document\ProductDocument;

/**
 * ElasticSearch Product document.
 *
 * @ES\Document(type="product")
 */
class Product extends ProductDocument
{
    /**
     * Structure that represents possible URLs for the model.
     *
     * Eg.:
     *
     * <code>
     * array(
     *     array('url' => 'foo/'),
     *     array('url' => 'bar/', 'key' => 'bar_url'),
     * )
     * </code>
     *
     * @var UrlObject[]|\Iterator
     *
     * @ES\Property(name="urls", type="object", objectName="ONGRMagentoConnectorBundle:UrlObject", multiple=true)
     */
    protected $urls;

    /**
     * @var string[] Array of expired urls hashes.
     *
     * @ES\Property(name="expired_urls", type="string", multiple=true)
     */
    protected $expiredUrls;

    /**
     * @var ImageObject[]|\Iterator
     *
     * @ES\Property(name="images", type="object", objectName="ONGRMagentoConnectorBundle:ImageObject", multiple=true)
     */
    protected $images;

    /**
     * @var ImageObject[]|\Iterator
     *
     * @ES\Property(
     *      name="small_images",
     *      type="object",
     *      objectName="ONGRMagentoConnectorBundle:ImageObject",
     *      multiple=true
     * )
     */
    protected $smallImages;

    /**
     * @var CategoryObject[]|\Iterator
     *
     * @ES\Property(
     *      name="categories",
     *      type="object",
     *      objectName="ONGRMagentoConnectorBundle:CategoryObject",
     *      multiple=true
     * )
     */
    protected $categories;

    /**
     * @var PriceObject[]|\Iterator
     *
     * @ES\Property(name="prices", type="object", objectName="ONGRMagentoConnectorBundle:PriceObject", multiple=true)
     */
    protected $prices;

    /**
     * @var string
     *
     * @ES\Property(name="short_description", type="string")
     */
    protected $shortDescription;

    /**
     * @return string[]
     */
    public function getExpiredUrls()
    {
        return $this->expiredUrls;
    }

    /**
     * @param string[] $expiredUrls
     */
    public function setExpiredUrls($expiredUrls)
    {
        $this->expiredUrls = $expiredUrls;
    }

    /**
     * @param string $expiredUrl
     */
    public function addExpiredUrl($expiredUrl)
    {
        $this->expiredUrls[] = $expiredUrl;
    }

    /**
     * @return \Iterator|UrlObject[]
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @param \Iterator|UrlObject[] $urls
     */
    public function setUrls($urls)
    {
        $this->urls = $urls;
    }

    /**
     * @param UrlObject $urlObject
     */
    public function addUrlObject($urlObject)
    {
        $this->urls[] = $urlObject;
    }

    /**
     * @param string $urlString
     */
    public function addUrl($urlString)
    {
        $urlObject = new UrlObject();
        $urlObject->setUrl($urlString);
        $this->urls[] = $urlObject;
    }

    /**
     * @return \CategoryObject[]
     */
    public function getMainCategory()
    {
        if ($this->getCategories() !== null) {
            return $this->getCategories()[0]->getTitle();
        }
    }

    /**
     * @return \Iterator|CategoryObject[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param \Iterator|CategoryObject[] $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @param CategoryObject $categoryObject
     */
    public function addCategory($categoryObject)
    {
        $this->categories[] = $categoryObject;
    }

    /**
     * @return string
     */
    public function getManufacturer()
    {
        return '';
    }

    /**
     * @return \ImageObject[]
     */
    public function getImage()
    {
        return $this->getImages()[0]->getUrl();
    }

    /**
     * @return string
     */
    public function getColour()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getStyle()
    {
        return '';
    }

    /**
     * @return \Iterator|ImageObject[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param \Iterator|ImageObject[] $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @param ImageObject $imageObject
     */
    public function addImage($imageObject)
    {
        $this->images[] = $imageObject;
    }

    /**
     * @param string $imageUrl
     */
    public function addImageUrl($imageUrl)
    {
        $imageObject = new ImageObject();
        $imageObject->setUrl($imageUrl);
        $this->images[] = $imageObject;
    }

    /**
     * @return \Iterator|ImageObject[]
     */
    public function getSmallImages()
    {
        return $this->smallImages;
    }

    /**
     * @param \Iterator|ImageObject[] $smallImages
     */
    public function setSmallImages($smallImages)
    {
        $this->smallImages = $smallImages;
    }

    /**
     * @param ImageObject $smallImage
     */
    public function addSmallImage($smallImage)
    {
        $this->smallImages[] = $smallImage;
    }

    /**
     * @param string $imageUrl
     */
    public function addSmallImageUrl($imageUrl)
    {
        $imageObject = new ImageObject();
        $imageObject->setUrl($imageUrl);
        $this->smallImages[] = $imageObject;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        if ($this->getPrices() !== null) {
            return $this->getPrices()[0]->getPrice();
        } else {
            return '';
        }
    }

    /**
     * @return \Iterator|PriceObject[]
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @param \Iterator|PriceObject[] $prices
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;
    }

    /**
     * @param PriceObject $price
     */
    public function addPrice($price)
    {
        $this->prices[] = $price;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }
}
