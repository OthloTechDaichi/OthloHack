-- PRAGMA foreign_keys=true;を毎回打つ

CREATE TABLE IF NOT EXISTS my_task_list(
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  category_id INTEGER NOT NULL,
  sub_category_id INTEGER NOT NULL,
  date_time TEXT NOT NULL,
  done INTEGER NOT NULL,
  foreign key (category_id) references category(id),
  foreign key (sub_category_id) references sub_category(id)
);

CREATE TABLE IF NOT EXISTS category(
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS sub_category(
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  category_id INTEGER NOT NULL,
  name TEXT NOT NULL,
  foreign key (category_id) references category(id)
);
