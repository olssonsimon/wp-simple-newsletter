<?php
/**
 * @package simple-newsletter
*/
namespace SimpleNewsletter;

class Export
{
	public $file_csv = 'Simple-NewsLetter-output.csv';

	// Export subscribers as CSV
	public function CSV() {
		global $wpdb;

		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=SimpleNewsLetter-' . date('Y-m-d') . '.csv');

		// create a file pointer connected to the output stream
		$output = fopen('php://output', 'w');

		// output the column headings
		fputcsv($output, array('EMAIL'));

		$rows = $wpdb->get_results("SELECT post_title FROM wp_posts WHERE post_type='sn_subscriber' AND post_status='publish'", ARRAY_A);

		// loop over the rows, outputting them
		foreach ($rows as $row) {
			if ($row && $row !== "")
			  fputcsv($output, $row);
			}
		}
}
