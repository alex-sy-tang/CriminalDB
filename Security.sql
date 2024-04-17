CREATE ROLE Developer;

GRANT SELECT, INSERT, UPDATE, DELETE ON Aliases TO Developer;
GRANT SELECT, INSERT, UPDATE, DELETE ON Crimes TO Developer;
GRANT SELECT, INSERT, UPDATE, DELETE ON Prob_officer TO Developer;
GRANT SELECT, INSERT, UPDATE, DELETE ON Sentencing TO Developer;
GRANT SELECT, INSERT, UPDATE, DELETE ON Crime_codes TO Developer;
GRANT SELECT, INSERT, UPDATE, DELETE ON Crime_charges TO Developer;
GRANT SELECT, INSERT, UPDATE, DELETE ON Officers TO Developer;
GRANT SELECT, INSERT, UPDATE, DELETE ON Crime_officers TO Developer;
GRANT SELECT, INSERT, UPDATE, DELETE ON Appeals TO Developer;

GRANT Developer TO 'dev_one';




CREATE ROLE Viewer;

GRANT SELECT ON Aliases TO Developer;
GRANT SELECT ON Crimes TO Developer;
GRANT SELECT ON Prob_officer TO Developer;
GRANT SELECT ON Sentencing TO Developer;
GRANT SELECT ON Crime_codes TO Developer;
GRANT SELECT ON Crime_charges TO Developer;
GRANT SELECT ON Officers TO Developer;
GRANT SELECT ON Crime_officers TO Developer;
GRANT SELECT ON Appeals TO Developer;

GRANT Viewer to 'viewer_one';