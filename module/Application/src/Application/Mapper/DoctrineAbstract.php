<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/06/2016
 * Time: 10:03
 */

namespace Application\Mapper;

use Application\ServiceManager\ServiceManagerAwareTrait;

use Doctrine\ORM\EntityRepository;
use DoctrineORMModule\Options\EntityManager;

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
     * Get EntityManager
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

                throw new \Exception('Service Entity Manager is not set');
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
     * @return EntityRepository
     * @throws Exception
     * @throws \Exception
     */
    public function getEntityRepository()
    {
        if (!$this->entityRepository) {

            if ($this->getEntityClassName()) {

                $this->entityRepository = $this->getEntityManager()->getRepository($this->getEntityClassName());

            } else {

                throw new Exception('The Entity Class is not defined');
            }
        }

        return $this->entityRepository;
    }

    /**
     * @param EntityRepository $entityRepository
     * @return $this
     */
    public function setEntityRepository(EntityRepository $entityRepository)
    {
        $this->entityRepository = $entityRepository;

        return $this;
    }

    /**
     * @param $entityClassName
     * @return string
     */
    public function getEntityClassName($entityClassName)
    {
        return $this->entityClassName;
    }

    /**
     * @param $entityClassName
     * @return $this
     */
    public function setEntityClassName($entityClassName)
    {
        $this->entityClassName = (string) $entityClassName;

        return $this;
    }

    /**
     * Begin a transaction
     *
     * @return $this
     */
    public function transactionBegin()
    {
        $this->getEntityManager()->beginTransaction();

        return $this;
    }

    /**
     * Commit a transaction
     *
     * @return $this
     */
    public function transactionCommit()
    {
        $this->getEntityManager()->commit();

        return $this;
    }

    /**
     * Rollback change
     *
     * @return $this
     */
    public function transactionRollback()
    {
        $this->getEntityManager()->rollback();

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
     */
    public function all()
    {
        return $this->getEntityRepository()->findAll();
    }

    /**
     * @param string $dql
     * @param array  $params
     * @param int    $maxResults
     * @return mixed|null
     * @throws Exception
     */
    protected function executeDql($dql, array $params = array(), $maxResults = -1)
    {
        $repo  = $this->getEntityRepository();
        $qb    = $repo->createQueryBuilder('corilus_appointment_state');
        $query = null;

        $query = $qb->getQuery();

        if ($maxResults >= 0) {
            $query->setMaxResults($maxResults);
        }

        $query->setDQL($dql);

        if ($params) {
            $query->setParameters($params);
        }

        $results = null;

        if ($query) {
            $results = $query->execute();
        }

        return $results;
    }

    /**
     * Finds entities by a set of criteria.
     *
     * @param array      $criteria
     * @param array|null $orderBy
     * @param int|null   $limit
     * @param int|null   $offset
     *
     * @return array The objects.
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->getEntityRepository()->findBy($criteria, $orderBy, $limit, $offset);
    }

}