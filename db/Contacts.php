<?php

namespace Meg\Models;

class Contacts extends \Phalcon\Mvc\Model
{

    protected $id_contato;
    protected $origin;
    protected $name;
    protected $email;
    protected $subject;
    protected $messagem;
    protected $ip;
    protected $object;
    protected $created_at;

    public function initialize()
    {
        $this->setSource("contacts");
    }

    /**
     * @return mixed
     */
    public function getIdContato()
    {
        return $this->id_contato;
    }

    /**
     * @param mixed $id_contato
     */
    public function setIdContato($id_contato)
    {
        $this->id_contato = $id_contato;
    }

    /**
     * @return mixed
     */
    public function getOrigin()
    {
        return $this->origin;
    }

    /**
     * @param mixed $origin
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getMessagem()
    {
        return $this->messagem;
    }

    /**
     * @param mixed $messagem
     */
    public function setMessagem($messagem)
    {
        $this->messagem = $messagem;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

}