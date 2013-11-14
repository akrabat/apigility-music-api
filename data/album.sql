
CREATE TABLE album (
    album_id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    artist TEXT NOT NULL,
    title TEXT NOT NULL
);

INSERT INTO album (artist, title)
    VALUES ('Eninem', 'The Marshall Mathers LP 2');
INSERT INTO album (artist, title)
    VALUES ('James Arthur', 'James Arthur');
INSERT INTO album (artist, title)
    VALUES ('Tinie  Tempah', 'Demonstration');
INSERT INTO album (artist, title)
    VALUES ('Andre Rieu', 'Music of the Night');
INSERT INTO album (artist, title)
    VALUES ('The Overtones', 'Saturday Night at the Movies');
INSERT INTO album (artist, title)
    VALUES ('Shane Filan', 'Me');

