---
name: Upgrade Moodle
about: Standard workflow for upgrading Moodle
title: Upgrade Moodle to [TARGET VERSION]
labels: dependencies
assignees: awesomephant
---

- [ ] Ensure we're meeting the new version's software requirements (Should be fine for `4.3.x`)
- [ ] Download the required version of Moodle from https://download.moodle.org/releases/latest/
- [ ] Update staging
  - [ ] Make a new folder called `staging.nonproliferation-elearning.eu-update`
  - [ ] Upload the new version of Moodle to it
  - [ ] Backup the staging DB
  - [ ] Copy `config.php` to the new folder
  - [ ] Copy `.user.ini`
  - [ ] Copy the theme: `theme/hsfk`
  - [ ] Copy the plugins: `mod/customcert`, `mod/certificate`, `enrol/auto`
  - [ ] Rename the original folder to `staging.nonproliferation-elearning.eu-old` and the new one to `staging.nonproliferation-elearning.eu`
  - [ ] Open [staging.nonproliferation-elearning.eu](https://staging.nonproliferation-elearning.eu) and complete the upgrade process
- [ ] Update production
  - [ ] Make a new folder called `nonproliferation-elearning.eu-update`
  - [ ] Upload the new version of Moodle to it
  - [ ] Backup the production DB
  - [ ] Copy `config.php` to the new folder
  - [ ] Copy `.user.ini`
  - [ ] Copy `.htaccess`
  - [ ] Copy the theme: `theme/hsfk`
  - [ ] Copy the plugins: `mod/customcert`, `mod/certificate`, `enrol/auto`
  - [ ] Copy `/learningunit`!
  - [ ] Rename the original folder to `nonproliferation-elearning.eu-old` and the new one to `nonproliferation-elearning.eu`
  - [ ] Open [nonproliferation-elearning.eu](https://nonproliferation-elearning.eu) and complete the upgrade process
