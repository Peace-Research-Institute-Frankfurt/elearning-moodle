---
name: Upgrade Moodle
about: Standard workflow for upgrading Moodle
title: Upgrade Moodle to [VERSION]
labels: dependencies
assignees: awesomephant
body:
  - type: input
    id: target_version
    attributes:
      label: Target Version

---

- [ ] Ensure we're meeting the new version's software requirements (Should be fine for `4.1.x`)
- [ ] Download the required version of Moodle from https://download.moodle.org/releases/latest/
- [ ] Update staging
  - [x] Make a new folder called `staging.nonproliferation-elearning.eu-update`
  - [x] Upload the new version of Moodle to it
  - [ ] Backup the staging DB
  - [ ] Copy `config.php` to the new folder
  - [ ] Copy `.user.ini`
  - [ ] Copy the theme: `theme/hsfk`
  - [ ] Copy the plugins: `mod/customcert`, `enrol/auto`
  - [ ] Rename the original folder to `staging.nonproliferation-elearning.eu-old` and the new one to `staging.nonproliferation-elearning.eu`
  - [ ] Open the staging site and complete the upgrade process
