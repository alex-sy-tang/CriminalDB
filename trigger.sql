-- Update the number of Sentence, 
-- when a new sentencing is initiated

DELIMITER //
CREATE OR REPLACE TRIGGER updateSentence
AFTER INSERT ON Sentencing 
FOR EACH ROW
BEGIN 
	IF NEW.Sentencing_ID IS NOT NULL THEN
            UPDATE num_sentences
            SET sentences_num = sentences_num + 1;
    END IF;
END // 
DELIMITER ;

