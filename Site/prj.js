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
function addUser() {
	let fname = document.getElementById("fname").value;
	let lname = document.getElementById("lname").value;
	let nickname = document.getElementById("nickname").value;
	let password = document.getElementById("password").value;
	let passwordRep = document.getElementById("passwordRep").value;
	if (password == passwordRep) {
		let sql = 'INSERT INTO Users (fname, lname, username, pass) VALUES (?,?,?,?)';
		db.run(sql, [fname, lname, nickname, password], (err) => {
			if (err) {
				throw err;
			}
		})
		document.getElementById('isisnt').innerHTML = "Registration successful!";
	}
}
function logIn() {
	let username = document.getElementById("username").value;
	let pass = document.getElementById("pass").value;
	let sql = 'SELECT * FROM Users WHERE username=? and pass=?'
	db.run(sql, [username, pass], (err) => {
		if (err) {
			throw err;
		}
		document.getElementById('isisnt').innerHTML = "Login successful!";
	})
}