const sqlite3 = require('sqlite3').verbose();
const express = require('express');
const http = require('http');
let db = new sqlite3.Database('../Database.db', (err) => {
	if (err) {
		return console.error(err.message);
	}
	console.log('Conn Succesful!');
});
var fname = document.getElementById("fname").value;
var lname = document.getElementById("lname").value;
var nickname = document.getElementById("nickname").value;
var password = document.getElementById("password").value;
var passwordRep = document.getElementById("passwordRep").value;
var username = document.getElementById("username").value;
var pass = document.getElementById("pass").value;
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
function addUser(fname, lname, nickname, password) {

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
function logIn(username,pass) {

	let sql = 'SELECT * FROM Users WHERE username=? and pass=?'
	db.run(sql, [username, pass], (err) => {
		if (err) {
			throw err;
		}
		document.getElementById('isisnt').innerHTML = "Login successful!";
	})
}