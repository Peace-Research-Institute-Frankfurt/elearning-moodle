<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . "/course/renderer.php");

function r($var)
{
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
}


class theme_hsfk_core_course_renderer extends core_course_renderer
{

	public function frontpage_available_courses()
	{
		global $CFG, $OUTPUT;

		// Query all visible courses
		$courses = array();
		$course_helper = new coursecat_helper();
		$course_helper->set_show_courses(self::COURSECAT_SHOW_COURSES_EXPANDED)->set_courses_display_options(array(
			'recursive' => true,
			'limit' => $CFG->frontpagecourselimit,
		));

		$raw_courses = core_course_category::get(0)->get_courses($course_helper->get_courses_display_options());
		$course_ids = array_keys($raw_courses);
		$noimg_url = $OUTPUT->image_url('no-image', 'theme');

		// Wrangle the array from $course_helper for rendering
		foreach ($course_ids as $course_id) {
			$course = get_course($course_id);
			$custom_fields = theme_hsfk_get_custom_fields($course_id);

			// Get course category data
			$category =  core_course_category::get($course->category);
			if ($course instanceof stdClass) {
				$course = new core_course_list_element($course);
			}

			// Find the thumbnail
			$img_url = $noimg_url;
			foreach ($course->get_course_overviewfiles() as $file) {
				if ($file->is_valid_image()) {
					$img_url = file_encode_url(
						"$CFG->wwwroot/pluginfile.php",
						'/' . $file->get_contextid() . '/' . $file->get_component() . '/' .
							$file->get_filearea() . $file->get_filepath() . $file->get_filename(),
						true
					);
				}
			}

			// Split the course name into LU index and title, ie. ["LU 01", "Arms control basics"]
			$title_exploded = explode(": ", $course->fullname);
			
      // Construct authors array
      $authors = array();
			$contributors = theme_hsfk_get_contributors();

			foreach ($contributors as $c) {
				if (array_search($course->id, array_column($c["in_courses"], "id")) !== false) {
					$authors[] = $c;
				}
			}

			$courses[] = array(
				"course" => $course,
				"thumbnail" => $img_url,
				"category" => $category,
				"lu_index" => str_replace("LU ", "", $title_exploded[0]),
				"title" => $title_exploded[1],
				"show_category" => $category->id !== "1",
				"authors" => $authors,
				"multiple_authors" => count($authors) > 1,
				"link" => "https://nonproliferation-elearning.eu/learningunits/" . $course->shortname
			);
		}
		$context = array(
			"courses" => $courses
		);

		echo $OUTPUT->render_from_template('theme_hsfk/course_list', $context);
	}
}
