---
name: Upgrade Moodle
about: Standard workflow for upgrading Moodle
title: Upgrade Moodle to [TARGET VERSION]
labels: dependencies
assignees: awesomephant
---

- [ ] Ensure we're meeting the new version's software requirements (Should be fine for `4.3.x`)
- [ ] Download the required version of Moodle from https://download.moodle.org/releases/latest/
- [ ] Update staging (use staging files and database: `moodle-staging`)
  - [ ] Backup the staging DB (`all-inkl.com` >`login` > `Database` > `Login` (little computer icon next to the right DB) -> `Export` -> `Custom (gZIP)` -> `Go`)
  - [ ] Make a new folder called `staging.nonproliferation-elearning.eu-update`
  - [ ] Upload the new version of Moodle to it (unzip before)
  - [ ] Copy `config.php` to the new folder
  - [ ] Copy `.user.ini`
  - [ ] Copy the theme: `theme/hsfk`
  - [ ] Copy the plugins: `mod/customcert`, `enrol/auto`
  - [ ] Rename the original folder to `staging.nonproliferation-elearning.eu-old` and the new one to `staging.nonproliferation-elearning.eu`
  - [ ] Open [staging.nonproliferation-elearning.eu](https://staging.nonproliferation-elearning.eu) and complete the upgrade process
- [ ] Update production (use production files and database)
  - [ ] Backup the production DB (`moodle`, same process as above)
  - [ ] Make a new folder called `nonproliferation-elearning.eu-update`
  - [ ] Upload the new version of Moodle to it (unzip before, every single file, put in queue, activate queue)
  - [ ] Copy `config.php` to the new folder
  - [ ] Copy `.user.ini`
  - [ ] Copy `.htaccess` ( ! )
  - [ ] Copy the theme: `theme/hsfk` (put `hsfk` into correct file on new server: `theme`)
  - [ ] Copy the plugin: `mod/customcert` (s.a. put into correct file on new server)
  - [ ] Copy the plugins: `enrol/auto` (s.a. put into correct file on new server)
  - [ ] Copy `/learningunit` ( ! )
  - [ ] Rename the original folder to `nonproliferation-elearning.eu-old` and the new one to `nonproliferation-elearning.eu`
  - [ ] Open [nonproliferation-elearning.eu](https://nonproliferation-elearning.eu) and complete the upgrade process
