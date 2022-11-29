<?php
class Affiliate
{
    private $name;
    private $blance;
    private $upperAffiliate;
    private $subAffiliates;
    private $customers;

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

    /**
     * Get the value of upperAffiliate
     */
    public function getUpperAffiliate()
    {
        return $this->upperAffiliate;
    }

    /**
     * Set the value of upperAffiliate
     *
     * @return  self
     */
    public function setUpperAffiliate($upperAffiliate)
    {
        $this->upperAffiliate = $upperAffiliate;
        $upperAffiliate->setSubAffiliates($this);
        return $this;
    }

    /**
     * Get the value of subAffiliates
     */
    public function getSubAffiliates()
    {
        return $this->subAffiliates;
    }

    /**
     * Set the value of subAffiliates
     *
     * @return  self
     */
    public function setSubAffiliates($subAffiliates)
    {
        $this->subAffiliates[] = $subAffiliates;

        return $this;
    }

    /**
     * Get the value of customers
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * Set the value of customers
     *
     * @return  self
     */
    public function setCustomers($customers)
    {
        $this->customers[] = $customers;

        return $this;
    }

    public function refer($typeObjectRefer, $objectRefer)
    {
        if ($typeObjectRefer === "Customer") {
            $objectRefer->setAffiliate($this);
            return "Giới thiệu khách hàng " . $objectRefer->getName() . " thành công!";
        } else if ($typeObjectRefer === "Affiliate") {
            $objectRefer->setUpperAffiliate($this);
            return "Giới thiệu affiliate " . $objectRefer->getName() . " thành công!";
        } else {
            return "Đối tượng bạn muốn thêm không hợp lệ!";
        }
    }

    public function withDraw($moneyWithDraw)
    {
        if ($moneyWithDraw <= 0) {
            return "Số tiền rút không hợp lệ. Số tiền bạn rút: $moneyWithDraw$.";
        } else if ($this->blance < 100) {
            $blance = $this->getBlance();
            return "Số tiền bạn rút: $moneyWithDraw$. Số dư hiện tại $blance$. Số dư dưới 100$ không thể rút";
        } else if ($this->blance < $moneyWithDraw) {
            $blance = $this->getBlance();
            return "Số tiền bạn rút: $moneyWithDraw$ quá lớn. Số dư hiện tại $blance$";
        } else {
            $blanceOld = $this->getBlance();
            $blanceNew = $blanceOld - $moneyWithDraw;
            $this->setBlance($blanceNew);

            return "Số tiền bạn rút: $moneyWithDraw$. Số dư hiện tại còn: $blanceNew$";
        }
    }

    public function printSubAff()
    {
        $subAffiliateOfAffiliateArray = $this->getSubAffiliates();
        if ($subAffiliateOfAffiliateArray) {
            $subAffiliateOfAffiliate = '';
            foreach ($subAffiliateOfAffiliateArray as $key => $valueOfArray) {
                $subAffiliateOfAffiliate .= $valueOfArray->getName() . ' ';
            }

            return $subAffiliateOfAffiliate;
        }
        return 'Chưa có sub-affiliate!';
    }

    public function printCustomers()
    {
        $customerOfAffiliateArray = $this->getCustomers();
        if ($customerOfAffiliateArray) {
            $customerOfAffiliate = '';
            foreach ($customerOfAffiliateArray as $key => $valueOfArray) {
                $customerOfAffiliate .= $valueOfArray->getName() . ' ';
            }
            return $customerOfAffiliate;
        }
        return 'Chưa có khách hàng!';
    }

    public function printBlanceOfSubAff()
    {
        $subAffiliateOfAffiliateArray = $this->getSubAffiliates();
        if ($subAffiliateOfAffiliateArray) {
            $subAffiliateOfAffiliate = '';
            foreach ($subAffiliateOfAffiliateArray as $key => $valueOfArray) {
                $subAffiliateOfAffiliate .= $valueOfArray->getBlance() . ' ';
            }

            return $subAffiliateOfAffiliate;
        }
        return 'Chưa có sub-affiliate!';
    }
}
