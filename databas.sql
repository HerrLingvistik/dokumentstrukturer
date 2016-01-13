DROP TABLE Bicep_Curls;
DROP TABLE Concentration_Curls;
CREATE TABLE Bicep_Curls(ID INTEGER, Week Integer PRIMARY KEY AUTO_INCREMENT, Reps INTEGER, Sets INTEGER, Weight DOUBLE);
CREATE TABLE Concentration_Curls(ID INTEGER, Week Integer PRIMARY KEY AUTO_INCREMENT, Reps INTEGER, Sets INTEGER, Weight DOUBLE);

/*INSERT INTO Bench_Press(Reps, Sets, Weight, Comment) VALUES('1', '1', '112', 'latt');
INSERT INTO Deadlift(Reps, Sets, Weight, Comment) VALUES('1', '1', '112', 'latt');
INSERT INTO Squat(Reps, Sets, Weight, Comment) VALUES('1', '1', '112', 'latt');*/
