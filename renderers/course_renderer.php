<?php
/**
 * @package    theme_hsfk
 * @copyright  2015 onwards Nephzat Dev Team (http://www.nephzat.com)
 * @authors    Nephzat Dev Team , nephzat.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */ 
	
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . "/course/renderer.php");

class theme_hsfk_core_course_renderer extends core_course_renderer {

				public function new_courses() {
								/* New Courses */	
								global $CFG,$OUTPUT;
								$new_course = get_string('newcourses','theme_hsfk');
								
								$header = '<div id="frontpage-course-list">
									<h2>'.$new_course.'</h2>
										<div class="courses frontpage-course-list-all">
											<div class="row-fluid">';
											
								$footer = '</div>
										</div>
								</div>';			
								$co_cnt = 1;
								$content = '';
							
								if ($ccc = get_courses('all', 'c.id DESC,c.sortorder ASC', 'c.id,c.shortname,c.visible')) {
												foreach ($ccc as $cc) {
																if($co_cnt>8)
																{
																				break;
																}
																if($cc->visible=="0" || $cc->id=="1") {
																			continue;
																}
																$course_id = $cc->id;
																$course = get_course($course_id);
																
																$noimg_url = $OUTPUT->pix_url('no-image', 'theme');
																$course_url = new moodle_url('/course/view.php',array('id' => $course_id ));
																
																if ($course instanceof stdClass) {
																								require_once($CFG->libdir. '/coursecatlib.php');
																								$course = new course_in_list($course);
																}
																
																$img_url = '';			
																$context = context_course::instance($course->id);
																
																foreach ($course->get_course_overviewfiles() as $file) {
																				$isimage = $file->is_valid_image();
																				$img_url = file_encode_url("$CFG->wwwroot/pluginfile.php",
																												'/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
																												$file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
																				if (!$isimage) {
																								$img_url = $noimg_url;
																				}
																}
																	
																if(empty($img_url)) {
																				$img_url = $noimg_url;
																}		
																
																$content .= '<div class="span3">
																<div class="fp-coursebox">
																		<div class="fp-coursethumb">
																				<a href="'.$course_url.'">
																						<img src="'.$img_url.'" width="243" height="165" alt="'.$course->fullname.'">
																					</a>
																			</div>
																			<div class="fp-courseinfo">
																				<h5><a href="'.$course_url.'">'.$course->fullname.'</a></h5>
																					<div class="readmore"><a href="'.$course_url.'">Readmore<i class="fa fa-angle-double-right"></i></a></div>
																			</div>
																	</div>
															</div>';
																
																
																if(($co_cnt%4)=="0")
																{
																				$content .= '<div class="clearfix hidexs"></div>';
																}
																
																$co_cnt++;
													}
								}				
								
								$course_html = $header.$content.$footer;
								$frontpage = isset($CFG->frontpage)?$CFG->frontpage:'';
								$frontpageloggedin = isset($CFG->frontpageloggedin)?$CFG->frontpageloggedin:'';
								
								$f1_pos = strpos($frontpage,'6');
								$f2_pos = strpos($frontpageloggedin,'6');
								$btn_html = '';
								if($co_cnt<=1 && !$this->page->user_is_editing() && has_capability('moodle/course:create', context_system::instance()))
								{
												$btn_html = $this->add_new_course_button();
								}

								if (!isloggedin() or isguestuser()) {
												if($f1_pos===false)
												{
												    if($co_cnt>1)
																{
																				echo $course_html;
																}
												}
								}else{
												if($f2_pos===false)
												{
																echo $course_html."<br/>".$btn_html;
												}
								}

				}
				
				
				
				public function frontpage_available_courses() {
								/* available courses */
									global $CFG,$OUTPUT;
									require_once($CFG->libdir. '/coursecatlib.php');

									
									$chelper = new coursecat_helper();
									$chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_EXPANDED)->
																	set_courses_display_options(array(
																					'recursive' => true,
																					'limit' => $CFG->frontpagecourselimit,
																					'viewmoreurl' => new moodle_url('/course/index.php'),
																					'viewmoretext' => new lang_string('fulllistofcourses')));
									
									$chelper->set_attributes(array('class' => 'frontpage-course-list-all'));
									$courses = coursecat::get(0)->get_courses($chelper->get_courses_display_options());
									$totalcount = coursecat::get(0)->get_courses_count($chelper->get_courses_display_options());
									
									$course_ids = array_keys($courses);
									
									$header = '<div id="frontpage-course-list">
										<h2>Learning Units</h2>
											<div class="courses frontpage-course-list-all">
												';
												
									$footer = '</div>
									</div>';			
									$co_cnt = 1;
									$content = '';
									
									if ($ccc = get_courses('all', 'c.sortorder ASC', 'c.id,c.shortname,c.visible')) {
													foreach ($course_ids as $course_id) {
																	$course = get_course($course_id);
																	
																	$noimg_url = $OUTPUT->pix_url('no-image', 'theme');
																	$course_url = new moodle_url('/course/view.php',array('id' => $course_id ));
																	
																	if ($course instanceof stdClass) {
																									require_once($CFG->libdir. '/coursecatlib.php');
																									$course = new course_in_list($course);
																	}
																	
																	$img_url = '';			
																	$context = context_course::instance($course->id);
																	
																	foreach ($course->get_course_overviewfiles() as $file) {
																					$isimage = $file->is_valid_image();
																					$img_url = file_encode_url("$CFG->wwwroot/pluginfile.php",
																													'/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
																													$file->get_filearea(). $file->get_filepath(). $file->get_filename(), !$isimage);
																					if (!$isimage) {
																									$img_url = $noimg_url;
																					}
																	}
																		
																	if(empty($img_url)) {
																					$img_url = $noimg_url;
																	}		
																	
																	$coursename = explode(": ", $course->fullname);

																	$courselink = "https://nonproliferation-elearning.eu/learningunits/".$course->shortname;

																	$content .= '
																		<div class="fp-coursebox" 
																				data-title="'.htmlspecialchars($course->fullname).'" 
																				data-img="'.htmlspecialchars($img_url).'" 
																				data-description="'.htmlspecialchars($course->summary).'" 
																				data-url="'.$courselink.'">
																			<div class="fp-coursethumb">
																				<img src="'.$img_url.'" alt="'.$course->fullname.'">
																			</div>
																			<div class="fp-courseinfo">
																				<h5>
																					<span class="course-number">'.str_replace('LU ', '', $coursename[0]).'</span>
																					<span class="course-name">'.$coursename[1].'</span>
																				</h5>
																				<div class="more">'.$course->summary.'</div>
																			</div>
																			<div class="fp-courselinks">
																				<a href="" class="morelink">More info</a>
																				<a href="'.$courselink.'" target="_blank" class="piwik_link startlink">Start</a>
																			</div>
																		</div>
																	';
																	
																	
																//	if(($co_cnt%5)=="0")
																//	{
																//					$content .= '<div class="clearfix hidexs"></div>';
																//	}
																	
																	$co_cnt++;
																	
														}
									}				
									
									$course_html = $header.$content.$footer;
									echo $course_html;
									
									if (!$totalcount && !$this->page->user_is_editing() && has_capability('moodle/course:create', context_system::instance())) {
							            // Print link to create a new course, for the 1st available category.
							            echo $this->add_new_course_button();
							        }
									
					}

				/**
			     * Displays one course in the list of courses.
			     *
			     * This is an internal function, to display an information about just one course
			     * please use {@link core_course_renderer::course_info_box()}
			     *
			     * @param coursecat_helper $chelper various display options
			     * @param course_in_list|stdClass $course
			     * @param string $additionalclasses additional classes to add to the main <div> tag (usually
			     *    depend on the course position in list - first/last/even/odd)
			     * @return string
			     */
			    protected function coursecat_coursebox(coursecat_helper $chelper, $course, $additionalclasses = '') {
			        global $CFG;
			        if (!isset($this->strings->summary)) {
			            $this->strings->summary = get_string('summary');
			        }
			        if ($chelper->get_show_courses() <= self::COURSECAT_SHOW_COURSES_COUNT) {
			            return '';
			        }
			        if ($course instanceof stdClass) {
			            require_once($CFG->libdir. '/coursecatlib.php');
			            $course = new course_in_list($course);
			        }
			        $content = '';
			        $classes = trim('coursebox clearfix '. $additionalclasses);
			        if ($chelper->get_show_courses() >= self::COURSECAT_SHOW_COURSES_EXPANDED) {
			            $nametag = 'h3';
			        } else {
			            $classes .= ' collapsed';
			            $nametag = 'div';
			        }

			        // .coursebox
			        $content .= html_writer::start_tag('div', array(
			            'class' => $classes,
			            'data-courseid' => $course->id,
			            'data-type' => self::COURSECAT_TYPE_COURSE,
			        ));

			        $content .= html_writer::start_tag('div', array('class' => 'info'));

			        // course name
			        $coursename = $chelper->get_course_formatted_name($course);
			        $coursenamelink = html_writer::link("https://nonproliferation-elearning.eu/learningunits/".$course->shortname,
			                                            $coursename, array('class' => $course->visible ? '' : 'dimmed','target' => '_blank'));
			        $content .= html_writer::tag($nametag, $coursenamelink, array('class' => 'coursename'));
			        // If we display course in collapsed form but the course has summary or course contacts, display the link to the info page.
			        $content .= html_writer::start_tag('div', array('class' => 'moreinfo'));
			        if ($chelper->get_show_courses() < self::COURSECAT_SHOW_COURSES_EXPANDED) {
			            if ($course->has_summary() || $course->has_course_contacts() || $course->has_course_overviewfiles()) {
			                $url = new moodle_url('/course/info.php', array('id' => $course->id));
			                $image = html_writer::empty_tag('img', array('src' => $this->output->pix_url('i/info'),
			                    'alt' => $this->strings->summary));
			                $content .= html_writer::link($url, $image, array('title' => $this->strings->summary));
			                // Make sure JS file to expand course content is included.
			                $this->coursecat_include_js();
			            }
			        }
			        $content .= html_writer::end_tag('div'); // .moreinfo

			        // print enrolmenticons
			        if ($icons = enrol_get_course_info_icons($course)) {
			            $content .= html_writer::start_tag('div', array('class' => 'enrolmenticons'));
			            foreach ($icons as $pix_icon) {
			                $content .= $this->render($pix_icon);
			            }
			            $content .= html_writer::end_tag('div'); // .enrolmenticons
			        }

			        $content .= html_writer::end_tag('div'); // .info

			        $content .= html_writer::start_tag('div', array('class' => 'content'));
			        $content .= $this->coursecat_coursebox_content($chelper, $course);
			        $content .= html_writer::end_tag('div'); // .content

			        $content .= html_writer::end_tag('div'); // .coursebox
			        return $content;
			    }
			    
				
}
