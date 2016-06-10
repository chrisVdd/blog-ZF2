<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/06/2016
 * Time: 10:04
 */

namespace Application\Mapper;

use Doctrine\ORM\EntityRepository;
use DoctrineORMModule\Options\EntityManager;

/**
 * Interface DoctrineInterface
 * @package Application\Mapper
 */
interface DoctrineInterface
{
    /**
     * Get EntityManager
     *
     * @return EntityManager
     */
    public function getEntityManager();

    /**
     * Get EntityManager
     *
     * @param EntityManager $entityManager
     * @return mixed
     */
    public function setEntityManager(EntityManager $entityManager);

    /**
     * Get EntityRepository
     *
     * @return EntityRepository
     */
    public function getEntityRepository();

    /**
     * Set EntityRepository
     *
     * @param EntityRepository $entityRepository
     */
    public function setEntityRepository(EntityRepository $entityRepository);

    /**
     * Get EntityClassName
     *
     * @param $entityClassName
     * @return string
     */
    public function getEntityClassName($entityClassName);

    /**
     * Set EntityClassName
     *
     * @param $entityClassName
     * @return mixed
     */
    public function setEntityClassName($entityClassName);
}