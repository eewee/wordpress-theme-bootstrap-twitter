<?php
//namespace FrEeweeThemeEeweeBtToolsController;
//if( !class_exists(ToolsController)){
	class ToolsController{
		
		//const XXX_XXX = 55;
		
		function __construct(){}
		
                /*
		static public function getXxx(){
			return array(
				0=>"xxx",
				1=>"yyy"
			);
		}
                */

                /**
                 * Get page size
                 * @return string
                 */
                static function getPageSize(){
                    // width of your website
                    $options = get_option('eewee_options');
                    switch( $options['eewee_general_sizepage'] ){

                        case "full":
                            $pageSize = "container-fluid";
                            break;

                        case "fixe1":
                            $pageSize = "eewee-container-standard";
                            break;

                        case "fixe2":
                            $pageSize = "eewee-container-large";
                            break;

                        case "fixe3":
                            $pageSize = "eewee-container-medium";
                            break;

                        case "fixe4":
                            $pageSize = "eewee-container-small";
                            break;

                        default : 
                            $pageSize = "eewee-container-standard";
                    }
                    return $pageSize;
                }
                
		
                /**
                * Format the date
                * @param string $date yyyy-mm-dd hh:ii:ss
                * @param string $format en, fr
                * @return string date good format 
                */
                static function getFormatDate($date, $format='fr'){
                    $tbl        = explode( " ", $date );
                    $tbl_date   = explode( "-", $tbl[0] );
                    $tbl_heure  = explode( ":", $tbl[1] );

                    switch($format){
                        case "en" :
                            $d = $tbl[0];
                            break;

                        default :
                            $d = $tbl_date[2]."-".$tbl_date[1]."-".$tbl_date[0]; 
                    }

                    return $d;

                }
                
                
                /**
		 * Savoir si on est dans une rubrique de la categ xxx
		 */
                /*
		function isCategXxx(){
			if( eregi("/xxx/", $_SERVER['REQUEST_URI']) ){
				return true;
			}else{
				return false;
			}
		}
                */
		
		/**
		 * 
		 * Afficher les x 1er caractere d'une chaine
		 * @param string $content
		 * @param int $maxChar
		 */
		function getContentLimit($content,$maxChar=55) {
		    $content = strip_tags(html_entity_decode($content));
		    
		    if (strlen($content) > $maxChar) {
		        $content = substr($content, 0, $maxChar);
		        $content = substr($content, 0, strrpos($content, " "))." ...";
		    }
		    
		    return $content;
		}
		// Wordpress : changer la valeur par defaut
		//function theme_excerpt_length( $length ) { return 45; }
		//add_filter( 'excerpt_length', 'theme_excerpt_length' );
		
		/**
		 * 
		 * retourne un mdp
		 * @param int $taille
		 * @param string $type_cryptage md5, sha1, vide
		 */
		static public function getMdpAleatoire( $taille=8, $type_cryptage="" ){
			$md5 = $sha1 = "";
			
			$chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
		    srand((double)microtime()*1000000);
		    for($i=0; $i<$taille; $i++){
		    	@$pass .= $chaine[rand()%strlen($chaine)];
		    }//fin for
			$tbl_pwd[] = $pass;
		    
		    if( $type_cryptage == "md5" ){
				$tbl_pwd[] = md5($pass);
		    }elseif( $type_cryptage == "sha1" ){
		    	$tbl_pwd[] = sha1($pass);
		    }//fin elseif
		    
		    return $tbl_pwd;
		       
		}//fin function
	
		
		/**
		 * 
		 * validateur email
		 * @param string $adresse
		 */
		static public function emailValide( $adresse ){ 
			$reg = "^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]*[.][a-zA-Z]{2,4}$";
			$email = ereg( $reg, $adresse );
			if ( $email ){
				return true;
			}else{
				return false;
			}//fin else
		}//fin function
		
		
		/**
		 * 
		 * retourner infos
		 * @param string $s
		 */
		static public function prepre($s){
			echo "<pre>";
				var_dump($s);
			echo "</pre>";
		}
		
	}//fin class
	
//}//fin if