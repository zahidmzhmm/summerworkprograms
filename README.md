Step 01:
bvn
nid_number

Step 01:
home_address_father
work_address_father
nid_father

Step 01:
home_address_mother
work_address_mother
nid_mother

Step 01:
skype_id
social_media_handles
social_media_handles_val
linkedin_profile
whatsapp_number

Step 01:
home_address_sponsor
work_address_sponsor
nid_sponsor
num_dependents_sponsor

Step 04:
members_participated
members_participated_student
members_participated_relationship
members_participated_institution
members_participated_yes
members_participated_p_sponsor
members_participated_local_representative
members_participated_employer
members_participated_em_location

Step 05:
occupation_usa
duration_stay_usa

ALTER TABLE `tbl_member` ADD `bvn` TEXT NULL DEFAULT NULL AFTER `password_reset`, ADD `nid_number` TEXT NULL DEFAULT NULL AFTER `bvn`, ADD `home_address_father` TEXT NULL DEFAULT NULL AFTER `nid_number`, ADD `work_address_father` TEXT NULL DEFAULT NULL AFTER `home_address_father`, ADD `nid_father` TEXT NULL DEFAULT NULL AFTER `work_address_father`, ADD `home_address_mother` TEXT NULL DEFAULT NULL AFTER `nid_father`, ADD `work_address_mother` TEXT NULL DEFAULT NULL AFTER `home_address_mother`, ADD `nid_mother` TEXT NULL DEFAULT NULL AFTER `work_address_mother`, ADD `skype_id` TEXT NULL DEFAULT NULL AFTER `nid_mother`, ADD `social_media_handles` TEXT NULL DEFAULT NULL AFTER `skype_id`, ADD `social_media_handles_val` TEXT NULL DEFAULT NULL AFTER `social_media_handles`, ADD `linkedin_profile` TEXT NULL DEFAULT NULL AFTER `social_media_handles_val`, ADD `whatsapp_number` TEXT NULL DEFAULT NULL AFTER `linkedin_profile`, ADD `home_address_sponsor` TEXT NULL DEFAULT NULL AFTER `whatsapp_number`, ADD `work_address_sponsor` TEXT NULL DEFAULT NULL AFTER `home_address_sponsor`, ADD `nid_sponsor` TEXT NULL DEFAULT NULL AFTER `work_address_sponsor`, ADD `num_dependents_sponsor` TEXT NULL DEFAULT NULL AFTER `nid_sponsor`, ADD `members_participated` TEXT NULL DEFAULT NULL AFTER `num_dependents_sponsor`, ADD `members_participated_student` TEXT NULL DEFAULT NULL AFTER `members_participated`, ADD `members_participated_relationship` TEXT NULL DEFAULT NULL AFTER `members_participated_student`, ADD `members_participated_institution` TEXT NULL DEFAULT NULL AFTER `members_participated_relationship`, ADD `members_participated_yes` TEXT NULL DEFAULT NULL AFTER `members_participated_institution`, ADD `members_participated_p_sponsor` TEXT NULL DEFAULT NULL AFTER `members_participated_yes`, ADD `members_participated_local_representative` TEXT NULL DEFAULT NULL AFTER `members_participated_p_sponsor`, ADD `members_participated_employer` TEXT NULL DEFAULT NULL AFTER `members_participated_local_representative`, ADD `members_participated_em_location` TEXT NULL DEFAULT NULL AFTER `members_participated_employer`, ADD `occupation_usa` TEXT NULL DEFAULT NULL AFTER `members_participated_em_location`, ADD `duration_stay_usa` TEXT NULL DEFAULT NULL AFTER `occupation_usa`;
ALTER TABLE `tbl_member` ADD `appointment_fee` VARCHAR(25) NULL DEFAULT NULL AFTER `appointment_type`;
