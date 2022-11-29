<?php
class StoreOwner
{
    private $name;
    private $blance;

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of blance
     */
    public function getBlance()
    {
        return $this->blance;
    }

    /**
     * Set the value of blance
     *
     * @return  self
     */
    public function setBlance($blance)
    {
        $this->blance = $blance;

        return $this;
    }

    public function printBlance()
    {
        return $this->blance;
    }
}
