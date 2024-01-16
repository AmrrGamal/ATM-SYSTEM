<?php 

class SavingAccount extends Account{


    private $annualIntrest;
            public function getannualIntrest() {
                return $this->annualIntrest;
            }

            public function setannualIntrest($annualIntrest): void {
                $this->annualIntrest = $annualIntrest;
            }
}

?>