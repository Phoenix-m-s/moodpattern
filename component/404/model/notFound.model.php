<?php
class notFoundmodel extends looeic
{
    protected $TABLE_NAME = '';
    protected $rules = array(
        '' => 'required*' . 'please fill in the ivr_name'
    );
}