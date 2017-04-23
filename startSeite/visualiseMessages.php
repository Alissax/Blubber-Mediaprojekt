<?php
/**
 * Created by PhpStorm.
 * User: Jenny
 * Date: 23.04.2017
 * Time: 14:48
 */

include ("visualiseMessages.html");
//get stored messages from Datenbank instead of next 4 lines
print ($writtenMessage->getAuthor());
print (" has written:");
print ("<br>");
print ($writtenMessage->getText());
