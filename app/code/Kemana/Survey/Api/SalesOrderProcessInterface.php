<?php
namespace Kemana\Survey\Api;
/**
 * Interface SalesOrderProcessInterface
 * @package Kemana\Survey\Api
 */
interface SalesOrderProcessInterface
{
    /**
     * Saves isp & is_satisfied values into quote table
     *
     * @param int $cartid
     * @return int|void
     */
    public function save($cartid);
}
