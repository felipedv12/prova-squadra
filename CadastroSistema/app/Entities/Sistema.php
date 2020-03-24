<?php


namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sistema")
 */

class Sistema
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="idSistema")
     */
    private $idSistema;

    /**
     * @ORM\Column(type="string", name="descricaoSistema")
     */
    private $descricaoSistema;

    /**
     * @ORM\Column(type="string", name="siglaSistema")
     */
    private $siglaSistema;

    /**
     * @ORM\Column(type="string", name="emailSistema")
     */
    private $emailSistema;

    /**
     * @ORM\Column(type="string", name="urlSistema")
     */
    private $urlSistema;

    /**
     * @ORM\Column(type="boolean", name="statusSistema")
     */
    private $statusSistema;

    public function __construct($descricaoSistema, $siglaSistema, $emailSistema, $urlSistema, $statusSistema)
    {
        $this->descricaoSistema = $descricaoSistema;
        $this->siglaSistema = $siglaSistema;
        $this->emailSistema = $emailSistema;
        $this->urlSistema = $urlSistema;
        $this->statusSistema = $statusSistema;
    }

    public function getIdSistema()
    {
        return $this->idSistema;
    }

    public function setIdSistema($idSistema): void
    {
        $this->idSistema = $idSistema;
    }

    public function getDescricaoSistema()
    {
        return $this->descricaoSistema;
    }

    public function setDescricaoSistema($descricaoSistema): void
    {
        $this->descricaoSistema = $descricaoSistema;
    }

    public function getSiglaSistema()
    {
        return $this->siglaSistema;
    }

    public function setSiglaSistema($siglaSistema): void
    {
        $this->siglaSistema = $siglaSistema;
    }

    public function getEmailSistema()
    {
        return $this->emailSistema;
    }

    public function setEmailSistema($emailSistema): void
    {
        $this->emailSistema = $emailSistema;
    }

    public function getUrlSistema()
    {
        return $this->urlSistema;
    }

    public function setUrlSistema($urlSistema): void
    {
        $this->urlSistema = $urlSistema;
    }

    public function getStatusSistema()
    {
        return $this->statusSistema;
    }

    public function setStatusSistema($statusSistema): void
    {
        $this->statusSistema = $statusSistema;
    }
}
