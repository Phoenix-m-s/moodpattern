<?php
class clsEmail
{
    public $variable;


    public function parse()
    {
        $filename = func_get_args();

        ob_start();
        $variable = $this->variable;

        //invoice malekloo includ mikoni man bayad ye sfe vase msi be u bedam
        //function invoice mail malekloo ra seda mizanam member_id va invoicce id midam
        include($filename[0]);
        $email_html = ob_get_contents();
        ob_clean();
        flush();
        return $email_html;
    }

}