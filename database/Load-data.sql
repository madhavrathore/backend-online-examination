insert into institutes (name) values ('MIT'), ('IIT Delhi'), ('BITs');

insert into subjects (name, institute_id, max_marks, no_of_questions, min_passing_marks, exam_duration) values
  ('General Knowledge', 1, 100, 10, 40, 20),
  ('General Knowledge', 2, 100, 10, 40, 20),
  ('General Knowledge', 3, 100, 10, 40, 20);


insert into questions (question, subject_id) values
  ('what is capital of India?', 1),
  ('what is capital of Rajasthan?', 1),
  ('what is capital of Nepal?', 1),
  ('what is national bird of India?', 1),
  ('what is highest peak of world?', 1);

#   ,('who build Red fort of Delhi?', 1),
#   ('who build Red fort of Agra?', 1),
#   ('Taj mahal is built by whom?', 1),
#   ('Highest peak of India?', 1),
#   ('Where does highest rainfall occurs in india?', 1)


insert into question_options (question_id, value) values
  (1, 'Mumbai'), (1, 'Delhi'), (1, 'Jaipur'), (1, 'Bangalore'),
  (2, 'Mumbai'), (2, 'Delhi'), (2, 'Jaipur'), (2, 'Bangalore'),
  (3, 'Kathmandu'), (3, 'Delhi'), (3, 'Jaipur'), (3, 'Bangalore'),
  (4, 'Peacock'), (4, 'Crow'), (4, 'crane'), (4, 'parrot'),
  (5, 'K2'), (5, 'Kanchanjangha'), (5, 'Mount Everest'), (5, 'Mount Elburs')
;


insert into answers (question_id, question_option_id) values
  (1, 2), (2, 7), (3, 9), (4, 13), (5, 19)
;


insert into tests (subject_id, test_date, is_submitted, user_id) values
  (1, '2019-11-07', 0, 1),
  (2, '2019-11-08', 0, 1),
  (3, '2019-11-09', 0, 1);