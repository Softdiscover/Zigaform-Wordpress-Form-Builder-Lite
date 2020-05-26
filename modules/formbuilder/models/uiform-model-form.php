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
 * @link      https://wordpress-form-builder.zigaform.com/
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'No direct script access allowed' );
}
if ( class_exists( 'Uiform_Model_Form' ) ) {
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
 * @link      https://wordpress-form-builder.zigaform.com/
 */
class Uiform_Model_Form {

	private $wpdb = '';
	public $table = '';

	function __construct() {
		global $wpdb;
		$this->wpdb  = $wpdb;
		$this->table = $wpdb->prefix . 'uiform_form';
	}

	  /**
	   * formsmodel::getListForms()
	   * List form estimator
	   *
	   * @param int $per_page max number of form estimators
	   * @param int $segment  Number of pagination
	   *
	   * @return array
	   */
	function getListFormsFiltered( $data ) {

		$per_page   = $data['per_page'];
		$segment    = $data['segment'];
		$search_txt = $data['search_txt'];
		$orderby    = $data['orderby'];

		$query = sprintf(
			'
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2
            from %s uf
            where uf.flag_status>0 ',
			$this->table
		);

		if ( ! empty( $search_txt ) ) {
			$query .= " and  uf.fmb_name like '%" . $search_txt . "%' ";
		}

		$orderby = ( $orderby === 'asc' ) ? 'asc' : 'desc';

		$query .= sprintf( ' ORDER BY uf.updated_date %s ', $orderby );

		if ( $per_page != '' || $segment != '' ) {
			$segment = ( ! empty( $segment ) ) ? $segment : 0;
			$query  .= sprintf( ' limit %s,%s', (int) $segment, (int) $per_page );
		}

		return $this->wpdb->get_results( $query );
	}

	/**
	 * formsmodel::getListForms()
	 * List form estimator
	 *
	 * @param int $per_page max number of form estimators
	 * @param int $segment  Number of pagination
	 *
	 * @return array
	 */
	function getListForms( $per_page = '', $segment = '' ) {
		$query = sprintf(
			'
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2
            from %s uf
            where uf.flag_status>0 
            ORDER BY uf.updated_date desc
            ',
			$this->table
		);

		if ( $per_page != '' || $segment != '' ) {
			$segment = ( ! empty( $segment ) ) ? $segment : 0;
			$query  .= sprintf( ' limit %s,%s', $segment, $per_page );
		}

		return $this->wpdb->get_results( $query );
	}

	function getFormById( $id ) {
		$query = sprintf(
			'
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2,fmb_rec_tpl_html,fmb_rec_tpl_st
            from %s uf
            where uf.fmb_id=%s
            ',
			$this->table,
			$id
		);

		return $this->wpdb->get_row( $query );
	}

	function getTitleFormById( $id ) {
		$query = sprintf(
			'
            select uf.fmb_name
            from %s uf
            where uf.fmb_id=%s
            ',
			$this->table,
			(int) $id
		);

		return $this->wpdb->get_row( $query );
	}

	function getAvailableFormById( $id ) {
		$query = sprintf(
			'
            select uf.fmb_id,uf.fmb_data,uf.fmb_name,uf.fmb_html,uf.fmb_html_backend,uf.flag_status,uf.created_date,uf.updated_date,
                uf.fmb_html_css,uf.fmb_default,uf.fmb_skin_status,uf.fmb_skin_data,uf.fmb_skin_type,uf.fmb_data2
            from %s uf
            where 
            uf.flag_status=1 and
            uf.fmb_id=%s
            ',
			$this->table,
			$id
		);

		return $this->wpdb->get_row( $query );
	}

	function getFormById_2( $id ) {
		$query = sprintf(
			'
            select uf.fmb_data2,uf.fmb_name
            from %s uf
            where uf.fmb_id=%s
            ',
			$this->table,
			$id
		);

		return $this->wpdb->get_row( $query );
	}

	function CountForms() {
		$query = sprintf(
			'
            select COUNT(*) AS counted
            from %s c
            where c.flag_status>0 
            ORDER BY c.updated_date desc
            ',
			$this->table
		);
		$row   = $this->wpdb->get_row( $query );
		if ( isset( $row->counted ) ) {
			return $row->counted;
		} else {
			return 0;
		}
	}

}


