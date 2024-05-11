<?php
class newsmodel extends looeic
{
    protected $TABLE_NAME = 'esme table';
    //rule barye table
    protected $rules = array(
        '' => 'required*' . 'please fill in the news_name'
    );

}