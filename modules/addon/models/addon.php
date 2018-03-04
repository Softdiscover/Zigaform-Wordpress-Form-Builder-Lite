<?php

/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
if (!defined('ABSPATH')) {
    exit('No direct script access allowed');
}
if (class_exists('Uiform_Model_Addon')) {
    return;
}

/**
 * Model Form class
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
class Uiform_Model_Addon {

    private $wpdb = "";
    public $table = "";

    function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table = $wpdb->prefix . "uiform_addon";
        $this->tbaddon_details = $wpdb->prefix . "uiform_addon_details";
    }
    
    
    function getListAddonsByBack() {
        $query = sprintf('
            select c.*
            from %s c
            where c.flag_status=1 
            and c.add_load_back=1
            ORDER BY c.add_order desc
            ', $this->table);
        
        return $this->wpdb->get_results($query);
    }
    
    function getListAddonsByFront() {
        $query = sprintf('
            select c.*
            from %s c
            where c.flag_status=1 
            and c.add_load_front=1
            ORDER BY c.add_order desc
            ', $this->table);
        
        return $this->wpdb->get_results($query);
    }
    
    function getActiveAddonsNamesOnBack(){
        $query = sprintf('
            select c.add_name
            from %s c
            where c.flag_status=1 
            and c.add_load_back=1
            ORDER BY c.add_order desc
            ', $this->table);
        
        $tmp_result=$this->wpdb->get_results($query);
        
        $result=array();
        foreach ($tmp_result as $key => $value) {
            $result[]=$value->add_name;
        }
        
        return $result;
    }
    
    
    function getAddonsNamesOnBackByForm($idform){
        $query = sprintf('
            select c.add_name
            from %s c
	    left join %s ad on ad.add_name = c.add_name
            where c.flag_status=1 and ad.fmb_id=%s
            and c.add_load_back=1
            ORDER BY c.add_order desc
            ', $this->table,$this->tbaddon_details,$idform);
        
        $tmp_result=$this->wpdb->get_results($query);
        
        $result=array();
        foreach ($tmp_result as $key => $value) {
            $result[]=$value->add_name;
        }
        
        return $result;
    }
    
  
    
    function getListAddonsBySection($section='') {
        $query = sprintf('
            select c.*
            from %s c
            where c.flag_status=1 
            and c.add_section="%s"
            ORDER BY c.add_section_order desc
            ', $this->table,$section);
        
        return $this->wpdb->get_results($query);
    }
 

}

?>