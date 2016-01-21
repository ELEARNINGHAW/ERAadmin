<?php 
class block_era_admin  extends block_base 
{
  function get_content() 
  {
     global $USER;    
     global $COURSE;    
     
     $context = context_course::instance( $COURSE->id );

     if ( has_capability( 'moodle/course:update', $context )  ) 
     { 
       $this->title = get_string('pluginname', 'block_era_admin');      
           
       if   ( isset( $_SERVER[ 'SERVER_NAME' ] ) AND ( $_SERVER[ 'SERVER_NAME' ] )   == 'localhost' )   
            { $this->srvpath = 'http://localhost/haw/ERanfrageAPP/index.php';                       /* Dev-Server */   }  
       else { $this->srvpath = 'http://lernserver.el.haw-hamburg.de/haw/ERanfrageAPP/index.php';    /* Live-Server */  }   
       

 $idm ="?uun=" .rawurlencode( base64_encode( $USER->username    ))	
      ."&ufn=" .rawurlencode( base64_encode( $USER->firstname   ))  
      ."&uln=" .rawurlencode( base64_encode( $USER->lastname    ))	
      ."&uem=" .rawurlencode( base64_encode( $USER->email       ))	
      ."&ufa=" .rawurlencode( base64_encode( $USER->address     ))	
      ."&uin=" .rawurlencode( base64_encode( $USER->institution )) 
      ."&ude=" .rawurlencode( base64_encode( $USER->department  )) 
      ."&uid=" .rawurlencode( base64_encode( $USER->id          )) 
      ."&cid=" .rawurlencode( base64_encode( $COURSE->id        ))  
      ."&cca=" .rawurlencode( base64_encode( $COURSE->category  ))	
      ."&cso=" .rawurlencode( base64_encode( $COURSE->sortorder ))	
      ."&cfn=" .rawurlencode( base64_encode( $COURSE->fullname  )) 
      ."&csn=" .rawurlencode( base64_encode( $COURSE->shortname )) 		
      ."&x=9"
      ;
	 $contentA = "<div style=\" height :20px; border:thin #CCC solid; text-align:center;vertical-align: middle; padding:6px; \"><a target=\"_blank\" href=".$this->srvpath.$idm."> ADMIN TOOL </a></div>";
    
     if ($this->content !== NULL) 
      {        
          return $this->content;    
      }
      
      $this->content       = new stdClass;    
      $this->content->text = $contentA;    
    }  
  }	
  
  function init() 	
  { $this->title = get_string('pluginname', 'block_era_admin');
  }	
  
  function hide_header() 	
  {   return false;	
  }

  public function instance_allow_multiple() 
  {  return false;
  }

  public function applicable_formats() 
  { return array
    (
			  'site-index'  => false,
			  'course-view' => true, 
			  'my-index'    => false, 
			  'mod'         => false, 
	  );
	}
	
}?>
