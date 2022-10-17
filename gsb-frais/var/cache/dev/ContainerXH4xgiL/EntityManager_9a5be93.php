<?php

namespace ContainerXH4xgiL;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/src/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder8e159 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerc1844 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties087c9 = [
        
    ];

    public function getConnection()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getConnection', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getMetadataFactory', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getExpressionBuilder', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'beginTransaction', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getCache', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getCache();
    }

    public function transactional($func)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'transactional', array('func' => $func), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'wrapInTransaction', array('func' => $func), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'commit', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->commit();
    }

    public function rollback()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'rollback', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getClassMetadata', array('className' => $className), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'createQuery', array('dql' => $dql), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'createNamedQuery', array('name' => $name), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'createQueryBuilder', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'flush', array('entity' => $entity), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'clear', array('entityName' => $entityName), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->clear($entityName);
    }

    public function close()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'close', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->close();
    }

    public function persist($entity)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'persist', array('entity' => $entity), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'remove', array('entity' => $entity), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'refresh', array('entity' => $entity), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'detach', array('entity' => $entity), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'merge', array('entity' => $entity), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getRepository', array('entityName' => $entityName), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'contains', array('entity' => $entity), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getEventManager', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getConfiguration', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'isOpen', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getUnitOfWork', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getProxyFactory', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'initializeObject', array('obj' => $obj), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'getFilters', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'isFiltersStateClean', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'hasFilters', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return $this->valueHolder8e159->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializerc1844 = $initializer;

        return $instance;
    }

    public function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config)
    {
        static $reflection;

        if (! $this->valueHolder8e159) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder8e159 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder8e159->__construct($conn, $config);
    }

    public function & __get($name)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, '__get', ['name' => $name], $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        if (isset(self::$publicProperties087c9[$name])) {
            return $this->valueHolder8e159->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8e159;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder8e159;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8e159;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder8e159;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, '__isset', array('name' => $name), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8e159;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder8e159;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, '__unset', array('name' => $name), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder8e159;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder8e159;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, '__clone', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        $this->valueHolder8e159 = clone $this->valueHolder8e159;
    }

    public function __sleep()
    {
        $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, '__sleep', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;

        return array('valueHolder8e159');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerc1844 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerc1844;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerc1844 && ($this->initializerc1844->__invoke($valueHolder8e159, $this, 'initializeProxy', array(), $this->initializerc1844) || 1) && $this->valueHolder8e159 = $valueHolder8e159;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder8e159;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder8e159;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
