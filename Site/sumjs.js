const sqlite3 = require('sqlite3').verbose();
const express = require('express');
const http = require('http');
let db = new sqlite3.Database('../Database.db');
console.log("VM started");
console.log(db.run('SELECT * FROM Users where team = 4'));


db.close();