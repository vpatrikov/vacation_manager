const sqlite3 = require('sqlite3').verbose();
const express = require('express');
const http = require('http');
let db = new sqlite3.Database('../Database.db', (err) => {
	if (err) {
		return console.error(err.message);
	}
	console.log('Conn Succesful!');
});

db.close();
//console.log("VM started");
function selectAllFromTeam(id) {
	let sql = `SELECT * 
            FROM Users 
            WHERE team = ?`;
	db.each(sql, [id], (err, row) => {
		if (err) {
			throw err;
		};
		console.log(`${row.username}: ${row.fname} ${row.lname}`);
	});
}


function deleteAtId(id) {
	let sql = 'DELETE FROM Users WHERE id = ?';
	//let table = prompt('Please enter name of table');
	//let id = prompt('Please enter Id you want to delete at');
	db.run(sql, [id], (err) => {
		if (err) {
			throw err;
		}
		console.log(`Successfuly deleted at ${id} from Users`);
	});
}