---
name: Upgrade Moodle
about: Standard workflow for upgrading Moodle
title: Upgrade Moodle to [VERSION]
labels: dependencies
assignees: awesomephant

---

- [ ] Ensure we're meeting the new version's software requirements (Should be fine for `4.1.x`)
- [ ] Download the required version of Moodle from https://download.moodle.org/releases/latest/
- [ ] Update staging
  - [x] Make a new folder called `staging.nonproliferation-elearning.eu-update`
  - [x] Upload the new version of Moodle to it
  - [ ] Backup the staging DB
  - [ ] Copy `config.php` to the new folder
  - [ ] Copy the `hsfk` theme to the new folder
  - [ ] Copy the plugins: `mod_customcert`, `enrol_autoenrol`
  - [ ] Rename the original folder to `staging.nonproliferation-elearning.eu-old` and the new one to `staging.nonproliferation-elearning.eu`
  - [ ] Open the staging site and complete the upgrade process
