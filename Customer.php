<?php
class Customer
{
    private $name;
    private $address;
    private $affiliate = null;

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAffiliate($affiliate)
    {
        $this->affiliate = $affiliate;
        $affiliate->setCustomers($this);

        return $this;
    }

    public function getAffiliate()
    {
        return $this->affiliate;
    }

    public function placeOrder($storeOwner, $totalOrder)
    {
        $perAffiliate = $totalOrder * (10 / 100);
        $perStoreOwner = $totalOrder - $perAffiliate;

        $affiliate = $this->getAffiliate();

        $upperAffiliateOfAffiliate = $affiliate->getUpperAffiliate();


        $blanceOldOfStoreOwner = $storeOwner->getBlance();
        $storeOwner->setBlance($blanceOldOfStoreOwner + $perStoreOwner);

        if ($upperAffiliateOfAffiliate) {
            $blanceOldOfAffiliate = $affiliate->getBlance();
            $blanceOfAffiliateFinal = $blanceOldOfAffiliate + ($perAffiliate / 2);
            $affiliate->setBlance($blanceOfAffiliateFinal);

            $blanceOldOfUpperAffiliate = $upperAffiliateOfAffiliate->getBlance();
            $blanceOfUpperAffiliateFinal = $blanceOldOfUpperAffiliate + ($perAffiliate / 2);
            $upperAffiliateOfAffiliate->setBlance($blanceOfUpperAffiliateFinal);
        } else {
            $blanceOldOfAffiliate = $affiliate->getBlance();
            $blanceOfAffiliateFinal = $blanceOldOfAffiliate + $perAffiliate;
            $affiliate->setBlance($blanceOfAffiliateFinal);
        }

        return $this;
    }
}
