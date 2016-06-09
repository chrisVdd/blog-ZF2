<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 01/06/2016
 * Time: 13:11
 */

namespace Application\Mapper;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

interface DoctrineInterface
{

    /**
     * Get EntityManager
     *
     * @return mixed
     */
    public function getEntityManager();

    /**
     * Set EntityManager
     *
     * @param EntityManager $entityManager
     * @return mixed
     */
    public function setEntityManager(EntityManager $entityManager);

    /**
     * Get EntityRepository
     *
     * @return mixed
     */
    public function getEntityRepository();

    /**
     * Set EntityRepository
     *
     * @param EntityRepository $entityRepository
     * @return mixed
     */
    public function setEntityRepository(EntityRepository $entityRepository);

    /**
     * Set EntityClassName
     *
     * @param $entityClassName
     *
     * @return $this
     */
    public function setEntityClassName($entityClassName);

    /**
     * Get EntityClassName
     *
     * @return string
     */
    public function getEntityClassName();




}