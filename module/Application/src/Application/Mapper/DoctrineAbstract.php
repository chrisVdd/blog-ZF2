<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 01/06/2016
 * Time: 13:11
 */

namespace Application\Mapper;

use Application\Entity\AbstractEntity;
use Application\ServiceManager\ServiceManagerAwareTrait;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Zend\ServiceManager\ServiceManagerAwareInterface;

/**
 * Class DoctrineAbstract
 * @package Application\Mapper
 */
class DoctrineAbstract implements ServiceManagerAwareInterface, DoctrineInterface
{
    use ServiceManagerAwareTrait;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var EntityRepository
     */
    private $entityRepository;

    /**
     * @var string
     */
    protected $entityClassName;

    /**
     * Get the EntityManager
     *
     * @return EntityManager
     * @throws \Exception
     */
    public function getEntityManager()
    {
        if (!$this->entityManager) {

            if ($this->getServiceManager()->has('entity_manager')) {

                $this->setEntityManager($this->getServiceManager()->get('entity_manager'));

            } else {

                throw new \Exception('Service entity manager is not set');
            }
        }

        return $this->entityManager;
    }

    /**
     * Set EntityManager
     *
     * @param EntityManager $entityManager
     * @return $this
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;

        return $this;
    }

    /**
     * Get EntityRepository
     *
     * @return EntityRepository
     * @throws \Exception
     */
    public function getEntityRepository()
    {
        if (!$this->entityRepository) {

            if ($this->getEntityClassName()) {

                $this->entityRepository = $this->getEntityManager()->getRepository($this->getEntityClassName());

            } else {
                throw new \Exception('Entity Class is not defined');
            }
        }

        return $this->entityRepository;
    }

    /**
     * Set the EntityRepository
     *
     * @param EntityRepository $entityRepository
     * @return $this
     */
    public function setEntityRepository(EntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;

        return $this;
    }

    /**
     * Set EntityClassName
     *
     * @param $entityClassName
     * @return $this
     */
    public function setEntityClassName($entityClassName)
    {
        $this->entityClassName = (string) $entityClassName;

        return $this;
    }

    /**
     * Get EntityClassName
     *
     * @return string
     */
    public function getEntityClassName()
    {
        return $this->entityClassName;
    }

    /**
     * Persist Entity
     *
     * @param AbstractEntity $entity
     * @return $this
     * @throws \Exception
     */
    public function store(AbstractEntity $entity)
    {

        $this->getEntityManager()->persist($entity);

        return $this;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        if ($id = (int)$id)
        {
            return $this->getEntityRepository()->find($id);
        }
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function all()
    {
        return $this->getEntityRepository()->findAll();
    }
}