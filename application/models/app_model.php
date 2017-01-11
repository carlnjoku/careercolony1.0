<?php

If (!defined('BASEPATH')) exit('No direct script access allowed');
class App_model extends CI_Model
{
        function __construct()
        {
            parent::__construct();
           
        }
       
       
       
       
        function getcountry()
        {
            $this->db->select('name, capital');
            $this->db->limit(500);
            $query = $this->db->get('countryinfo');
            return $query->result();
        }
        
        function get_industry()
        {
        	$this->db->select('*');
            $query = $this->db->get('industry');
            return $query->result(); 
        
        }
        
        function get_companytype()
        {
        	$this->db->select('*');
            $query = $this->db->get('companyType');
            return $query->result(); 
        
        }
        
        function getBusinessUnit_old()
        {
            $this->db->select('buID, bu_name, address');
        	$query = $this->db->get('business_units');
        	return $query->result();
        }

       
        function getundertaking_by_location($loc_id)
        {
           
            $this->db->select('und_id, under_name');
            $query = $this->db->get_where('undertakings', array('loc_id'=>$loc_id));
            return $query->result();
        }
       
       
        function getundertaker()
        {
            $this->db->select('und_id, under_name');
            $query = $this->db->get('undertakings');
            return $query->result();
        }
       
        function getclass_old()
        {
            $this->db->select('class_id, class_code');
            $query = $this->db->get('class');
            return $query->result();
        }
       
        function getdt_old()
        {
            $this->db->select('dt_id, dt_code');
            $query = $this->db->get('dt');
            return $query->result();
        }
       
        function getmarketer()
        {
            $this->db->select('mrk_id, name');
            $query = $this->db->get('marketers');
            return $query->result();
        }
        
        function get_business_unit_name($buID)
        {
        	$this->db->select('bu_name');
        	$query = $this->db->get_where('business_units', array('buID' => $buID));
            return $query->result();
        }
        
        
        
        function get_undertaking_name($und_id)
        {
        	$this->db->select('under_name');
        	$query = $this->db->get_where('undertakings', array('und_id' => $und_id));
            return $query->result();
        }
        
       
       function get_undertaking_by_business_unit($buID)
       {
       		$this->db->select('*');
            $this->db->join('undertakings', 'undertakings.und_id = undertaking_details.und_id', 'left');
            $query = $this->db->get_where('undertaking_details', array('undertaking_details.buID' => $buID));
            return $query->result();
       }
       
       function get_dt_by_undertaking($und_id)
        {
        	$this->db->select('*');
        	$this->db->join('undertakings', 'undertakings.und_id = input.und_id', 'left');
        	$query = $this->db->get_where('input', array('input.und_id' => $und_id));
            return $query->result();
        
        }
       
       
        function addLocation($data)
        {
            $this->db->insert('locations', $data);
        }
        
        function addUndertakingDetails($data)
        {
            $this->db->insert('undertaking_details', $data);
        }
        
        function addBusinessUnit($data)
        {
            $this->db->insert('business_units', $data);
        }
       
        function addPopulation($data)
        {
            $this->db->insert('population', $data);
        }
       
        /*
        function getClass($class_id)
        {
            $this->db->select('class_id, class_name');
            $query = $this->db->get_where('class', array('class_id'=>$class_id));
            return $query->result();
       
        }
        */
       
        function addUndertakings($data)
        {
            $query = $this->db->insert('undertakings', $data);
            //return $query->result();
            return $this->db->insert_id();
           
        }
       
        function count_under($und_id)
        {
            $this->db->select('buID');
            $query = $this->db->get_where('undertakings', array('und_id'=>$und_id));
            return $query->result();
           
        }
       
        function count_under_update($loc_id){
            $this->db->where('loc_id', $loc_id);
            $this->db->set('count_under', '`count_under`+1', FALSE);
            $this->db->update('locations');
        }
       
        function count_dt($dt_id)
        {
            $this->db->select('und_id');
       
            $query = $this->db->get_where('dt', array('dt_id'=>$dt_id));
            return $query->result();
           
        }
       
        function count_dt_update($und_id){
            $this->db->where('und_id', $und_id);
            $this->db->set('total_dt', '`total_dt`+1', FALSE);
            $this->db->update('undertakings');
        }
       
        ############
        function count_class($class_id)
        {
            $this->db->select('dt_id');
       
            $query = $this->db->get_where('class', array('class_id'=>$class_id));
            return $query->result();
           
        }
       
        function count_class_update($dt_id){
            $this->db->where('dt_id', $dt_id);
            $this->db->set('total_class', '`total_class`+1', FALSE);
            $this->db->update('dt');
        }
       
       
       
        
        
     }  
