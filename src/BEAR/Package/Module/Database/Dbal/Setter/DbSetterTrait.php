<?php
/**
 * This file is part of the BEAR.Package package
 *
 * @package BEAR.Package
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Package\Module\Database\Dbal\Setter;

use Doctrine\DBAL\Driver\Connection;

/**
 * Set Db
 *
 * @package    BEAR.Sunday
 * @subpackage Inject
 */
trait DbSetterTrait
{
    /**
     * DB
     *
     * @var \Doctrine\DBAL\Connection
     */
    protected $db;

    /**
     * Set DB
     *
     * @param Connection $db
     *
     * @return void
     */
    public function setDb(Connection $db = null)
    {
        $this->db = $db;
    }
}
