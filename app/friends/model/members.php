<?php
class friends_mdl_members extends b2c_mdl_members
{
  function __construct($app) 
	{
        $this->app = app::get('b2c');
        $this->current_app = $app;
        parent::__construct( $this->app );
        //使用meta系统进行存储
        $this->use_meta();
    }
    
    /*
     * 用于finder
     */
    public function count_finder( $filter )
    {
        $this->_get_filter( $filter );
        return $this->count( $filter );
    }
    #End Func
    
    
    /*
     * 用于finder
     */
    public function get_list_finder($cols='*', $filter=array(), $offset=0, $limit=-1, $orderType=null)
    {
        $this->_get_filter( $filter );
        return $this->getList( $cols,$filter,$offset,$limit,$orderType );
    }
    #End Func
}