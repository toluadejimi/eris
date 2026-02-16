-- Run this in phpMyAdmin or MySQL to create the student_exam_access table
-- Database: eriscomn_2023_2024

CREATE TABLE IF NOT EXISTS `student_exam_access` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `students_id` int(10) unsigned NOT NULL,
  `years_id` int(10) unsigned NOT NULL,
  `months_id` int(10) unsigned NOT NULL,
  `exams_id` int(10) unsigned NOT NULL,
  `faculty_id` int(10) unsigned NOT NULL,
  `semesters_id` int(10) unsigned NOT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=parent/student can see result, 0=show pay fee message',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_exam_unique` (`students_id`,`years_id`,`months_id`,`exams_id`,`faculty_id`,`semesters_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
