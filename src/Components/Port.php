<?php
/**
 * League.Url (http://url.thephpleague.com)
 *
 * @package   League.uri
 * @author    Ignace Nyamagana Butera <nyamsprod@gmail.com>
 * @copyright 2013-2015 Ignace Nyamagana Butera
 * @license   https://github.com/thephpleague/uri/blob/master/LICENSE (MIT License)
 * @version   4.0.0
 * @link      https://github.com/thephpleague/uri/
 */
namespace League\Uri\Components;

use League\Uri\Interfaces\Components\Port as PortInterface;

/**
 * Value object representing a URI port component.
 *
 * @package League.uri
 * @author  Ignace Nyamagana Butera <nyamsprod@gmail.com>
 * @since   1.0.0
 */
class Port extends AbstractComponent implements PortInterface
{
    use PortValidatorTrait;

    /**
     * Validate Port data
     *
     * @param null|int $port
     *
     * @throws \InvalidArgumentException if the submitted port is invalid
     *
     * @return null|int
     */
    protected function validate($port)
    {
        return $this->validatePort($port);
    }

    /**
     * {@inheritdoc}
     */
    public function getUriComponent()
    {
        $component = $this->getContent();

        return null === $component ? '' : ':'.$component;
    }

    /**
     * {@inheritdoc}
     */
    public function toInt()
    {
        return $this->data;
    }

    /**
     * Initialize the Port data
     *
     * @param null|int $data
     */
    protected function init($data)
    {
        $this->data = $this->validate($data);
    }
}