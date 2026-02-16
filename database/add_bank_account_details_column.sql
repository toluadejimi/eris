-- Run this in phpMyAdmin or MySQL if migrations don't work
-- Adds school account details column for pay-fee-required screen

ALTER TABLE `general_settings` ADD COLUMN `bank_account_details` TEXT NULL;
