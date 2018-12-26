<?php

namespace App\Provider\Adapter;

interface ProviderInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @param string $url
     */
    public function setUrl($url);

    /**
     * @param array $data
     * @return array
     */
    public function transform($data);
}