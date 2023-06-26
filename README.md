# EUNPDC eLearning - Moodle Theme

## Development Setup

`yarn` to install dependencies, `yarn start` to compile Sass, Javascript, and start a development server.

## Migration notes

- It's based on [Klass](https://moodle.org/plugins/theme_klass) (somewhere around [v1.5](https://github.com/lmsace/klass/blob/v1.3/config.php#L27)), which is itself a child theme of [bootstrapbase](https://moodle.org/plugins/theme_bootstrap), which was deprecated sometime in 2019.
- `lib/coursecatlib` is deprecated, see: https://github.com/CLAMP-IT/moodle-blocks_filtered_course_list/issues/119

## Required Plugins

- mod_certificate
- block_progress
- enrol_auto
