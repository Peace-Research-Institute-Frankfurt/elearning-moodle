<?php

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . "/mod/quiz/renderer.php");

class theme_hsfk_mod_quiz_renderer extends mod_quiz_renderer
{

	/**
	 * Override to always show backtocourse button on review page
	 */

	public function view_page_buttons(mod_quiz_view_object $viewobj)
	{
		global $CFG;
		$output = '';

		if (!$viewobj->quizhasquestions) {
			$output .= $this->no_questions_message($viewobj->canedit, $viewobj->editurl);
		}

		$output .= $this->access_messages($viewobj->preventmessages);

		if ($viewobj->buttontext) {
			$output .= $this->start_attempt_button(
				$viewobj->buttontext,
				$viewobj->startattempturl,
				$viewobj->preflightcheckform,
				$viewobj->popuprequired,
				$viewobj->popupoptions
			);
		}

		$output .= $this->single_button(
			$viewobj->backtocourseurl,
			get_string('backtocourse', 'quiz'),
			'get',
			array('class' => 'continuebutton')
		);

		return $output;
	}
}
