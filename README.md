# EUNPDC eLearning - Moodle Theme

## Development Setup

`yarn` to install dependencies, `yarn start` to compile Sass, Javascript, and start a development server.

## Migration notes

- It's based on [Klass](https://moodle.org/plugins/theme_klass) (somewhere around [v1.5](https://github.com/lmsace/klass/blob/v1.3/config.php#L27)), which is itself a child theme of [bootstrapbase](https://moodle.org/plugins/theme_bootstrap), which was deprecated sometime in 2019.
- `lib/coursecatlib` is deprecated, see: https://github.com/CLAMP-IT/moodle-blocks_filtered_course_list/issues/119
- Removing custom CSS option from the admin and deleting related code from the theme - we control the source code now, so we can just add that stuff directly
- Removing commented-out code everywhere
- Fixing formatting everywhere
- We're using `Learning Units` for two different purposes
  - User-facing units (LU1-20)
  - A single certificate unit (there are three others but they seem deprecated) that has no content except quizzes (a kind of `activity`) and downloadable certificates (`mod_certificate`). Not sure yet how the certificates are configured.
- Here's a problem: The existing database doesn't work with the new Moodle version. It's impractical to move tables one-by-one (there's 400 of them and they're linked in gods knows what ways). Exporting and importing the database also doesn't work (). I guess we import the database, fix errors one by one (using the database created when we installed the new version), and compile the fixes into a single big SQL query. Then when we do the actual migration we run that.
- Courses are used in two ways: There's one for each learning unit, basically just to display the cards on the index view. There's one called "Certificate Section" that people are auto-enrolled in when they sign up, and that's the one that cointains the actual quiz/certificate logic. It has no relationship with the "Learning Units". All other courses are legacy.
- IT's A MULTI-STEP UPGRADE PROCESS! 3.5 -> 3.9 -> 4.1. And for extra pain Moodle 3.9 only supports PHP 7.

## Required Plugins

- mod_certificate
- block_progress
- enrol_auto
- ~gradingform_erubric~
