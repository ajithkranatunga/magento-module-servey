<?php
namespace Kemana\Survey\Api\Data;

interface IspDataInterface
{
    /**
     * isp attribute
     */
    const ISP = 'isp';

    /**
     * is_satisfied attribute
     */
    const IS_SATISFIED = 'is_satisfied';

    /**
     * get ISP
     * @return int
     */
    public function getIsp();

    /**
     * get Is Satisfied
     * @return string
     */
    public function getIsSatisfied();

    /**
     * set ISP
     *
     * @return void
     */
    public function setIsp($isp);

    /**
     * Set Is Satisfied
     * @param $isSatisfied
     * @return void
     */
    public function setIsSatisfied($isSatisfied);
}
