<?php
namespace Kemana\Survey\Api;
/**
 * Interface SalesOrderProcessInterface
 * @package Kemana\Survey\Api
 */
interface SalesOrderProcessInterface
{
    /**
     * @return mixed
     * Saves isp & is_satisfied values into quote table
     */
    public function saveIspDataToQuoteTable();
}
